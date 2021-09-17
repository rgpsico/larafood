<?php

namespace App\Services;

use App\Models\Plan;
use App\Repositories\Contracts\ClientRepositoryInterface;
use App\Repositories\Contracts\TenantRepositoryInterface;

class ClientService
{
    private $plan, $data = [];
    protected $ClientRepository ;

    public function __construct(ClientRepositoryInterface $ClientRepository)
    {
        $this->ClientRepository = $ClientRepository;
    }

    public function createNewClient(array $data)
    {
     return   $this->ClientRepository->createNewClient($data);

       
    }

  

    public function getCategoryByUuid(string $uuid)
    {
        $tenant =   $this->tenantRepository->getTenantByUuid($uuid);

        return   $tenant;
    }



    
}