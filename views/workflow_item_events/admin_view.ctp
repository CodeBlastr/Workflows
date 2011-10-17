<div class="workflowItemEvents view">
<h2><?php  __('Workflow Item Event');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $workflowItemEvent['WorkflowItemEvent']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Workflow Item'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($workflowItemEvent['WorkflowItem']['name'], array('controller' => 'workflow_items', 'action' => 'view', $workflowItemEvent['WorkflowItem']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Data'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $workflowItemEvent['WorkflowItemEvent']['data']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Trigger Time'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $workflowItemEvent['WorkflowItemEvent']['trigger_time']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Is Triggered'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $workflowItemEvent['WorkflowItemEvent']['is_triggered']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Triggered Time'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $workflowItemEvent['WorkflowItemEvent']['triggered_time']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Creator'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($workflowItemEvent['Creator']['username'], array('controller' => 'users', 'action' => 'view', $workflowItemEvent['Creator']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modifier'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($workflowItemEvent['Modifier']['username'], array('controller' => 'users', 'action' => 'view', $workflowItemEvent['Modifier']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $workflowItemEvent['WorkflowItemEvent']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $workflowItemEvent['WorkflowItemEvent']['modified']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Workflow Item Event', true), array('action' => 'edit', $workflowItemEvent['WorkflowItemEvent']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Workflow Item Event', true), array('action' => 'delete', $workflowItemEvent['WorkflowItemEvent']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $workflowItemEvent['WorkflowItemEvent']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Workflow Item Events', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Workflow Item Event', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Workflow Items', true), array('controller' => 'workflow_items', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Workflow Item', true), array('controller' => 'workflow_items', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Creator', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
