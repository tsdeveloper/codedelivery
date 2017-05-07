<?php

namespace AgendaWeb\Http\Controllers;

use AgendaWeb\Repositories\CategoriaRepository;

use Illuminate\Http\Request;

use AgendaWeb\Http\Requests;
use AgendaWeb\Http\Controllers\Controller;

class CategoriasController extends Controller
{
    //
    public function Index(CategoriaRepository $repository){
      $usuario = "Devleoper";
      $categorias = $repository->paginate(5);
      return view('admin.categorias.index',compact('categorias','usuario'));
    }
}
