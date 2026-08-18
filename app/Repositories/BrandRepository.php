<?php
namespace App\Repositories;


use App\Models\Banner;
use App\Models\Brand;

class BrandRepository{
    public function getAllBrands(){
        return Brand::withCount('products')->get();
    }
}
