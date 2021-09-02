<?php 

namespace App\Repositories\Contracts;

interface CategoryRepositoryInterface
{
    public function  getAllCategory(int $per_page);
    public function  getCategoryByTenantUuid(string $uuid);
    

    public function  getCategoriesByTenantId(int $id);
    public function  getCategoryByUrl(int $id);
}