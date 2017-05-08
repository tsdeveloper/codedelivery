    @extends('app')
        @section('content')
<div class="container">
            <div class="content"> 

<div class="title"><h3>Nova Categorias</h3></div>
</div>
<br /> 
    {!! Form::open(['route'=>'admin.categorias.insert']) !!}

    <div class="form-group">
     {!! Form::label('','Descrição',['class'=>'col-md-2']) !!}
     {!! Form::text('',<nul></nul>l,['class'=>'form-control']) !!}      
    </div>

 <div class="form-group">
<a href=" {{ route('admin.categorias.index') }} " class="btn btn-default">Voltar</a>    
 </div>
    {!! Form::close() !!}

</div>
@endsection
