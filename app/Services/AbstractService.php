<?php
namespace App\Services;

use App\Models\ModelInterface;
use App\Support\ThrowExceptionSupport;
use Illuminate\Support\Collection;

class AbstractService
{
    /**
     * Throw Exception Support
     */
    use ThrowExceptionSupport;

    /**
     * variable to receive resource builder
     */
    public $resourceBuilder;

    /**
     * variable to receive resource model
     */
    public $resourceModel;

    /**
     * Returns a list of resources
     * @access public
     * @return Collection
     */
    public function getResources(): Collection
    {
        return $this->resourceModel->get();
    }

    /**
     * Returns a single resource
     * @access public
     * @param int $resourceId
     * @return ModelInterface
     */
    public function getResource(int $resourceId): ModelInterface
    {
        $this::validateModelExist($this->resourceModel, $resourceId);
        return $this->resourceModel->find($resourceId);
    }

    /**
     * Store a new resource
     * @access public
     * @param array $data | array with new data
     * @return ModelInterface
     */
    public function storeResource(array $data): ModelInterface
    {
        $this->resourceModel = $this->resourceBuilder->buildCreate($this->resourceModel, $data);
        $this->resourceModel->save();
        return $this->resourceModel;
    }

    /**
     * Update a resource
     * @access public
     * @param integer $resourceId | some resource id
     * @param array $data | array with new data
     * @return ModelInterface
     */
    public function updateResource(int $resourceId, array $data): ModelInterface
    {
        $this::validateModelExist($this->resourceModel, $resourceId);
        $this->resourceModel = $this->resourceBuilder->buildUpdate($this->resourceModel, $data, $resourceId);
        $this->resourceModel->save();
        return $this->resourceModel;
    }
    
    /**
     * Delete a resource
     * @access public
     * @param integer $resourceId | some resource id
     * @return bool
     */
    public function deleteResource(int $resourceId): bool
    {
        $this::validateModelExist($this->resourceModel, $resourceId);
        return $this->resourceModel->destroy($resourceId);
    }
}