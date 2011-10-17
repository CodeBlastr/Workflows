<?php
class Workflow extends AppModel {
	var $name = 'Workflow';
	var $displayField = 'name';
	var $validate = array(
		'name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'creator_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'modifier_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'Condition' => array(
			'className' => 'Condition',
			'foreignKey' => 'condition_id',
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
		'Modifier' => array(
			'className' => 'Users.User',
			'foreignKey' => 'modifier_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	var $hasMany = array(
		'WorkflowEvent' => array(
			'className' => 'Workflows.WorkflowEvent',
			'foreignKey' => 'workflow_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'WorkflowItem' => array(
			'className' => 'Workflows.WorkflowItem',
			'foreignKey' => 'workflow_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);
	
	
	function triggered($id, $data) {
		$workflows = $this->find('all', array(
			'conditions' => array(
				'Workflow.condition_id' => $id,
				),
			));
		if (!empty($workflows)) {
			foreach ($workflows as $workflow) {
				$workflowEvent['WorkflowEvent']['workflow_id'] = $workflow['Workflow']['id'];
				$workflowEvent['WorkflowEvent']['data'] = serialize($data);
				$workflowEvent['WorkflowEvent']['is_triggered'] = 0;
				$this->WorkflowEvent->create();
				$this->WorkflowEvent->save($workflowEvent);
			}
			# run the queue three times so that if the delay iz zero, the first item goes out immediately
			# later removed the auto queue running because it causes $this->id to be wrong, so redirects are wrong. 
			# $this->WorkflowEvent->runQueue();
			return true;
		} else {
			return false;
		}
	}
		
	
	function add($data = array()) {
		$data = $this->cleanInputData($data);
		if ($this->saveAll($data)) {
			return true;
		} else {
			throw new Exception(__d('workflows', 'Workflow save failed.', true));
		}
	}
	
	
	function cleanInputData($data) {
		
		if (!empty($data['Condition']['description'])) :
			$last_space = strrpos(substr($data['Condition']['description'], 0, 30), ' ');
			$trimmed_text = substr($data['Condition']['description'], 0, $last_space);
			$data['Condition']['name'] = $trimmed_text;
			$data['Workflow']['name'] = $trimmed_text;
			$data['Workflow']['description'] = $data['Condition']['description'];
		endif;
		
		if (!empty($data['Workflow']['plugin'])) :
			$data['Condition']['plugin'] = $data['Workflow']['plugin'];
		endif;
		
		return $data;
	}
	
	
	/**
	 * Return an array of plugins which are available to use with workflows
	 */
	function plugins() {
		foreach (App::objects('plugin') as $plugin) :
			$plugins[Inflector::underscore($plugin)] = Inflector::humanize(Inflector::underscore($plugin));
		endforeach;
		
		unset($plugins['acl_extras']);
		unset($plugins['api_generator']);
		unset($plugins['calendars']);
		unset($plugins['categories']);
		unset($plugins['events']);
		unset($plugins['facebook']);
		unset($plugins['favorites']);
		unset($plugins['forms']);
		unset($plugins['forum']);
		unset($plugins['locations']);
		unset($plugins['maps']);
		unset($plugins['menus']);
		unset($plugins['news']);
		unset($plugins['notifications']);
		unset($plugins['permissions']);
		unset($plugins['recaptcha']);
		unset($plugins['reports']);
		unset($plugins['rss']);
		unset($plugins['search']);
		unset($plugins['searchable']);
		unset($plugins['shipping']);
		unset($plugins['sitemaps']);
		unset($plugins['social']);
		unset($plugins['tags']);
		unset($plugins['utils']);
		unset($plugins['workflows']);
		
		return $plugins;
	}
		

}
?>