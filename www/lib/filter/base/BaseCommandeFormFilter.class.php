<?php

/**
 * Commande filter form base class.
 *
 * @package    ecommerce
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseCommandeFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'client_id'  => new sfWidgetFormPropelChoice(array('model' => 'Client', 'add_empty' => true)),
      'article_id' => new sfWidgetFormPropelChoice(array('model' => 'Article', 'add_empty' => true)),
      'quantite'   => new sfWidgetFormFilterInput(),
      'prix'       => new sfWidgetFormFilterInput(),
      'created_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'etat'       => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'client_id'  => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Client', 'column' => 'id')),
      'article_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Article', 'column' => 'id')),
      'quantite'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'prix'       => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'created_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'etat'       => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('commande_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Commande';
  }

  public function getFields()
  {
    return array(
      'client_id'  => 'ForeignKey',
      'article_id' => 'ForeignKey',
      'quantite'   => 'Number',
      'prix'       => 'Number',
      'created_at' => 'Date',
      'etat'       => 'Text',
      'id'         => 'Number',
    );
  }
}
