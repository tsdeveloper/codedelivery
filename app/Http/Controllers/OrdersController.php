<?php
namespace CodeDelivery\Http\Controllers;
use CodeDelivery\Repositories\Criteria\MyCriteria;
use CodeDelivery\Repositories\OrderRepository;
use Illuminate\Http\Request;
use CodeDelivery\Repositories\UserRepository;
use CodeDelivery\Repositories\RoleRepository;
use CodeDelivery\Models\User;
class OrdersController extends Controller
{
    private $repository;
    private $user;

    public function __construct(OrderRepository $orderRepository,UserRepository $userRepository)
    {
        $this->repository = $orderRepository;
        $this->user = $userRepository;
    }

    public function index()
    {
        $orders = $this->repository->paginate();


        return view('admin.orders.index', compact('orders'));

    }

    public function edit($id)
    {
        $this->user->pushCriteria(new MyCriteria());
        $order = $this->repository->find($id);
        // $user_model = new User();
       $deliverymans =  $this->user->lists(); // ??? }])->paginate();
        // dd($deliverymans);
        return view('admin.orders.edit', compact('order','deliverymans'));
    }
    public function updated(Request $request, $id)
    {

        $data = $request->all();
        $this->repository->update($data, $id);
        return redirect()->route('admin.orders.index');
    }
}