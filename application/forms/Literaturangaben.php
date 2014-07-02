<?php

class Application_Form_Literaturangaben
    extends Zend_Form
{

    public function init()
    {
        // Set the method for the display form to POST
        $this->setMethod('post');

        $studienarbeitMapper = new Application_Model_StudienarbeitMapper();
        $studienarbeiten = $studienarbeitMapper->fetchAll();

        $this->addElement('text', 'verfasser', array(
            'label'      => 'Verfasser:',
            'required'   => true,
            'filters'    => array('StringTrim'),
            'validators' => array(
                'notEmpty',
            )
        ));

        $this->addElement('text', 'beitragstitel', array(
            'label'      => 'Beitragstitel:',
            'required'   => true,
            'filters'    => array('StringTrim'),
            'validators' => array(
                'notEmpty',
            )
        ));
        $this->addElement('text', 'buchtitel', array(
            'label'      => 'Buchtitel:',
            'required'   => true,
            'filters'    => array('StringTrim'),
            'validators' => array(
                'notEmpty',
            )
        ));
        $this->addElement('text', 'herausgeber', array(
            'label'      => 'Herausgeber:',
            'required'   => true,
            'filters'    => array('StringTrim'),
            'validators' => array(
                'notEmpty',
            )
        ));
        $this->addElement('text', 'verlag', array(
            'label'      => 'Verlag:',
            'required'   => true,
            'filters'    => array('StringTrim'),
            'validators' => array(
                'notEmpty',
            )
        ));
        $this->addElement('text', 'erscheinungsort', array(
            'label'      => 'Erscheinungsort:',
            'required'   => true,
            'filters'    => array('StringTrim'),
            'validators' => array(
                'notEmpty',
            )
        ));
        $this->addElement('text', 'erscheinungsjahr', array(
            'label'      => 'Erscheinungsjahr:',
            'required'   => true,
            'filters'    => array('StringTrim'),
            'validators' => array(
                'notEmpty',
            )
        ));

        $this->addElement('select', 'idStudienarbeit', array(
            'label'      => 'Studienarbeit:',
            'required'   => true,
            'filters'    => array('StringTrim'),
            'validators' => array(
                'notEmpty',
            )
        ));

        $modulElement = $this->getElement('idStudienarbeit');
        foreach ($studienarbeiten as $studienarbeit) {
            $modulElement->addMultiOption($studienarbeit->getIdStudienarbeit(),$studienarbeit->getTitel());
        }


        // Add the submit button
        $this->addElement('submit', 'submitLiteratur', array(
            'ignore'   => true,
            'label'    => 'Modul hinzufügen',
        ));
    }
}
