<?php
namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\ModelsTrait;

class Category extends Model
{
    use SoftDeletes, ModelsTrait;

    protected $table = 'categories';

    protected $dates = ['deleted_at'];
}