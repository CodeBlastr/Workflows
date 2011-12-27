<div class="workflowEvents index">
	<h2><?php echo __('Workflow Events');?></h2>
    <p> A list of events that have been triggered by conditions being met, and the workflow items that those conditions triggered. </p>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('workflow_id');?></th>
			<th><?php echo $this->Paginator->sort('is_triggered');?></th>
			<th><?php echo $this->Paginator->sort('triggered_time');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($workflowEvents as $workflowEvent):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $this->Html->link($workflowEvent['Workflow']['name'], array('controller' => 'workflows', 'action' => 'view', $workflowEvent['Workflow']['id'])); ?>
		</td>
		<td><?php echo $workflowEvent['WorkflowEvent']['is_triggered']; ?>&nbsp;</td>
		<td><?php echo $workflowEvent['WorkflowEvent']['triggered_time']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $workflowEvent['WorkflowEvent']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $workflowEvent['WorkflowEvent']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $workflowEvent['WorkflowEvent']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $workflowEvent['WorkflowEvent']['id'])); ?>
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
		'heading' => 'Workflow Events',
		'items' => array(
			$this->Html->link(__('New Workflow Event', true), array('action' => 'add')),
			$this->Html->link(__('List Workflows', true), array('controller' => 'workflows', 'action' => 'index')),
			$this->Html->link(__('New Workflow', true), array('controller' => 'workflows', 'action' => 'add')),
			)
		),
	)));
?>