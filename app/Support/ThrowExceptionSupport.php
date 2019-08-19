<?php
namespace App\Support;

use App\Models\ModelInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;

trait ThrowExceptionSupport
{
    /**
     * @param ModelInterface $entity
     * @param int $id
     * @throws ModelNotFoundException
     * @return void
     */
    public static function validateModelExist(ModelInterface $entity, int $id): void
    {
        if (!$entity->find($id)) {
            throw new ModelNotFoundException(sprintf(
                'The resource \'%s\' was not found.',
                $id
            ));
        }
    }
}