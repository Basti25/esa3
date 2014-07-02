<?php

class Application_Form_Blog extends Zend_Form
{

    public function init()
    {
        // Set the method for the display form to POST
        $this->setMethod('post');

        // Add an email element
        $this->addElement('text', 'title', array(
            'label'      => 'Titel des Eintrages:',
            'required'   => true,
            'filters'    => array('StringTrim'),
        ));

        // Add the comment element
        $this->addElement('textarea', 'text', array(
            'label'      => 'Text:',
            'required'   => true,
            'validators' => array(
                array('validator' => 'StringLength', 'options' => array(0, 20))
                )
        ));

        // Add a captcha
        $this->addElement('captcha', 'captcha', array(
            'label'      => 'Bitte die 5 unten dargstellten Zeichen eingeben:',
            'required'   => true,
            'captcha'    => array(
                'captcha' => 'Figlet',
                'wordLen' => 5,
                'timeout' => 300
            )
        ));

        // Add the submit button
        $this->addElement('submit', 'submit', array(
            'ignore'   => true,
            'label'    => 'Blogeintrag abschicken',
        ));

        // And finally add some CSRF protection
        $this->addElement('hash', 'csrf', array(
            'ignore' => true,
        ));
    }
}
