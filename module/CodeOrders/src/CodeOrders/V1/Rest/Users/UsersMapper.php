<?php
namespace CodeOrders\V1\Rest\Users;

use Zend\Hydrator\HydratorInterface;
use Zend\Stdlib\Hydrator\HydrationInterface;

class UsersMapper extends UsersEntity implements HydratorInterface
{

    /**
     * Extract values from an object
     *
     * @param  object $object
     * @return array
     */
    public function extract($object)
    {
        return [
            'id'         => isset($object->id)?$object->id:$this->id,
            'username'   => isset($object->username)?$object->username:$this->username,
            'password'   => isset($object->password)?$object->password:$this->password,
            'first_name' => isset($object->first_name)?$object->first_name:$this->first_name,
            'last_name'  => isset($object->last_name)?$object->last_name:$this->last_name,
            'role'       => isset($object->role)?$object->role:$this->role
        ];
    }

    /**
     * Hydrate $object with the provided $data.
     *
     * @param  array  $data
     * @param  object $object
     * @return UsersMapper
     */
    public function hydrate(array $data, $object)
    {
        $this->id = $object->id = isset($data['id'])?$data['id']:$object->id;
        $this->username = $object->username = isset($data['username'])?$data['username']:$object->username;
        $this->password = $object->password = isset($data['password'])?$data['password']:$object->password;
        $this->first_name = $object->first_name = isset($data['first_name'])?$data['first_name']:$object->first_name;
        $this->last_name = $object->last_name = isset($data['last_name'])?$data['last_name']:$object->last_name;
        $this->role = $object->role = isset($data['role'])?$data['role']:$object->role;
        return $object;
    }
}