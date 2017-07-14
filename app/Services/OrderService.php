<?php

namespace CodeDelivery\Services;



use CodeDelivery\Repositories\ClientRepository;
use CodeDelivery\Repositories\CupomRepository;
use CodeDelivery\Repositories\OrderRepository;
use CodeDelivery\Repositories\ProductRepository;
use CodeDelivery\Repositories\UserRepository;

class OrderService
{

      /**
     * @var ClientRepository
     */
    private $clientRespository;
    /**
     * @var UserRepository
     */
    private $userRepository;
    /**
     * @var OrderRepository
     */
    private $orderRepository;
    /**
     * @var CupomRepository
     */
    private $cupomRepository;
    /**
     * @var ProductRepository
     */
    private $productRepository;

    public function __construct(OrderRepository $orderRepository,
                                CupomRepository $cupomRepository,
                                ProductRepository $productRepository )
    {


        $this->orderRepository = $orderRepository;
        $this->cupomRepository = $cupomRepository;
        $this->productRepository = $productRepository;
    }
    public function update(array $data, $id)
    {
            $this->clientRespository->update($data,$id);
            $userId = $this->clientRespository->find($id, ['user_id'])->user_id;
            // dd($userId);
            
             $this->userRepository->update($data['user'],$userId);
    }

    public function store(array $data)
    {
        $data['status'] = 0;
        $user = $this->userRepository->create($data['user']);
        // dd($userId);
        // exit;        
        $data['user_id'] = $user->id;
        // dd($data);
        $this->clientRespository->create($data);
                         // dd($userId);
            
    }
}