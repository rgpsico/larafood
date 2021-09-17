<?php 

namespace App\Repositories;

use App\Models\Evaluation;
use App\Repositories\Contracts\EvaluationRepositoryInterface;


class EvaluationRepository implements EvaluationRepositoryInterface
{
    protected $entity;

    public function __construct(Evaluation $evaluation)
    {
        $this->entity = $evaluation;
        
    }
    public function  newEvaluationOrder(int $idOrder , $idClient , array $evaluation)
    {
        
        $data = [
            'client_id' => $idClient,
            'order_id' => $idOrder , 
            'stars' => $evaluation['stars'],
            'comment' => isset($evaluation['comment']) ? $evaluation['comment'] : '',
        ];


        return $this->entity->create($data);

    }
    public function  getEvaluationByOrder(int $idOrder)
    {
        return  $this->entity->where('order_id',$idOrder)->get();

    }
    public function  getEvaluationByClient(int $idClient)
    {
        return  $this->entity->where('client_id',$idClient)->get();
    }


    public function  getEvaluationById(int $id)
    {
        return  $this->entity->find($id)->get();
    }

    public function  getEvaluationByClientIdByOrderId(int $idOrder , int $idClient)
    {
        return  $this->entity
                ->where('client_id',$idClient)
                ->where('order_id',$idOrder)
                ->first();
    }

}