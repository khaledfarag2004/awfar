<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Services\BannerService;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    protected $bannerServices;
    public function __construct(BannerService $bannerServices){
        $this->bannerServices = $bannerServices;
    }
    public function allBanners()
    {
        $data = $this->bannerServices->getAllBanners();
        return response()->json([
            'success' => true,
            'message' => 'جميع البانرات',
            'data' => $data,
        ]);
    }
}
