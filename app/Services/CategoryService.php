<?php
namespace App\Services;

use App\Models\Category as ResourceModel;
use App\Builders\ResourceBuilder;
use Illuminate\Support\Collection;

/**
 * @property ResourceBuilder resourceBuilder
 * @property ResourceModel resourceModel
 */
class CategoryService extends AbstractService
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
     * @param int $categoryId
     * @return ResourceModel
     */
    public function getById(int $categoryId): ResourceModel
    {
        return parent::getResource($categoryId);
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
     * @param integer $categoryId | some category id
     * @param array $data | array with new data
     * @return ResourceModel
     */
    public function update(int $categoryId, array $data): ResourceModel
    {
        return parent::updateResource($categoryId, $data);
    }

    /**
     * Delete a resources
     * @access public
     * @param integer $categoryId
     * @return bool
     */
    public function delete(int $categoryId): bool
    {
        return parent::deleteResource($categoryId);
    }
}