<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StoreEvaluationOrder;
use App\Services\EvaluationService;
use Illuminate\Http\Request;

class EvaluationApiController extends Controller
{
    protected $evaluationService;

    public function __construct(EvaluationService $evaluationService)
    {
        $this->evaluationService = $evaluationService;
    }

    public function store(StoreEvaluationOrder $request)
    {
        $data = $request->only('stars', 'comment');

        $this->evaluationService->createNewEvaluation($request->identify, $data);
    }
}
