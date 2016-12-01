<?php

namespace App\Models\Traits;

/**
 * Model Trait
 * @package App\Models\Traits
 */
trait ModelsTrait
{
    /**
     * @inheritdoc
     */
    public static function getTableName()
    {
        return with(new static)->getTable();
    }
}