<div class="workflowItems form">
<?php echo $this->Form->create('WorkflowItem');?>
	<fieldset>
 		<legend><?php echo __('Admin Edit Workflow Item'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('workflow_id');
		echo $this->Form->input('parent_id');
		echo $this->Form->input('name');
		echo $this->Form->input('description');
		echo $this->Form->input('plugin');
		echo $this->Form->input('model');
		echo $this->Form->input('controller');
		echo $this->Form->input('action');
		echo $this->Form->input('values');
		echo $this->Form->input('delay_time');
		echo $this->Form->input('execution_date');
		echo $this->Form->input('order');
		echo $this->Form->input('creator_id');
		echo $this->Form->input('modifier_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('WorkflowItem.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('WorkflowItem.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Workflow Items', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Workflows', true), array('controller' => 'workflows', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Workflow', true), array('controller' => 'workflows', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Workflow Items', true), array('controller' => 'workflow_items', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parent Workflow Item', true), array('controller' => 'workflow_items', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Creator', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Workflow Item Events', true), array('controller' => 'workflow_item_events', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Workflow Item Event', true), array('controller' => 'workflow_item_events', 'action' => 'add')); ?> </li>
	</ul>
</div>