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
    if($this->getUser()->hasAttribute('client')){
        $client = $this->getUser()->getAttribute('client');
        $this->redirect('client/show?id='.$client->getId());
    }else{
        $this->redirect('securite/index');
    }
  }

  
  public function executeLogin(sfWebRequest $request) {
        if ($this->hasRequestParameter('login') && $this->hasRequestParameter('password')) {
            $login = $this->getRequestParameter('login');
            $password = $this->getRequestParameter('password');

            //recupe client
            $c = new Criteria();
            $c->add(ClientPeer::MAIL,$login);
            $clientArray = ClientPeer::doSelect($c);
            $client = null;
            if(count($clientArray)>0){
                $client = $clientArray[0];
            }


            if($client != null  && $password == 'mdp'){
                $this->getUser()->setAttribute('client', $client);
                $this->getUser()->setAuthenticated(true);
                $this->redirect('client/show?id='.$client->getId());
            }
            
        }
        else {
            $this->forward('securite', 'index'); // on redemande l'authentification
        }
    }

}
