<?php
namespace CodeOrders\V1\Rest\Users;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\TableGateway\TableGatewayInterface;
use Zend\Paginator\Adapter\DbTableGateway;

class UsersRepository
{
    /**
     * @var TableGatewayInterface
     */
    private $tableGateway;

    /**
     * UsersRepository constructor.
     * @param TableGateway|TableGatewayInterface $tableGateway
     */
    public function __construct(TableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function findAll()
    {
        $tableGateway = $this->tableGateway;
        $paginatorAdapter = new DbTableGateway($tableGateway);
        return new UsersCollection($paginatorAdapter);
    }

    public function insert(UsersMapper $usersMapper)
    {
        if ($this->tableGateway->insert($usersMapper->extract($usersMapper)) <= 0) {
            return false;
        }
        $usersMapper->setId($this->tableGateway->getLastInsertValue());
        return $usersMapper;
    }

    public function find($id)
    {
        $resultSet = $this->tableGateway->select(['id' => $id]);
        if ($resultSet->count() == 0) {
            return null;
        }
        return $resultSet->current();
    }

    public function update($id, UsersMapper $usersMapper)
    {
        if ($this->tableGateway->update($usersMapper->extract($usersMapper), ['id' => $id]) <= 0) {
            return false;
        }
        return $usersMapper;
    }

    public function delete($id)
    {
        if ($this->tableGateway->delete(['id' => $id]) <= 0) {
            return false;
        }
        return true;
    }
}