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
      'client_id'           => new sfWidgetFormPropelChoice(array('model' => 'Client', 'add_empty' => true)),
      'created_at'          => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'etat'                => new sfWidgetFormFilterInput(),
      'ligne_commande_list' => new sfWidgetFormPropelChoice(array('model' => 'Article', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'client_id'           => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Client', 'column' => 'id')),
      'created_at'          => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'etat'                => new sfValidatorPass(array('required' => false)),
      'ligne_commande_list' => new sfValidatorPropelChoice(array('model' => 'Article', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('commande_filters[%s]');

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

    $criteria->addJoin(LigneCommandePeer::COMMANDE_ID, CommandePeer::ID);

    $value = array_pop($values);
    $criterion = $criteria->getNewCriterion(LigneCommandePeer::ARTICLE_ID, $value);

    foreach ($values as $value)
    {
      $criterion->addOr($criteria->getNewCriterion(LigneCommandePeer::ARTICLE_ID, $value));
    }

    $criteria->add($criterion);
  }

  public function getModelName()
  {
    return 'Commande';
  }

  public function getFields()
  {
    return array(
      'client_id'           => 'ForeignKey',
      'created_at'          => 'Date',
      'etat'                => 'Text',
      'id'                  => 'Number',
      'ligne_commande_list' => 'ManyKey',
    );
  }
}
