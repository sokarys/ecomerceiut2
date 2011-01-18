<?php

/**
 * panier actions.
 *
 * @package    ecommerce
 * @subpackage panier
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
include('Panier.php');
class panierActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    
        
  }
  public function ajoutArticle(sfWebRequest $request){
      if($this->getUser()->hasAttribute('panier')){
          $panier = $this->getUser()->getAttribute('panier');
          $panier->addArticlePanier(ArticlePeer::retrieveByPk($request->getParameter('add_article_id')));
          $this->getUser()->setAttribute('panier', $panier);

      }else{
          $panier =new Panier();
          $this->getUser()->setAttribute('panier', $panier);
          $panier->addArticlePanier(ArticlePeer::retrieveByPk($request->getParameter('add_article_id')));
          $this->getUser()->setAttribute('panier', $panier);

      }
  }
  
}
