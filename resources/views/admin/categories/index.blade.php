@extends('layouts.app')

@section('content')
<div class="container">
    
    <h3>Categorias</h3>
    
    <br>
    <a href="{{ route('admin.categories.create') }}" class="btn btn-default">Nova Categoria</a>
    <br><br>

    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Ação</th>
            </tr>
        </thead>

        <tbody>
            @foreach($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>
                    <a class="btn btn-default btn-small" href="{{ route('admin.categories.edit', ['id' => $category->id]) }}">Editar</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {!! $categories->render() !!}

</div>
@endsection