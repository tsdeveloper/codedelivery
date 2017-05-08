    @extends('app')
        @section('content')
<div class="container">
            <div class="content"> 

            <br/>
<span class="col-md-4 control-label">Seja bem Vindo <strong>{{$usuario}}</strong></span>
<br />

<div class="title"><h3>Área Administrativa de Categorias</h3></div>

<br /> 
<a href=" {{ route('admin.categorias.create') }} " class="btn btn-default">Nova Categoria</a>
<br /> 
<br /> 
<table class="table table-striped">
    <thead>
   
        <tr>
            <th>ID</th>
            <th>Descrição</th>
            <th>Ação</th>
        </tr>
    </thead>
    <tbody>
     @foreach($categorias as $categoria)
        <tr>
            <td>{{$categoria->id}}</td>
            <td>{{$categoria->descricao}}</td>
            <td>
            <a href="#" class="btn btn-info">Editar</a>
            <a href="#" class="btn btn-danger">Excluir</a>
            </td>
        </tr>
        @endforeach 
    </tbody>
</table>
    {!! $categorias->render() !!}

</div>
</div>
@endsection
