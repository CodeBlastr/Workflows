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
	public $import = array('connection' => 'test');

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'workflow_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'parent_id' => array('type' => 'integer', 'null' => true, 'default' => NULL),
		'name' => array('type' => 'string', 'null' => false, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'description' => array('type' => 'text', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'plugin' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 155, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'model' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 155, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'controller' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 155, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'action' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 155, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'values' => array('type' => 'text', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'delay_time' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 5, 'comment' => 'the number of minutes to wait before execution'),
		'execution_date' => array('type' => 'datetime', 'null' => true, 'default' => NULL, 'comment' => 'This is a calculated field, set from the value of the delay_time field. '),
		'order' => array('type' => 'integer', 'null' => true, 'default' => NULL),
		'creator_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'modifier_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM')
	);

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
