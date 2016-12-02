<?php
namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Category
 * @package App\Models
 */
class Category extends Model
{
    use SoftDeletes;

    protected $table = 'categories';

    protected $dates = ['deleted_at'];
}