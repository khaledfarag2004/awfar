<?php
namespace App\Servce;

use App\Models\Category;
use App\Repositories\CategoryRepository;

class CategoryService {
    protected $categoryRepo;
    public function __construct(CategoryRepository $categoryRepo){
        $this->categoryRepo = $categoryRepo;
    }
    public function getAllCategories(){
        return $this->categoryRepo->getAllCategories();
    }
}
