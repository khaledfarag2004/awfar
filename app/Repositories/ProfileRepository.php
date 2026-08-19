<?php
namespace App\Repositories;


use App\Models\Banner;

class BannerRepository{
    public function getAllBanners(){
        return Banner::all();
    }
}
