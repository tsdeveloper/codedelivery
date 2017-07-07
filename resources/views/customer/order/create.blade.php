    @extends('app')
        @section('content')
<div class="container">
  {!! Form::open(['class'=>'form']) !!}
<div class="title"><h3>Área Administrativa de Listagem de produtos</h3></div>

<br /> 
<a href="#" class="btn btn-default">Novo Pedido</a>

<div class="table-responsive">

<table class="table table-striped table-hover">
    <thead>
   
        <tr>
            
            <th>Produto</th>
            <th>Quantidade</th>
                    </tr>
    </thead>
    <tbody>
    <tr>
            <td>
                <select class="form-control" name="items[0][product_id]" id="items[0][product_id]">
                    @foreach($products as $p)
                    <option value="{{$p->id}}" data-price="{{$p->price}}">{{$p->name}}-- {{$p->price}}</option>
                    @endforeach
                </select>
            </td>
            <td>

                {!! Form::text('items[0][qtd]', 1, ['class'=>'form-control']) !!}                
            </td>
            {{-- <a href="{{ route('admin.clients.edit',['id'=>$client->id]) }}" class="btn btn-info">Editar</a>
            <a href="#" class="btn btn-danger">Excluir</a> --}}
            </td>
        </tr>
        
    </tbody>
</table>

</div>
    
  {!! Form::close() !!}
</div>

@endsection
