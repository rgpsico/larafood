<?php

namespace App\Services;

use App\Models\Plan;

use App\Repositories\Contracts\TableRepositoryInterface;

class TableService
{
    private $plan, $data = [];
    protected $categoryRepository , $tableRepository;

    public function __construct(TableRepositoryInterface $tableRepository)
    {
        $this->tableRepository = $tableRepository;
      
    }

  




    public function getAllTable(int $per_page)
    {
        return $this->tableRepository->getAllTable($per_page);
    }

    public function getTableByUuid($id)
    {
        return $this->tableRepository->getTableByUuid($id);
    }

    
}