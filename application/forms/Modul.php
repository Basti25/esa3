<?php

class Application_Form_Modul extends Zend_Form
{

    public function init()
    {
        // Set the method for the display form to POST
        $this->setMethod('post');

        // Add an email element
        $this->addElement('text', 'bezeichnung', array(
            'label'      => 'Bezeichnung:',
            'required'   => true,
            'filters'    => array('StringTrim'),
            'validators' => array(
                'notEmpty',
            )
        ));
        // Add an email element
        $this->addElement('text', 'kurzbeschreibung', array(
            'label'      => 'Kurzbeschreibung:',
            'required'   => true,
            'filters'    => array('StringTrim'),
            'validators' => array(
                'notEmpty',
            )
        ));
        // Add an email element
        $this->addElement('text', 'semester', array(
            'label'      => 'Semester:',
            'required'   => true,
            'filters'    => array('StringTrim'),
            'validators' => array(
                'notEmpty',
            )
        ));
        // Add an email element
        $this->addElement('text', 'dozent', array(
            'label'      => 'Dozent:',
            'required'   => true,
            'filters'    => array('StringTrim'),
            'validators' => array(
                'notEmpty',
            )
        ));

        // Add the submit button
        $this->addElement('submit', 'submit', array(
            'ignore'   => true,
            'label'    => 'Modul hinzufügen',
        ));
    }
}
