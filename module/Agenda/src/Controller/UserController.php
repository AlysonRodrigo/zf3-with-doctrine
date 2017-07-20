<?php
/**
 * Created by PhpStorm.
 * User: alyson
 * Date: 19/07/17
 * Time: 22:18
 */

namespace Agenda\Controller;

use Zend\Authentication\Storage\Session as SessionStorage;
use Zend\Authentication\AuthenticationService;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class UserController extends AbstractActionController
{

    public function indexAction()
    {
        return new ViewModel();
    }

    public function loginAction()
    {
        return new ViewModel();
    }

    public function registerAction()
    {
        return new ViewModel();
    }

    public function logoutAction(){
        $auth = new AuthenticationService();
        $auth->setStorage(new SessionStorage("Agenda"));
        $auth->clearIdentity();

        return $this->redirect()->toRoute('user-login');
    }



}