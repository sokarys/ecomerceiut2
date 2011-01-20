<?php

/**
 * commande actions.
 *
 * @package    ecommerce
 * @subpackage commande
 * @author     Your name here
 */
class commandeActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
        $this->Commandes = CommandePeer::doSelect(new Criteria());
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->Commande = CommandePeer::retrieveByPk($request->getParameter('id'));
    $this->forward404Unless($this->Commande);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new CommandeForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new CommandeForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($Commande = CommandePeer::retrieveByPk($request->getParameter('id')), sprintf('Object Commande does not exist (%s).', $request->getParameter('id')));
    $this->form = new CommandeForm($Commande);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($Commande = CommandePeer::retrieveByPk($request->getParameter('id')), sprintf('Object Commande does not exist (%s).', $request->getParameter('id')));
    $this->form = new CommandeForm($Commande);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($Commande = CommandePeer::retrieveByPk($request->getParameter('id')), sprintf('Object Commande does not exist (%s).', $request->getParameter('id')));
    $Commande->delete();

    $this->redirect('commande/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $Commande = $form->save();

      $this->redirect('commande/edit?id='.$Commande->getId());
    }
  }
}
