<?php
namespace CodeOrders\V1\Rest\Products;

use Zend\ServiceManager\ServiceLocatorInterface;

class ProductsResourceFactory
{
    /**
     * @param ServiceLocatorInterface $services
     * @return ProductsResource
     */
    public function __invoke($services)
    {
        /** @var ProductsRepository $productsRepository */
        $productsRepository = $services->get('CodeOrders\\V1\\Rest\\Products\\ProductsRepository');
        return new ProductsResource($productsRepository);
    }
}
