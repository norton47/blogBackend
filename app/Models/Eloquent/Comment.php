<?php
namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Comment
 * @package App\Models
 */
class Comment extends Model
{
    use SoftDeletes;

    protected $table = 'comments';

    protected $dates = ['deleted_at'];
}