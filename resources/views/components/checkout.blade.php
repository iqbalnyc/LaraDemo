@extends('layout')
@section('title', 'Product Detail')

@section('content')

@php
$subtotal = 0;
$shipping = 0;
$total = 0;
@endphp

<!-- Checkout Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        
        <div class="col-lg-8">
            <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Billing Address</span></h5>
            @if(session('success'))
            <h5 class="text-center text-primary bg-secondary">
            {{ session('success') }}
            </h5>@endif
            <form action="/product/processCheckout" method="post">
            @csrf 
            <div class="bg-light p-30 mb-5">
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label>First Name</label>
                        <input name="firstName" class="form-control" type="text"
                        value="{{ old('firstName') }}" placeholder="John">
                        @error('firstName')
                        <p class="text-danger small mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Last Name</label>
                        <input name="lastName" class="form-control" type="text"
                        value="{{ old('lastName') }}" placeholder="John">
                        @error('lastName')
                        <p class="text-danger small mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-md-6 form-group">
                        <label>E-mail</label>
                        <input name="userEmail" class="form-control" type="text" 
                            value="{{ old('userEmail') }}" placeholder="example@email.com">
                        @error('userEmail')
                        <p class="text-danger small mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Mobile No</label>
                        <input name="phoneNo" class="form-control" type="text" 
                            value="{{ old('phoneNo') }}" placeholder="+123 456 789">
                        @error('phoneNo')
                        <p class="text-danger small mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Address Line 1</label>
                        <input name="address1" class="form-control" type="text" 
                            value="{{ old('address1') }}" placeholder="123 Street">
                        @error('address1')
                        <p class="text-danger small mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Address Line 2</label>
                        <input name="address2" class="form-control" type="text" 
                            value="{{ old('address2') }}" placeholder="123 Street">
                        @error('address2')
                        <p class="text-danger small mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Country</label>
                        <select name="country" class="custom-select">
                            <option selected>United States</option>
                            <option>Afghanistan</option>
                            <option>Albania</option>
                            <option>Algeria</option>
                        </select>
                        @error('country')
                        <p class="text-danger small mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-md-6 form-group">
                        <label>City</label>
                        <input name="city" class="form-control" type="text" 
                            value="{{ old('city') }}" placeholder="New York">
                        @error('city')
                        <p class="text-danger small mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-md-6 form-group">
                        <label>State</label>
                        <input name="state" class="form-control" type="text" 
                            value="{{ old('state') }}" placeholder="New York">
                        @error('state')
                        <p class="text-danger small mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-md-6 form-group">
                        <label>ZIP Code</label>
                        <input name="zipcode" class="form-control" type="text" 
                            value="{{ old('zipcode') }}" placeholder="123">
                        @error('zipcode')
                        <p class="text-danger small mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <!-- <div class="col-md-12 form-group">
                        <div class="custom-control custom-checkbox">
                            <input name="newAccount" type="checkbox" class="custom-control-input" id="newaccount">
                            <label class="custom-control-label" for="newaccount">Create an account</label>
                        @error('fullName')
                        <p class="text-primary small mt-2">{{ $message }}</p>
                        @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="custom-control custom-checkbox">
                            <input name="diffAddress" type="checkbox" class="custom-control-input" id="shipto">
                            <label class="custom-control-label" for="shipto" data-toggle="collapse" data-target="#shipping-address">Ship to different address</label>
                        </div>
                    </div> -->
                </div>
            </div>
            <!-- <div class="collapse mb-5" id="shipping-address">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Shipping Address</span></h5>
                <div class="bg-light p-30">
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label>First Name</label>
                            <input name="" class="form-control" type="text" placeholder="John">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Last Name</label>
                            <input name="" class="form-control" type="text" placeholder="Doe">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>E-mail</label>
                            <input name="" class="form-control" type="text" placeholder="example@email.com">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Mobile No</label>
                            <input name="" class="form-control" type="text" placeholder="+123 456 789">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Address Line 1</label>
                            <input name="" class="form-control" type="text" placeholder="123 Street">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Address Line 2</label>
                            <input name="" class="form-control" type="text" placeholder="123 Street">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Country</label>
                            <select class="custom-select">
                                <option selected>United States</option>
                                <option>Afghanistan</option>
                                <option>Albania</option>
                                <option>Algeria</option>
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>City</label>
                            <input name="city" class="form-control" type="text" placeholder="New York">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>State</label>
                            <input  name="state" class="form-control" type="text" placeholder="New York">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>ZIP Code</label>
                            <input name="zipcode" class="form-control" type="text" placeholder="123">
                        </div>
                    </div>
                </div>
            </div> -->
           
        </div>
        <!-- Order Total -->
        <div class="col-lg-4">
            @if(session()->has('cart'))
            @foreach(session('cart') as $key => $item)
            <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Order Total</span></h5>
            <div class="bg-light p-30 mb-5">
                <div class="border-bottom">
                    <h6 class="mb-3">Products</h6>
                    <div class="d-flex justify-content-between">
                        <p>{{ $item['product_name'] }}</p>
                        <p>${{ $item['total_amount'] }}</p>
                    </div>

                </div>
            </div>
            @endforeach
            @endif
            <div class="mb-5">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Payment</span></h5>
                <div class="bg-light p-30">
                    <div class="form-group">
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" name="paymentType" value="Paypal" id="paypal">
                            @error('paymentType')
                            <p class="text-danger small mt-2">{{ $message }}</p>
                            @enderror
                            <label class="custom-control-label" for="paypal">Paypal</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" name="paymentType" value="Direct Check" id="directcheck">
                            @error('paymentType')
                            <p class="text-danger small mt-2">{{ $message }}</p>
                            @enderror
                            <label class="custom-control-label" for="directcheck">Direct Check</label>
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" name="paymentType" value="Bank Transfer" id="banktransfer">
                            @error('paymentType')
                            <p class="text-danger small mt-2">{{ $message }}</p>
                            @enderror
                            <label class="custom-control-label" for="banktransfer">Bank Transfer</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-block btn-primary font-weight-bold py-3">Place Order</button>
                </div>
            </div>
        </div>
        </form>
    </div>
</div>
<!-- Checkout End -->

@include('components._footer')
@endsection