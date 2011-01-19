<?php

/**
 * client actions.
 *
 * @package    ecommerce
 * @subpackage client
 * @author     Your name here
 */
class clientActions extends sfActions
{

      private function getClient(){
      if($this->getUser()->hasAttribute('client')){
          //$this->getUser()->setAttribute('client', $this->getUser()->getAttribute('client'));
          return $this->getUser()->getAttribute('client');
      }
      
      return null;
  }
  
  public function executeIndex(sfWebRequest $request)
  {
    $this->client = $this->getClient();
        

    if($this->client != null){
        $this->redirect('client/show?id='.$this->client->getId());
    }else{
        $this->redirect('client/login');
    }
    //$this->Clients = ClientPeer::doSelect(new Criteria());
  }

  public function executeDisconect(sfWebRequest $request){
      
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->Client = ClientPeer::retrieveByPk($request->getParameter('id'));
    //$this->Client = $this->getClient();
    //print_r($this->Client);
    //$this->client = $this->getUser()->getAttribute('client');
    //$request->setAttribute('client', $this->Client);
    $this->forward404Unless($this->Client);
  }
  
  public function executeLogin(sfWebRequest $request) {
   
      
       if($this->getUser()->hasAttribute('client')){
            //$request->setParameter('id', $request->getAttribute('client')->getId());
           if($this->getUser()->getAttribute('client')->getId() != -1){
                $this->getUser()->setAttribute('client', $this->getUser()->getAttribute('client'));
                $this->redirect('client/show?id='.$this->getUser()->getAttribute('client')->getId());
           }
       }
      
      if($request->hasParameter('login') && $request->hasParameter('mdp')){
        $login = $request->getParameter('login');
        $mdp = $request->getParameter('mdp');

        $c = new Criteria();
        $c->add(ClientPeer::MAIL,$login);
        $clientArray = ClientPeer::doSelect($c);
        
        if(count($clientArray)>0 && $mdp=="mdp"){
            $client = $clientArray[0];
            
            $this->getUser()->setAuthenticated(true);
            $this->getUser()->setAttribute('client', $client);
            $this->redirect('client/show?id='.$client->getId());
            //$this->setTemplate('show');
        }

      }else{
          $this->setTemplate('login');
      }

      
  }

  
  public function executeNew(sfWebRequest $request)
  {
    $this->form = new ClientForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new ClientForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($Client = ClientPeer::retrieveByPk($request->getParameter('id')), sprintf('Object Client does not exist (%s).', $request->getParameter('id')));
    $this->form = new ClientForm($Client);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($Client = ClientPeer::retrieveByPk($request->getParameter('id')), sprintf('Object Client does not exist (%s).', $request->getParameter('id')));
    $this->form = new ClientForm($Client);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($Client = ClientPeer::retrieveByPk($request->getParameter('id')), sprintf('Object Client does not exist (%s).', $request->getParameter('id')));
    $Client->delete();

    $this->redirect('client/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $Client = $form->save();

      $this->redirect('client/edit?id='.$Client->getId());
    }
  }
}
