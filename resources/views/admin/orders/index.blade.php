@extends('layouts.app')

@section('content')
<div class="container">
    
    <h3>Pedidos</h3>

    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Itens</th>
                <th>Total</th>
                <th>Status</th>
                <th>Entregador</th>
                <th>Data</th>
                <th>Ação</th>
            </tr>
        </thead>

        <tbody>
            @foreach($orders as $order)
            <tr>
                <td>#{{ $order->id }}</td>
                <td>
                    <ul>
                    @foreach($order->items as $item)
                        <li>{{ $item->product->name }}</li>
                    @endforeach
                    </ul>
                </td>
                <td>{{ $order->total }}</td>
                <td>{{ $order->status }}</td>
                <td>
                    @if($order->deliveryMan)
                        {{ $order->deliveryMan->name }}
                    @else
                        --
                    @endif
                </td>
                <td>{{ $order->created_at }}</td>
                <td>
                    <a class="btn btn-default btn-small" href="{{ route('admin.orders.edit', ['id' => $order->id]) }}">Editar</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {!! $orders->render() !!}

</div>
@endsection