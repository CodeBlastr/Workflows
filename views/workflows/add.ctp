<div class="workflows form">
<?php echo $this->Form->create('Workflow');?>
	<h2><?php __('Automate Your Website with Workflows'); ?></h2>
	<fieldset>
	<?php
		#echo $form->input('Condition.name', array('label' => __('A name so this is easy to find later.', true)));
		echo $form->input('Condition.description', array('label' => __('Why are you creating this workflow?', true)));
	?>
    </fieldset>
    <fieldset>
 		<legend><?php __('What will trigger this workflow?');?></legend>
		<p><?php __('When a record is...');?></p>
   	<?php
		echo $form->input('Condition.is_create', array('label' => 'created.'));
		#echo $form->input('Condition.is_read', array('label' => 'Fire when record is viewed.'));
		echo $form->input('Condition.is_update', array('label' => 'udpated.'));
		echo $form->input('Condition.is_delete', array('label' => 'deleted.'));
		#echo $form->input('Condition.plugin', array('empty' => true, 'after' => ' Plugin called to match against on view'));
		#echo $form->input('Condition.controller', array('after' => ' Controller name to match on view'));
		#echo $form->input('Condition.action', array('after' => ' Controller method to match on view'));
	?>
    </fieldset>
    <fieldset>
		<p><?php __('...using this system.');?></p>
    <?php 
		echo $form->input('plugin', array('empty' => true,
										  'ajax' => array(
														'element' => 'select',
														'json' => 'workflows/workflows/list_models', 
														'rel' => 'ConditionModel'
														)));  
		echo $form->input('Condition.model', array('type' => 'select'));
	?>
    </fieldset>
    <fieldset>
 		<legend class="toggleClick"><?php __('Advanced (sub conditions)');?></legend>
    <?php
		echo $form->input('Condition.condition', array('label' => 'Sub Condtions', 'after' => ' Sub-conditions to match against. Model.field.operator.value,Model.field.operator.value'));
	?>
    </fieldset>
<?php
echo $form->input('Condition.bind_model', array('type' => 'hidden', 'value' => 'Workflows.Workflow'));
echo $form->end('Submit');
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

 
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Workflows', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Conditions', true), array('controller' => 'conditions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Condition', true), array('controller' => 'conditions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Workflow Events', true), array('controller' => 'workflow_events', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Workflow Event', true), array('controller' => 'workflow_events', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Workflow Items', true), array('controller' => 'workflow_items', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Workflow Item', true), array('controller' => 'workflow_items', 'action' => 'add')); ?> </li>
	</ul>
</div>

<?php /*
// set the contextual menu items
$menu->setValue(array(
	array(
		'heading' => 'Conditions',
		'items' => array(
			$this->Html->link(__('List Conditions', true), array('plugin' => null, 'controller' => 'conditions', 'action' => 'index')),
			)
		),
	)
);*/
?> 
