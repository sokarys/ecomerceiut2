<?php

/**
 * Panier filter form base class.
 *
 * @package    ecommerce
 * @subpackage filter
 * @author     Your name here
 */
abstract class BasePanierFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'client_id'  => new sfWidgetFormPropelChoice(array('model' => 'Client', 'add_empty' => true)),
      'article_id' => new sfWidgetFormPropelChoice(array('model' => 'Article', 'add_empty' => true)),
      'quantite'   => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'client_id'  => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Client', 'column' => 'id')),
      'article_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Article', 'column' => 'id')),
      'quantite'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('panier_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Panier';
  }

  public function getFields()
  {
    return array(
      'client_id'  => 'ForeignKey',
      'article_id' => 'ForeignKey',
      'quantite'   => 'Number',
      'id'         => 'Number',
    );
  }
}
