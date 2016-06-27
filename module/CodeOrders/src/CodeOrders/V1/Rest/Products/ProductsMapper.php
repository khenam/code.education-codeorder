<?php
namespace CodeOrders\V1\Rest\Products;

use Zend\Hydrator\HydratorInterface;

class ProductsMapper extends ProductsEntity implements HydratorInterface
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
            'id'          => isset($object->id) ? $object->id : $this->id,
            'name'        => isset($object->name) ? $object->name : $this->name,
            'description' => isset($object->description) ? $object->description : $this->description,
            'price'       => isset($object->price) ? $object->price : $this->price
        ];
    }

    /**
     * Hydrate $object with the provided $data.
     *
     * @param  array  $data
     * @param  object $object
     * @return object
     */
    public function hydrate(array $data, $object)
    {
        $this->id = $object->id = isset($data['id'])?$data['id']:$object->id;
        $this->name = $object->name = isset($data['name'])?$data['name']:$object->name;
        $this->description = $object->description = isset($data['description'])?$data['description']:$object->description;
        $this->price = $object->price = isset($data['price'])?$data['price']:$object->price;
        return $object;
    }
}