<?php

/**
 * Client form base class.
 *
 * @method Client getObject() Returns the current form's model object
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseClientForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'        => new sfWidgetFormInputHidden(),
      'nom'       => new sfWidgetFormInputText(),
      'prenom'    => new sfWidgetFormInputText(),
      'adresse'   => new sfWidgetFormInputText(),
      'mail'      => new sfWidgetFormInputText(),
      'telephone' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'        => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'nom'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'prenom'    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'adresse'   => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'mail'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'telephone' => new sfValidatorString(array('max_length' => 15, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('client[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Client';
  }


}
