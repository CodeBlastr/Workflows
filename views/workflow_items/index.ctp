<div class="workflowItems index">
	<h2><?php echo __('Workflow Items');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('workflow_id');?></th>
			<th><?php echo $this->Paginator->sort('parent_id');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('description');?></th>
			<th><?php echo $this->Paginator->sort('plugin');?></th>
			<th><?php echo $this->Paginator->sort('model');?></th>
			<th><?php echo $this->Paginator->sort('controller');?></th>
			<th><?php echo $this->Paginator->sort('action');?></th>
			<th><?php echo $this->Paginator->sort('values');?></th>
			<th><?php echo $this->Paginator->sort('delay_time');?></th>
			<th><?php echo $this->Paginator->sort('execution_date');?></th>
			<th><?php echo $this->Paginator->sort('order');?></th>
			<th><?php echo $this->Paginator->sort('creator_id');?></th>
			<th><?php echo $this->Paginator->sort('modifier_id');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
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
		<td><?php echo $workflowItem['WorkflowItem']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($workflowItem['Workflow']['name'], array('controller' => 'workflows', 'action' => 'view', $workflowItem['Workflow']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($workflowItem['ParentWorkflowItem']['name'], array('controller' => 'workflow_items', 'action' => 'view', $workflowItem['ParentWorkflowItem']['id'])); ?>
		</td>
		<td><?php echo $workflowItem['WorkflowItem']['name']; ?>&nbsp;</td>
		<td><?php echo $workflowItem['WorkflowItem']['description']; ?>&nbsp;</td>
		<td><?php echo $workflowItem['WorkflowItem']['plugin']; ?>&nbsp;</td>
		<td><?php echo $workflowItem['WorkflowItem']['model']; ?>&nbsp;</td>
		<td><?php echo $workflowItem['WorkflowItem']['controller']; ?>&nbsp;</td>
		<td><?php echo $workflowItem['WorkflowItem']['action']; ?>&nbsp;</td>
		<td><?php echo $workflowItem['WorkflowItem']['values']; ?>&nbsp;</td>
		<td><?php echo $workflowItem['WorkflowItem']['delay_time']; ?>&nbsp;</td>
		<td><?php echo $workflowItem['WorkflowItem']['execution_date']; ?>&nbsp;</td>
		<td><?php echo $workflowItem['WorkflowItem']['order']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($workflowItem['Creator']['username'], array('controller' => 'users', 'action' => 'view', $workflowItem['Creator']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($workflowItem['Modifier']['username'], array('controller' => 'users', 'action' => 'view', $workflowItem['Modifier']['id'])); ?>
		</td>
		<td><?php echo $workflowItem['WorkflowItem']['created']; ?>&nbsp;</td>
		<td><?php echo $workflowItem['WorkflowItem']['modified']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $workflowItem['WorkflowItem']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $workflowItem['WorkflowItem']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $workflowItem['WorkflowItem']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $workflowItem['WorkflowItem']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Workflow Item', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Workflows', true), array('controller' => 'workflows', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Workflow', true), array('controller' => 'workflows', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Workflow Items', true), array('controller' => 'workflow_items', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parent Workflow Item', true), array('controller' => 'workflow_items', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Creator', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Workflow Item Events', true), array('controller' => 'workflow_item_events', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Workflow Item Event', true), array('controller' => 'workflow_item_events', 'action' => 'add')); ?> </li>
	</ul>
</div>