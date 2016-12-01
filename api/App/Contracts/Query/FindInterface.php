<?php

namespace Api\App\Contracts\Query;

use Api\App\Contracts\Storage\Condition as ConditionInterface;

/**
 * Find Interface
 * @package Api\App\Contracts\Query
 */
interface FindInterface
{
    /**
     * Осуществляет поиск одной записи по идентификатору
     *
     * @param $id
     * @param ConditionInterface|null $condition
     * @return mixed
     */
    public function findById($id, ConditionInterface $condition = null);

    /**
     * Осуществляет поиск одной записи по условию
     *
     * @param ConditionInterface $condition
     * @return mixed
     */
    public function findOne(ConditionInterface $condition);

    /**
     * Осуществляет поиск записей по условию
     *
     * @param ConditionInterface $condition
     * @return mixed
     */
    public function findAll(ConditionInterface $condition);
}