<?php

namespace CodeDelivery\Http\Controllers;

use CodeDelivery\Http\Requests\CheckoutRequest;
use CodeDelivery\Repositories\OrderRepository;
use CodeDelivery\Repositories\ProductRepository;
use CodeDelivery\Repositories\UserRepository;
use CodeDelivery\Services\OrderService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
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
        $clientId = $this->userRepository->find(Auth::user()->id)->client->id;
//        dd($clientId);
        $orders = $this->orderRepository->scopeQuery(function ($query) use($clientId){
           return $query->where('client_id', '=', $clientId);
        })->paginate(5);

//        $price = currency_format(12.00, 'EUR');

        return view('customer.order.index',compact( 'orders'));

    }

    public function create(){

            $products = $this->productRepository->lists();

        return view('customer.order.create',compact( 'products'));
    }

      public function store(CheckoutRequest $request){

        $data = $request->all();

        $clientId = $this->userRepository->find(Auth::user()->id)->client->id;
        $data['client_id'] = $clientId;
        $this->service->create($data);

        return redirect()->route('customer.order.index');
    }
     
}
