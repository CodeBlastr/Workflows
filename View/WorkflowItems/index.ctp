<div class="workflowItems index">
	<h2><?php echo __('Workflow Items');?></h2>
	<p> These are items that will occur after the related condition is met that triggers the parent workflow. </p>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('workflow_id');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('model');?></th>
			<th><?php echo $this->Paginator->sort('action');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($workflowItems as $workflowItem):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $this->Html->link($workflowItem['Workflow']['name'], array('controller' => 'workflows', 'action' => 'view', $workflowItem['Workflow']['id'])); ?>
		</td>
		<td><?php echo $this->Html->link($workflowItem['WorkflowItem']['name'], array('action' => 'view', $workflowItem['WorkflowItem']['id'])); ?>&nbsp;</td>
		<td><?php echo $workflowItem['WorkflowItem']['model']; ?>&nbsp;</td>
		<td><?php echo $workflowItem['WorkflowItem']['action']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $workflowItem['WorkflowItem']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $workflowItem['WorkflowItem']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $workflowItem['WorkflowItem']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<?php echo $this->Element('paging'); ?>
</div>
<?php 
// set the contextual menu items
$this->set('context_menu', array('menus' => array(
	array(
		'heading' => 'Workflow Items',
		'items' => array(
			$this->Html->link(__('Add', true), array('action' => 'add')),
			),
		),
	array(
		'heading' => 'Workflows',
		'items' => array(
			$this->Html->link(__('List', true), array('controller' => 'workflows', 'action' => 'index')),
			$this->Html->link(__('Add', true), array('controller' => 'workflows', 'action' => 'add')),
			),
		),
	array(
		'heading' => 'Events',
		'items' => array(
			$this->Html->link(__('List', true), array('controller' => 'workflow_item_events', 'action' => 'index')),
			),
		),
	)));
?>