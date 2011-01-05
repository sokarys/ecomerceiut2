<?php

/**
 * Article filter form base class.
 *
 * @package    ecommerce
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseArticleFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'nom'          => new sfWidgetFormFilterInput(),
      'description'  => new sfWidgetFormFilterInput(),
      'popularite'   => new sfWidgetFormFilterInput(),
      'stock'        => new sfWidgetFormFilterInput(),
      'categorie_id' => new sfWidgetFormPropelChoice(array('model' => 'Categorie', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'nom'          => new sfValidatorPass(array('required' => false)),
      'description'  => new sfValidatorPass(array('required' => false)),
      'popularite'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'stock'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'categorie_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Categorie', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('article_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Article';
  }

  public function getFields()
  {
    return array(
      'id'           => 'Number',
      'nom'          => 'Text',
      'description'  => 'Text',
      'popularite'   => 'Number',
      'stock'        => 'Number',
      'categorie_id' => 'ForeignKey',
    );
  }
}
