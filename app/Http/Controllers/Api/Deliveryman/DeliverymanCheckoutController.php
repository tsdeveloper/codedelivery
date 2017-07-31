<?php

namespace CodeDelivery\Http\Controllers\Api\Deliveryman;

use function abort;
use CodeDelivery\Http\Controllers\Controller;
use CodeDelivery\Repositories\OrderRepository;
use CodeDelivery\Repositories\ProductRepository;
use CodeDelivery\Repositories\UserRepository;
use CodeDelivery\Services\OrderService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use LucaDegasperi\OAuth2Server\Facades\Authorizer;

class DeliverymanCheckoutController extends Controller
{

    /**
     * @var UserRepository
     */
    private $userRepository;
    /**
     * @var OrderRepository
     */
    private $orderRepository;
    /**
     * @var ProductRepository
     */
    private $productRepository;
    /**
     * @var OrderService
     */
    private $service;
    private $with = ['items','deliveryman','cupom','items.product', 'client'];
    public function __construct(
        UserRepository $userRepository,
        OrderRepository $orderRepository,
        ProductRepository $productRepository,
        OrderService $service) {


        $this->userRepository = $userRepository;
        $this->orderRepository = $orderRepository;
        $this->productRepository = $productRepository;
        $this->service = $service;
    }

    public function  index(){
        $develiveryId = Authorizer::getResourceOwnerId();
//        dd($clientId);
        $orders = $this->orderRepository
            ->skipPresenter(false)
            ->with($this->with)
            ->scopeQuery(function ($query) use($develiveryId){
                return $query->where('status', '=', 'Pendente');
            })->paginate();

//        $price = currency_format(12.00, 'EUR');

        return $orders;

    }


    public function show($id){
        $develiveryId = Authorizer::getResourceOwnerId();


        $orders = $this->orderRepository
            ->skipPresenter(false)
            ->with($this->with)
            ->getByAndIdDeliveryman($id, $develiveryId);


        return $orders;
    }

    public function updateStatus(Request $request, $id)
    {
        $develiveryId = Authorizer::getResourceOwnerId();
        $data = $request->all();
//        dd($data);
        $orders = $this->service->updateStatus($id, $develiveryId, $request->get('status'));

        if($orders){
            return $this->orderRepository->find($orders->id);
        }
        return abort(400, 'Order não encontrado!');
    }
     
}
