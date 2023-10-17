@extends('layout')
@section('title', 'Product Detail')

@section('content')
@include('components.navbar')
<!-- script -->
<script type="text/javascript">
    function incrementValue() {
        event.preventDefault()
        var value = parseInt(document.getElementById('quantity').value);
        value = isNaN(value) ? 0 : value;
        value++;
        document.getElementById('quantity').value = value;
    }

    function decrementValue() {
        event.preventDefault()
        var value = parseInt(document.getElementById('quantity').value, 10);
        value = isNaN(value) ? 0 : value;
        if (value > 1) {
            value--;
            document.getElementById('quantity').value = value;
        }

    }
</script>
<!-- Breadcrumb Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-12">
            <nav class="breadcrumb bg-light mb-30">
                <a class="breadcrumb-item text-dark" href="#">Home</a>
                <a class="breadcrumb-item text-dark" href="#">Shop</a>
                <span class="breadcrumb-item active">Shop Detail</span>
                
            </nav>
        </div>
    </div>
</div>


<!-- Breadcrumb End -->


<!-- Shop Detail Start -->
<div class="container-fluid pb-5">
    <!-- Product Detail -->
    <div class="row px-xl-5">
        <div class="col-lg-5 mb-30">
            <div id="product-carousel" data-ride="carousel">
                <div class="carousel-inner bg-light">
                    <div class="position-relative overflow-hidden">
                        @if (Storage::exists($product->productImage)) 
                        <img class="rounded mx-auto d-block" width="400" height="420" src="{{ asset('storage/' .  $product->productImage) }}" alt="Image">
                        @else
                        <img class="rounded mx-auto d-block" width="400" height="420" src="{{ asset('storage/thumbnails/' .  'notfound.png') }}" alt="Image">
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-7 h-auto mb-30">
            <div class="h-100 bg-light p-30">
                @if(session('success'))
                <h5 class="text-center text-primary bg-secondary">
                    {{ session('success') }}
                </h5>@endif
                <h3>{{ $product->productName }}</h3>
                <div class="d-flex mb-3">
                    <div class="text-primary mr-2">
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star-half-alt"></small>
                        <small class="far fa-star"></small>
                    </div>
                    <small class="pt-1">{{ $product->productPrice }}</small>
                </div>
                <h3 class="font-weight-semi-bold mb-4">${{ $product->productPrice }}</h3>
                <p class="mb-0">Manufacturer: {{ $product->productManu }}</p>
                <p class="mb-0">Part No: {{ $product->productPartNo }}</p>
                <p class="mb-4">Available: {{ $product->productStatus }}</p>
                <!------------------ Increment/Decrement -->
                <form method="GET" action="/product/order">
                    @csrf
                    <input readonly type="hidden" name="product_id" id="product_id" value="{{ $product->id }}" </a> </p>
                    <input readonly type="hidden" name="user_email" id="user_email" value="abc@gmail.com" </a> </p>
                    <input readonly type="hidden" name="product_image" id="product_image" value="{{ $product->productImage }}" </a> </p>
                    <input readonly type="hidden" name="product_name" id="product_name" value="{{ $product->productName }}" </a> </p>
                    <input readonly type="hidden" name="price" id="price" value="{{ $product->productPrice }}" </a> </p>

                    <div class="d-flex align-items-center mb-4 pt-2">
                        <div class="input-group quantity mr-3" style="width: 130px;">
                            <div class="input-group-btn">
                                <button class="btn btn-primary btn-minus" onclick="decrementValue()">
                                    <i class="fa fa-minus"></i>
                                </button>
                            </div>
                            <input type="text" name="quantity" id="quantity" class="form-control bg-secondary border-0 text-center" value="1">
                            <div class="input-group-btn">
                                <button class="btn btn-primary btn-plus" onclick="incrementValue()">
                                    <i class="fa fa-plus"></i>
                                </button>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary px-3"><i class="fa fa-shopping-cart mr-1"></i>Add To Cart</button>
                </form>
            </div>
            <!-- Media -->
            <div class="d-flex pt-2">
                <strong class="text-dark mr-2">Share on:</strong>
                <div class="d-inline-flex">
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-pinterest"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!--  -->
<div class="row px-xl-5">
    <div class="col">
        <div class="bg-light p-30">
            <div class="nav nav-tabs mb-4">
                <a class="nav-item nav-link text-dark active" data-toggle="tab" href="#tab-pane-1">Description</a>
                <a class="nav-item nav-link text-dark" data-toggle="tab" href="#tab-pane-2">Information</a>
                <a class="nav-item nav-link text-dark" data-toggle="tab" href="#tab-pane-3">Reviews (0)</a>
            </div>
            <div class="tab-content">
                <!-- Product Description -->
                <div class="tab-pane fade show active" id="tab-pane-1">
                    <h4 class="mb-3">Product Description</h4>
                    <p>{{ $product->productDesc }}</p>
                </div>
                <!-- Product Information -->
                <div class="tab-pane fade" id="tab-pane-2">
                    <h4 class="mb-3">Additional Information</h4>
                    <p>{{ $product->productInfo }}</p>
                </div>
                <!-- Reveiw -->
                <div class="tab-pane fade" id="tab-pane-3">
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="mb-4">{{ $reviews->count() }} review for {{ $product->productName }}</h4>
                            @foreach($reviews as $review)
                            <div class="media mb-4">
                                <img class="assets/img-fluid mr-3 mt-1" style="width: 45px;"src="{{ asset('storage/thumbnails/' .  'user.jpg') }}" alt="Image">
                                <div class="media-body">
                                    <h6>{{ $review['name'] }}<small> - <i>{{ $review['created_at'] }}</i></small></h6>
                                    <div class="text-primary mb-2">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                    <p>
                                    {{ $review['review'] }}
                                    </p>
                                </div>
                               
                            </div>
                            @endforeach
                        </div>
                        <!-- Review Form -->
                        <div class="col-md-6">
                            <h4 class="mb-4">Leave a review</h4>
                            <small>Your email address will not be published. Required fields are marked *</small>
                            <div class="d-flex my-3">
                                <p class="mb-0 mr-2">Your Rating * :</p>
                                <div class="text-primary">
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                </div>
                            </div>
                            <form action="/admin/review" method="post">
                                @csrf
                                <input type="hidden" class="form-control" name="productId" value="{{ $product->id }}">
                                <div class="form-group">
                                    <label for="review">Your Review *</label>
                                    <textarea name="review" id="review" cols="30" rows="5" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="name">Your Name *</label>
                                    <input type="text" class="form-control" name="name" id="name">
                                </div>
                                <div class="form-group">
                                    <label for="email">Your Email *</label>
                                    <input type="email" class="form-control" name="email" id="email">
                                </div>
                                <div class="form-group mb-0">
                                    <input type="submit" value="Leave Your Review" class="btn btn-primary px-3">
                                </div>
                            </form>
                        </div>
                        <!-- Review Form -->
                    </div>
                </div>
                <!-- Review -->
            </div>
        </div>
    </div>
</div>
</div>
<!-- Shop Detail End -->

@include('components._footer')
@endsection