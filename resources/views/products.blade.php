@extends('layout')
    @section('title', 'MultiShop - Online Shop Website Template')

    @section('content')
        @props(['countCart']);
    @include('components.navbar')
    @include('components.featured')
<!-- Products Start -->
<div class="container-fluid">
<h2 class="section-title position-relative text-uppercase mx-xl-5 mb-2"><span class="bg-secondary">Products</span></h2>
    <div class="row px-xl-5">
        @foreach($product as $item)
        <div class="col-lg-2 col-md-4 col-sm-6 pb-1">
            <div class="product-item bg-light mb-4">
                <div class="product-img position-relative overflow-hidden">
                    @if (Storage::exists($item->productImage)) 
                    <img width="280" height="250"  src="{{ asset('storage/' .  $item->productImage) }}" alt="Image">
                    @else
                    <img width="280" height="250"  src="{{ asset('storage/thumbnails/' .  'notfound.png') }}" alt="Image">
                    @endif
                    <!-- <img width="280" height="250" src="{{ asset('storage/' .  $item->productImage) }}" alt=""> -->
                </div>
                <div class="text-center py-4">
                    <a class="h6 text-decoration-none" href="/detail/{{ $item->id }}">{{ $item->productName }}</a>
                    <div class="d-flex align-items-center justify-content-center mt-2">
                        <h5>${{ $item->productPrice }}</h5>
                    </div>
                    <div class="d-flex align-items-center justify-content-center mb-1">
                        <small class="fa fa-star text-primary mr-1"></small>
                        <small class="fa fa-star text-primary mr-1"></small>
                        <small class="fa fa-star text-primary mr-1"></small>
                        <small class="fa fa-star-half-alt text-primary mr-1"></small>
                        <small class="far fa-star text-primary mr-1"></small>
                        <small>(99)</small>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

    </div>
</div>
<!-- Products End -->

    @include('components._footer')
@endsection