<?php
namespace App\Builders;

use App\Models\ModelInterface;

class ResourceBuilder
{
    /**
     * @param ModelInterface $model
     * @param array $parameters
     * @return ModelInterface
     */
    public function buildCreate(ModelInterface $model, array $parameters): ModelInterface
    {
        $className = get_class($model);
        $model = new $className;
        $model->fill($parameters);
        return $model;
    }
    
    /**
     * @param ModelInterface $model
     * @param array $parameters
     * @param int $id
     * @return ModelInterface
     */
    public function buildUpdate(ModelInterface $model, array $parameters, int $id): ModelInterface
    {
        $model = $model->find($id);
        $model->fill($parameters);
        return $model;
    }
}