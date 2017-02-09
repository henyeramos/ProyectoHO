<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\TableRegistry;
/**
 * User Entity
 *
 * @property int $id_user
 * @property string $username
 * @property string $password
 * @property int $isAdmin
 * @property int $per_cedula
 */
class User extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id_user' => false
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];

    //Para encriptar la contraseña
    protected function _setPassword($value)
    {
        if(!empty($value))
        {
            $hasher = new DefaultPasswordHasher();
            return $hasher->hash($value);
        }
        else
        {
            $id_user = $this->_properties['id_user'];
            $user = TableRegistry::get('Users')->recoverPassword($id_user);

            return $user;
        }
    }
}
