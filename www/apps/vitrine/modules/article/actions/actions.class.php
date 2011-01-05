<?php

/**
 * article actions.
 *
 * @package    ecommerce
 * @subpackage article
 * @author     Your name here
 */
class articleActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->Articles = ArticlePeer::doSelect(new Criteria());
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->Article = ArticlePeer::retrieveByPk($request->getParameter('id'));
    $this->forward404Unless($this->Article);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new ArticleForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new ArticleForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($Article = ArticlePeer::retrieveByPk($request->getParameter('id')), sprintf('Object Article does not exist (%s).', $request->getParameter('id')));
    $this->form = new ArticleForm($Article);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($Article = ArticlePeer::retrieveByPk($request->getParameter('id')), sprintf('Object Article does not exist (%s).', $request->getParameter('id')));
    $this->form = new ArticleForm($Article);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($Article = ArticlePeer::retrieveByPk($request->getParameter('id')), sprintf('Object Article does not exist (%s).', $request->getParameter('id')));
    $Article->delete();

    $this->redirect('article/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $Article = $form->save();

      $this->redirect('article/edit?id='.$Article->getId());
    }
  }
}
