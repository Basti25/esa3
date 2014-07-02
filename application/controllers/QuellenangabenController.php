<?php
/**
 * Created by PhpStorm.
 * User: sebastianreinsch
 * Date: 09.06.14
 * Time: 18:16
 */

class QuellenangabenController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $literatur = new Application_Model_LiteraturMapper();
        $internetquellen = new Application_Model_InternetquelleMapper();
        $this->view->assign('literatur', $literatur->fetchAll());
        $this->view->assign('internetquelle', $internetquellen->fetchAll());
    }

    public function addAction()
    {
        $request = $this->getRequest();
        $literaturForm       = new Application_Form_Literaturangaben();
        $internetquellenForm = new Application_Form_Internetquelle();


        if ($this->getRequest()->isPost()) {
            $post = $request->getPost();

            if(isset($post['submitInternet'])) {
                if ($internetquellenForm->isValid($request->getPost())) {

                    $text = new Application_Model_Internetquelle($internetquellenForm->getValues());
                    $mapper  = new Application_Model_InternetquelleMapper();
                    $mapper->save($text);
                    $lastEntry = $mapper->fetchLast();

                    $studienarbeitInternetquelleMapper = new Application_Model_StudienarbeitInternetquelleMapper();
                    $studienarbeitInternetquelle = new Application_Model_StudienarbeitInternetquelle(
                        array(
                        'idStudienarbeit' => $internetquellenForm->getValue('idStudienarbeit'),
                        'idInternetquelle' => $lastEntry->getIdInternetquelle(),
                        )
                    );
                    $studienarbeitInternetquelleMapper->save($studienarbeitInternetquelle);

//                    return $this->_helper->redirector('index');
                }
            }
            if(isset($post['submitLiteratur'])) {
                if ($literaturForm->isValid($request->getPost())) {
                    $text = new Application_Model_Literatur($literaturForm->getValues());
                    $mapper  = new Application_Model_LiteraturMapper();
                    $mapper->save($text);
                    $lastEntry = $mapper->fetchLast();

                    $studienarbeitLiteraturMapper = new Application_Model_StudienarbeitLiteraturMapper();
                    $studienarbeitLiteratur = new Application_Model_StudienarbeitLiteratur(
                        array(
                            'idStudienarbeit' => $literaturForm->getValue('idStudienarbeit'),
                            'idLiteratur' => $lastEntry->getIdLiteratur(),
                        )
                    );
                    $studienarbeitLiteraturMapper->save($studienarbeitLiteratur);

                }
            }

        }

        $this->view->assign('literatur', $literaturForm);
        $this->view->assign('internetquelle', $internetquellenForm);
    }
}