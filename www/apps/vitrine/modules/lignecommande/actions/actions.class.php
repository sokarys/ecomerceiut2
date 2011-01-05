<?php

/**
 * lignecommande actions.
 *
 * @package    ecommerce
 * @subpackage lignecommande
 * @author     Your name here
 */
class lignecommandeActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->LigneCommandes = LigneCommandePeer::doSelect(new Criteria());
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->LigneCommande = LigneCommandePeer::retrieveByPk($request->getParameter('commande_id'),
                       $request->getParameter('article_id'));
    $this->forward404Unless($this->LigneCommande);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new LigneCommandeForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new LigneCommandeForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($LigneCommande = LigneCommandePeer::retrieveByPk($request->getParameter('commande_id'),
                 $request->getParameter('article_id')), sprintf('Object LigneCommande does not exist (%s).', $request->getParameter('commande_id'),
                 $request->getParameter('article_id')));
    $this->form = new LigneCommandeForm($LigneCommande);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($LigneCommande = LigneCommandePeer::retrieveByPk($request->getParameter('commande_id'),
                 $request->getParameter('article_id')), sprintf('Object LigneCommande does not exist (%s).', $request->getParameter('commande_id'),
                 $request->getParameter('article_id')));
    $this->form = new LigneCommandeForm($LigneCommande);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($LigneCommande = LigneCommandePeer::retrieveByPk($request->getParameter('commande_id'),
                 $request->getParameter('article_id')), sprintf('Object LigneCommande does not exist (%s).', $request->getParameter('commande_id'),
                 $request->getParameter('article_id')));
    $LigneCommande->delete();

    $this->redirect('lignecommande/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $LigneCommande = $form->save();

      $this->redirect('lignecommande/edit?commande_id='.$LigneCommande->getCommandeId().'&article_id='.$LigneCommande->getArticleId());
    }
  }
}
