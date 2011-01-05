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
      'nom'                 => new sfWidgetFormFilterInput(),
      'prix'                => new sfWidgetFormFilterInput(),
      'description'         => new sfWidgetFormFilterInput(),
      'popularite'          => new sfWidgetFormFilterInput(),
      'stock'               => new sfWidgetFormFilterInput(),
      'categorie_id'        => new sfWidgetFormPropelChoice(array('model' => 'Categorie', 'add_empty' => true)),
      'ligne_commande_list' => new sfWidgetFormPropelChoice(array('model' => 'Commande', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'nom'                 => new sfValidatorPass(array('required' => false)),
      'prix'                => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'description'         => new sfValidatorPass(array('required' => false)),
      'popularite'          => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'stock'               => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'categorie_id'        => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Categorie', 'column' => 'id')),
      'ligne_commande_list' => new sfValidatorPropelChoice(array('model' => 'Commande', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('article_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function addLigneCommandeListColumnCriteria(Criteria $criteria, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $criteria->addJoin(LigneCommandePeer::ARTICLE_ID, ArticlePeer::ID);

    $value = array_pop($values);
    $criterion = $criteria->getNewCriterion(LigneCommandePeer::COMMANDE_ID, $value);

    foreach ($values as $value)
    {
      $criterion->addOr($criteria->getNewCriterion(LigneCommandePeer::COMMANDE_ID, $value));
    }

    $criteria->add($criterion);
  }

  public function getModelName()
  {
    return 'Article';
  }

  public function getFields()
  {
    return array(
      'id'                  => 'Number',
      'nom'                 => 'Text',
      'prix'                => 'Number',
      'description'         => 'Text',
      'popularite'          => 'Number',
      'stock'               => 'Number',
      'categorie_id'        => 'ForeignKey',
      'ligne_commande_list' => 'ManyKey',
    );
  }
}
