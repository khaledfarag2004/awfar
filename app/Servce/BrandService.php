<?php
namespace App\Servce;


use App\Models\Banner;
use App\Repositories\BannerRepository;
use App\Repositories\BrandRepository;

class BrandService{
    protected $brandRepo;
    public function __construct(BrandRepository $brandRepo){
        $this->brandRepo = $brandRepo;
    }
    public function getAllBrand(){
        return $this->brandRepo->getAllBrands();
    }
}
