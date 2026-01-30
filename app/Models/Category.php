<?php

namespace App\Models;

use App\Rules\filter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Validation\Rule;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'slug', 'description', 'parent_id', 'image'];
    public function products()
    {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }



    /**
     * Get the products for the category.
     */

    public function scopefilter(Builder $builder, $filter)
    {
        if ($filter['name'] ?? false) {
            $builder->where('name', 'like', "%{$filter['name']}%");
        }
    }



    /**
     * Get the parent category.
     */
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id', 'id');
    }
    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }
    public static function rules($id = 0)
    {
        return [
            "name" => [
                'required',

                'string',
                'min:3',
                'max:255',
                Rule::unique('categories', 'name')->ignore($id),
                new filter(['isco', 'php', 'laravel']),
            ],
            "parent_id" => [
                'nullable',
                'int',
                'exists:categories,id',
            ],
            "image" => [
                "image",
                'max:10485885',
                'dimensions:min_width=100,min_height=100',
            ],
        ];
    }
}
