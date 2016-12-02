<?php
namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Like
 * @package App\Models
 */
class Like extends Model
{
    use SoftDeletes;

    protected $table = 'likes';

    protected $dates = ['deleted_at'];
}