@extends('layout')
@section('title', 'Product Detail')

@section('content')

@php
$subtotal = 0;
$shipping = 0;
$total = 0;
@endphp
<!-- Cart Start -->
<div class="container-fluid mt-3">
    <div class="row px-xl-5">

        <div class="col-lg-8 table-responsive mb-5">
            <table class="table table-light table-borderless table-hover text-center mb-0">
                <thead class="thead-dark">
                    <tr>
                        <th>Products</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Remove</th>
                    </tr>
                    <tr>
                        @if(session('success'))
                        <h5 class="text-center text-primary bg-secondary">
                            {{ session('success') }}
                        </h5>
                        @endif
                    </tr>
                </thead>
                <tbody class="align-middle">
                    @if(session()->has('cart'))
                    @foreach(session('cart') as $key => $item)
                    <tr>
                        <td class="align-middle"><img src="{{ asset('storage/' .  $item['product_image']) }}" alt="" style="width: 50px;">{{ $item['product_name'] }}</td>
                        <td class="align-middle">${{ $item['price'] }}</td>
                        <td class="align-middle">
                            <div class="input-group quantity mx-auto" style="width: 100px;">
                                <div class="input-group-btn">
                                    <button class="btn btn-sm btn-primary btn-minus">
                                        <i class="fa fa-minus"></i>
                                    </button>
                                </div>
                                <input type="text" class="form-control form-control-sm bg-secondary border-0 text-center" value="{{ $item['quantity'] }}">
                                <div class="input-group-btn">
                                    <button class="btn btn-sm btn-primary btn-plus">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </td>
                        <td class="align-middle">{{ $item['total_amount'] }}</td>
                        <!-- Remove Product -->
                        <form method="GET" action="/product/cartDelete">
                            <input type="hidden" name="product_id" id="product_id" value="{{$item['product_id']}}">
                            <td class="align-middle">
                                <button class="btn btn-sm btn-danger"><i class="fa fa-times"></i>
                                </button>
                            </td>
                        </form>
                    </tr>
                    @php
                        $subtotal = $subtotal + $item['total_amount'];
                    @endphp
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>

        <!-- Checkout -->
        <div class="col-lg-4">
            <form class="mb-30" action="">
                <div class="input-group">
                    <input type="text" class="form-control border-0 p-4" placeholder="Coupon Code">
                    <div class="input-group-append">
                        <button class="btn btn-primary">Apply Coupon</button>
                    </div>
                </div>
            </form>
            <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Cart Summary</span></h5>
            <div class="bg-light p-30 mb-5">
                <div class="border-bottom pb-2">
                    <div class="d-flex justify-content-between mb-3">
                        <h6>Subtotal</h6>
                        <h6>${{$subtotal}}</h6>
                    </div>
                    @if($subtotal > 100) 
                        @php
                        $shipping=100;
                        @endphp
                    @endif
                    <div class="d-flex justify-content-between">
                        <h6 class="font-weight-medium">Shipping</h6>
                        <h6 class="font-weight-medium">${{ $shipping }}</h6>
                    </div>
                </div>
                <div class="pt-2">
                    <div class="d-flex justify-content-between mt-2">
                        <h5>Total</h5>
                        <h5>$ {{ $subtotal + $shipping }}</h5>
                    </div>
                    <!-- <button class="btn btn-block btn-primary font-weight-bold my-3 py-3">Proceed To Checkout</button> -->
                    <a  class="btn btn-block btn-primary font-weight-bold my-3 py-3" href="/product/checkout">Proceed To Checkout</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Cart End -->


@include('components._footer')
@endsection