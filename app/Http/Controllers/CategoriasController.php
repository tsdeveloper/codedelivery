<?php

namespace AgendaWeb\Http\Controllers;

use AgendaWeb\Repositories\CategoriaRepository;
use Illuminate\Http\Request;
use AgendaWeb\Http\Requests;
use AgendaWeb\Http\Controllers\Controller;

class CategoriasController extends Controller
{
    //
    private $repository;
    public function __construct(CategoriaRepository $repository){
        $this->repository=$repository;
    }
    public function Index(){
    
      $usuario = "Devleoper";
      $categorias = $this->repository->paginate(5);
    
      return view('admin.categorias.index',compact('categorias','usuario'));

    }

    public function create(){
    
         
      return view('admin.categorias.create');
      
    }

    public function insert(Request $request){
       $data = $request->all();
      $this->repository->create($data);

     return redirect()->route('admin.categorias.index');
    }
}
