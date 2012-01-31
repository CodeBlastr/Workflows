<div class="workflows view">
<h2><?php  __('Workflow');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $workflow['Workflow']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $workflow['Workflow']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Description'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $workflow['Workflow']['description']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Condition'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($workflow['Condition']['name'], array('controller' => 'conditions', 'action' => 'view', $workflow['Condition']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Creator'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($workflow['Creator']['username'], array('controller' => 'users', 'action' => 'view', $workflow['Creator']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Modifier'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($workflow['Modifier']['username'], array('controller' => 'users', 'action' => 'view', $workflow['Modifier']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $workflow['Workflow']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $workflow['Workflow']['modified']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Workflow', true), array('action' => 'edit', $workflow['Workflow']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Workflow', true), array('action' => 'delete', $workflow['Workflow']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $workflow['Workflow']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Workflows', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Workflow', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Conditions', true), array('controller' => 'conditions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Condition', true), array('controller' => 'conditions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Creator', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Workflow Events', true), array('controller' => 'workflow_events', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Workflow Event', true), array('controller' => 'workflow_events', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Workflow Items', true), array('controller' => 'workflow_items', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Workflow Item', true), array('controller' => 'workflow_items', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Workflow Events');?></h3>
	<?php if (!empty($workflow['WorkflowEvent'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Workflow Id'); ?></th>
		<th><?php echo __('Data'); ?></th>
		<th><?php echo __('Is Triggered'); ?></th>
		<th><?php echo __('Triggered Time'); ?></th>
		<th><?php echo __('Creator Id'); ?></th>
		<th><?php echo __('Modifer Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($workflow['WorkflowEvent'] as $workflowEvent):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $workflowEvent['id'];?></td>
			<td><?php echo $workflowEvent['workflow_id'];?></td>
			<td><?php echo $workflowEvent['data'];?></td>
			<td><?php echo $workflowEvent['is_triggered'];?></td>
			<td><?php echo $workflowEvent['triggered_time'];?></td>
			<td><?php echo $workflowEvent['creator_id'];?></td>
			<td><?php echo $workflowEvent['modifer_id'];?></td>
			<td><?php echo $workflowEvent['created'];?></td>
			<td><?php echo $workflowEvent['modified'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'workflow_events', 'action' => 'view', $workflowEvent['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'workflow_events', 'action' => 'edit', $workflowEvent['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'workflow_events', 'action' => 'delete', $workflowEvent['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $workflowEvent['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Workflow Event', true), array('controller' => 'workflow_events', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Workflow Items');?></h3>
	<?php if (!empty($workflow['WorkflowItem'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Workflow Id'); ?></th>
		<th><?php echo __('Parent Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('Plugin'); ?></th>
		<th><?php echo __('Model'); ?></th>
		<th><?php echo __('Controller'); ?></th>
		<th><?php echo __('Action'); ?></th>
		<th><?php echo __('Values'); ?></th>
		<th><?php echo __('Delay Time'); ?></th>
		<th><?php echo __('Execution Date'); ?></th>
		<th><?php echo __('Order'); ?></th>
		<th><?php echo __('Creator Id'); ?></th>
		<th><?php echo __('Modifier Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($workflow['WorkflowItem'] as $workflowItem):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $workflowItem['id'];?></td>
			<td><?php echo $workflowItem['workflow_id'];?></td>
			<td><?php echo $workflowItem['parent_id'];?></td>
			<td><?php echo $workflowItem['name'];?></td>
			<td><?php echo $workflowItem['description'];?></td>
			<td><?php echo $workflowItem['plugin'];?></td>
			<td><?php echo $workflowItem['model'];?></td>
			<td><?php echo $workflowItem['controller'];?></td>
			<td><?php echo $workflowItem['action'];?></td>
			<td><?php echo $workflowItem['values'];?></td>
			<td><?php echo $workflowItem['delay_time'];?></td>
			<td><?php echo $workflowItem['execution_date'];?></td>
			<td><?php echo $workflowItem['order'];?></td>
			<td><?php echo $workflowItem['creator_id'];?></td>
			<td><?php echo $workflowItem['modifier_id'];?></td>
			<td><?php echo $workflowItem['created'];?></td>
			<td><?php echo $workflowItem['modified'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'workflow_items', 'action' => 'view', $workflowItem['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'workflow_items', 'action' => 'edit', $workflowItem['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'workflow_items', 'action' => 'delete', $workflowItem['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $workflowItem['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Workflow Item', true), array('controller' => 'workflow_items', 'action' => 'add', $workflowItem['id']));?> </li>
		</ul>
	</div>
</div>
