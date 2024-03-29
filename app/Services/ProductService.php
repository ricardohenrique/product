<?php
namespace App\Services;

use App\Models\Product as ResourceModel;
use App\Builders\ResourceBuilder;
use Illuminate\Support\Collection;

/**
 * @property ResourceBuilder resourceBuilder
 * @property ResourceModel resourceModel
 */
class ProductService extends AbstractService
{
    /**
     * Constructor class
     * @access public
     * @param ResourceModel $resourceModel
     * @param ResourceBuilder $resourceBuilder
     * @return void
     */
    public function __construct(ResourceModel $resourceModel, ResourceBuilder $resourceBuilder)
    {
        $this->resourceModel   = $resourceModel;
        $this->resourceBuilder = $resourceBuilder;
    }

    /**
     * Returns a list of resources
     * @access public
     * @return Collection
     */
    public function getAll(): Collection
    {
        return parent::getResources();
    }

    /**
     * Returns a single resources
     * @access public
     * @param int $productId
     * @return ResourceModel
     */
    public function getById(int $productId): ResourceModel
    {
        return parent::getResource($productId);
    }

    /**
     * Store a new resources
     * @access public
     * @param array $data
     * @return ResourceModel
     */
    public function store(array $data): ResourceModel
    {
        return parent::storeResource($data);
    }

    /**
     * Update a resources
     * @access public
     * @param integer $productId | some category id
     * @param array $data | array with new data
     * @return ResourceModel
     */
    public function update(int $productId, array $data): ResourceModel
    {
        return parent::updateResource($productId, $data);
    }

    /**
     * Delete a resources
     * @access public
     * @param integer $productId
     * @return bool
     */
    public function delete(int $productId): bool
    {
        return parent::deleteResource($productId);
    }
}