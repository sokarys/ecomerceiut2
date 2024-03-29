<?php


/**
 * This class defines the structure of the 'client' table.
 *
 *
 * This class was autogenerated by Propel 1.4.2 on:
 *
 * Wed Jan 19 18:51:51 2011
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    lib.model.map
 */
class ClientTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.ClientTableMap';

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
		$this->setName('client');
		$this->setPhpName('Client');
		$this->setClassname('Client');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addColumn('NOM', 'Nom', 'VARCHAR', false, 255, null);
		$this->addColumn('PRENOM', 'Prenom', 'VARCHAR', false, 255, null);
		$this->addColumn('ADRESSE', 'Adresse', 'VARCHAR', false, 255, null);
		$this->addColumn('MAIL', 'Mail', 'VARCHAR', false, 255, null);
		$this->addColumn('TELEPHONE', 'Telephone', 'VARCHAR', false, 15, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Commande', 'Commande', RelationMap::ONE_TO_MANY, array('id' => 'client_id', ), null, null);
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

} // ClientTableMap
