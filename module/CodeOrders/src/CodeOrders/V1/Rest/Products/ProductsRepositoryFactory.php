<?php
namespace CodeOrders\V1\Rest\Products;

use Zend\Db\Adapter\Adapter;
use Zend\Db\ResultSet\HydratingResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class ProductsRepositoryFactory implements FactoryInterface
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
        $productsMapper = new ProductsMapper();
        $hydrator = new HydratingResultSet($productsMapper, new ProductsEntity());
        $tableGateway = new TableGateway('products',$adapter,null,$hydrator);
        return new ProductsRepository($tableGateway);
    }
}