@extends('layouts.app')

@section('content')
<div class="container">
    
    <h3>Clientes</h3>
    
    <br>
    <a href="{{ route('admin.clients.create') }}" class="btn btn-default">Novo Cliente</a>
    <br><br>

    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Ação</th>
            </tr>
        </thead>

        <tbody>
            @foreach($clients as $client)
            <tr>
                <td>{{ $client->id }}</td>
                <td>{{ $client->user->name }}</td>
                <td>{{ $client->user->email }}</td>
                <td>
                    <a class="btn btn-default btn-small" href="{{ route('admin.clients.edit', ['id' => $client->id]) }}">Editar</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {!! $clients->render() !!}

</div>
@endsection