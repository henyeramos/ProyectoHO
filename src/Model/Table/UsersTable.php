<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null, $options = [])
 */
class UsersTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('users');
        $this->displayField('id_user');
        $this->primaryKey('id_user');

        $this->belongsTo('Persona', [
            'joinType' => 'INNER',
            'foreignKey' => 'user_cedula'
            ]);

    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id_user')
            ->allowEmpty('id_user', 'create');

        $validator
            ->requirePresence('username', 'create')
            ->notEmpty('username', 'Rellene este campo');

        $validator
            ->requirePresence('password', 'create')
            ->notEmpty('password', 'Rellene este campo', 'create');

        $validator
            ->integer('isAdmin')
            ->allowEmpty('isAdmin');

        $validator
            ->minLength('user_cedula', 7, 'El numero minimo de caracteres es 7.')
            ->maxLength('user_cedula', 8, 'El numero maximo de caracteres es 8.')
            ->integer('user_cedula')
            ->requirePresence('user_cedula', 'create')
            ->notEmpty('user_cedula', 'Rellene este campo');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['username'], 'Este usuario ya existe'));

        return $rules;
    }

    public function beforeDelete(Event $event, $entity, $options) 
    {
        //Para validar que no elimine usuarios del tipo Admin
        if ($entity->isAdmin == 1) 
        {
            return false;
        }

        return true; 
    }

    public function findAuth(\Cake\ORM\Query $query, array $options)
    {
        $query
            ->select(['id_user','username', 'password', 'isAdmin', 'user_cedula']);

        return $query;
    }

    public function recoverPassword($id)
    {
        $user = $this->get($id);
        return $user->password;
    }    
    
}
