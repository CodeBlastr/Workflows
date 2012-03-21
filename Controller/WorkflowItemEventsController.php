<?php
class WorkflowItemEventsController extends WorkflowsAppController {

	public $name = 'WorkflowItemEvents';
	public $uses = 'Workflows.WorkflowItemEvent';

	public function index() {
		$this->WorkflowItemEvent->recursive = 0;
		$this->set('workflowItemEvents', $this->paginate());
	}

	public function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid workflow item event', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('workflowItemEvent', $this->WorkflowItemEvent->read(null, $id));
	}

	public function add() {
		if (!empty($this->request->data)) {
			$this->WorkflowItemEvent->create();
			if ($this->WorkflowItemEvent->save($this->request->data)) {
				$this->Session->setFlash(__('The workflow item event has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The workflow item event could not be saved. Please, try again.', true));
			}
		}
		$workflowItems = $this->WorkflowItemEvent->WorkflowItem->find('list');
		$creators = $this->WorkflowItemEvent->Creator->find('list');
		$modifiers = $this->WorkflowItemEvent->Modifier->find('list');
		$this->set(compact('workflowItems', 'creators', 'modifiers'));
	}

	public function edit($id = null) {
		if (!$id && empty($this->request->data)) {
			$this->Session->setFlash(__('Invalid workflow item event', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->request->data)) {
			if ($this->WorkflowItemEvent->save($this->request->data)) {
				$this->Session->setFlash(__('The workflow item event has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The workflow item event could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->request->data)) {
			$this->request->data = $this->WorkflowItemEvent->read(null, $id);
		}
		$workflowItems = $this->WorkflowItemEvent->WorkflowItem->find('list');
		$creators = $this->WorkflowItemEvent->Creator->find('list');
		$modifiers = $this->WorkflowItemEvent->Modifier->find('list');
		$this->set(compact('workflowItems', 'creators', 'modifiers'));
	}

	public function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for workflow item event', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->WorkflowItemEvent->delete($id)) {
			$this->Session->setFlash(__('Workflow item event deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Workflow item event was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>