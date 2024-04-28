<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'title', 'image', 'parent_id'];

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id')->withDefault(['title' => '-----']);
    }

    public function child()
    {
        return $this->hasMany(Category::class, 'parent_id')->withDefault(['title' => '-----']);
    }
}
