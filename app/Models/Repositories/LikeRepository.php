<?php

namespace App\Repositories;

use Api\App\Contracts\Entities\LikeRepository as LikeInterface;
use Api\App\Contracts\Storage\Condition as ConditionInterface;
use Illuminate\Database\Eloquent\Model;
use \App\Models\Traits\QueryTrait;

/**
 * Content Repository
 * @package App\Repositories
 */
class LikeRepository implements LikeInterface
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
     * @param Model $content
     */
    public function __construct(Model $content)
    {
        $this->model = $content;
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
        $query = $model::orderBy('left_key');

        return $this->queryAll($query, $condition);
    }

    public function countNewLikes(ConditionInterface $condition)
    {

    }

    /**
     * @inheritdoc
     */
    public function save(array $data, $model = null)
    {
        if (is_null($model)) {
            $model = $this->model;
        }

        $this->setAttribute($model, $data, 'new_checked');
        $this->setAttribute($model, $data, 'comment_id');
        $this->setAttribute($model, $data, 'user_id');
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