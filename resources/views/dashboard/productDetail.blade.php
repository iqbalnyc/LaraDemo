@extends('dashboard.admin-layout')
@section('title', 'MultiShop - Products')

@section('content')
<!-- /. NAV SIDE  -->
<div id="page-inner">
    <div class="row">
        <div class="col-md-12">
            <h2 class="text-primary">Products</h2>
        </div>
    </div>
    <!-- /. ROW  -->
    @if(session('successProduct'))
    <div class="text-success text-center">
        <h3>{{ session('successProduct') }}</h3>
    </div>
    @endif
    <div class="row">
        <div class="col-lg-4 mx-auto">
            <form action="/admin/productsUpdate/{{ $product->id }}" method="POST" enctype="multipart/form-data" class="mt-10">
                @csrf
                <div class="form-group">
                    <img src="{{ asset('storage/' .  $product->productImage) }}" alt="Blog Post illustration" class="h-10 w-10 rounded-xl">
                    <input type="file" name="productImage" class="form-control" value="{{ old('productImage', $product->productImage) }}">
                </div>
                <div class="form-group">
                    <label for="nombre" class="block mb-2 text-sm text-gray-600">Name</label>
                    <input type="text" name="productName" class="form-control" value="{{ old('productName', $product->productName) }}" required>
                </div>
                <div class="form-group">
                    <label for="nombre" class="block mb-2 text-sm text-gray-600">Manufacturer</label>
                    <input type="text" name="productManu" class="form-control" value="{{ old('productManu', $product->productManu) }}" required>
                </div>
                <div class="form-group">
                    <label for="nombre" class="block mb-2 text-sm text-gray-600">Part No</label>
                    <input type="text" name="productPartNo" class="form-control" value="{{ old('productPartNo', $product->productPartNo) }}" required>
                </div>
                <div class="form-group">
                    <label for="nombre" class="block mb-2 text-sm text-gray-600">Status</label>
                    <input type="text" name="productStatus" class="form-control" value="{{ old('productStatus', $product->productStatus) }}" required>
                </div>
                <div class="form-group">
                    <label for="nombre" class="block mb-2 text-sm text-gray-600">Price</label>
                    <input type="text" name="productPrice" class="form-control" value="{{ old('productPrice', $product->productPrice) }}" required>
                </div>

                <button type="submit" onclick="submitHandler" class="btn btn-primary  btn-lg btn-block">Update</button>
            </form>
        </div>
    </div>
    <!-- /. ROW  -->
</div>

@endsection