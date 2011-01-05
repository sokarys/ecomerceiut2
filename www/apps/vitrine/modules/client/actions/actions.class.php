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
  public function executeIndex(sfWebRequest $request)
  {
    $this->Clients = ClientPeer::doSelect(new Criteria());
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->Client = ClientPeer::retrieveByPk($request->getParameter('id'));
    $this->forward404Unless($this->Client);
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
