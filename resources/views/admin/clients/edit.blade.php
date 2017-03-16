@extends('layouts.app')

@section('content')
<div class="container">
    
    <h3>Editando Cliente: {{$client->name}}</h3>
    <br><br>

    {!! Form::model($client, ['route' => ['admin.clients.update', $client->id]]) !!}
    
        @include('admin.clients.form')

        <div class="form-group">
            {!! Form::submit('Salvar Cliente', ['class' => 'btn btn-primary']) !!}
        </div>
        
    {!! Form::close() !!}

</div>
@endsection