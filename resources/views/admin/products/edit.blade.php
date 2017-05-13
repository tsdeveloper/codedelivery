    @extends('app')
        @section('content')
<div class="container">
            <div class="content"> 

<div class="title"><h3>Editando o produto <strong>{{ $category->name }}</strong></h3></div>
</div>
<br /> 
    
    @include('errors._check')
    {!! Form::model($category,['route'=>['admin.products.update',$category->id]]) !!}
   
 <div class="form-group">
{!! Form::submit('Atualizar produto',['class'=>'btn btn-primary']) !!}
 </div>
    {!! Form::close() !!}
 <div class="form-group">
<a href=" {{ route('admin.products.index') }} " class="btn btn-default">Voltar</a>    
 </div>
</div>
@endsection
