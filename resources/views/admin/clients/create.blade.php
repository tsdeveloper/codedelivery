    @extends('app')
        @section('content')
<div class="container">
            <div class="content"> 

<div class="title"><h3>Novo Pedido</h3></div>
</div>
   @include('errors._check')
<br /> 
    {!! Form::open(['route'=>'admin.clients.store']) !!}

    {{-- @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif --}}
 
    {{-- @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif --}}

 <div class="form-group">
    <label>Total: </label>
    <p id="total"></p>
   {!! Form::submit('Novo Item',['class'=>'btn btn-primary']) !!}

   <div class="table-responsive">

<table class="table table-striped table-hover">
    <thead>
   
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Produto</th>
            <th>Status</th>
            <th>Ação</th>
        </tr>
    </thead>
    <tbody>
     @foreach($clients as $client)
        <tr>
            <td>{{$client->id}}</td>
            <td>{{$client->user->name}}</td>
            <td>{{$client->user->email}}</td>
            <td>{{ $client->active=== 1 ? 'Ativo' : 'Inativo' }}</td>
            <td>
            <a href="{{ route('admin.clients.edit',['id'=>$client->id]) }}" class="btn btn-info">Editar</a>
            <a href="#" class="btn btn-danger">Excluir</a>
            </td>
        </tr>
        @endforeach 
    </tbody>
</table>

 </div>


    {!! Form::close() !!}
 <div class="form-group">
<a href=" {{ route('admin.clients.index') }} " class="btn btn-default">Voltar</a>    
 </div>
</div>
@endsection
