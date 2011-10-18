<?php 
$created = !empty($this->request->data['Condition']['is_create']) ? 'created, ' : null;
$viewed = !empty($this->request->data['Condition']['is_read']) ? 'viewed, ' : null;
$updated = !empty($this->request->data['Condition']['is_updated']) ? 'updated, ' : null;
$deleted = !empty($this->request->data['Condition']['is_deleted']) ? 'deleted, ' : null;
?>

<div class="workflowItems form">
<?php 
echo $this->Form->create('WorkflowItem', array('url' => '/workflows/workflow_items/add/'. $this->request->data['Workflow']['id']));?>
	<h2><?php __('When a '.Inflector::humanize(Inflector::underscore($this->request->data['Condition']['model'])).' is '.$created.$viewed.$updated.$deleted.' the system will automatically...'); ?></h2></p>
	<fieldset>
    <?php
		#echo $this->Form->input('name');
		echo $this->Form->input('description', array('label' => 'What will this task do?'));
	?>
    </fieldset>
	<fieldset>
 		<legend><?php __('The task will happen by triggering this action.'); ?></legend>
    <?php
		echo $this->Form->input('WorkflowItem.plugin', array('type' => 'select', 'options' => $this->request->data['WorkflowItem']['plugins']));
		echo $this->Form->input('WorkflowItem.model');
		#echo $this->Form->input('controller');
		echo $this->Form->input('WorkflowItem.action');
		echo $this->Form->input('WorkflowItem.values', array('value' => 'Example...'.PHP_EOL.'[data]
OrderItem[status] = "pending"

[map]
OrderItem[assignee_id] = CatalogItem.owner_id'));
		echo $this->Form->input('WorkflowItem.delay_time');
		echo $this->Form->input('WorkflowItem.order');
	?>
	</fieldset>
<?php 
	#echo $this->Form->input('parent_id');
	echo $this->Form->input('workflow_id', array('type' => 'hidden'));
	echo $this->Form->end(__('Submit', true));
?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Workflows', true), array('controller' => 'workflows', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Workflow', true), array('controller' => 'workflows', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Workflow Items', true), array('controller' => 'workflow_items', 'action' => 'index')); ?> </li>
	</ul>
</div>