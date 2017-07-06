    @extends('app')
        @section('content')
<div class="container">
            <div class="content"> 

<div class="title"><h3>Área Administrativa de Clientes</h3></div>

<br /> 
<a href=" {{ route('admin.cupoms.create') }} " class="btn btn-default">Novo Cupom</a>
<br /> 
<br /> 
<div class="table-responsive">

<table class="table table-striped table-hover">
    <thead>
   
        <tr>
            <th>ID</th>
            <th>Descrição</th>
            <th>E-mail</th>
            <th>Status</th>
            <th>Ação</th>
        </tr>
    </thead>
    <tbody>
     @foreach($cupoms as $cupom)
        <tr>
            <td>{{$cupom->id}}</td>
            <td>{{$cupom->user->name}}</td>
            <td>{{$cupom->user->email}}</td>
            <td>{{ $cupom->active=== 1 ? 'Ativo' : 'Inativo' }}</td>
            <td>
            <a href="{{ route('admin.cupoms.edit',['id'=>$cupom->id]) }}" class="btn btn-info">Editar</a>
            <a href="#" class="btn btn-danger">Excluir</a>
            </td>
        </tr>
        @endforeach 
    </tbody>
</table>

</div>
    {!! $cupoms->render() !!}

</div>
</div>
@endsection
