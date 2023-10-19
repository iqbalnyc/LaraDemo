@extends('layout')
@section('title', 'Product Detail')

@section('content')

<div class="wrapper text-info">

    <!--  -->
    <div class="container-fluid mb-5">
        <div class="row border-top px-xl-5">
            <div class="col-lg-2 d-none d-lg-block">
                <h6 class="btn shadow-none text-center justify-content-between bg-primary text-info w-100" style="height: 65px; margin-top: -1px; padding: 0 20px;">
                    Dashboard
                    <br />{{session('userEmail')}}
                </h6>
                <nav class="collapse show navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0" id="navbar-vertical">
                    <div class="navbar-nav w-100 overflow-hidden" style="height: 410px">
                        <a href="/user/profile" class="nav-item nav-link text-info">Profile</a>

                    </div>
                </nav>
            </div>
            <!-- Content -->
            <div class="col-lg-9">
                <div class="carousel slide" data-ride="carousel">
                    <!-- Order History -->
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
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td><img width="50" height="50" src="{{ asset('storage/thumbnails/' .  $order->product_image) }}" /></td>
                                <td>{{ $order->product_name }}</td>
                                <td>{{ $order->price }}</td>
                                <td>{{ $order->quantity }}</td>
                                <td>{{ $order->discountAmount }}</td>
                                <td>{{ $order->total_amount }}</td>
                                <td>{{ $order->orderStatus }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Content -->
        </div>
    </div>


    <!-- Sidebar -->
    @include('components._footer')
    @endsection