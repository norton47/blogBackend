<?php

namespace Api\App\Contracts\Storage;

/**
 * Condition
 * @package Api\Contracts\Storage
 */
interface Condition
{
    /**
     * @param $tag
     * @param $param
     * @param $value
     * @return $this
     */
    public function addCondition($tag, $param, $value);

    /**
     * @param $param
     * @return $this
     */
    public function limit($param);

    /**
     * @return $this
     */
    public function pagination();

    /**
     * @param array $relations
     * @return $this
     */
    public function relations(array $relations);

    /**
     * @param array $scopes
     * @return $this
     */
    public function scopes(array $scopes);

    /**
     * @param array $param
     * @return mixed
     */
    public function orderBy(array $param);

    /**
     * @return integer
     */
    public function getLimit();

    /**
     * @return boolean
     */
    public function getPagination();

    /**
     * @return array
     */
    public function getScopes();

    /**
     * @return array
     */
    public function getRelations();

    /**
     * @param null $tag
     * @return array
     */
    public function getCondition($tag = null);

    /**
     * @param null $attr
     * @return mixed
     */
    public function getOrderBy($attr = null);

}
