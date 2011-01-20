<?php

/**
 * commande module configuration.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage commande
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseCommandeGeneratorHelper extends sfModelGeneratorHelper
{
  public function getUrlForAction($action)
  {
    return 'list' == $action ? 'commande' : 'commande_'.$action;
  }
}
