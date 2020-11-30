<?php

namespace App\Repositories\Contracts;

interface EvaluationRepositoryInterface
{
    public function newEvaluationOrder(int $idOrder, int $idClient, array $evaluation);
    public function getEvaluationsByOrder(int $idOrder);
    public function getEvaluationsByClient(int $idClient);
    public function getEvaluationsbyId(int $id);
    public function getEvaluationsbyClientIdByOrderId(int $idOrder, int $idClient);
}
