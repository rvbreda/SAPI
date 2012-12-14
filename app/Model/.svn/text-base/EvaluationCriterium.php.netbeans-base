<?php

App::uses('AppModel', 'Model');

/**
 * EvaluationCriterium Model
 *
 */
class EvaluationCriterium extends AppModel {

    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'description';

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
        'description' => array(
            'notempty' => array(
                'rule' => array('notempty'),
            'message' => 'Por favor, informe o nome do critério',
            ),
            'maxlength' => array(
                'rule' => array('maxLength', 120),
            'message' => 'Nome do critério não pode conter mais que 120 caracteres.',
            ),
        ),
        'weight' => array(
            'notempty' => array(
                'rule' => array('notempty'),
            'message' => 'Por favor, informe um peso para este critério.',
            ),
            'decimal' => array(
                'rule' => array('decimal'),
            //'message' => 'Your custom message here',
            ),
            'between' => array(
                'rule' => 'checkBetween',
                'message' => 'Valor para peso deve ser entre 1 e 10.'
        )),
        'active' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            //'message' => 'Your custom message here',
            ),
        ),
    );
    
    public function checkBetween($data){
         if(is_numeric($data['weight'])){
             if($data['weight'] > 0 && $data['weight'] <= 10)
                 return true;
             return false;
         }        
         return false;
    }

    public function getTotalWeight() {
        $total = $this->find('all', array(
            'fields' => array('sum(EvaluationCriterium.weight)   AS totalw'),
            'conditions' => array('EvaluationCriterium.active' => '1')));
        return $total[0][0]['totalw'];
    }

    public function calculateDistribution($pesoTotal = null) {
        try {
            $criteria = $this->find('all', array(
                'fields' => array('id', 'weight'),
                'conditions' => array('EvaluationCriterium.active' => '1')
                    ));

            foreach ($criteria as $criterium) {
                $query = "UPDATE `inscer`.`evaluation_criteria` SET
                         `distribution` = " . ($criterium['EvaluationCriterium']['weight'] / $pesoTotal) .
                        " WHERE id =" . $criterium['EvaluationCriterium']['id'] . " ;";
                $this->query($query);
            }
            return true;
        } catch (Exception $exc) {
            //echo $exc->getTraceAsString();
            return false;
        }
    }
}
