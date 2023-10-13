@extends('dashboard.admin-layout')
@section('title', 'MultiShop - Admin Pannel')

@section('content')
        <!-- /. NAV SIDE  -->
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="text-primary">Orders</h2>
                    </div>
                </div>
                <!-- /. ROW  -->
                <div class="row">
                    <div class="col-lg-12 col-md-6">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr class="text-primary">
                                    <th>#</th>
                                    <th>Order No</th>
                                    <th>Order Date</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone No</th>
                                    <th>Address</th>
                                    <th>Payments</th>
                                    <th>Items</th>
                                    <th>View</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $order)
                                <tr>
                                    <td>{{ $order->iterator_count }}</td>
                                    <td>{{ $order->orderId }}</td>
                                    <td>{{ $order->orderDate }}</td>
                                    <td>{{ $order->firstName }}</td>
                                    <td>{{ $order->userEmail }}</td>
                                    <td>{{ $order->phoneNo }}</td>
                                    <td>{{ $order->address1 }}</td>
                                    <td>{{ $order->paymentType }}</td>
                                    <td>{{ $order->orderId }}</td>
                                    <td><a href="/admin/orderDetail/{{ $order->orderId }}">View</a></td>
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