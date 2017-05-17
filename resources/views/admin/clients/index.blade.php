    @extends('app')
        @section('content')
<div class="container">
            <div class="content"> 

<div class="title"><h3>Área Administrativa de Clientes</h3></div>

<br /> 
<a href=" {{ route('admin.clients.create') }} " class="btn btn-default">Nova Categoria</a>
<br /> 
<br /> 
<div class="table-responsive">

<table class="table table-striped table-hover">
    <thead>
   
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
     @foreach($clients as $client)
        <tr>
            <td>{{$client->id}}</td>
            <td>{{$client->user->name}}</td>
            <td>
            <a href="{{ route('admin.clients.edit',['id'=>$client->id]) }}" class="btn btn-info">Editar</a>
            <a href="#" class="btn btn-danger">Excluir</a>
            </td>
        </tr>
        @endforeach 
    </tbody>
</table>

</div>
    {!! $clients->render() !!}

</div>
</div>
@endsection
