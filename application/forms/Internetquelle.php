<?php

class Application_Form_Internetquelle
    extends Zend_Form
{

    public function init()
    {
        // Set the method for the display form to POST
        $this->setMethod('post');

        $studienarbeitMapper = new Application_Model_StudienarbeitMapper();
        $studienarbeiten = $studienarbeitMapper->fetchAll();

        $this->addElement('text', 'titel', array(
            'label'      => 'Titel der Internetquelle:',
            'required'   => true,
            'filters'    => array('StringTrim'),
            'validators' => array(
                'notEmpty',
            )
        ));
        $this->addElement('text', 'url', array(
            'label'      => 'URL der Internetquelle:',
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
        $this->addElement('submit', 'submitInternet', array(
            'ignore'   => true,
            'label'    => 'Modul hinzufügen',
        ));
    }
}
