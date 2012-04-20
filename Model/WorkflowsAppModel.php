<?php
class WorkflowsAppModel extends AppModel {
	
	public function __construct($id = false, $table = null, $ds = null) {
		parent::__construct($id, $table, $ds);
		
		// automatic upgrade the workflow item events table 4/19/2012
		if (defined('__SYSTEM_ZUHA_DB_VERSION') && __SYSTEM_ZUHA_DB_VERSION < 0.0188) {
			$columns = $this->query('SHOW COLUMNS FROM workflow_item_events');
			foreach ($columns as $column) {
				if ($column['COLUMNS']['Field'] == 'is_failed') {
					//its there 
					$alter = false;
					break;
				} else {
					$alter = true;
				}
			}
			if (!empty($alter)) {
				$this->query('ALTER TABLE `workflow_item_events` ADD `is_failed` BOOLEAN NOT NULL DEFAULT \'0\' AFTER `triggered_time`');
			}
		}
	}
}