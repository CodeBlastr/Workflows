<?php
/**
 * WorkflowItemFixture
 *
 */
class WorkflowItemFixture extends CakeTestFixture {
	
/**
 * Import
 *
 * @var array
 */
	public $import = array('config' => 'Workflows.WorkflowItem');

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => '4',
			'workflow_id' => '4',
			'parent_id' => NULL,
			'name' => 'Catalog Brand Owns Catalog Item',
			'description' => 'When a catalog item is added we want to update the owner_id to the catalog_brand_id / owner_id',
			'plugin' => 'Catalogs',
			'model' => 'CatalogItem',
			'controller' => '',
			'action' => 'save',
			'values' => '[data]

[map]
CatalogItem[id] = CatalogItem.id
CatalogItem[owner_id] = CatalogItem.catalog_item_brand_id',
			'delay_time' => '0',
			'execution_date' => NULL,
			'order' => '1',
			'creator_id' => '1',
			'modifier_id' => '1',
			'created' => '2011-03-09 03:21:01',
			'modified' => '2011-03-09 03:21:01'
		),
		array(
			'id' => '5',
			'workflow_id' => '4',
			'parent_id' => NULL,
			'name' => 'Catalog Brand Owns Catalog Item',
			'description' => 'When a catalog item is added we want to update the owner_id to the catalog_brand_id / owner_id',
			'plugin' => 'Catalogs',
			'model' => 'CatalogItem',
			'controller' => '',
			'action' => 'save',
			'values' => '[data]

[map]
CatalogItem[id] = CatalogItem.id
CatalogItem[owner_id] = CatalogItem.catalog_item_brand_id',
			'delay_time' => '0',
			'execution_date' => NULL,
			'order' => '1',
			'creator_id' => '1',
			'modifier_id' => '1',
			'created' => '2011-03-09 03:21:01',
			'modified' => '2011-03-09 03:21:01'
		),
	);
}
