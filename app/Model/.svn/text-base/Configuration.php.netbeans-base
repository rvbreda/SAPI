<?php
App::uses('AppModel', 'Model');
/**
 * Configuration Model
 *
 */
class Configuration extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'configuration';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'retention_percentage' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Por favor preencha o percentual de retenção.',
				'allowEmpty' => false,
				'required' => true,
			),
			'between' => array(
				'rule' => array('between', 1, 100),
				'message' => 'Insira um valor entre 1 e 100',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
}
