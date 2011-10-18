<?php
class WorkflowItemEventsController extends AppController {

	var $name = 'WorkflowItemEvents';

	function admin_index() {
		$this->WorkflowItemEvent->recursive = 0;
		$this->set('workflowItemEvents', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid workflow item event', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('workflowItemEvent', $this->WorkflowItemEvent->read(null, $id));
	}

	function admin_add() {
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

	function admin_edit($id = null) {
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

	function admin_delete($id = null) {
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