<?php
namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Category;

/**
 * Post
 * @package App\Models
 */
class Post extends Model
{
    use SoftDeletes;

    /**
     * @var string
     */
    protected $table = 'posts';

    /**
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function categories()
    {
        return $this->hasOne(Category::class, 'category_id', 'id');
    }

    public function scopeCategories($query)
    {
        return $query->with(['categories']);
    }
}