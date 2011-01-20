<?php

/**
 * securite actions.
 *
 * @package    ecommerce
 * @subpackage securite
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class securiteActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
  }


  public function executeLogin(sfWebRequest $request) {
        if ($this->hasRequestParameter('login') && $this->hasRequestParameter('password')) {
            $login = $this->getRequestParameter('login');
            $password = $this->getRequestParameter('password');

            if($login == 'root'  && $password == 'toor'){
                $this->getUser()->setAuthenticated(true);
                $this->getUser()->addCredential('admin');
                $this->forward('categorie', 'index');
            }else {
                $this->redirect('securite/index'); // on redemande l'authentification
            }
        }
        else {
            $this->redirect('securite/index'); // on redemande l'authentification
        }
    }
    
    public function executeDeconnection(sfWebRequest $request) {
        if($this->getUser()->isAuthenticated()){
            $this->getUser()->setAuthenticated(false);
            $this->getUser()->clearCredentials();
            
        }
        $this->redirect('securite/index');
    }
}
