<div class="workflowEvents form">
<?php echo $this->Form->create('WorkflowEvent');?>
	<fieldset>
 		<legend><?php echo __('Admin Add Workflow Event'); ?></legend>
	<?php
		echo $this->Form->input('workflow_id');
		echo $this->Form->input('data');
		echo $this->Form->input('is_triggered');
		echo $this->Form->input('triggered_time');
		echo $this->Form->input('creator_id');
		echo $this->Form->input('modifer_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<?php 
// set the contextual menu items
$this->set('context_menu', array('menus' => array(
	array(
		'heading' => 'Workflow Events',
		'items' => array(
			$this->Html->link(__('List Workflow Events', true), array('action' => 'index')),
			$this->Html->link(__('List Workflows', true), array('controller' => 'workflows', 'action' => 'index')),
			$this->Html->link(__('New Workflow', true), array('controller' => 'workflows', 'action' => 'add')),
			$this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')),
			$this->Html->link(__('New Creator', true), array('controller' => 'users', 'action' => 'add')),
			)
		),
	)));
?>