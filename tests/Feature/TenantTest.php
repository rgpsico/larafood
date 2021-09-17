<?php

namespace Tests\Feature;

use App\Models\Tenant;
use Carbon\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TenantTest extends TestCase
{

    /**
     * A Get App Tenants
     *
     * @return void
     */
    public function testGetAllTenants()
    {
        Tenant::factory(2)    
        ->create();

        $response = $this->get('/api/v1/tenants');      
        $response->assertStatus(200);
    }
}
