<?php

/**
 * commande module configuration.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage commande
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: configuration.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseCommandeGeneratorConfiguration extends sfModelGeneratorConfiguration
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
    return '%%client_id%% - %%created_at%% - %%etat%% - %%id%%';
  }

  public function getListLayout()
  {
    return 'tabular';
  }

  public function getListTitle()
  {
    return 'Commande List';
  }

  public function getEditTitle()
  {
    return 'Edit Commande';
  }

  public function getNewTitle()
  {
    return 'New Commande';
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
    return array(  0 => 'client_id',  1 => 'created_at',  2 => 'etat',  3 => 'id',);
  }

  public function getFieldsDefault()
  {
    return array(
      'client_id' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'ForeignKey',),
      'created_at' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Date',),
      'etat' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'id' => array(  'is_link' => true,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'ligne_commande_list' => array(  'is_link' => false,  'is_real' => false,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
    );
  }

  public function getFieldsList()
  {
    return array(
      'client_id' => array(),
      'created_at' => array(),
      'etat' => array(),
      'id' => array(),
      'ligne_commande_list' => array(),
    );
  }

  public function getFieldsFilter()
  {
    return array(
      'client_id' => array(),
      'created_at' => array(),
      'etat' => array(),
      'id' => array(),
      'ligne_commande_list' => array(),
    );
  }

  public function getFieldsForm()
  {
    return array(
      'client_id' => array(),
      'created_at' => array(),
      'etat' => array(),
      'id' => array(),
      'ligne_commande_list' => array(),
    );
  }

  public function getFieldsEdit()
  {
    return array(
      'client_id' => array(),
      'created_at' => array(),
      'etat' => array(),
      'id' => array(),
      'ligne_commande_list' => array(),
    );
  }

  public function getFieldsNew()
  {
    return array(
      'client_id' => array(),
      'created_at' => array(),
      'etat' => array(),
      'id' => array(),
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
    return 'CommandeForm';
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
    return 'CommandeFormFilter';
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
