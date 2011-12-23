<?php
class WorkflowEventsController extends AppController {

	public $name = 'WorkflowEvents';
	public $uses = 'Workflows.WorkflowEvent';
	public $allowedActions = array('admin_run_queue', 'run_queue');

/** 
 * Creates work flow items events, sets untriggered work flows to triggered, fires untriggered workflow item events, and sets fired workflow item events to triggered.
 *
 * @return {string} 		returns the events (both workflow, and workflow item) that were triggered.
 * @return [bool}			returns a success variable set to true or false.
 */
	function run_queue() {
		if ($triggered = $this->WorkflowEvent->runQueue()) {
			$this->set('triggered', $triggered);
		} else {
			$this->set('triggered', false);
		}
		$this->layout = 'ajax';
	}

	function index() {
		$this->WorkflowEvent->recursive = 0;
		$this->set('workflowEvents', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid workflow event', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('workflowEvent', $this->WorkflowEvent->read(null, $id));
	}

	function add() {
		if (!empty($this->request->data)) {
			$this->WorkflowEvent->create();
			if ($this->WorkflowEvent->save($this->request->data)) {
				$this->Session->setFlash(__('The workflow event has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The workflow event could not be saved. Please, try again.', true));
			}
		}
		$workflows = $this->WorkflowEvent->Workflow->find('list');
		$creators = $this->WorkflowEvent->Creator->find('list');
		$modifers = $this->WorkflowEvent->Modifer->find('list');
		$this->set(compact('workflows', 'creators', 'modifers'));
	}

	function edit($id = null) {
		if (!$id && empty($this->request->data)) {
			$this->Session->setFlash(__('Invalid workflow event', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->request->data)) {
			if ($this->WorkflowEvent->save($this->request->data)) {
				$this->Session->setFlash(__('The workflow event has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The workflow event could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->request->data)) {
			$this->request->data = $this->WorkflowEvent->read(null, $id);
		}
		$workflows = $this->WorkflowEvent->Workflow->find('list');
		$creators = $this->WorkflowEvent->Creator->find('list');
		$modifers = $this->WorkflowEvent->Modifer->find('list');
		$this->set(compact('workflows', 'creators', 'modifers'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for workflow event', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->WorkflowEvent->delete($id)) {
			$this->Session->setFlash(__('Workflow event deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Workflow event was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>