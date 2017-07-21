<?php

namespace CodeDelivery\Services;



use CodeDelivery\Repositories\ClientRepository;
use CodeDelivery\Repositories\CupomRepository;
use CodeDelivery\Repositories\OrderRepository;
use CodeDelivery\Repositories\ProductRepository;
use CodeDelivery\Repositories\UserRepository;
use Illuminate\Support\Facades\DB;

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

    public function create(array $data)
    {
        DB::beginTransaction();
        try{

            $data['status'] = 0;

            if(isset($data['cupom_code'])){
                $cupom =$this->cupomRepository->findByField('code',$data['cupom_code'])->first();
                $data['cupom_id'] = $cupom->id;
                dd($data);
                $cupom->used = 1;
                $cupom->save();
                unset($data['cupom_code']);

            }
            dd($data);
            $items = $data['items'];
            unset($data['items']);

            $order = $this->orderRepository->create($data);

            $total = 0;

            foreach ($items as $item){
                $item['price']  = $this->productRepository->find($item['product_id'])->price;
                $order->items()->create($item);
                $total +=$item['price'] * $item['qtd'];
            }

            $order->total = $total;
            if(isset($cupom)){
                $order->total = $total - $cupom->value;
            }
            $order->save();
            \DB::commit();
            return $order;

        }catch (\Exception $e){
            \DB::roolback();
            throw  $e;
        }

    }
}