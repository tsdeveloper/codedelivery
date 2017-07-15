<?php

namespace CodeDelivery\Http\Controllers;


use CodeDelivery\Services\OrderService;
use Illuminate\Http\Request;
use CodeDelivery\Http\Requests;
use CodeDelivery\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Prettus\Validator\Exceptions\ValidatorException;
use Prettus\Validator\Contracts\ValidatorInterface;
use CodeDelivery\Repositories\UserRepository;
use CodeDelivery\Repositories\OrderRepository;
use CodeDelivery\Repositories\ProductRepository;
use function redirect;

class CheckoutController extends Controller
{
    //
    private $_userRepository;
    private $_orderRepository;
    private $_productRepository;
    /**
     * @var OrderService
     */
    private $service;

    public function __construct(
        UserRepository $userRepository,
        OrderRepository $orderRepository,
        ProductRepository $productRepository,
        OrderService $service) {
        $this->_userRepository=$userRepository;
        $this->_orderRepository=$orderRepository;
        $this->_productRepository=$productRepository;
        $this->service = $service;
    }

    public function  index(){
        $clientId = $this->_userRepository->find(Auth::user()->id)->client->id;
        $orders = $this->_orderRepository->scopeQuery(function ($query) use($clientId){
           return $query->where('client_id', '=', $clientId);
        })-paginate(5);

        $price = currency_format(12.00, 'EUR');
        dd($price);
        return view('customer.order.index',compact( '$orders'));

    }

    public function create(){

            $products = $this->_productRepository->lists();

        return view('customer.order.create',compact( 'products'));
    }

      public function store(Request $request){

        $data = $request->all();

        $clientId = $this->_userRepository->find(Auth::user()->id)->client->id;
        $data['client_id'] = $clientId;
        $this->service->create($data);

        return redirect()->route('customer.order.index');
    }
     
}
