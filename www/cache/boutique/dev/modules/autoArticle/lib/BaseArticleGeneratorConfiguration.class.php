<?php

/**
 * article module configuration.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage article
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: configuration.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseArticleGeneratorConfiguration extends sfModelGeneratorConfiguration
{
  public function getActionsDefault()
  {
    return array();
  }

  public function getFormActions()
  {
    return array(  '_delete' => NULL,  '_list' => NULL,  '_save' => NULL,  '_save_and_add' => NULL,);
  }

  public function getNewActions()
  {
    return array();
  }

  public function getEditActions()
  {
    return array();
  }

  public function getListObjectActions()
  {
    return array(  '_edit' => NULL,  '_delete' => NULL,);
  }

  public function getListActions()
  {
    return array(  '_new' => NULL,);
  }

  public function getListBatchActions()
  {
    return array(  '_delete' => NULL,);
  }

  public function getListParams()
  {
    return '%%id%% - %%nom%% - %%prix%% - %%description%% - %%popularite%% - %%stock%% - %%categorie_id%%';
  }

  public function getListLayout()
  {
    return 'tabular';
  }

  public function getListTitle()
  {
    return 'Article List';
  }

  public function getEditTitle()
  {
    return 'Edit Article';
  }

  public function getNewTitle()
  {
    return 'New Article';
  }

  public function getFilterDisplay()
  {
    return array();
  }

  public function getFormDisplay()
  {
    return array();
  }

  public function getEditDisplay()
  {
    return array();
  }

  public function getNewDisplay()
  {
    return array();
  }

  public function getListDisplay()
  {
    return array(  0 => 'id',  1 => 'nom',  2 => 'prix',  3 => 'description',  4 => 'popularite',  5 => 'stock',  6 => 'categorie_id',);
  }

  public function getFieldsDefault()
  {
    return array(
      'id' => array(  'is_link' => true,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'nom' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'prix' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'description' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'popularite' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'stock' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'categorie_id' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'ForeignKey',),
      'ligne_commande_list' => array(  'is_link' => false,  'is_real' => false,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
    );
  }

  public function getFieldsList()
  {
    return array(
      'id' => array(),
      'nom' => array(),
      'prix' => array(),
      'description' => array(),
      'popularite' => array(),
      'stock' => array(),
      'categorie_id' => array(),
      'ligne_commande_list' => array(),
    );
  }

  public function getFieldsFilter()
  {
    return array(
      'id' => array(),
      'nom' => array(),
      'prix' => array(),
      'description' => array(),
      'popularite' => array(),
      'stock' => array(),
      'categorie_id' => array(),
      'ligne_commande_list' => array(),
    );
  }

  public function getFieldsForm()
  {
    return array(
      'id' => array(),
      'nom' => array(),
      'prix' => array(),
      'description' => array(),
      'popularite' => array(),
      'stock' => array(),
      'categorie_id' => array(),
      'ligne_commande_list' => array(),
    );
  }

  public function getFieldsEdit()
  {
    return array(
      'id' => array(),
      'nom' => array(),
      'prix' => array(),
      'description' => array(),
      'popularite' => array(),
      'stock' => array(),
      'categorie_id' => array(),
      'ligne_commande_list' => array(),
    );
  }

  public function getFieldsNew()
  {
    return array(
      'id' => array(),
      'nom' => array(),
      'prix' => array(),
      'description' => array(),
      'popularite' => array(),
      'stock' => array(),
      'categorie_id' => array(),
      'ligne_commande_list' => array(),
    );
  }


  /**
   * Gets the form class name.
   *
   * @return string The form class name
   */
  public function getFormClass()
  {
    return 'ArticleForm';
  }

  public function hasFilterForm()
  {
    return true;
  }

  /**
   * Gets the filter form class name
   *
   * @return string The filter form class name associated with this generator
   */
  public function getFilterFormClass()
  {
    return 'ArticleFormFilter';
  }

  public function getPagerClass()
  {
    return 'sfPropelPager';
  }

  public function getPagerMaxPerPage()
  {
    return 20;
  }

  public function getDefaultSort()
  {
    return array(null, null);
  }

  public function getPeerMethod()
  {
    return 'doSelect';
  }

  public function getPeerCountMethod()
  {
    return 'doCount';
  }
}
