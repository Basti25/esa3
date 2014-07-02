<?php

class Application_Form_Studienarbeit
    extends Zend_Form
{

    public function init()
    {
        // Set the method for the display form to POST
        $this->setMethod('post');

        $modulMapper = new Application_Model_ModulMapper();
        $moduls = $modulMapper->fetchAll();



        $this->addElement('text', 'titel', array(
            'label'      => 'Titel:',
            'required'   => true,
            'filters'    => array('StringTrim'),
            'validators' => array(
                'notEmpty',
            )
        ));

        $this->addElement('text', 'gruppenmitglieder', array(
            'label'      => 'Gruppenmitglieder:',
            'required'   => true,
            'filters'    => array('StringTrim'),
            'validators' => array(
                'notEmpty',
            )
        ));

        $this->addElement('select', 'idModul', array(
            'label'      => 'Modul:',
            'required'   => true,
            'filters'    => array('StringTrim'),
            'validators' => array(
                'notEmpty',
            )
        ));

        $modulElement = $this->getElement('idModul');
        foreach ($moduls as $modul) {
            $modulElement->addMultiOption($modul->getIdModul(),$modul->getBezeichnung());
        }


        // Add the submit button
        $this->addElement('submit', 'submit', array(
            'ignore'   => true,
            'label'    => 'Modul hinzufügen',
        ));
    }
}
