<?php

namespace CodeDelivery\Http\Controllers\Api\Client;

use CodeDelivery\Http\Controllers\Controller;
use CodeDelivery\Repositories\OrderRepository;
use CodeDelivery\Repositories\ProductRepository;
use CodeDelivery\Repositories\UserRepository;
use CodeDelivery\Services\OrderService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use LucaDegasperi\OAuth2Server\Facades\Authorizer;

class ClientCheckoutController extends Controller
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

      public function store(Request $request){

        $data = $request->all();
          $userLoggedId = Authorizer::getResourceOwnerId();
          $client = $this->userRepository->find($userLoggedId)->client;
        $data['client_id'] = $client->id;
//          dd($data);
       $o = $this->service->create($data);

        return $this->orderRepository->with('items')->find($o->id);
    }

    public function show($id){
        $userLoggedId = Authorizer::getResourceOwnerId();
        $client = $this->userRepository->find($userLoggedId)->client;
//        dd($client);
        $clientId = $client->id;
//        $orders = $this->orderRepository->with('items','client','cupom')->scopeQuery(function ($query) use($clientId,$id){
//            return $query->where('id', '=', $id)->where('client_id', '=', $clientId);
//        })->paginate(5);
                $orders = $this->orderRepository->with(['items','client','cupom','items.product'])->find($id);
//        $orders->items->each( function ($item){
//           $item->product;
//        });
//        $price = currency_format(12.00, 'EUR');

        return $orders;
    }
     
}
