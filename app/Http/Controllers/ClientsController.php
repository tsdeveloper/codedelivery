<?php

namespace BrindaBrasil\Http\Controllers;
use BrindaBrasil\config\App;
use BrindaBrasil\Repositories\ProductRepository;
use BrindaBrasil\Repositories\CategoryRepository;
use Illuminate\Http\Request;
use BrindaBrasil\Http\Requests;
use BrindaBrasil\Http\Controllers\Controller;
use BrindaBrasil\Http\Requests\AdminProductRequest;
class ClientsController extends Controller
{
    //
    private $_productRepository;
    private $_categoryRepository;

    public function __construct(ProductRepository $productRepository, CategoryRepository $categoryRepository) {
        $this->_productRepository=$productRepository;
        $this->_categoryRepository  = $categoryRepository;
    }
    public function Index() {
    
    //   $value = config('app.locale');

    //      echo var_dump($value);
       
    //     exit;

      $user = "Visitante";
      $products = $this->_productRepository->paginate(5);
     
      return view('admin.products.index', compact('products', 'user'));

    }

    public function create() {            
         $categories = $this->_categoryRepository->lists();
        return view('admin.products.create', compact('categories'));      
    }

      public function store(AdminProductRequest $request) {


        $data = $request->all();
        $this->_productRepository->create($data);
        return redirect()->route('admin.products.index');
       }

       public function edit($id){        
               $product = $this->_productRepository->find($id);
          
             $categories = $this->_categoryRepository->lists();
            // echo var_dump($categories);
            // exit;
             return view('admin.products.edit', compact('product', 'categories'));      
        }

         public function update(AdminProductRequest $request,$id){       

            //  dd($request->all(),$id); 
            $data = $request->all();
            $this->_productRepository->update($data,$id);
              return redirect()->route('admin.products.index');
        }

       public function destroy($id){       

            //  dd($request->all(),$id); 
            
            $this->_productRepository->delete($id);
              return redirect()->route('admin.products.index');
        }

  
}
