<?php
class WorkflowItemEvent extends WorkflowsAppModel {
	public $name = 'WorkflowItemEvent';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	public $belongsTo = array(
		'WorkflowItem' => array(
			'className' => 'Workflows.WorkflowItem',
			'foreignKey' => 'workflow_item_id',
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
}
?>