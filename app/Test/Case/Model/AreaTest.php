<?php
App::uses('Area', 'Model');

/**
 * Area Test Case
 *
 */
class AreaTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.area', 'app.proposal', 'app.user', 'app.group');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Area = ClassRegistry::init('Area');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Area);

		parent::tearDown();
	}

}
