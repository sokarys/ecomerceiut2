<?php

/**
 * Client filter form base class.
 *
 * @package    ecommerce
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseClientFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'nom'       => new sfWidgetFormFilterInput(),
      'prenom'    => new sfWidgetFormFilterInput(),
      'adresse'   => new sfWidgetFormFilterInput(),
      'mail'      => new sfWidgetFormFilterInput(),
      'telephone' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'nom'       => new sfValidatorPass(array('required' => false)),
      'prenom'    => new sfValidatorPass(array('required' => false)),
      'adresse'   => new sfValidatorPass(array('required' => false)),
      'mail'      => new sfValidatorPass(array('required' => false)),
      'telephone' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('client_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Client';
  }

  public function getFields()
  {
    return array(
      'id'        => 'Number',
      'nom'       => 'Text',
      'prenom'    => 'Text',
      'adresse'   => 'Text',
      'mail'      => 'Text',
      'telephone' => 'Text',
    );
  }
}
