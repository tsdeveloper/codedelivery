<?php

namespace CodeDelivery\Http\Controllers;
use CodeDelivery\Repositories\OrderRepository;
use Illuminate\Http\Request;
class OrdersController extends Controller
{
    private $repository;
    
    public function __construct(OrderRepository $orderRepository) {
        $this->repository=$orderRepository;
    }

    public function index()
    {
        $orders = $this->repository->paginate();
        
      
        return view('admin.orders.index', compact('orders'));

    }

     public function edit($id){        
               $category = $this->repository->find($id);
           
         $categories = $this->repository->lists();   
           
             return view('admin.categories.edit', compact('category','categories'));      
        }
         public function updated(Request $request,$id){       

            $data = $request->all();
            $this->repository->update($data,$id);
              return redirect()->route('admin.categories.index');
        }
}