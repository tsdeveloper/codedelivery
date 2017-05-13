    @extends('app')
        @section('content')
<div class="container">
            <div class="content"> 

<div class="title"><h3>Nova Categorias</h3></div>
</div>
<br /> 
    @include('errors._check')
    {!! Form::open(['route'=>'admin.categories.store']) !!}

    
    @include('admin.categories._form')

 <div class="form-group">
{!! Form::submit('Criar categoria',['class'=>'btn btn-primary']) !!}
 </div>
    {!! Form::close() !!}
 <div class="form-group">
<a href=" {{ route('admin.categories.index') }} " class="btn btn-default">Voltar</a>    
 </div>
</div>
@endsection
