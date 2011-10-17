<div class="workflowItemEvents form">
<?php echo $this->Form->create('WorkflowItemEvent');?>
	<fieldset>
 		<legend><?php __('Admin Edit Workflow Item Event'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('workflow_item_id');
		echo $this->Form->input('data');
		echo $this->Form->input('trigger_time');
		echo $this->Form->input('is_triggered');
		echo $this->Form->input('triggered_time');
		echo $this->Form->input('creator_id');
		echo $this->Form->input('modifier_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('WorkflowItemEvent.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('WorkflowItemEvent.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Workflow Item Events', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Workflow Items', true), array('controller' => 'workflow_items', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Workflow Item', true), array('controller' => 'workflow_items', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Creator', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>