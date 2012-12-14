<?php
/**
 * ProposalFixture
 *
 */
class ProposalFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'index'),
		'area_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'proposal' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 2010, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'fk_proposals_users1' => array('column' => 'user_id', 'unique' => 0)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_unicode_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'user_id' => 1,
			'area_id' => 1,
			'proposal' => 'Lorem ipsum dolor sit amet',
			'created' => '2012-08-21 02:34:15',
			'modified' => '2012-08-21 02:34:15'
		),
	);
}
