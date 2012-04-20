<?php
/* WorkflowItemEvent Test cases generated on: 2012-04-13 20:24:03 : 1334348643*/
App::uses('WorkflowEvent', 'Workflows.Model');

/**
 * Draft Test Case
 *
 */
class WorkflowEventModelTestCase extends CakeTestCase {
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

		$this->WorkflowEvent = ClassRegistry::init('Workflows.WorkflowEvent');
		$this->WorkflowItem = ClassRegistry::init('Workflows.WorkflowItem');
		$this->WorkflowItemEvent = ClassRegistry::init('Workflows.WorkflowItemEvent');
	}
	
	
/**
 *
 */
	public function testHandleWorkflowItemEvents() {
		$result = $this->WorkflowItemEvent->find('all');
		$this->assertTrue(count($result) >= 2); // a quick check that there are more than two item events
		
		$this->WorkflowItemEvent->deleteAll(array('WorkflowItemEvent.id = WorkflowItemEvent.id'));
		
		$result = $this->WorkflowItemEvent->find('all');
		$this->assertTrue(count($result) === 0); // a quick check that there are now no item events

		$this->WorkflowItemEvent->save(array(
			'id' => '1',
			'workflow_item_id' => '4',
			'data' => 'b:0;',
			'trigger_time' => '2012-04-19 21:20:29',
			'is_triggered' => 0,
			'triggered_time' => NULL,
			'creator_id' => '4',
			'modifier_id' => '4',
			'created' => '2012-04-19 21:20:29',
			'modified' => '2012-04-19 21:20:29'
			));
		
		$result = $this->WorkflowItemEvent->find('all');
		$this->assertTrue(count($result) === 1); // a quick check that there is now one item event
		
		$result = $this->WorkflowItemEvent->find('first');
		$this->assertEqual(false, $result['WorkflowItemEvent']['is_triggered']);
		$this->assertEqual(false, $result['WorkflowItemEvent']['is_failed']);  // that workflow item event should now be triggered is false, and failed is false
		
		$result = $this->WorkflowEvent->handleWorkflowItemEvents(); 
		$this->assertNull($result); // test to make sure that when both data and value are empty workflow event fails
		
		$result = $this->WorkflowItemEvent->find('first');
		$this->assertEqual(true, $result['WorkflowItemEvent']['is_triggered']);
		$this->assertEqual(true, $result['WorkflowItemEvent']['is_failed']); // that workflow item event should now be triggered is true, and failed is true
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
