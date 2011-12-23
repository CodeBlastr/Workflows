<div class="workflows form">
<?php echo $this->Form->create('Workflow');?>
	<fieldset>
 		<legend><?php echo __('Admin Edit Workflow'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('description');
		echo $this->Form->input('condition_id');
		echo $this->Form->input('creator_id');
		echo $this->Form->input('modifier_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<?php 
// set the contextual menu items
$this->set('context_menu', array('menus' => array(
	array(
		'heading' => 'Workflows',
		'items' => array(
			$this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Workflow.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Workflow.id'))),
			$this->Html->link(__('List Workflows', true), array('action' => 'index')),
			$this->Html->link(__('List Conditions', true), array('controller' => 'conditions', 'action' => 'index')),
			$this->Html->link(__('New Condition', true), array('controller' => 'conditions', 'action' => 'add')),
			$this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')),
			$this->Html->link(__('New Creator', true), array('controller' => 'users', 'action' => 'add')),
			$this->Html->link(__('List Workflow Events', true), array('controller' => 'workflow_events', 'action' => 'index')),
			$this->Html->link(__('New Workflow Event', true), array('controller' => 'workflow_events', 'action' => 'add')),
			$this->Html->link(__('List Workflow Items', true), array('controller' => 'workflow_items', 'action' => 'index')),
			$this->Html->link(__('New Workflow Item', true), array('controller' => 'workflow_items', 'action' => 'add')),
			)
		),
	)));
?>