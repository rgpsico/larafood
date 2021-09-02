<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Http\Requests\Api\TableFormRequest;
use App\Http\Resources\TableResource;
use App\Services\TableService;

use Illuminate\Http\Request;

class TableApiController extends Controller
{
    protected $tableService;

   public function __construct(TableService $tableService)
   {
       $this->tableService = $tableService;
       
   }

   public function getAllTable()
   {    
        $table = $this->tableService->getAllTable(5);
        return  TableResource::collection($table);

   }

   public function show(Request $request , $url)
   {   
      
    
    if(!$table = $this->tableService->getTableByUuid($url)){
        return response()->json(['message'=>'Token Not found',404]);
     }
     return  TableResource::collection($table);

   }

  
}
