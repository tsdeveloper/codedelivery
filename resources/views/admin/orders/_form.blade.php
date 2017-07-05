
    {{-- <div class="form-group">
     {!! Form::label('User', 'Usuários', ['class'=>'col-md-2']) !!}
     {!! Form::select('user_id', $users, null, ['class'=>'form-control']) !!}      
    </div> --}}
<section id='section-register'>
    <h3>Dados de Cadastro</h3>
     <div class="form-group">
     {!! Form::label('Name','Nome Cliente',['class'=>'col-md-2']) !!}
     {!! Form::text('user[name]',null,['class'=>'form-control']) !!}      
    </div>
    
    <div class="form-group">
     {!! Form::label('Address','Endereço',['class'=>'col-md-2']) !!}
     {!! Form::text('client[address]',null,['class'=>'form-control']) !!}      
    </div>

    <div class="form-group">
     {!! Form::label('Zipcode','Cep',['class'=>'col-md-2']) !!}
     {!! Form::text('zipcode',null,['class'=>'form-control']) !!}      
    </div>

    <div class="form-group">
     {!! Form::label('Phone','Telefone',['class'=>'col-md-2']) !!}
     {!! Form::text('phone',null,['class'=>'form-control']) !!}      
    </div>

    <div class="form-group">
     {!! Form::label('City','Cidade',['class'=>'col-md-2']) !!}
     {!! Form::text('city',null,['class'=>'form-control']) !!}      
    </div>

    <div class="form-group">
     {!! Form::label('State','UF',['class'=>'col-md-2']) !!}
     {!! Form::text('state',null,['class'=>'form-control']) !!}      
    </div>
    </section>

    <section id='section-access'>
        <h3>Dados de acesso</h3>
    <div class="form-group">
     {!! Form::label('User[email]','Login',['class'=>'col-md-2']) !!}
     {!! Form::email('user[email]',null,['class'=>'form-control']) !!}      
    </div>
{{-- 
    <div class="form-group">
     {!! Form::label('User[password]','Senha',['class'=>'col-md-2']) !!}
     {!! Form::text('user[password]',null,['class'=>'form-control']) !!}      
    </div> --}}

    </section>