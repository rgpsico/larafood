<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEvaluationOrder;
use App\Http\Resources\EvaluationResource;
use App\Services\EvaluationService;
use Illuminate\Http\Request;

class EvaluationApiController extends Controller
{
    protected $evaluationService;
    public function __construct(EvaluationService $evaluationService)
    {
        $this->evaluationService = $evaluationService;
    }

    public function store(StoreEvaluationOrder $request )
    {
     
        $data = $request->only('stars','comment');
        $result = $this->evaluationService->createNewEvaluation($request->identifyOrder ,  $data);

        return new EvaluationResource($result);

    }
}
