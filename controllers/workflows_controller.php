<?php
class WorkflowsController extends AppController {

	var $name = 'Workflows';

	function index() {
		$this->Workflow->recursive = 0;
		$this->set('workflows', $this->paginate());
	}

	function view($id = null) {
		echo 'Add a tab or an index of related workflow_items to this page.';
		if (!$id) {
			$this->Session->setFlash(__('Invalid workflow', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('workflow', $this->Workflow->read(null, $id));
	}

	function add() {
		if (!empty($this->request->data)) {
			try {
				$this->Workflow->add($this->request->data);
				$this->Session->setFlash(__('Workflow saved', true));
				$this->redirect(array('controller' => 'workflow_items', 'action' => 'add', $this->Workflow->id));
			} catch (Exception $e) {
				$message = $e->getMessage();
				$this->Session->setFlash($message);
			}
		}
		
		$this->set('plugins', $this->Workflow->plugins());
		$this->set('page_title_for_layout', __('Workflows', true));
		$this->set('title_for_layout', __('Workflow Add Form', true)); 
	}

	function edit($id = null) {
		if (!$id && empty($this->request->data)) {
			$this->Session->setFlash(__('Invalid workflow', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->request->data)) {
			if ($this->Workflow->save($this->request->data)) {
				$this->Session->setFlash(__('The workflow has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The workflow could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->request->data)) {
			$this->request->data = $this->Workflow->read(null, $id);
		}
		$conditions = $this->Workflow->Condition->find('list');
		$creators = $this->Workflow->Creator->find('list');
		$modifiers = $this->Workflow->Modifier->find('list');
		$this->set(compact('conditions', 'creators', 'modifiers'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for workflow', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Workflow->delete($id)) {
			$this->Session->setFlash(__('Workflow deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Workflow was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	
	function list_models($plugin = null) {
		$pluginPath = App::pluginPath($plugin);
		$models = App::objects('model', $pluginPath.'models');
		$i = 0;
		foreach ($models as $model) :
			$out[$i]['value'] = $model;
			$out[$i]['name'] = Inflector::humanize(Inflector::underscore($model));
			$i++;
		endforeach;
		
		if (!empty($out)) {
			echo json_encode($out);
		} else {
			echo 'broken';
		}
		$this->layout = false;
		$this->render(false);
	}
}
?>