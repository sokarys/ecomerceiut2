<?php

/**
 * LigneCommande filter form base class.
 *
 * @package    ecommerce
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseLigneCommandeFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'quantite'    => new sfWidgetFormFilterInput(),
      'prix'        => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'quantite'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'prix'        => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('ligne_commande_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'LigneCommande';
  }

  public function getFields()
  {
    return array(
      'commande_id' => 'ForeignKey',
      'article_id'  => 'ForeignKey',
      'quantite'    => 'Number',
      'prix'        => 'Number',
    );
  }
}
