<?php
namespace CodeOrders\V1\Rest\Users;

use Zend\Db\Adapter\Adapter;
use Zend\Db\ResultSet\HydratingResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class UsersRepositoryFactory implements FactoryInterface
{
    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        /** @var Adapter $adapter */
        $adapter = $serviceLocator->get('DbAdapter');
        $userMapper = new UsersMapper();
        $hydrator = new HydratingResultSet($userMapper, new UsersEntity());
        $tableGateway = new TableGateway('oauth_users',$adapter,null,$hydrator);
        return new UsersRepository($tableGateway);
    }
}