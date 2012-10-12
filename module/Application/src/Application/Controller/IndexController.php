<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Application\Entity\Concert;
use Application\Form\CreerConcert;
use Application\Form\UpdateConcert;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        return new ViewModel();
    }

    public function createConcertAction()
    {
        $form = new CreerConcert();

        if ($this->request->isPost()) {
            $concert = new Concert();
            $form->bind($concert);
            $form->setData($this->request->getPost());

            if ($form->isValid()) {
                var_dump($concert);
            }
        }

        return new ViewModel(array(
            'form' => $form
        ));
    }

    public function updateConcertAction()
    {
        $form = new UpdateConcert();
        $concert = [...]; // récupère de la base de données par exemple
        $form->bind($concert);

        if ($this->request->isPost()) {
            $form->setData($this->request->getPost());

            if ($form->isValid()) {
                var_dump($concert);
            }
        }

        return new ViewModel(array(
            'form' => $form
        ));
    }
}
