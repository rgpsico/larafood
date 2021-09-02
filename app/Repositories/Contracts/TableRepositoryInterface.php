<?php 

namespace App\Repositories\Contracts;

interface TableRepositoryInterface
{
    public function  getAllTable(int $per_page);
    public function  getTableByUuid(string $uuid);
}