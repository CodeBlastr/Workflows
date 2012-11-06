<div class="workflowItems form">
<?php
echo $this->Form->create('WorkflowItem', array('url' => '/workflows/workflow_items/add/'. $this->request->data['Workflow']['id']));?>
	<h2><?php echo __('When a '.Inflector::humanize(Inflector::underscore($this->request->data['Condition']['model'])).' is '.$created.$viewed.$updated.$deleted.' the system will automatically...'); ?></h2></p>
	<fieldset>
    	<?php
		echo $this->Form->input('name', array('value' => $this->request->data['Workflow']['name'])); 
		echo $this->Form->input('description', array('label' => 'What will this task do?', 'value' => $this->request->data['Workflow']['description'])); ?>
    </fieldset>
	<fieldset>
 		<legend><?php echo __('The task that will happen by triggering this action.'); ?></legend>
    	<?php
		echo $this->Form->input('WorkflowItem.plugin', array('type' => 'select', 'options' => $this->request->data['WorkflowItem']['plugins']));
		echo $this->Form->input('WorkflowItem.model');
		#echo $this->Form->input('controller');
		echo $this->Form->input('WorkflowItem.action');
		echo $this->Form->input('WorkflowItem.values', array('value' => 'Example...'.PHP_EOL.'[data]
OrderItem[status] = "pending"

[map]
OrderItem[assignee_id] = Product.owner_id'));
		echo $this->Form->input('WorkflowItem.delay_time');
		echo $this->Form->input('WorkflowItem.order');	?>
	</fieldset>
	<?php
	#echo $this->Form->input('parent_id');
	echo $this->Form->input('workflow_id', array('type' => 'hidden'));
	echo $this->Form->end(__('Submit', true)); ?>
</div>

<?php 
// set the contextual menu items
$this->set('context_menu', array('menus' => array(
	array(
		'heading' => 'Workflows',
		'items' => array(
			$this->Html->link(__('List'), array('controller' => 'workflows', 'action' => 'index'), array('class' => 'index')),
			$this->Html->link(__('Add'), array('controller' => 'workflows', 'action' => 'add'), array('class' => 'add')),
			$this->Html->link(__('List Items', true), array('controller' => 'workflow_items', 'action' => 'index'), array('class' => 'index')),
			)
		),
	))); ?>