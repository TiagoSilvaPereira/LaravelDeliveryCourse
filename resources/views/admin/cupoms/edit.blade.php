@extends('layouts.app')

@section('content')
<div class="container">
    
    <h3>Editando Cupom: {{$cupom->code}}</h3>
    <br><br>

    {!! Form::model($cupom, ['route' => ['admin.cupoms.update', $cupom->id]]) !!}
    
        @include('admin.cupoms.form')

        <div class="form-group">
            {!! Form::submit('Salvar Cupom', ['class' => 'btn btn-primary']) !!}
        </div>
        
    {!! Form::close() !!}

</div>
@endsection