<?php
class WorkflowEventsController extends AppController {

	var $name = 'WorkflowEvents';
	var $allowedActions = array('admin_run_queue');

/** 
 * Creates work flow items events, sets untriggered work flows to triggered, fires untriggered workflow item events, and sets fired workflow item events to triggered.
 *
 * @return {string} 		returns the events (both workflow, and workflow item) that were triggered.
 * @return [bool}			returns a success variable set to true or false.
 */
	function admin_run_queue() {
		if ($triggered = $this->WorkflowEvent->runQueue()) {
			$this->set('triggered', $triggered);
		} else {
			$this->set('triggered', false);
		}
		$this->layout = 'ajax';
	}
	
	function admin_index() {
		$this->WorkflowEvent->recursive = 0;
		$this->set('workflowEvents', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid workflow event', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('workflowEvent', $this->WorkflowEvent->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->WorkflowEvent->create();
			if ($this->WorkflowEvent->save($this->data)) {
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

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid workflow event', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->WorkflowEvent->save($this->data)) {
				$this->Session->setFlash(__('The workflow event has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The workflow event could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->WorkflowEvent->read(null, $id);
		}
		$workflows = $this->WorkflowEvent->Workflow->find('list');
		$creators = $this->WorkflowEvent->Creator->find('list');
		$modifers = $this->WorkflowEvent->Modifer->find('list');
		$this->set(compact('workflows', 'creators', 'modifers'));
	}

	function admin_delete($id = null) {
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