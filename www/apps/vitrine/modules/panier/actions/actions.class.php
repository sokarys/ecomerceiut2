<?php

/**
 * panier actions.
 *
 * @package    ecommerce
 * @subpackage panier
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */

class panierActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */

  
    
  public function executeIndex(sfWebRequest $request)
  {
         $panier = $this->getPanier();
         $this->getUser()->setAttribute('panier', $panier);

  }
  
  private function getPanier(){
     if($this->getUser()->hasAttribute('panier')){
          return $this->getUser()->getAttribute('panier');
      }
      return new Panier();
  }

  private function getClient(){
      if($this->getUser()->hasAttribute('client')){
          return $this->getUser()->getAttribute('client');
      }
      
      return null;
  }
  
  
  public function executeAjout(sfWebRequest $request){
      if($this->getUser()->hasAttribute('panier')){
          $panier = $this->getUser()->getAttribute('panier');
          $this->getUser()->setAttribute('stock', $panier->addNewArticle(ArticlePeer::retrieveByPk($request->getParameter('add_article_id')),$request->getParameter('quantite')));
          $this->getUser()->setAttribute('panier', $panier);

      }else{
          $panier =new Panier();
          $this->getUser()->setAttribute('stock', $panier->addNewArticle(ArticlePeer::retrieveByPk($request->getParameter('add_article_id')),$request->getParameter('quantite')));
          $this->getUser()->setAttribute('panier', $panier);

      }
      $this->redirect('panier/index');
  }

  public function executeAjoutadd(sfWebRequest $request){
      if($this->getUser()->hasAttribute('panier')){
          $panier = $this->getUser()->getAttribute('panier');
          $quantite = $panier->getArticle($request->getParameter('add_article_id'))->getQuantite();
          $this->getUser()->setAttribute('stock', $panier->addNewArticle(ArticlePeer::retrieveByPk($request->getParameter('add_article_id')),$quantite + $request->getParameter('quantite')));
          $this->getUser()->setAttribute('panier', $panier);

      }else{
          $panier =new Panier();
          $this->getUser()->setAttribute('stock', $panier->addNewArticle(ArticlePeer::retrieveByPk($request->getParameter('add_article_id')),$request->getParameter('quantite')));
          $this->getUser()->setAttribute('panier', $panier);

      }
      $this->redirect('panier/index');
  }

  public function executeModif(sfWebRequest $request){
     $this->executeAjout($request);
  }

  public function  executeCommander(sfWebRequest $request) {
        $panier = $this->getPanier();
        if($panier->nbTotalArticle()!=0){
            $client = $this->getClient();
            if($client != null){
                $commande = $panier->toCommande($client);
            }else{
                $this->redirect('client/index');
            }
        }
        $this->redirect('client/index');
   }
}

