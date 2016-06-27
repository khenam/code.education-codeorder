<?php
namespace CodeOrders\V1\Rest\Users;

use Zend\ServiceManager\ServiceLocatorInterface;

class UsersResourceFactory
{
    /**
     * @param ServiceLocatorInterface $services
     * @return UsersResource
     */
    public function __invoke($services)
    {
        /** @var UsersRepository $usersRepository */
        $usersRepository = $services->get('CodeOrders\\V1\\Rest\\Users\\UsersRepository');
        return new UsersResource($usersRepository);
    }
}
