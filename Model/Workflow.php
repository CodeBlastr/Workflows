<?php
class Workflow extends WorkflowsAppModel {
	public $name = 'Workflow';
	public $displayField = 'name';
	public $validate = array(
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

	public $belongsTo = array(
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

	public $hasMany = array(
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
	
	
	public function triggered($id, $data) {
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
			$id = $this->id;
			$this->WorkflowEvent->runQueue();
			$this->id = $id;
			return true;
		} else {
			return false;
		}
	}
		
	
	public function add($data = array()) {
		$data = $this->cleanInputData($data);
		if ($this->saveAll($data)) {
			return true;
		} else {
			throw new Exception(__d('workflows', 'Workflow save failed.', true));
		}
	}
	
	
	public function cleanInputData($data) {
		
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
	public function plugins() {
		foreach (CakePlugin::loaded() as $plugin) :
			$plugins[$plugin] = Inflector::humanize(Inflector::underscore($plugin));
		endforeach;

		unset($plugins['AclExtras']);
		unset($plugins['Calendars']);
		unset($plugins['Categories']);
		unset($plugins['Events']);
		unset($plugins['Facebook']);
		unset($plugins['Favorites']);
		unset($plugins['Forms']);
		unset($plugins['Forum']);
		unset($plugins['Locations']);
		unset($plugins['Maps']);
		unset($plugins['Menus']);
		unset($plugins['News']);
		unset($plugins['Notifications']);
		unset($plugins['Privileges']);
		unset($plugins['Recaptcha']);
		unset($plugins['Reports']);
		unset($plugins['Rss']);
		unset($plugins['Search']);
		unset($plugins['Searchable']);
		unset($plugins['Shipping']);
		unset($plugins['Sitemaps']);
		unset($plugins['Social']);
		unset($plugins['Tags']);
		unset($plugins['Utils']);
		unset($plugins['Workflows']);
		
		return $plugins;
	}
		

}
?>