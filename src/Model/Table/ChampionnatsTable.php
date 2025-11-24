<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class ChampionnatsTable extends Table {

    public function initialize(array $config): void {
        $this->addBehavior('Timestamp');
        $this->hasOne('Divisions');
        $this->hasOne('Categories');
        $this->hasOne('TypeChampionnats');
    }

    public function validationDefault(Validator $validator): Validator {
        $validator
                ->notEmptyString('nom_championnat', __('Veuillez renseigner un nom'));
                /*->notEmptyString('content', _('Veuillez renseigner une description'))
                ->notEmptyString('user_id', _('Veuillez renseigner un utilisateur')); */

        return $validator;
    }
}
