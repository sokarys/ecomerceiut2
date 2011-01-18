<?php

/**
 * categorie actions.
 *
 * @package    ecommerce
 * @subpackage categorie
 * @author     Your name here
 */
class categorieActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->Categories = CategoriePeer::doSelect(new Criteria());
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->Categorie = CategoriePeer::retrieveByPk($request->getParameter('id'));
    $this->forward404Unless($this->Categorie);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new CategorieForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new CategorieForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($Categorie = CategoriePeer::retrieveByPk($request->getParameter('id')), sprintf('Object Categorie does not exist (%s).', $request->getParameter('id')));
    $this->form = new CategorieForm($Categorie);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($Categorie = CategoriePeer::retrieveByPk($request->getParameter('id')), sprintf('Object Categorie does not exist (%s).', $request->getParameter('id')));
    $this->form = new CategorieForm($Categorie);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($Categorie = CategoriePeer::retrieveByPk($request->getParameter('id')), sprintf('Object Categorie does not exist (%s).', $request->getParameter('id')));
    $Categorie->delete();

    $this->redirect('categorie/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $Categorie = $form->save();

      $this->redirect('categorie/edit?id='.$Categorie->getId());
    }
  }
}
