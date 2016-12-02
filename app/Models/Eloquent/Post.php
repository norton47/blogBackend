<?php
namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Post
 * @package App\Models
 */
class Post extends Model
{
    use SoftDeletes;

    protected $table = 'posts';

    protected $dates = ['deleted_at'];
}