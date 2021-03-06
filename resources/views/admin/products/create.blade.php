@extends('layouts.app')

@section('content')
<div class="container">
    
    <h3>Novo Produto</h3>
    <br><br>

    {!! Form::open(['route' => 'admin.products.store']) !!}
        
        @include('admin.products.form')

        <div class="form-group">
            {!! Form::submit('Criar Produto', ['class' => 'btn btn-primary']) !!}
        </div>
        
    {!! Form::close() !!}

</div>
@endsection