<div class="workflowItems view">
<h2><?php  __('Workflow Item');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $workflowItem['WorkflowItem']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Workflow'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($workflowItem['Workflow']['name'], array('controller' => 'workflows', 'action' => 'view', $workflowItem['Workflow']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Parent Workflow Item'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($workflowItem['ParentWorkflowItem']['name'], array('controller' => 'workflow_items', 'action' => 'view', $workflowItem['ParentWorkflowItem']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $workflowItem['WorkflowItem']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Description'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $workflowItem['WorkflowItem']['description']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Plugin'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $workflowItem['WorkflowItem']['plugin']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Model'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $workflowItem['WorkflowItem']['model']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Controller'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $workflowItem['WorkflowItem']['controller']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Action'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $workflowItem['WorkflowItem']['action']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Values'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $workflowItem['WorkflowItem']['values']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Delay Time'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $workflowItem['WorkflowItem']['delay_time']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Execution Date'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $workflowItem['WorkflowItem']['execution_date']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Order'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $workflowItem['WorkflowItem']['order']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Creator'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($workflowItem['Creator']['username'], array('controller' => 'users', 'action' => 'view', $workflowItem['Creator']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Modifier'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($workflowItem['Modifier']['username'], array('controller' => 'users', 'action' => 'view', $workflowItem['Modifier']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $workflowItem['WorkflowItem']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $workflowItem['WorkflowItem']['modified']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Workflow Item', true), array('action' => 'edit', $workflowItem['WorkflowItem']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Workflow Item', true), array('action' => 'delete', $workflowItem['WorkflowItem']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $workflowItem['WorkflowItem']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Workflow Items', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Workflow Item', true), array('action' => 'add')); ?> </li>
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
<div class="related">
	<h3><?php echo __('Related Workflow Item Events');?></h3>
	<?php if (!empty($workflowItem['WorkflowItemEvent'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Workflow Item Id'); ?></th>
		<th><?php echo __('Data'); ?></th>
		<th><?php echo __('Trigger Time'); ?></th>
		<th><?php echo __('Is Triggered'); ?></th>
		<th><?php echo __('Triggered Time'); ?></th>
		<th><?php echo __('Creator Id'); ?></th>
		<th><?php echo __('Modifier Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($workflowItem['WorkflowItemEvent'] as $workflowItemEvent):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $workflowItemEvent['id'];?></td>
			<td><?php echo $workflowItemEvent['workflow_item_id'];?></td>
			<td><?php echo $workflowItemEvent['data'];?></td>
			<td><?php echo $workflowItemEvent['trigger_time'];?></td>
			<td><?php echo $workflowItemEvent['is_triggered'];?></td>
			<td><?php echo $workflowItemEvent['triggered_time'];?></td>
			<td><?php echo $workflowItemEvent['creator_id'];?></td>
			<td><?php echo $workflowItemEvent['modifier_id'];?></td>
			<td><?php echo $workflowItemEvent['created'];?></td>
			<td><?php echo $workflowItemEvent['modified'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'workflow_item_events', 'action' => 'view', $workflowItemEvent['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'workflow_item_events', 'action' => 'edit', $workflowItemEvent['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'workflow_item_events', 'action' => 'delete', $workflowItemEvent['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $workflowItemEvent['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Workflow Item Event', true), array('controller' => 'workflow_item_events', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Workflow Items');?></h3>
	<?php if (!empty($workflowItem['ChildWorkflowItem'])):?>
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
		foreach ($workflowItem['ChildWorkflowItem'] as $childWorkflowItem):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $childWorkflowItem['id'];?></td>
			<td><?php echo $childWorkflowItem['workflow_id'];?></td>
			<td><?php echo $childWorkflowItem['parent_id'];?></td>
			<td><?php echo $childWorkflowItem['name'];?></td>
			<td><?php echo $childWorkflowItem['description'];?></td>
			<td><?php echo $childWorkflowItem['plugin'];?></td>
			<td><?php echo $childWorkflowItem['model'];?></td>
			<td><?php echo $childWorkflowItem['controller'];?></td>
			<td><?php echo $childWorkflowItem['action'];?></td>
			<td><?php echo $childWorkflowItem['values'];?></td>
			<td><?php echo $childWorkflowItem['delay_time'];?></td>
			<td><?php echo $childWorkflowItem['execution_date'];?></td>
			<td><?php echo $childWorkflowItem['order'];?></td>
			<td><?php echo $childWorkflowItem['creator_id'];?></td>
			<td><?php echo $childWorkflowItem['modifier_id'];?></td>
			<td><?php echo $childWorkflowItem['created'];?></td>
			<td><?php echo $childWorkflowItem['modified'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'workflow_items', 'action' => 'view', $childWorkflowItem['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'workflow_items', 'action' => 'edit', $childWorkflowItem['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'workflow_items', 'action' => 'delete', $childWorkflowItem['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $childWorkflowItem['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Child Workflow Item', true), array('controller' => 'workflow_items', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
