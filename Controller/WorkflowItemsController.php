<?php
class WorkflowItemsController extends AppController {

	public $name = 'WorkflowItems';
	public $uses = 'Workflows.WorkflowItem';

	function index() {
		$this->WorkflowItem->recursive = 0;
		$this->set('workflowItems', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid workflow item', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('workflowItem', $this->WorkflowItem->read(null, $id));
	}

	function add($workflowId = null) {
		if (!empty($this->request->data)) {
			if ($this->WorkflowItem->save($this->request->data)) {
				$this->Session->setFlash(__('The workflow item has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The workflow item could not be saved. Please, try again.', true));
			}
		}
		
		if (empty($workflowId)) {
			$this->Session->setFlash(__('Invalid workflow. Please choose again.', true));
			$this->redirect(array('controller' => 'workflows', 'action' => 'index'));
		} else {
			$this->request->data = $this->WorkflowItem->Workflow->find('first', array(
				'conditions' => array(
					'Workflow.id' => $workflowId,
					),
				'contain' => array(
					'Condition',
					),
				));
			$this->request->data['WorkflowItem']['workflow_id'] = $this->request->data['Workflow']['id'];
			
			$this->request->data['WorkflowItem']['plugins'] = $this->WorkflowItem->Workflow->plugins();
			#$parentWorkflowItems = $this->WorkflowItem->ParentWorkflowItem->find('list');
			$this->set(compact('workflow'));
			$this->set('page_title_for_layout', __('Workflow Tasks', true));
			$this->set('title_for_layout', __('Workflow Task Form', true)); 
			$created = !empty($this->request->data['Condition']['is_create']) ? 'created, ' : null;
			$viewed = !empty($this->request->data['Condition']['is_read']) ? 'viewed, ' : null;
			$updated = !empty($this->request->data['Condition']['is_update']) ? 'updated, ' : null;
			$deleted = !empty($this->request->data['Condition']['is_delete']) ? 'deleted, ' : null;
			$this->set(compact('created', 'viewed', 'updated', 'deleted'));
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->request->data)) {
			$this->Session->setFlash(__('Invalid workflow item', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->request->data)) {
			if ($this->WorkflowItem->save($this->request->data)) {
				$this->Session->setFlash(__('The workflow item has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The workflow item could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->request->data)) {
			$this->request->data = $this->WorkflowItem->read(null, $id);
		}
		$workflows = $this->WorkflowItem->Workflow->find('list');
		$parentWorkflowItems = $this->WorkflowItem->ParentWorkflowItem->find('list');
		$creators = $this->WorkflowItem->Creator->find('list');
		$modifiers = $this->WorkflowItem->Modifier->find('list');
		$this->set(compact('workflows', 'parentWorkflowItems', 'creators', 'modifiers'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for workflow item', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->WorkflowItem->delete($id)) {
			$this->Session->setFlash(__('Workflow item deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Workflow item was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>