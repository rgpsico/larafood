<?php

namespace App\Services;

use App\Models\Plan;
use App\Repositories\Contracts\CategoryRepositoryInterface;
use App\Repositories\Contracts\TenantRepositoryInterface;

class CategoryService
{
    private $plan, $data = [];
    protected $categoryRepository , $tenantRepository;

    public function __construct(
                                 TenantRepositoryInterface $tenantRepository ,
                                 CategoryRepositoryInterface $categoryRepository)
    {
        $this->tenantRepository = $tenantRepository;
        $this->categoryRepository = $categoryRepository;
    }

  

    public function getCategoryByUuid(string $uuid)
    {
        $tenant =   $this->tenantRepository->getTenantByUuid($uuid);

        return  $category =   $this->categoryRepository->getCategoriesByTenantId($tenant->id);
    }


    public function getAllCategory(int $per_page)
    {
        return $this->categoryRepository->getAllCategory($per_page);
    }

    public function getCategoryByUrl($per_page)
    {
        return $this->categoryRepository->getCategoryByUrl($per_page);
    }

    
}