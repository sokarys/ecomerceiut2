<?php

/**
 * LigneCommande form base class.
 *
 * @method LigneCommande getObject() Returns the current form's model object
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseLigneCommandeForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'commande_id' => new sfWidgetFormInputHidden(),
      'article_id'  => new sfWidgetFormInputHidden(),
      'quantite'    => new sfWidgetFormInputText(),
      'prix'        => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'commande_id' => new sfValidatorPropelChoice(array('model' => 'Commande', 'column' => 'id', 'required' => false)),
      'article_id'  => new sfValidatorPropelChoice(array('model' => 'Article', 'column' => 'id', 'required' => false)),
      'quantite'    => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'prix'        => new sfValidatorNumber(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('ligne_commande[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'LigneCommande';
  }


}
