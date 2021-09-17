<?php 

namespace App\Repositories;

use App\Repositories\Contracts\TableRepositoryInterface;
use Illuminate\Support\Facades\DB;

class TableRepository implements  TableRepositoryInterface
{
    protected $table;

    public function __construct()
    {
        $this->table = 'tables';
    }

   
    public function getAllTable($per_page)
    {
        return DB::table($this->table)->paginate($per_page);
    }

  /*  public function getTableByUuid(string $uuid)
    {
        return  DB::table($this->table)
        ->join('tenants','tenants.id', '=','tables.tenant_id')
        ->where('tenants.uuid',$uuid)
        ->select('tables.*')
        ->get();
    }
*/

    public function getTableByUuid(string $uuid)
    {    
    
        return DB::table($this->table)
                ->where('uuid', $uuid)
                ->get();
    }



}