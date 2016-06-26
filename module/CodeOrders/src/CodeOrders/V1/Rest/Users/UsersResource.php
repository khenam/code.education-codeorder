<?php
namespace CodeOrders\V1\Rest\Users;

use ZF\ApiProblem\ApiProblem;
use ZF\Rest\AbstractResourceListener;

class UsersResource extends AbstractResourceListener
{
    /**
     * @var UsersRepository
     */
    private $usersRepository;

    /**
     * UsersResource constructor.
     * @param UsersRepository $usersRepository
     */
    public function __construct(UsersRepository $usersRepository)
    {
        $this->usersRepository = $usersRepository;
    }

    /**
     * Create a resource
     *
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function create($data)
    {
        $usersMapper = new UsersMapper();
        $usersMapper->hydrate((array)$data, $usersMapper);
        try {
            $usersMapper = $this->usersRepository->insert($usersMapper);
        } catch (\Exception $e) {
            return new ApiProblem(400, $e->getMessage());
        }
        if ($usersMapper === false) {
            return new ApiProblem(400, "Fail to create user");
        }
        return $usersMapper;
    }

    /**
     * Delete a resource
     *
     * @param  mixed $id
     * @return ApiProblem|mixed
     */
    public function delete($id)
    {
        $user = $this->loadUser($id);
        if ($user instanceof ApiProblem) {
            return $user;
        }
        try {
            if ($this->usersRepository->delete($id) === false) {
                return new ApiProblem(400, "Fail to delete user");            }
        } catch (\Exception $e) {
            return new ApiProblem(400, $e->getMessage());
        }
        return true;
    }

    /**
     * Delete a collection, or members of a collection
     *
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function deleteList($data)
    {
        return new ApiProblem(405, 'The DELETE method has not been defined for collections');
    }

    /**
     * Fetch a resource
     *
     * @param  mixed $id
     * @return ApiProblem|mixed
     */
    public function fetch($id)
    {
        return $this->loadUser($id);
    }

    /**
     * Fetch all or a subset of resources
     *
     * @param  array $params
     * @return ApiProblem|mixed
     */
    public function fetchAll($params = [])
    {
        return $this->usersRepository->findAll();
    }

    /**
     * Patch (partial in-place update) a resource
     *
     * @param  mixed $id
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function patch($id, $data)
    {
        return $this->update($id,$data);
    }

    /**
     * Replace a collection or members of a collection
     *
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function replaceList($data)
    {
        return new ApiProblem(405, 'The PUT method has not been defined for collections');
    }

    /**
     * Update a resource
     *
     * @param  mixed $id
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function update($id, $data)
    {
        $user = $this->loadUser($id);
        if ($user instanceof ApiProblem) {
            return $user;
        }
        if (isset($data->id) && $data->id != $id) {
            return new ApiProblem(422, 'User id don\'t mach with data');
        }
        $usersMapper = new UsersMapper();
        $usersMapper->hydrate((array)$data, $user);
        try {
            $userResult = $this->usersRepository->update($id,$usersMapper);
        } catch (\Exception $e) {
            return new ApiProblem(400, $e->getMessage());
        }
        if ($userResult === false) {
            return new ApiProblem(400, "Fail to update user");
        }
        return $userResult;
    }

    private function loadUser($id)
    {
        $user = $this->usersRepository->find($id);
        if (!isset($user)) {
            return new ApiProblem(404, 'User id don\'t exist');
        }
        return $user;
    }
}
