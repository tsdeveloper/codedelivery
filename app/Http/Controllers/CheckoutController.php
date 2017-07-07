<?php

namespace CodeDelivery\Http\Controllers;


use Illuminate\Http\Request;
use CodeDelivery\Http\Requests;
use CodeDelivery\Http\Controllers\Controller;
use Prettus\Validator\Exceptions\ValidatorException;
use Prettus\Validator\Contracts\ValidatorInterface;
use CodeDelivery\Repositories\UserRepository;
use CodeDelivery\Repositories\OrderRepository;
use CodeDelivery\Repositories\ProductRepository;

class CheckoutController extends Controller
{
    //
    private $_userRepository;
    private $_orderRepository;
    private $_productRepository;

    public function __construct(
        UserRepository $userRepository,
        OrderRepository $orderRepository,
        ProductRepository $productRepository) {
        $this->_userRepository=$userRepository;
        $this->_orderRepository=$orderRepository;
        $this->_productRepository=$productRepository;
    }

    public function create(){

        $products = $this->_productRepository->lists();

        return view('customer.order.create',compact('products'));
    }
     
}
