<div class="workflowItems form">
<?php echo $this->Form->create('WorkflowItem');?>
	<fieldset>
 		<legend><?php echo __('Edit Workflow Item'); ?></legend>
        <p>This is an workflow event which will happen when the workflow selected is triggered.</p>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('workflow_id');
		#echo $this->Form->input('parent_id');
		echo $this->Form->input('name');
		echo $this->Form->input('description');
		echo $this->Form->input('plugin');
		echo $this->Form->input('model');
		#echo $this->Form->input('controller');
		echo $this->Form->input('action');
		echo $this->Form->input('values');
		#echo $this->Form->input('delay_time');
		#echo $this->Form->input('order');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<?php 
// set the contextual menu items
$this->set('context_menu', array('menus' => array(
	array(
		'heading' => 'Workflow Items',
		'items' => array(
			$this->Html->link(__('List', true), array('action' => 'index')),
			)
		),
	array(
		'heading' => 'Workflows',
		'items' => array(
			$this->Html->link(__('List', true), array('controller' => 'workflows', 'action' => 'index')),
			$this->Html->link(__('Add', true), array('controller' => 'workflows', 'action' => 'add')),
			)
		),
	array(
		'heading' => 'Events',
		'items' => array(
			$this->Html->link(__('List', true), array('controller' => 'workflow_item_events', 'action' => 'index')),
			)
		),
	)));
?>