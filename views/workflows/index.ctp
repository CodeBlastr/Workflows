<div class="workflows index">
	<h2><?php __('Workflows');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('description');?></th>
			<th><?php echo $this->Paginator->sort('condition_id');?></th>
			<th><?php echo $this->Paginator->sort('creator_id');?></th>
			<th><?php echo $this->Paginator->sort('modifier_id');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($workflows as $workflow):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $workflow['Workflow']['id']; ?>&nbsp;</td>
		<td><?php echo $workflow['Workflow']['name']; ?>&nbsp;</td>
		<td><?php echo $workflow['Workflow']['description']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($workflow['Condition']['name'], array('controller' => 'conditions', 'action' => 'view', $workflow['Condition']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($workflow['Creator']['username'], array('controller' => 'users', 'action' => 'view', $workflow['Creator']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($workflow['Modifier']['username'], array('controller' => 'users', 'action' => 'view', $workflow['Modifier']['id'])); ?>
		</td>
		<td><?php echo $workflow['Workflow']['created']; ?>&nbsp;</td>
		<td><?php echo $workflow['Workflow']['modified']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $workflow['Workflow']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $workflow['Workflow']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $workflow['Workflow']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $workflow['Workflow']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Workflow', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Workflow Items', true), array('controller' => 'workflow_items', 'action' => 'index')); ?> </li>
	</ul>
</div>