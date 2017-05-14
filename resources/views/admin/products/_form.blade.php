
    <div class="form-group">
     {!! Form::label('Category', 'Categorias', ['class'=>'col-md-2']) !!}
     {!! Form::select('category_id', $categories, null, ['class'=>'form-control']) !!}      
    </div>

    <div class="form-group">
     {!! Form::label('Name', 'Nome', ['class'=>'col-md-2']) !!}
     {!! Form::text('name', null, ['class'=>'form-control']) !!}      
    </div>

    <div class="form-group">
     {!! Form::label('Description', 'Descrição', ['class'=>'col-md-2']) !!}
     {!! Form::textarea('description', null, ['class'=>'form-control']) !!}      
    </div>

    <div class="form-group">
     {!! Form::label('Price', 'Preço', ['class'=>'col-md-2']) !!}
     {!! Form::text('price', null, ['class'=>'form-control']) !!}      
    </div>

    <div class="form-group">
     {!! Form::label('Barcode', 'Código de Barra', ['class'=>'col-md-2']) !!}
     {!! Form::text('barcode', null, ['class'=>'form-control']) !!}      
    </div>

    <div class="form-group">
     {!! Form::label('Qtd', 'Quantidade', ['class'=>'col-md-2']) !!}
     {!! Form::text('qtd', null, ['class'=>'form-control']) !!}      
    </div>

      <div class="form-group">
     {!! Form::label('Active', 'Quantidade', ['class'=>'col-md-2']) !!}
     {!! Form::text('active', null, ['class'=>'form-control']) !!}      
    </div>