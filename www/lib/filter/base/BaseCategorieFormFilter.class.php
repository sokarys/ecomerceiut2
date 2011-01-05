<?php

/**
 * Categorie filter form base class.
 *
 * @package    ecommerce
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseCategorieFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'nom'         => new sfWidgetFormFilterInput(),
      'description' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'nom'         => new sfValidatorPass(array('required' => false)),
      'description' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('categorie_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Categorie';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'nom'         => 'Text',
      'description' => 'Text',
    );
  }
}
