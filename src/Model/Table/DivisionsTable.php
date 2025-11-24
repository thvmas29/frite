<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class DivisionsTable extends Table {

    public function initialize(array $config): void {
        $this->addBehavior('Timestamp');
        $this->hasMany('Championnats', [
        'dependent' => true,
        ]);

    }

    public function validationDefault(Validator $validator): Validator {
        $validator
                ->notEmptyString('name', __('Veuillez renseigner un nom'));
                /*->notEmptyString('content', _('Veuillez renseigner une description'))
                ->notEmptyString('user_id', _('Veuillez renseigner un utilisateur')); */

        return $validator;
    }
}
