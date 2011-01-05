<?php


/**
 * This class defines the structure of the 'ligne_commande' table.
 *
 *
 * This class was autogenerated by Propel 1.4.2 on:
 *
 * 01/05/11 13:37:04
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    lib.model.map
 */
class LigneCommandeTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.LigneCommandeTableMap';

	/**
	 * Initialize the table attributes, columns and validators
	 * Relations are not initialized by this method since they are lazy loaded
	 *
	 * @return     void
	 * @throws     PropelException
	 */
	public function initialize()
	{
	  // attributes
		$this->setName('ligne_commande');
		$this->setPhpName('LigneCommande');
		$this->setClassname('LigneCommande');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(false);
		// columns
		$this->addForeignPrimaryKey('COMMANDE_ID', 'CommandeId', 'INTEGER' , 'commande', 'ID', true, null, null);
		$this->addForeignPrimaryKey('ARTICLE_ID', 'ArticleId', 'INTEGER' , 'article', 'ID', true, null, null);
		$this->addColumn('QUANTITE', 'Quantite', 'INTEGER', false, null, null);
		$this->addColumn('PRIX', 'Prix', 'FLOAT', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Commande', 'Commande', RelationMap::MANY_TO_ONE, array('commande_id' => 'id', ), null, null);
    $this->addRelation('Article', 'Article', RelationMap::MANY_TO_ONE, array('article_id' => 'id', ), null, null);
	} // buildRelations()

	/**
	 * 
	 * Gets the list of behaviors registered for this table
	 * 
	 * @return array Associative array (name => parameters) of behaviors
	 */
	public function getBehaviors()
	{
		return array(
			'symfony' => array('form' => 'true', 'filter' => 'true', ),
			'symfony_behaviors' => array(),
		);
	} // getBehaviors()

} // LigneCommandeTableMap
