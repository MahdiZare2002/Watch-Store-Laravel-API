<?php

namespace App\Models;

use App\Http\Resources\BrandResource;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'image'
    ];

    public static function createBrand($request)
    {
        Brand::query()->create([
            'title' => $request->input('title'),
            'image' => ''
        ]);
    }


    public static function getAllBrands()
    {
        $brands = self::query()->get();
        return BrandResource::collection($brands);
    }
}
