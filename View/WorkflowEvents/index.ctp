<div class="workflowEvents index">
	<h2><?php echo __('Workflow Events');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('workflow_id');?></th>
			<th><?php echo $this->Paginator->sort('data');?></th>
			<th><?php echo $this->Paginator->sort('is_triggered');?></th>
			<th><?php echo $this->Paginator->sort('triggered_time');?></th>
			<th><?php echo $this->Paginator->sort('creator_id');?></th>
			<th><?php echo $this->Paginator->sort('modifer_id');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
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
		<td><?php echo $workflowEvent['WorkflowEvent']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($workflowEvent['Workflow']['name'], array('controller' => 'workflows', 'action' => 'view', $workflowEvent['Workflow']['id'])); ?>
		</td>
		<td><?php echo $workflowEvent['WorkflowEvent']['data']; ?>&nbsp;</td>
		<td><?php echo $workflowEvent['WorkflowEvent']['is_triggered']; ?>&nbsp;</td>
		<td><?php echo $workflowEvent['WorkflowEvent']['triggered_time']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($workflowEvent['Creator']['username'], array('controller' => 'users', 'action' => 'view', $workflowEvent['Creator']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($workflowEvent['Modifer']['username'], array('controller' => 'users', 'action' => 'view', $workflowEvent['Modifer']['id'])); ?>
		</td>
		<td><?php echo $workflowEvent['WorkflowEvent']['created']; ?>&nbsp;</td>
		<td><?php echo $workflowEvent['WorkflowEvent']['modified']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $workflowEvent['WorkflowEvent']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $workflowEvent['WorkflowEvent']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $workflowEvent['WorkflowEvent']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $workflowEvent['WorkflowEvent']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
	));
	?>	</p>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Workflow Event', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Workflows', true), array('controller' => 'workflows', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Workflow', true), array('controller' => 'workflows', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Creator', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>