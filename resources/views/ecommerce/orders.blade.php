@extends('layout.layout')

@section('title','Ordenes')

@section('content')
<table id="orderTable" class="display">
    <thead>
        <tr>
            <th>Order No.</th>
            <th>Nombre</th>
            <th>Fecha de creacion</th>
            <th>Precio</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($orders as $o)
            <tr>
                <td>{{$o->order_no}}</td>
                <td>{{$o->product_name}}</td>
                <td>{{$o->created_at}}</td>
                <td>{{$o->price}}</td>
                <td>{{$o->status}}</td>
            </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th></th>
            <th></th>
            <th></th>
            <th>Ventas aprobadas:</th>
            <th id="totalApprovedSales">0</th>
        </tr>
        <tr>
            <th></th>
            <th></th>
            <th></th>
            <th>Total Precio Ventas Aprobadas:</th>
            <th id="totalPriceApprovedSales">0.00</th>
        </tr>
    </tfoot>
</table>

<script>
    $(document).ready(function() {
        var table = $('#orderTable').DataTable({
            "footerCallback": function (row, data, start, end, display) {
                var api = this.api();

                var approvedSalesCount = api
                    .column(4)
                    .data()
                    .toArray()
                    .filter(function (value) {
                        return value === 'approved';
                    })
                    .length;

                var approvedSalesTotal = api
                    .column(3, { search: 'applied' })
                    .data()
                    .toArray()
                    .reduce(function (a, b) {
                        return parseFloat(a) + parseFloat(b);
                    }, 0);

                $('#totalApprovedSales').html(approvedSalesCount);
                $('#totalPriceApprovedSales').html(approvedSalesTotal.toFixed(2));
            }
        });
    });
</script>

@endsection
