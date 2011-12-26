<div class="workflows form">
<?php echo $this->Form->create('Workflow');?>
	<h2><?php echo __('Automate Your Website with Workflows'); ?></h2>
	<fieldset>
	<?php
		#echo $this->Form->input('Condition.name', array('label' => __('A name so this is easy to find later.', true)));
		echo $this->Form->input('Condition.description', array('label' => __('Why are you creating this workflow?', true)));
	?>
    </fieldset>
    <fieldset>
 		<legend><?php echo __('What will trigger this workflow?');?></legend>
		<p><?php echo __('When a record is...');?></p>
   	<?php
		echo $this->Form->input('Condition.is_create', array('label' => 'created.'));
		#echo $this->Form->input('Condition.is_read', array('label' => 'Fire when record is viewed.'));
		echo $this->Form->input('Condition.is_update', array('label' => 'udpated.'));
		echo $this->Form->input('Condition.is_delete', array('label' => 'deleted.'));
		#echo $this->Form->input('Condition.plugin', array('empty' => true, 'after' => ' Plugin called to match against on view'));
		#echo $this->Form->input('Condition.controller', array('after' => ' Controller name to match on view'));
		#echo $this->Form->input('Condition.action', array('after' => ' Controller method to match on view'));
	?>
    </fieldset>
    <fieldset>
		<p><?php echo __('...using this system.');?></p>
    <?php 
		echo $this->Form->input('plugin', array('empty' => true,
										  'ajax' => array(
														'element' => 'select',
														'json' => 'workflows/workflows/list_models', 
														'rel' => 'ConditionModel'
														)));  
		echo $this->Form->input('Condition.model', array('type' => 'select'));
	?>
    </fieldset>
    <fieldset>
 		<legend class="toggleClick"><?php echo __('Advanced (sub conditions)');?></legend>
    <?php
		echo $this->Form->input('Condition.condition', array('label' => 'Sub Condtions', 'after' => ' Sub-conditions to match against. Model.field.operator.value,Model.field.operator.value'));
	?>
    </fieldset>
<?php
echo $this->Form->input('Condition.bind_model', array('type' => 'hidden', 'value' => 'Workflows.Workflow'));
echo $this->Form->end('Submit');
?>
</div>




<script type="text/javascript">
$(function() {
	$('#ConditionPlugin').parent().hide();
	$('#ConditionController').parent().hide();
	$('#ConditionAction').parent().hide();
	$('#ConditionModel').parent().parent().hide();
	$('#WorkflowPlugin').parent().hide();
	$('.checkbox input').change(function() {
	  // show necessary elements if it is a "read" type
	  if ($('#ConditionIsRead').is(':checked')) { 
			$('#ConditionPlugin').parent().show();
			$('#ConditionPlugin').parent().show();
			$('#ConditionController').parent().show();
			$('#ConditionAction').parent().show();
	  } else {
			$('#ConditionPlugin').parent().hide();
			$('#ConditionPlugin').parent().hide();
			$('#ConditionController').parent().hide();
			$('#ConditionAction').parent().hide();
	  }
	  
	  // show necessary elements if it is a "create", "update" or "delete" type
	  if ($('#ConditionIsCreate').is(':checked') || $('#ConditionIsUpdate').is(':checked') || $('#ConditionIsDelete').is(':checked')) { 
			$('#WorkflowPlugin').parent().show();
			$('#ConditionModel').parent().parent().show();
	  } else {
			$('#WorkflowPlugin').parent().hide();
			$('#ConditionModel').parent().parent().hide();
	  }
	});
});
</script>

 
<?php 
// set the contextual menu items
$this->set('context_menu', array('menus' => array(
	array(
		'heading' => 'Workflows',
		'items' => array(
			$this->Html->link(__('List Workflows', true), array('action' => 'index')),
			$this->Html->link(__('List Conditions', true), array('controller' => 'conditions', 'action' => 'index')),
			$this->Html->link(__('New Condition', true), array('controller' => 'conditions', 'action' => 'add')),
			$this->Html->link(__('List Workflow Events', true), array('controller' => 'workflow_events', 'action' => 'index')),
			$this->Html->link(__('New Workflow Event', true), array('controller' => 'workflow_events', 'action' => 'add')),
			$this->Html->link(__('List Workflow Items', true), array('controller' => 'workflow_items', 'action' => 'index')),
			$this->Html->link(__('New Workflow Item', true), array('controller' => 'workflow_items', 'action' => 'add')),
			)
		),
	)));
?>
<?php /*
// set the contextual menu items
$this->set('context_menu', array('menus' => array(
	array(
		'heading' => 'Conditions',
		'items' => array(
			$this->Html->link(__('List Conditions', true), array('plugin' => null, 'controller' => 'conditions', 'action' => 'index')),
			)
		),
	)));*/
?> 
