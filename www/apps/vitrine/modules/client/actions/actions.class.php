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
          return $this->getUser()->getAttribute('client');
      }
      
      return null;
  }

  public function executeDeconnection(sfWebRequest $request){
    $this->client = $this->getClient();
    if($this->client != null){
        $this->getUser()->setAttribute('client', null);
        $this->getUser()->setAuthenticated(false);
        $this->getUser()->clearCredentials();
        $this->redirect('categorie/index');
    }else{
        $this->redirect('client/login');
    }
  }
  
  public function executeIndex(sfWebRequest $request)
  {
    $this->client = $this->getClient();

    if($this->client != null){
        $this->redirect('client/show?id='.$this->client->getId());
    }else{
        $this->redirect('client/login');
    }
  }

  
  public function executeShow(sfWebRequest $request)
  {
      $client = $this->getClient();
      if($client != null){
        $this->Client = $client;
        $this->forward404Unless($this->Client);
      }else{
          $this->redirect('client/login');
      }
  }
  
  public function executeLogin(sfWebRequest $request) {
   
      
       if($this->getUser()->hasAttribute('client')){
           if($this->getUser()->getAttribute('client') != null){
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
     if($request->hasParameter('name') && $request->hasParameter('prenom') && $request->hasParameter('mail')
             && $request->hasParameter('adresse') && $request->hasParameter('tel') ){
         $name = $request->getParameter('name');
         $prenom = $request->getParameter('prenom');
         $mail = $request->getParameter('mail');
         $adresse = $request->getParameter('adresse');
         $tel = $request->getParameter('tel');

         $c = new Criteria();
         $c->add(ClientPeer::MAIL,$mail);
         $nbClient = ClientPeer::doCount($c);

         if($nbClient == 0 && $name != "" && $prenom != "" && $mail != "" && $adresse != "" && $tel != ""){
             $client = new Client();
             $client->setMail($mail);
             $client->setPrenom($prenom);
             $client->setTelephone($tel);
             $client->setNom($name);
             $client->setAdresse($adresse);
             $client->save();
             $this->redirect('client/login');
         }else{
            $this->redirect('client/failcreate');
         }
     }else{
         $this->redirect('client/failcreate');
     }
   
    
  }
  public function  executeFailcreate(sfWebRequest $request) {
            
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
