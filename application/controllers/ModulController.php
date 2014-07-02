<?php
/**
 * Created by PhpStorm.
 * User: sebastianreinsch
 * Date: 09.06.14
 * Time: 18:16
 */

class ModulController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $modul = new Application_Model_ModulMapper();
        $this->view->entries = $modul->fetchAll();
    }

    public function addAction()
    {
        $request = $this->getRequest();
        $form    = new Application_Form_Modul();

        if ($this->getRequest()->isPost()) {
            if ($form->isValid($request->getPost())) {
                $text = new Application_Model_Modul($form->getValues());
                $mapper  = new Application_Model_ModulMapper();
                $mapper->save($text);
                return $this->_helper->redirector('index');
            }
        }

        $this->view->form = $form;
    }
    public function singleAction() {
        $request = $this->getRequest();
        $form    = new Application_Form_SingleModul();

        if ($this->getRequest()->isPost()) {
            if ($form->isValid($request->getPost())) {
                $modulId = $form->getValue('singleModul');
                $modul = new Application_Model_Modul();
                $mapper  = new Application_Model_ModulMapper();

                $mapper->find((int)$modulId, $modul);
                $this->view->assign('article', $modul);
            }
        }

        $this->view->form = $form;
    }
}