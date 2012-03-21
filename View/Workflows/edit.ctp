<div class="workflows form">
<?php echo $this->Form->create('Workflow');?>
	<fieldset>
 		<legend><?php echo __('Admin Edit Workflow'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('condition_id');
		echo $this->Form->input('name');
		echo $this->Form->input('description');
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
			$this->Html->link(__('List', true), array('action' => 'index')),
			)
		),
	array(
		'heading' => 'Conditions',
		'items' => array(
			$this->Html->link(__('List', true), array('plugin' => null, 'controller' => 'conditions', 'action' => 'index')),
			$this->Html->link(__('Add', true), array('plugin' => null, 'controller' => 'conditions', 'action' => 'add')),
			)
		),
	array(
		'heading' => 'Workflow Items',
		'items' => array(
			$this->Html->link(__('List', true), array('controller' => 'workflow_items', 'action' => 'index')),
			$this->Html->link(__('Add', true), array('controller' => 'workflow_items', 'action' => 'add')),
			)
		),
	array(
		'heading' => 'Events',
		'items' => array(
			$this->Html->link(__('List', true), array('controller' => 'workflow_events', 'action' => 'index')),
			)
		),
	))); ?>