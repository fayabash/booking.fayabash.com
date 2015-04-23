<?php

App::uses('AppController', 'Controller');

/**
 * Artists Controller
 *
 * @property Artist $Artist
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class ArtistsController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator', 'Session');
    
    public function index() {
        $this->set('artists', $this->Artist->find('all',array(
            'recursive' => 0,
            'order' => array(
                'Artist.name' => 'ASC'
            )
        )));
    }

    public function view($id = null, $name = null) {
        if (!$this->Artist->exists($id)) {
            throw new NotFoundException(__('Invalid artist'));
        }
        $options = array('conditions' => array('Artist.' . $this->Artist->primaryKey => $id));
        $this->set('artist', $this->Artist->find('first', $options));
    }
    
    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index() {
        $this->Artist->recursive = 0;
        $this->set('artists', $this->Paginator->paginate());
    }

    /**
     * admin_view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_view($id = null) {
        if (!$this->Artist->exists($id)) {
            throw new NotFoundException(__('Invalid artist'));
        }
        $options = array('conditions' => array('Artist.' . $this->Artist->primaryKey => $id));
        $this->set('artist', $this->Artist->find('first', $options));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add() {
        if ($this->request->is('post')) {
            $this->Artist->create();
            if ($this->Artist->saveAssociated($this->request->data)) {
                $this->Session->setFlash(__('The artist has been saved'), 'default', array('class' => 'alert alert-success'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The artist could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-error'));
            }
        }
        $attachments = $this->Artist->Attachment->find('list');
        $this->set(compact('attachments'));
    }

    /**
     * admin_edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_edit($id = null) {
        if (!$this->Artist->exists($id)) {
            throw new NotFoundException(__('Invalid artist'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Artist->saveAssociated($this->request->data)) {
                $this->Session->setFlash(__('The artist has been saved'), 'default', array('class' => 'alert alert-success'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The artist could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-error'));
            }
        } else {
            $options = array('conditions' => array('Artist.' . $this->Artist->primaryKey => $id));
            $this->request->data = $this->Artist->find('first', $options);
        }
        $attachments = $this->Artist->Attachment->find('list');
        $this->set(compact('attachments'));
    }

    /**
     * admin_delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_delete($id = null) {
        $this->Artist->id = $id;
        if (!$this->Artist->exists()) {
            throw new NotFoundException(__('Invalid artist'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Artist->delete()) {
            $this->Session->setFlash(__('Artist deleted'), 'default', array('class' => 'alert alert-success'));
            return $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Artist was not deleted'), 'default', array('class' => 'alert alert-error'));
        return $this->redirect(array('action' => 'index'));
    }

}
