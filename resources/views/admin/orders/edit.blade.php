    @extends('app')
        @section('content')
<div class="container">
            <div class="content"> 

<div class="title "><h3>Editando o Pedido <strong><span class="text-success">{{$order->id}} - </strong></span><strong><span class="text-success">[{{$order->client->user->name}}]</span></strong></h3></div></div><br /> 
    {!! Form::model($order,['route'=>['admin.orders.update',$order->client->user->id]]) !!}

    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    
  @include('admin.orders._form')

 
 <div class="form-group">
{!! Form::submit('Atualizar Pedido',['class'=>'btn btn-primary']) !!}
 </div>
    {!! Form::close() !!}
 <div class="form-group">
<a href=" {{ route('admin.orders.index') }} " class="btn btn-default">Voltar</a>    
 </div>
</div>
@endsection
