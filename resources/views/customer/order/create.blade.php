@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Novo Pedido</h3>

        {!! Form::open(['route' => 'customer.orders.store', 'class' => 'form']) !!}
        
        <div class="form-group">
            <label>Total: <span id="total"></span></label><br>
            <a href="#" class="btn btn-default" id="buttonNewItem">Novo Item</a>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Produto</th>
                        <th>Quantidade</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <select class="form-control" name="items[0][product_id]">
                                @foreach($products as $product)
                                    <option value="{{ $product->id }}" data-price="{{ $product->price }}" >{{ $product->name }} - R$ {{ $product->price }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            {!! Form::text('items[0][qtd]', '1', ['class' => 'form-control']) !!}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        <div class="form-group">
            {!! Form::submit('Criar Pedido', ['class' => 'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}

    </div>
@endsection

@section('scripts')
<script>

    $('#buttonNewItem').click(function(){

        var row = $('table tbody > tr:last'),
            newRow = row.clone(),
            length = $('table tbody tr').length;

        newRow.find('td').each(function() {

            var td = $(this),
                input = td.find('input,select'),
                name = input.attr('name');

            input.attr('name', name.replace((length - 1) + '', length + ''));

        });

        newRow.find('input').val(1);
        newRow.insertAfter(row);

        calculateTotal();
    });

    $(document.body).on('click', 'select', function() {
        calculateTotal();
    });

    $(document.body).on('blur', 'input', function() {
        calculateTotal();
    });

    function calculateTotal() {
        var total = 0,
            trLength = $('table tbody tr').length,
            tr = null,
            price,
            qtd;

        for(var i=0; i < trLength; i++) {
            tr = $('table tbody tr').eq(i);
            price = tr.find(':selected').data('price');
            qtd = tr.find('input').val();
            total += price * qtd;
        }

        $('#total').html(total);
    }

</script>
@endsection