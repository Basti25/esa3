<?php
/**
 * Created by PhpStorm.
 * User: sebastianreinsch
 * Date: 09.06.14
 * Time: 18:16
 */

class StudienarbeitController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $studienarbeiten = new Application_Model_StudienarbeitMapper();
        $this->view->entries = $studienarbeiten->fetchAll();
    }

    public function addAction()
    {
        $request = $this->getRequest();
        $form    = new Application_Form_Studienarbeit();

        if ($this->getRequest()->isPost()) {
            if ($form->isValid($request->getPost())) {
                $text = new Application_Model_Studienarbeit($form->getValues());
                $mapper  = new Application_Model_StudienarbeitMapper();
                $mapper->save($text);
                return $this->_helper->redirector('index');
            }
        }

        $this->view->form = $form;
    }
    public function singleAction() {
        $request = $this->getRequest();
        $form    = new Application_Form_SingleStudienarbeit();

        if ($this->getRequest()->isPost()) {
            if ($form->isValid($request->getPost())) {
                $studienarbeitId = $form->getValue('singleStudienarbeit');
                $studienarbeit = new Application_Model_Studienarbeit();
                $mapper  = new Application_Model_StudienarbeitMapper();

                $mapper->find((int)$studienarbeitId, $studienarbeit);
                $this->view->assign('article', $studienarbeit);
            }
        }

        $this->view->form = $form;
    }
}