<?php

namespace App\Models;

use App\Http\Resources\SliderResource;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'url',
        'image'
    ];

    public static function getSliders()
    {
        $sliders = Slider::query()->get();
        return SliderResource::collection($sliders);
    }
}
