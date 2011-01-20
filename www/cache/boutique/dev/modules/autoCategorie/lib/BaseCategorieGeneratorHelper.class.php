<?php

/**
 * categorie module configuration.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage categorie
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseCategorieGeneratorHelper extends sfModelGeneratorHelper
{
  public function getUrlForAction($action)
  {
    return 'list' == $action ? 'categorie' : 'categorie_'.$action;
  }
}
