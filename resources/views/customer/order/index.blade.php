@extends('layouts.app')

@section('content')
<div class="container">
    
    <h3>Meus Pedidos</h3><br><br>

    <a href="{{ route('customer.orders.create') }}" class="btn btn-default">Novo Pedido</a>

    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Total</th>
                <th>Status</th>
            </tr>
        </thead>

        <tbody>
            @foreach($orders as $order)
            <tr>
                <td>#{{ $order->id }}</td>
                <td>{{ $order->total }}</td>
                <td>{{ $order->status }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {!! $orders->render() !!}

</div>
@endsection