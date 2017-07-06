<?php
namespace CodeDelivery\Http\Controllers;
use CodeDelivery\Repositories\Criteria\MyCriteria;
use CodeDelivery\Repositories\CupomRepository;
use Illuminate\Http\Request;
use CodeDelivery\Models\User;
class CupomsController extends Controller
{
    private $repository;
    // private $user;

    public function __construct(CupomRepository $cupomRepository)
    {
        $this->repository = $cupomRepository;
        // $this->user = $userRepository;
    }

    public function index()
    {
        $cupoms = $this->repository->paginate();


        return view('admin.cupoms.index', compact('cupoms'));

    }

    public function create() {            
         
        return view('admin.cupoms.create');      
    }

      public function store(AdminCupomRequest $request) {


        $data = $request->all();
        $this->_clientService->store($data);
        return redirect()->route('admin.cupoms.index');
       }

    public function edit($id,UserRepository $userRepository)
    {
//        $userRepository->pushCriteria(new MyCriteria());
        $cupom = $this->repository->find($id);
        $deliverymans = User::with(['roles' => function($q){
            $q->where('role_id', 2);
        }])->whereHas('roles', function($query) {
            $query->where('role_id', 2);
        })->lists('name','id');
//       $deliverymans =  $userRepository->with(['roles'])->lists(); // ??? }])->paginate();
        $statusOrder = Order::getEnumValues('Orders','status');
//        dd($statusOrder);
        return view('   admin.cupoms.edit', compact('cupom','deliverymans','statusOrder'));
    }
    public function update(Request $request, $id)
    {

        $data = $request->all();
//        dd($data,$id);
        $this->repository->update($data, $id);
        return redirect()->route('admin.cupoms.index');
    }
}