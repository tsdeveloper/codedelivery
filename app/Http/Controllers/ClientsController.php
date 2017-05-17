<?php

namespace BrindaBrasil\Http\Controllers;
use BrindaBrasil\config\App;
use BrindaBrasil\Repositories\ClientRepository;
use Illuminate\Http\Request;
use BrindaBrasil\Http\Requests;
use BrindaBrasil\Http\Controllers\Controller;
use BrindaBrasil\Http\Requests\AdminClientRequest;
class ClientsController extends Controller
{
    //
    private $_clientRepository;
    private $_categoryRepository;

    public function __construct(ClientRepository $ClientRepository) {
        $this->_clientRepository=$ClientRepository;
        
    }
    public function Index() {
    
    //   $value = config('app.locale');

    //      echo var_dump($value);
       
    //     exit;

      $user = "Visitante";
      $clients = $this->_clientRepository->paginate(5);
     
      return view('admin.clients.index', compact('clients', 'user'));

    }

    public function create() {            
         
        return view('admin.clients.create');      
    }

      public function store(AdminClientRequest $request) {


        $data = $request->all();
        $this->_clientRepository->create($data);
        return redirect()->route('admin.clients.index');
       }

       public function edit($id){        
               $product = $this->_clientRepository->find($id);
          
             $categories = $this->_categoryRepository->lists();
            // echo var_dump($categories);
            // exit;
             return view('admin.clients.edit', compact('product', 'categories'));      
        }

         public function update(AdminClientRequest $request,$id){       

            //  dd($request->all(),$id); 
            $data = $request->all();
            $this->_clientRepository->update($data,$id);
              return redirect()->route('admin.clients.index');
        }

       public function destroy($id){       

            //  dd($request->all(),$id); 
            
            $this->_clientRepository->delete($id);
              return redirect()->route('admin.clients.index');
        }

  
}
