<div class="workflows index">
	<h2><?php echo __('Workflows');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
		<th><?php echo $this->Paginator->sort('name');?></th>
		<th><?php echo $this->Paginator->sort('description');?></th>
		<th><?php echo $this->Paginator->sort('condition_id');?></th>
		<th class="actions"><?php echo __('Actions');?></th>
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
		<td><?php echo $workflow['Workflow']['name']; ?>&nbsp;</td>
		<td><?php echo $workflow['Workflow']['description']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($workflow['Condition']['name'], array('controller' => 'conditions', 'action' => 'view', $workflow['Condition']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $workflow['Workflow']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $workflow['Workflow']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $workflow['Workflow']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $workflow['Workflow']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
</div>
<?php echo $this->Element('paging'); ?>


 
<?php 
// set the contextual menu items
$this->set('context_menu', array('menus' => array(
	array(
		'heading' => 'Workflows',
		'items' => array(
			$this->Html->link(__('Add'), array('action' => 'add'), array('class' => 'add')),
			)
		),
	array(
		'heading' => 'Workflow Items',
		'items' => array(
			$this->Html->link(__('List'), array('controller' => 'workflow_items', 'action' => 'index')),
			)
		),
	))); ?>