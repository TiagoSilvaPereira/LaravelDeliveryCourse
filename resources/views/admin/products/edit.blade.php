@extends('layouts.app')

@section('content')
<div class="container">
    
    <h3>Editando Produto: {{$product->name}}</h3>
    <br><br>

    {!! Form::model($product, ['route' => ['admin.products.update', $product->id]]) !!}
    
        @include('admin.products.form')

        <div class="form-group">
            {!! Form::submit('Salvar Produto', ['class' => 'btn btn-primary']) !!}
        </div>
        
    {!! Form::close() !!}

</div>
@endsection