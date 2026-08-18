<?php
namespace App\Servce;


use App\Models\Banner;
use App\Repositories\BannerRepository;

class BannerService{
    protected $bannerRepo;
    public function __construct(BannerRepository $bannerRepo){
        $this->bannerRepo = $bannerRepo;
    }
    public function getAllBanners(){
        return $this->bannerRepo->getAllBanners();
    }
}
