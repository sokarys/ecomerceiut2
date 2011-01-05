<?php

/**
 * Commande form base class.
 *
 * @method Commande getObject() Returns the current form's model object
 *
 * @package    ecommerce
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseCommandeForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'client_id'  => new sfWidgetFormPropelChoice(array('model' => 'Client', 'add_empty' => true)),
      'article_id' => new sfWidgetFormPropelChoice(array('model' => 'Article', 'add_empty' => true)),
      'quantite'   => new sfWidgetFormInputText(),
      'id'         => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'client_id'  => new sfValidatorPropelChoice(array('model' => 'Client', 'column' => 'id', 'required' => false)),
      'article_id' => new sfValidatorPropelChoice(array('model' => 'Article', 'column' => 'id', 'required' => false)),
      'quantite'   => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('commande[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Commande';
  }


}
