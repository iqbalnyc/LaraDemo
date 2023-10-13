@extends('dashboard.admin-layout')
@section('title', 'MultiShop - Products')

@section('content')
<!-- /. NAV SIDE  -->
<div id="page-inner">
    <div class="row">
        <div class="col-md-12">
            <h3>Add new product</h3>
        </div>
        @if(session('productAdded'))
        <h5 class="text-center text-danger">
            {{ session('productAdded') }}
        </h5>
        @endif
    </div>
    <!-- /. ROW  -->
    <div class="row">
        <div class="col-lg-12 col-md-6">
        <div class="col-lg-4 mx-auto">
            <form action="/admin/addnewProduct" method="POST" enctype="multipart/form-data" class="mt-10">
                @csrf
                <div class="form-group">
                    <img src="" alt="Blog Post illustration" class="h-10 w-10 rounded-xl">
                    <input type="file" name="productImage" class="form-control" value="{{ old('productImage') }}">
                    @error('productImage')
                    <p class="text-danger small mt-2">{{ $message }}</p>
                    @enderror
                    <p class="help-block text-danger"></p>
                </div>
                <div class="form-group">
                    <label for="productCatId" class="block mb-2 text-sm text-gray-600">Category</label>
                    <select name="productCatId" class="form-control">
                            @foreach($categories as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->categoryName}}</option>
                            @endforeach
                    </select>
                            @error('productCatId')
                            <p class="text-danger small mt-2">{{ $message }}</p>
                            @enderror
                            <p class="help-block text-danger"></p>
                </div>
                <div class="form-group">
                    <label for="nombre" class="block mb-2 text-sm text-gray-600">Name</label>
                    <input type="text" name="productName" class="form-control" value="{{ old('productName') }}" required>
                            @error('productName')
                            <p class="text-danger small mt-2">{{ $message }}</p>
                            @enderror
                            <p class="help-block text-danger"></p>
                </div>
                <div class="form-group">
                    <label for="nombre" class="block mb-2 text-sm text-gray-600">product Desc</label>
                    <input type="text" name="productDesc" class="form-control" value="{{ old('productDesc') }}" required>
                            @error('productDesc')
                            <p class="text-danger small mt-2">{{ $message }}</p>
                            @enderror
                            <p class="help-block text-danger"></p>
                </div>
                <div class="form-group">
                    <label for="nombre" class="block mb-2 text-sm text-gray-600">Manufacturer</label>
                    <input type="text" name="productManu" class="form-control" value="{{ old('productManu') }}" required>
                            @error('productManu')
                            <p class="text-danger small mt-2">{{ $message }}</p>
                            @enderror
                            <p class="help-block text-danger"></p>
                </div>
                <div class="form-group">
                    <label for="nombre" class="block mb-2 text-sm text-gray-600">Part No</label>
                    <input type="text" name="productPartNo" class="form-control" value="{{ old('productPartNo') }}" required>
                            @error('productPartNo')
                            <p class="text-danger small mt-2">{{ $message }}</p>
                            @enderror
                            <p class="help-block text-danger"></p>
                </div>
                <div class="form-group">
                    <label for="nombre" class="block mb-2 text-sm text-gray-600">Status</label>
                    <input type="text" name="productStatus" class="form-control" value="{{ old('productStatus') }}" required>
                            @error('productStatus')
                            <p class="text-danger small mt-2">{{ $message }}</p>
                            @enderror
                            <p class="help-block text-danger"></p>
                </div>
                <div class="form-group">
                    <label for="nombre" class="block mb-2 text-sm text-gray-600">Price</label>
                    <input type="text" name="productPrice" class="form-control" value="{{ old('productPrice') }}" required>
                            @error('productPrice')
                            <p class="text-danger small mt-2">{{ $message }}</p>
                            @enderror
                            <p class="help-block text-danger"></p>
                </div>

                <button type="submit" class="btn btn-primary  btn-lg btn-block">Update</button>
            </form>
        </div>
        </div>
    </div>
    <div class="row">
        
    </div>
    <!-- /. ROW  -->
</div>

@endsection