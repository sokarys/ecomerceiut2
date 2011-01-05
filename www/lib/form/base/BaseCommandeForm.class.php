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
      'client_id'           => new sfWidgetFormPropelChoice(array('model' => 'Client', 'add_empty' => true)),
      'article_id'          => new sfWidgetFormPropelChoice(array('model' => 'Article', 'add_empty' => true)),
      'quantite'            => new sfWidgetFormInputText(),
      'created_at'          => new sfWidgetFormDateTime(),
      'etat'                => new sfWidgetFormInputText(),
      'id'                  => new sfWidgetFormInputHidden(),
      'ligne_commande_list' => new sfWidgetFormPropelChoice(array('multiple' => true, 'model' => 'Article')),
    ));

    $this->setValidators(array(
      'client_id'           => new sfValidatorPropelChoice(array('model' => 'Client', 'column' => 'id', 'required' => false)),
      'article_id'          => new sfValidatorPropelChoice(array('model' => 'Article', 'column' => 'id', 'required' => false)),
      'quantite'            => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'created_at'          => new sfValidatorDateTime(array('required' => false)),
      'etat'                => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'id'                  => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'ligne_commande_list' => new sfValidatorPropelChoice(array('multiple' => true, 'model' => 'Article', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('commande[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Commande';
  }


  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['ligne_commande_list']))
    {
      $values = array();
      foreach ($this->object->getLigneCommandes() as $obj)
      {
        $values[] = $obj->getArticleId();
      }

      $this->setDefault('ligne_commande_list', $values);
    }

  }

  protected function doSave($con = null)
  {
    parent::doSave($con);

    $this->saveLigneCommandeList($con);
  }

  public function saveLigneCommandeList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['ligne_commande_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $c = new Criteria();
    $c->add(LigneCommandePeer::COMMANDE_ID, $this->object->getPrimaryKey());
    LigneCommandePeer::doDelete($c, $con);

    $values = $this->getValue('ligne_commande_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new LigneCommande();
        $obj->setCommandeId($this->object->getPrimaryKey());
        $obj->setArticleId($value);
        $obj->save();
      }
    }
  }

}
