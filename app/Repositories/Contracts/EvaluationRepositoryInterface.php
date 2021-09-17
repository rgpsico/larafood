<?php 

namespace App\Repositories\Contracts;

interface EvaluationRepositoryInterface
{
     public function  newEvaluationOrder(int $idOrder , $idClient , array $evaluation);
     public function  getEvaluationByOrder(int $idOrder);
     public function  getEvaluationByClient(int $idClient);
     public function  getEvaluationById(int $idClient);
     public function  getEvaluationByClientIdByOrderId(int $idOrder , int $idClient);
}