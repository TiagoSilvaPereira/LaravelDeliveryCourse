@extends('layouts.app')

@section('content')
<div class="container">
    
    <h3>Novo Cliente</h3>
    <br><br>

    {!! Form::open(['route' => 'admin.clients.store']) !!}
        
        @include('admin.clients.form')

        <div class="form-group">
            {!! Form::submit('Criar Cliente', ['class' => 'btn btn-primary']) !!}
        </div>
        
    {!! Form::close() !!}

</div>
@endsection