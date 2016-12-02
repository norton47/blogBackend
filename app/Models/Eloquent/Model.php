<?php

namespace App\Models;

/**
 * Model
 * @package App\Models
 */
class Model extends \Illuminate\Database\Eloquent\Model
{
    /**
     * @inheritdoc
     */
    public static function getTableName()
    {
        return with(new static)->getTable();
    }

}
