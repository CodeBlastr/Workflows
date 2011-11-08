<?php
class WorkflowEvent extends AppModel {
	var $name = 'WorkflowEvent';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'Workflow' => array(
			'className' => 'Workflows.Workflow',
			'foreignKey' => 'workflow_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Creator' => array(
			'className' => 'Users.User',
			'foreignKey' => 'creator_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Modifer' => array(
			'className' => 'Users.User',
			'foreignKey' => 'modifer_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/** 
 * Creates work flow items events, sets untriggered work flows to triggered, fires untriggered workflow item events, and sets fired workflow item events to triggered.
 *
 * @return [bool}			returns true if run, false if there was an error
 * @todo					Need to send the admin an email message if this fails. Its mission critical.  (hmm... there's an idea... What if the admin could set certain areas to mission critical and get messages whenever they fail... interesting.)
 */
	function runQueue() {
		$orig_id = $this->id;
		
		$workflowEvents = $this->find('all', array(
			'conditions' => array(
				'WorkflowEvent.is_triggered' => 0,
				),
			'contain' => array(
				'Workflow' => array(
					'WorkflowItem',
					),
				),
			));
		$eventOutput = $workflowEvents;
		
		if (!empty($workflowEvents)) {
			if ($this->handleWorkflowEvents($workflowEvents)) {
				#return true; // do nothing here, except NOT return anything
			} else {
				$i = 1; // could be return false;
			}
		} 
		# handle the item events second so that any just created get fired immediately '
		$events = $this->handleWorkflowItemEvents(); 
		$events = (!empty($eventOutput) && !empty($events) ? array_merge($eventOutput, $events) : $events);
		$this->id = $orig_id;
		
		if (!empty($events)) {
			return $events;
		} else {
			return false;
		}
	}
	
	
	
	function handleWorkflowEvents($workflowEvents) {
		foreach ($workflowEvents as $workflowEvent) {
			#$this->handleWorkflowEvent($workflowEvent['WorkflowEvent']['id']);
			if ($this->createWorkflowItemEvents($workflowEvent['Workflow']['WorkflowItem'], $workflowEvent['WorkflowEvent']['data'])) {
				$workflowEventUpdate['WorkflowEvent']['id'] = $workflowEvent['WorkflowEvent']['id'];
				$workflowEventUpdate['WorkflowEvent']['is_triggered'] = 1;
				$workflowEventUpdate['WorkflowEvent']['triggered_time'] = date('Y-m-d H:i:s');
				if ($this->save($workflowEventUpdate)) {
					return true;
				} else {
					return false;
				}
			}
		}
	}
	

	/**
	 * Function to create workflow item events (these are the events which trigger items)
	 *
	 * @param {workflowItems} 		A data array of workflorItems
	 * @param {data}				The data from the original form entry.
	 * @return {bool}				True if all saved correctly, false if not.
	 * @todo						We should put in a roll back function which deletes all of the created items if one should fail.
	 */
	function createWorkflowItemEvents($workflowItems, $data) {
		foreach ($workflowItems as $workflowItem) {
			$workflowItemEvent['WorkflowItemEvent']['workflow_item_id'] = $workflowItem['id'];
			$workflowItemEvent['WorkflowItemEvent']['data'] = $data;
			$workflowItemEvent['WorkflowItemEvent']['trigger_time'] = $this->getTriggerTime($workflowItem['delay_time']);
			$workflowItemEvent['WorkflowItemEvent']['is_triggered'] = 0;
			$workflowItemEvent['WorkflowItemEvent']['triggered_time'] = null;
			# create workflow item events
			$this->Workflow->WorkflowItem->WorkflowItemEvent->create();
			if ($this->Workflow->WorkflowItem->WorkflowItemEvent->save($workflowItemEvent)) {
				$itemEvents[] = $this->Workflow->WorkflowItem->WorkflowItemEvent->id;
				$return = true;
			} else {
				# roll back
				$this->Workflow->WorkflowItem->WorkflowItemEvent->deleteAll(array(
					'WorkflowItemEvent.id' => $itemEvents,
					), false);																			
				$return = false;
				break;
			}
		}
		return $return;
	}
	
	
	function getTriggerTime($delay) {
		return date('Y-m-d H:i:s', strtotime('+'.$delay.' minutes', time()));
	}
	
	
	
	function handleWorkflowItemEvents() { 
		$workflowItemEvents = $this->Workflow->WorkflowItem->WorkflowItemEvent->find('all', array(
			'conditions' => array(
				'WorkflowItemEvent.is_triggered' => 0,
				'OR' => array(
					'WorkflowItemEvent.trigger_time' => null,
					'WorkflowItemEvent.trigger_time <' => date('Y-m-d H:i:s'),
					),
				),
			'contain' => array(
				'WorkflowItem',
				),
			));
		if (!empty($workflowItemEvents) && $this->triggerWorkflowItemEvents($workflowItemEvents)) {
			return $workflowItemEvents;
		} else {
			return false;
		}
	}



/**
 * Where the events are actually triggered.
 *
 * @params {workflowItemEvents}		The events and related items that need to be triggered.
 * @todo 							This only handles model events right now, needs to be upgraded to include controller.
 */ 
	function triggerWorkflowItemEvents($workflowItemEvents) {
		$n = 0;
		foreach ($workflowItemEvents as $workflowItemEvent) {
			$plugin = $workflowItemEvent['WorkflowItem']['plugin'];
			$model = $workflowItemEvent['WorkflowItem']['model'];
			$action = $workflowItemEvent['WorkflowItem']['action'];
			
			# Change the values to an array. Required keys = data and map!
			$values = $this->parseValues($workflowItemEvent['WorkflowItem']['values'], $workflowItemEvent['WorkflowItemEvent']['data']);
			
			#import the model and fire the function
			$importModel = (!empty($plugin) ? $plugin.'.'.$model : $model);
			App::import('Model', $importModel);
			$this->$model = new $model();
			
			# This is the actual firing of the database driven event function.
			$this->$model->$action($values);
			
			#now set the event to triggered
			$workflowItemEvent['WorkflowItemEvent']['is_triggered'] = 1;
			$workflowItemEvent['WorkflowItemEvent']['triggered_time'] = date('Y-m-d H:i:s');
			if ($this->Workflow->WorkflowItem->WorkflowItemEvent->save($workflowItemEvent)) {
				$n = 0;
			} else {
				$n++;
			}
		}
		if ($n < 1) {
			return true; // unless we forced triggered actions to return true we cannot actually check if they were fired, and it doesn't seem likely to force a return true value, because this could literraly be any action in the entire application.
		} else {
			return false;
		}
	}
	
	
	
	/**
	 * This function creates a single data array from a map, and a string of data (NOTE: The formatting for both is very particular.  You must have specific keys, and the string of data must be in a format created by serialize(array); 
	 * @param {array}		An array with the keys map, and data.  Data is actual data to use (as in, real values that will get input into the new data string), and map contains directions for where to get data from the data string of the next parameter.
	 * @param {string}		A string, which is formatted using this function : serialize(array);	
	 * @return {array}		Returns a merged array consisting of all real values.
	 * @todo				If there is hasMany relationship data inluded in data we only call to the numeric array in the map.  I do envision a time when we may want to have a workflowevent created for every hasMany item so we will eventually need to code support for that. 
	 */
	function parseValues($values, $data) {
		$values = parse_ini_string($values, true);
		$data = unserialize($data);
		$finalData = !empty($values['data']) ? Set::merge($data, $values['data']) : $data;
		if (!empty($values['map'])) {
			$newModel = key($values['map']);
			foreach ($values['map'][$newModel] as $key => $value) {
				$thisData = explode('.', $value);
				if (is_numeric($thisData[1])) {
					# this supports hasMany relationship data
					$parsedData[$newModel][$key] = $data[$thisData[0]][$thisData[1]][$thisData[2]];	
				} else {
					$parsedData[$newModel][$key] = $data[$thisData[0]][$thisData[1]];	
				}
			}
			$finalData = Set::merge($finalData, $parsedData);
		}
		return $finalData;
	}
	
}
?>