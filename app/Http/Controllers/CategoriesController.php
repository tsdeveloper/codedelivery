<?php

namespace BrindaBrasil\Http\Controllers;

use BrindaBrasil\Repositories\CategoryRepository;
use Illuminate\Http\Request;
use BrindaBrasil\Http\Requests;
use BrindaBrasil\Http\Controllers\Controller;
use BrindaBrasil\Http\Requests\AdminCategoryRequest;
class CategoriesController extends Controller
{
    //
    private $_repository;

    public function __construct(CategoryRepository $repository) {
        $this->_repository=$repository;
    }
    public function Index() {
    
  
      $user = "Visitante";
      $categories = $this->_repository->paginate(5);
      
      return view('admin.categories.index', compact('categories', 'user'));

    }

    public function create() {            
        return view('admin.categories.create');      
    }

      public function store(AdminCategoryRequest $request) {

    //     $messages = [
    //         'required' => 'O :attribute é obrigatório.',
    //         'same'    => 'The :attribute and :other must match.',
    //         'size'    => 'The :attribute must be exactly :size.',
    //         'between' => 'The :attribute must be between :min - :max.',
    //         'min' => 'Mínimo permitido para o campo :attribute ',
    //         'in'      => 'The :attribute must be one of the following types: :values',
    //     ];

    //      $rules = [

    //     'b_name'        => 'required',
    //     'base_size'  => 'required|integer',
    //     'start_date'  => 'required|date',
    //    'end_date'    => 'required|date|after:start_date' // end date must be greater than start_date

    // ];

    // $messages = [

    //     'b_name.required' => 'please fill Broadcast Name field',
    //     'base_size.required' => 'please fill Base Size field',
    //     'base_size.integer' => 'Please insert integer',
    //     'date.required' => 'please fill Broadcast Date',
    //     'start_date.date' => 'Please insert valid start_date format',
    //     'end_date.date' => 'Please insert valid end_date format',

    // ];
// $rules = [
//     'first_name'            => 'required|alpha|min:2',
//     'last_name'             => 'required|alpha|min:2',
//     'email'                 => 'required|email|unique:users,email,' . Input::get('id') . ',id',
//     'password'              => 'alpha_num|between:6,12|confirmed',
//     'password_confirmation' => 'alpha_num|between:6,12',
//     'address'               => 'regex:/^[a-z0-9- ]+$/i|min:2',
//     'city'                  => 'alpha|min:2',
//     'state'                 => 'alpha|min:2|max:2',
//     'zip'                   => 'numeric|min:5|max:5',
//     'phone'                 => 'regex:/^\d{3}\-\d{3}\-\d{4}$/',
// ];
// $messages = [
//     'unique'        => 'The :attribute already been registered.',
//     'phone.regex'   => 'The :attribute number is invalid , accepted format: xxx-xxx-xxxx',
//     'address.regex' => 'The :attribute format is invalid.',
// ];
    // $messsages = array(
    //     'email.required'=>'You cant leave Email field empty',
    //     'name.required'=>'You cant leave name field empty',
    //             'name.min'=>'The field has to be :min chars long',
    // );

    // $rules = array(
    //     'email'=>'required|unique:content',
    //     'name'=>'required|min:3',
    // );

    // $validator = Validator::make(Input::all(), $rules,$messsages);

    // $validation = \Illuminate\Support\Facades\Validator::make($request->all(), $rules, $messages );
    // $validation->setAttributeNames(['b_name' => 'broadcast']);

    //    if ($validation->passes()) {

    //    }

    //     $validator = Validator::make($request->all(),$messages);

    //     if ($validator->fails()) {
    //     return redirect()->route('admin.categories.create')
    //                 ->withErrors($validator)
    //                 ->withInput();
    //     }

        $data = $request->all();
        $this->_repository->create($data);
        return redirect()->route('admin.categories.index');
    }

       public function edit($id){        
               $category = $this->_repository->find($id);
            //    echo var_dump($category);
            //    exit;
             return view('admin.categories.edit', compact('category'));      
        }

         public function update(AdminCategoryRequest $request,$id){       

            //  dd($request->all(),$id); 
            $data = $request->all();
            $this->_repository->update($data,$id);
              return redirect()->route('admin.categories.index');
        }

  
}
