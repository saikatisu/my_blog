<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class PostsTable extends Table{
    public function initialize(array $config){
        $this->addBehavior('Timestamp');
        $this->hasMany('Comments',[
            'dependent' => true
        ]);
    }

    public function validationDefault(Validator $validator){
        $validator
            //空文字チェック
            ->notEmpty('title')
            //必須項目チェック
            ->requirePresence('title')
            ->requirePresence('body')
            ->notEmpty('body')
            ->add('body',[
                'length'=>[
                    'rule' =>['minLength',10],
                    'message'=> 'body length must be 10+'
                ]
            ]);
        return $validator;
    }
}

?>