<div class="workflowItemEvents index">
	<h2><?php __('Workflow Item Events');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('workflow_item_id');?></th>
			<th><?php echo $this->Paginator->sort('data');?></th>
			<th><?php echo $this->Paginator->sort('trigger_time');?></th>
			<th><?php echo $this->Paginator->sort('is_triggered');?></th>
			<th><?php echo $this->Paginator->sort('triggered_time');?></th>
			<th><?php echo $this->Paginator->sort('creator_id');?></th>
			<th><?php echo $this->Paginator->sort('modifier_id');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($workflowItemEvents as $workflowItemEvent):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $workflowItemEvent['WorkflowItemEvent']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($workflowItemEvent['WorkflowItem']['name'], array('controller' => 'workflow_items', 'action' => 'view', $workflowItemEvent['WorkflowItem']['id'])); ?>
		</td>
		<td><?php echo $workflowItemEvent['WorkflowItemEvent']['data']; ?>&nbsp;</td>
		<td><?php echo $workflowItemEvent['WorkflowItemEvent']['trigger_time']; ?>&nbsp;</td>
		<td><?php echo $workflowItemEvent['WorkflowItemEvent']['is_triggered']; ?>&nbsp;</td>
		<td><?php echo $workflowItemEvent['WorkflowItemEvent']['triggered_time']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($workflowItemEvent['Creator']['username'], array('controller' => 'users', 'action' => 'view', $workflowItemEvent['Creator']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($workflowItemEvent['Modifier']['username'], array('controller' => 'users', 'action' => 'view', $workflowItemEvent['Modifier']['id'])); ?>
		</td>
		<td><?php echo $workflowItemEvent['WorkflowItemEvent']['created']; ?>&nbsp;</td>
		<td><?php echo $workflowItemEvent['WorkflowItemEvent']['modified']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $workflowItemEvent['WorkflowItemEvent']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $workflowItemEvent['WorkflowItemEvent']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $workflowItemEvent['WorkflowItemEvent']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $workflowItemEvent['WorkflowItemEvent']['id'])); ?>
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
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Workflow Item Event', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Workflow Items', true), array('controller' => 'workflow_items', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Workflow Item', true), array('controller' => 'workflow_items', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Creator', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>