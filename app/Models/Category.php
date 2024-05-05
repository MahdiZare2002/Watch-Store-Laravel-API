<?php

namespace App\Models;

use App\Http\Resources\CategoryResource;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'image', 'parent_id'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id')->withDefault(['title' => '-----']);
    }

    public function child()
    {
        return $this->hasMany(Category::class, 'parent_id')->withDefault(['title' => '-----']);
    }

    public static function getAllCategories()
    {
        $categories = self::query()->get();
        return CategoryResource::collection($categories);
    }
}
