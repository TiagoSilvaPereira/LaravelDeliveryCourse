@extends('layouts.app')

@section('content')
<div class="container">
    
    <h3>Novo Cupom</h3>
    <br><br>

    {!! Form::open(['route' => 'admin.cupoms.store']) !!}
        
        @include('admin.cupoms.form')

        <div class="form-group">
            {!! Form::submit('Criar Cupom', ['class' => 'btn btn-primary']) !!}
        </div>
        
    {!! Form::close() !!}

</div>
@endsection