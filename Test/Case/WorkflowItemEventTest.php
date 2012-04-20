<?php
/* WorkflowItemEvent Test cases generated on: 2012-04-13 20:24:03 : 1334348643*/
App::uses('WorkflowItemEvent', 'Workflows.Model');

/**
 * Draft Test Case
 *
 */
class WorkflowItemEventModelTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.Workflows.workflow_item_event',
		);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->WorkflowItemEvent = ClassRegistry::init('Workflows.WorkflowItemEvent');
	}
	
	
/**
 *
 */
	public function testWorkflowItemEvent() {
		$result = $this->WorkflowItemEvent->find('first');
		$this->assertEqual('1', $result['WorkflowItemEvent']['id']); // test that the workflow fixture exists
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->WorkflowItemEvent);

		parent::tearDown();
	}

}
