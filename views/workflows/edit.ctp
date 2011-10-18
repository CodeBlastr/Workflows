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
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Workflow.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Workflow.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Workflows', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Conditions', true), array('controller' => 'conditions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Condition', true), array('controller' => 'conditions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Creator', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Workflow Events', true), array('controller' => 'workflow_events', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Workflow Event', true), array('controller' => 'workflow_events', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Workflow Items', true), array('controller' => 'workflow_items', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Workflow Item', true), array('controller' => 'workflow_items', 'action' => 'add')); ?> </li>
	</ul>
</div>