@extends('dashboard.admin-layout')
@section('title', 'MultiShop - Admin Pannel')

@section('content')
<div id="page-inner">
    <div class="row">
        <div class="col-md-12">
            <h2 class="font-weight-bold">Order Detail</h2>
            <h4>Order No: {{ $order_detail[0]->orderId }}</h4>
            <h4>Date: {{ $order_detail[0]->created_at }}</h4>
        </div>
    </div>
    <!-- /. ROW  -->
    <div class="row">
        <div class="center">
            @if(session('orderUpdated'))
            <h5 class="text-center text-danger">
                {{ session('orderUpdated') }}
            </h5>
            @endif
        </div>
        <div class="col-lg-12 col-md-6">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr class="text-primary">
                        <th>#</th>
                        <th>Image</th>
                        <th>Product</th>
                        <th>price</th>
                        <th>quantity</th>
                        <th>discountAmount</th>
                        <th>total_amount</th>
                        <th>orderStatus</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order_detail as $order)
                    <tr>
                        <td>{{ $order->iterator_count }}</td>
                        <td><img width="50" height="50" src="{{ asset('storage/' .  $order->product_image) }}" /></td>
                        <td>{{ $order->product_name }}</td>
                        <td>{{ $order->price }}</td>
                        <td>{{ $order->quantity }}</td>
                        <td>{{ $order->discountAmount }}</td>
                        <td>{{ $order->total_amount }}</td>

                        <td>
                            <form method="post" action="/admin/orderUpdate/{{$order['id']}}">
                                @csrf
                                @method('PATCH')
                                <select name="orderStatus" id="orderStatus">
                                    <option value="Pending" {{ $order['orderStatus'] === 'Pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="Shipped" {{ $order['orderStatus'] === 'Shipped' ? 'selected' : '' }}>Shipped</option>
                                    <option value="Delivered" {{ $order['orderStatus'] === 'Delivered' ? 'selected' : '' }}>Delivered</option>
                                </select>
                        </td>
                        <td>
                            @if($order['orderStatus'] === 'Delivered')
                            <button class="btn btn-link disabled">Update</button>
                            @endif
                            </form>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
    <!-- /. ROW  -->
</div>
<!-- /. PAGE INNER  -->
</div>
<!-- /. PAGE WRAPPER  -->
</div>

@endsection