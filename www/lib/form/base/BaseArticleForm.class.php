<?php

/**
 * Article form base class.
 *
 * @method Article getObject() Returns the current form's model object
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseArticleForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                  => new sfWidgetFormInputHidden(),
      'nom'                 => new sfWidgetFormInputText(),
      'prix'                => new sfWidgetFormInputText(),
      'description'         => new sfWidgetFormTextarea(),
      'popularite'          => new sfWidgetFormInputText(),
      'stock'               => new sfWidgetFormInputText(),
      'categorie_id'        => new sfWidgetFormPropelChoice(array('model' => 'Categorie', 'add_empty' => true)),
      'ligne_commande_list' => new sfWidgetFormPropelChoice(array('multiple' => true, 'model' => 'Commande')),
    ));

    $this->setValidators(array(
      'id'                  => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'nom'                 => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'prix'                => new sfValidatorNumber(array('required' => false)),
      'description'         => new sfValidatorString(array('required' => false)),
      'popularite'          => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'stock'               => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'categorie_id'        => new sfValidatorPropelChoice(array('model' => 'Categorie', 'column' => 'id', 'required' => false)),
      'ligne_commande_list' => new sfValidatorPropelChoice(array('multiple' => true, 'model' => 'Commande', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('article[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Article';
  }


  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['ligne_commande_list']))
    {
      $values = array();
      foreach ($this->object->getLigneCommandes() as $obj)
      {
        $values[] = $obj->getCommandeId();
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
    $c->add(LigneCommandePeer::ARTICLE_ID, $this->object->getPrimaryKey());
    LigneCommandePeer::doDelete($c, $con);

    $values = $this->getValue('ligne_commande_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new LigneCommande();
        $obj->setArticleId($this->object->getPrimaryKey());
        $obj->setCommandeId($value);
        $obj->save();
      }
    }
  }

}
