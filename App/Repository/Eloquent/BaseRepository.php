<?php

namespace App\Repository\Eloquent;

use App\Repository\EloquentRepositoryInterface;

class BaseRepository implements EloquentRepositoryInterface
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * BaseRepository Constructor
     *
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model=$model;
    }

    /**
     * create a model
     *
     * @param array $payload
     * @return Model
     */

    public function create( $payload)
    {
        $model=$this->model->create($payload);
        return $model->fresh();
    }

    /**
     * @return Collection
     */
    public function createMany( $payload)
    {
        ;
        $model=$this->model->insert($payload);
        return $model->fresh();
    }

    /**
     * @return Collection
     */

    public function getAll()
    {
        // TODO: Implement getAll() method.
    }

    /**
     * @param int $modelId
     * @param array $payload
     * @return bool
     */

    public function update( $modelId,  $payload)
    {
        return $this->model->find($modelId)->update($payload);
    }

    /**
     * @param array $condition
     * @param array $payload
     * @return bool
     */

    public function updateByCondition( $condition,  $payload)
    {
        return $this->model->where($condition)->update($payload);
    }

    /**
     * @param int $modelId
     * @return bool
     */

    public function delete(int $modelId)
    {
        return $this->model->where('id',$modelId)->delete();
    }

    /**
     * @param array $condition
     * @return bool
     * @throws \Exception
     */
    public function deleteByCondition( $condition)
    {
        return $this->model->where($condition)->delete();
    }

    /**
     * @param array $keyProps
     * @param array $payload
     * @return Model
     */
    public function updateOrInsert( $keyProps,  $payload)
    {
        return $this->model->updateOrCreate($keyProps, $payload);
    }

    /**
     * @param array $condition
     * @return Model
     */
    public function getSingle( $condition)
    {
        return $this->model->where($condition)->first();
    }

}
