<?php

class Application_Form_SingleModul extends Zend_Form
{

    public function init()
    {
        // Set the method for the display form to POST
        $this->setMethod('post');

        $modulMapper = new Application_Model_ModulMapper();
        $moduls = $modulMapper->fetchAll();

        $this->addElement('select', 'singleModul', array(
            'label'      => 'Modul wählen:',
            'required'   => true,
            'filters'    => array('StringTrim'),
            'validators' => array(
                'notEmpty',
            )
        ));
        $selectElement = $this->getElement('singleModul');
        foreach ($moduls as $modul) {
            $selectElement->addMultiOption($modul->getIdModul(),$modul->getBezeichnung());
        }

        // Add the submit button
        $this->addElement('submit', 'submit', array(
            'ignore'   => true,
            'label'    => 'Modul suchen',
        ));
    }
}
