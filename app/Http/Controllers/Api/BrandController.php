<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Servce\BrandService;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    protected $brandService;
    public function __construct(BrandService $brandService){
        $this->brandService = $brandService;
    }

    public function allBrands()
    {
        $data = $this->brandService->getAllBrand();
        return response()->json([
            'success' => true,
            'message' => 'قائمة البراندات الرئيسيه',
            'data' => $data
        ]);
    }
}
