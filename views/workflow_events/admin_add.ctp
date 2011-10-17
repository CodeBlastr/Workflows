<div class="workflowEvents form">
<?php echo $this->Form->create('WorkflowEvent');?>
	<fieldset>
 		<legend><?php __('Admin Add Workflow Event'); ?></legend>
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
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Workflow Events', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Workflows', true), array('controller' => 'workflows', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Workflow', true), array('controller' => 'workflows', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Creator', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>