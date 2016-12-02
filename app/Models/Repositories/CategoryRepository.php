<?php

namespace App\Repositories;

use Api\App\Contracts\Entities\CategoryRepository as CategoryInterface;
use Api\App\Contracts\Storage\Condition as ConditionInterface;
use Illuminate\Database\Eloquent\Model;
use \App\Models\Traits\QueryTrait;

/**
 * Content Repository
 * @package App\Repositories
 */
class CategoryRepository implements CategoryInterface
{
    use QueryTrait;

    /**
     * @var Model
     */
    protected $model;

    /**
     * @var Model
     */
    protected $translation;

    /**
     * @param Model $category
     */
    public function __construct(Model $category)
    {
        $this->model = $category;
    }

    /**
     * @inheritdoc
     */
    public function findById($id, ConditionInterface $condition = null)
    {
        $model = $this->model;
        $query = $model::where('id', $id);

        return $this->queryOne($query);
    }

    /**
     * @inheritdoc
     */
    public function findOne(ConditionInterface $condition)
    {
        $model = $this->model;
        $query = $model::orderBy('created_at');

        return $this->queryOne($query);
    }

    /**
     * @inheritdoc
     */
    public function findAll(ConditionInterface $condition)
    {
        $model = $this->model;
        $query = $model::orderBy('created_at');

        return $this->queryAll($query, $condition);
    }

    /**
     * @inheritdoc
     */
    public function save(array $data, $model = null)
    {
        if (is_null($model)) {
            $model = $this->model;
        }

        $this->setAttribute($model, $data, 'name');
        $this->setAttribute($model, $data, 'description');
        $model->save();

        return $model->id;
    }

    /**
     * @inheritdoc
     */
    public function delete($model)
    {
        return $model->delete();
    }

}