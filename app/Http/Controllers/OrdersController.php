<?php
namespace CodeDelivery\Http\Controllers;
use CodeDelivery\Models\Order;
use CodeDelivery\Repositories\Criteria\MyCriteria;
use CodeDelivery\Repositories\OrderRepository;
use Illuminate\Http\Request;
use CodeDelivery\Repositories\UserRepository;
use CodeDelivery\Repositories\RoleRepository;
use CodeDelivery\Models\User;
class OrdersController extends Controller
{
    private $repository;
    // private $user;

    public function __construct(OrderRepository $orderRepository)
    {
        $this->repository = $orderRepository;
        // $this->user = $userRepository;
    }

    public function index()
    {
        $orders = $this->repository->paginate();


        return view('admin.orders.index', compact('orders'));

    }

    public function edit($id,UserRepository $userRepository)
    {
//        $userRepository->pushCriteria(new MyCriteria());
        $order = $this->repository->find($id);
        $deliverymans = User::with(['roles' => function($q){
            $q->where('role_id', 2);
        }])->whereHas('roles', function($query) {
            $query->where('role_id', 2);
        })->lists('name','id');
//       $deliverymans =  $userRepository->with(['roles'])->lists(); // ??? }])->paginate();
        $statusOrder = Order::getEnumValues('Orders','status');
//        dd($statusOrder);
        return view('   admin.orders.edit', compact('order','deliverymans','statusOrder'));
    }
    public function update(Request $request, $id)
    {

        $data = $request->all();
//        dd($data,$id);
        $this->repository->update($data, $id);
        return redirect()->route('admin.orders.index');
    }
}