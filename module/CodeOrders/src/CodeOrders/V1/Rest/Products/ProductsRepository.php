<?php
namespace CodeOrders\V1\Rest\Products;

use Zend\Db\TableGateway\TableGateway;
use Zend\Paginator\Adapter\DbTableGateway;

class ProductsRepository
{
    /**
     * @var TableGateway
     */
    private $tableGateway;

    /**
     * ProductsRepository constructor.
     * @param TableGateway $tableGateway
     */
    public function __construct(TableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function findAll()
    {
        $tableGateway = $this->tableGateway;
        $paginatorAdapter = new DbTableGateway($tableGateway);
        return new ProductsCollection($paginatorAdapter);
    }

    public function find($id)
    {
        $resultSet = $this->tableGateway->select(['id' => $id]);
        if ($resultSet->count() == 0) {
            return null;
        }
        return $resultSet->current();
    }

    public function insert(ProductsMapper $productsMapper)
    {
        if ($this->tableGateway->insert($productsMapper->extract($productsMapper)) <= 0) {
            return false;
        }
        $productsMapper->setId($this->tableGateway->getLastInsertValue());
        return $productsMapper;
    }

    public function update($id, ProductsMapper $productsMapper)
    {
        if ($this->tableGateway->update($productsMapper->extract($productsMapper), ['id' => $id]) <= 0) {
            return false;
        }
        return $productsMapper;
    }

    public function delete($id)
    {
        if ($this->tableGateway->delete(['id' => $id]) <= 0) {
            return false;
        }
        return true;
    }
}