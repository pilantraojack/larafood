<?php

namespace App\Services;

use App\Repositories\Contracts\EvaluationRepositoryInterface;
use App\Repositories\Contracts\OrderRepositoryInterface;

class EvaluationService
{
    protected $evaluationRepository, $orderRepository;

    public function __construct(
        EvaluationRepositoryInterface $evaluation,
        OrderRepositoryInterface $orderRepository
    ) {
        $this->evaluationRepository = $evaluation;
        $this->orderRepository = $orderRepository;
    }

    public function createNewEvaluation(string $identifyOrder, string $comment = '')
    {
        $clientId = $this->getIdClient();
        $order = $this->orderRepository->getOrderByIdentify($identifyOrder);

        return $this->evaluationRepository->newEvaluationOrder($order->id, $clientId);

    }

    private function getIdClient()
    {
        return auth()->user()->id;
    }


}
