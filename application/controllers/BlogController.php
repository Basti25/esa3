<?php
/**
 * Created by PhpStorm.
 * User: sebastianreinsch
 * Date: 09.06.14
 * Time: 18:16
 */

class BlogController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $blog = new Application_Model_BlogMapper();
        $this->view->entries = $blog->fetchAll();
    }

    public function signAction()
    {
        $request = $this->getRequest();
        $form    = new Application_Form_Blog();

        if ($this->getRequest()->isPost()) {
            if ($form->isValid($request->getPost())) {
                $text = new Application_Model_Blog($form->getValues());
                $mapper  = new Application_Model_BlogMapper();
                $mapper->save($text);
                return $this->_helper->redirector('index');
            }
        }

        $this->view->form = $form;
    }
}