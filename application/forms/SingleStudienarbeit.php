<?php

class Application_Form_SingleStudienarbeit extends Zend_Form
{

    public function init()
    {
        // Set the method for the display form to POST
        $this->setMethod('post');

        $modulMapper = new Application_Model_StudienarbeitMapper();
        $moduls = $modulMapper->fetchAll();

        $this->addElement('select', 'singleStudienarbeit', array(
            'label'      => 'Studienarbeit wählen:',
            'required'   => true,
            'filters'    => array('StringTrim'),
            'validators' => array(
                'notEmpty',
            )
        ));
        $selectElement = $this->getElement('singleStudienarbeit');
        foreach ($moduls as $modul) {
            $selectElement->addMultiOption($modul->getIdStudienarbeit(),$modul->getTitel());
        }

        // Add the submit button
        $this->addElement('submit', 'submit', array(
            'ignore'   => true,
            'label'    => 'Studienarbeit wählen',
        ));
    }
}
