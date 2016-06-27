<?php
namespace CodeOrders\V1\Rest\Products;

use ZF\ApiProblem\ApiProblem;
use ZF\Rest\AbstractResourceListener;

class ProductsResource extends AbstractResourceListener
{
    /**
     * @var ProductsRepository
     */
    private $productsRepository;

    /**
     * ProductsResource constructor.
     * @param ProductsRepository $productsRepository
     */
    public function __construct(ProductsRepository $productsRepository)
    {
        $this->productsRepository = $productsRepository;
    }

    /**
     * Create a resource
     *
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function create($data)
    {
        $productsMapper = new ProductsMapper();
        $productsMapper->hydrate((array)$data, $productsMapper);
        try {
            $productsMapper = $this->productsRepository->insert($productsMapper);
        } catch (\Exception $e) {
            return new ApiProblem(400, $e->getMessage());
        }
        if ($productsMapper === false) {
            return new ApiProblem(400, "Fail to create product");
        }
        return $productsMapper;
    }

    /**
     * Delete a resource
     *
     * @param  mixed $id
     * @return ApiProblem|mixed
     */
    public function delete($id)
    {
        $product = $this->loadProduct($id);
        if ($product instanceof ApiProblem) {
            return $product;
        }
        try {
            if ($this->productsRepository->delete($id) === false) {
                return new ApiProblem(400, "Fail to delete product");            }
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
        return $this->loadProduct($id);
    }

    /**
     * Fetch all or a subset of resources
     *
     * @param  array $params
     * @return ApiProblem|mixed
     */
    public function fetchAll($params = array())
    {
        return $this->productsRepository->findAll();
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
        $product = $this->loadProduct($id);
        if ($product instanceof ApiProblem) {
            return $product;
        }
        if (isset($data->id) && $data->id != $id) {
            return new ApiProblem(422, 'Product id don\'t mach with data');
        }
        $productsMapper = new ProductsMapper();
        $productsMapper->hydrate((array)$data, $product);
        try {
            $productResult = $this->productsRepository->update($id,$productsMapper);
        } catch (\Exception $e) {
            return new ApiProblem(400, $e->getMessage());
        }
        if ($productResult === false) {
            return new ApiProblem(400, "Fail to update product");
        }
        return $productResult;
    }

    private function loadProduct($id)
    {
        $product = $this->productsRepository->find($id);
        if (!isset($product)) {
            return new ApiProblem(404, 'Product id don\'t exist');
        }
        return $product;
    }
}
