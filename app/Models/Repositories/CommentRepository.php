<?php

namespace App\Repositories;

use Api\App\Contracts\Entities\CommentRepository as CommentInterface;
use Api\App\Contracts\Storage\Condition as ConditionInterface;
use Illuminate\Database\Eloquent\Model;
use \App\Models\Traits\QueryTrait;

/**
 * Content Repository
 * @package App\Repositories
 */
class CommentRepository implements CommentInterface
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
     * @param $id
     * @param ConditionInterface|null $condition
     * @return mixed
     */
    public function findById($id, ConditionInterface $condition = null)
    {
        $model = $this->model;
        $query = $model::where('id', $id);

        return $this->queryOne($query);
    }

    /**
     * @param ConditionInterface $condition
     * @return mixed
     */
    public function findOne(ConditionInterface $condition)
    {
        $model = $this->model;
        $query = $model::orderBy('created_at');

        return $this->queryOne($query);
    }


    /**
     * @param ConditionInterface $condition
     * @return mixed
     */
    public function findAll(ConditionInterface $condition)
    {
        $model = $this->model;
        $query = $model::orderBy('created_at');

        return $this->queryAll($query, $condition);
    }

    public function countNewComments(ConditionInterface $condition = null)
    {
        $model = $this->model;
        $query = $model::where('new_checked', null);

        return $query->count();
    }

    /**
     * @inheritdoc
     */
    public function save(array $data, $model = null)
    {
        if (is_null($model)) {
            $model = $this->model;
        }

        $this->setAttribute($model, $data, 'content');
        $this->setAttribute($model, $data, 'post_id');
        $this->setAttribute($model, $data, 'user_id');
        $this->setAttribute($model, $data, 'new_checked');
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