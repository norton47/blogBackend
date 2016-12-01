<?php

namespace Api\App\Storage;

/**
 * Condition
 * @package Api\App\Storage
 */
class Condition implements \Api\App\Contracts\Storage\Condition
{
    protected $conditions = [];
    protected $limit = 25;
    protected $pagination = false;
    protected $all = false;
    protected $relations = [];
    protected $scopes = [];
    protected $orderBy = [];

    /**
     * @inheritdoc
     */
    public function addCondition($tag, $param, $value)
    {
        if (isset($this->conditions[$tag])) {
            throw new \ErrorException('Tag "' . $tag . '" already exists in conditions list');
        }

        $attr = $param;
        $operator = null;

        if (strripos($param, ' ') !== false) {
            $combinationParam = explode(' ', $param);
            $attr = isset($combinationParam[0]) ? $combinationParam[0] : null;
            $operator = isset($combinationParam[1]) ? $combinationParam[1] : null;
        }

        if (!is_null($operator)) {
            $this->conditions[$tag] = [$attr, $operator, $value];
        } else {
            $this->conditions[$tag] = [$attr => $value];
        }

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function limit($param)
    {
        if ($param) {
            $this->limit = is_numeric($param) ? (int)$param : $this->limit;
        } else {
            $this->limit = null;
        }
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function pagination()
    {
        $this->pagination = true;
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function relations(array $relations)
    {
        $this->relations = array_unique($relations);
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function scopes(array $scopes)
    {
        $this->scopes = $scopes;
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function orderBy(array $order)
    {
        $this->orderBy = array_unique($order);
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getLimit()
    {
        return $this->limit;
    }

    /**
     * @inheritdoc
     */
    public function getPagination()
    {
        return $this->pagination;
    }

    /**
     * @inheritdoc
     */
    public function getScopes()
    {
        return $this->scopes;
    }

    /**
     * @inheritdoc
     */
    public function getRelations()
    {
        return $this->relations;
    }

    /**
     * @inheritdoc
     */
    public function getCondition($tag = null)
    {
        if (is_null($tag)) {
            return $this->conditions;
        }

        if (isset($this->conditions[$tag])) {
            return $this->conditions[$tag];
        }

        return null;
    }

    /**
     * @inheritdoc
     */
    public function getOrderBy($attr = null)
    {
        if (is_null($attr)) {
            return $this->orderBy;
        }

        if (isset($this->orderBy[$attr])) {
            return $this->orderBy[$attr];
        }

        return null;
    }
}