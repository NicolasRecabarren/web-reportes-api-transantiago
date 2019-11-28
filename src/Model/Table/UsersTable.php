<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class UsersTable extends Table
{
    public function validationDefault(Validator $validator)
    {
        return $validator
            ->notEmpty('username', 'Nombre de usuario es obligatorio.')
            ->notEmpty('password', 'Contraseña es obligatoria.');
    }

}
