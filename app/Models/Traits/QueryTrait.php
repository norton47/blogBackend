<?php

namespace App\Models\Traits;

use Api\App\Contracts\Storage\Condition as ConditionInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * Query Trait
 * @package App\Models\Traits
 */
trait QueryTrait
{
    /**
     * Осуществляет проверку условия по наличию $scope
     * и модифицирует $query на основе $scope
     *
     * @param Builder $query
     * @param ConditionInterface $condition
     * @param $scope
     */
    public function queryScope(Builder $query, ConditionInterface $condition, $scope)
    {
        $scopes = $condition->getScopes();
        if ($scopes && in_array($scope, $scopes)) {
            $query->$scope();
        }
    }

    /**
     * Осуществляет проверку условия по наличию $tag
     * и модифицирует $query на основе $condition
     *
     * @param Builder $query
     * @param ConditionInterface $condition
     * @param $tag
     */
    public function queryCondition(Builder $query, ConditionInterface $condition, $tag)
    {
        $_condition = $condition->getCondition($tag);
        if ($_condition) {
            if (count($_condition) === 3) {
                $query->where($_condition[0], $_condition[1], $_condition[2]);
            } else {
                $field = key($_condition);
                if (isset($_condition[$field]) && is_array($_condition[$field])) {
                    $query->whereIn($field, $_condition[$field]);
                } else {
                    $query->where($_condition);
                }
            }
        }
    }

    /**
     * Исходя из $condition модифицирует $query и возвращает
     * нескольких записей
     *
     * @param Builder $query
     * @param ConditionInterface $condition
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator|\Illuminate\Database\Eloquent\Collection|
     */
    public function queryAll(Builder $query, ConditionInterface $condition = null)
    {
        if (!is_null($condition)) {
            if ($condition->getPagination()) {
                return $query->paginate($condition->getLimit());
            }
            if ($condition->getLimit()) {
                $query->take($condition->getLimit());
            }
        }
        return $query->get();
    }

    /**
     * Возвращает одну запись
     *
     * @param Builder $query
     * @return Model|null|static
     */
    public function queryOne(Builder $query)
    {
        return $query->first();
    }

    /**
     * Модифицирует $model добавляя новый $attribute из $data, при условии
     * что он не изменился
     *
     * @param Model $model
     * @param array $data
     * @param $attribute
     */
    public function setAttribute(Model $model, array $data, $attribute)
    {
        if (isset($data[$attribute]) && $model->$attribute !== $data[$attribute]) {
            $model->$attribute = $data[$attribute];
        }
    }
}