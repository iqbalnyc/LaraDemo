@extends('layout')
@section('title', 'Product Detail')

@section('content')

<div class="wrapper text-info">
    <!-- Sidebar -->
    <div class="container-fluid mb-5">
        <div class="row border-top px-xl-5">
            <div class="col-lg-2 d-none d-lg-block">
                <a href="/user/dashboard">
                    <h6 class="btn shadow-none text-center justify-content-between bg-primary text-info w-100" style="height: 65px; margin-top: -1px; padding: 0 20px;">
                        Dashboard
                        <br />{{session('userEmail')}}
                    </h6>
                </a>
                <nav class="collapse show navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0" id="navbar-vertical">
                    <div class="navbar-nav w-100 overflow-hidden" style="height: 410px">
                        <a href="/user/profile" class="nav-item nav-link text-info">Profile</a>
                        <a href="/user/logout" class="nav-item nav-link text-info">Logout</a>

                    </div>
                </nav>
            </div>
            <!-- Content -->
            <div class="col-lg-9">

                <form action="/user/profile" method="post">
                    @csrf
                    <div class="bg-light p-30 mb-5">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label>First Name</label>
                                <input name="firstName" class="form-control" type="text" value="{{ old('firstName', $user->firstName) }}" placeholder="John">
                                @error('firstName')
                                <p class="text-danger small mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Last Name</label>
                                <input name="lastName" class="form-control" type="text" value="{{ old('lastName', $user->lastName) }}" placeholder="John">
                                @error('lastName')
                                <p class="text-danger small mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-6 form-group">
                                <label>E-mail</label>
                                <input name="userEmail" class="form-control" type="text" value="{{ old('userEmail', $user->userEmail) }}" placeholder="example@email.com">
                                @error('userEmail')
                                <p class="text-danger small mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Password</label>
                                <input name="password" class="form-control" type="password" value="{{ old('password', $user->password) }}" placeholder="example@email.com">
                                @error('password')
                                <p class="text-danger small mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Mobile No</label>
                                <input name="phoneNo" class="form-control" type="text" value="{{ old('phoneNo', $user->phoneNo) }}" placeholder="+123 456 789">
                                @error('phoneNo')
                                <p class="text-danger small mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Address Line 1</label>
                                <input name="address1" class="form-control" type="text" value="{{ old('address1', $user->address1) }}" placeholder="123 Street">
                                @error('address1')
                                <p class="text-danger small mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Address Line 2</label>
                                <input name="address2" class="form-control" type="text" value="{{ old('address2', $user->address2) }}" placeholder="123 Street">
                                @error('address2')
                                <p class="text-danger small mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Country</label>
                                <select name="country" class="custom-select">
                                    <option selected>United States</option>
                                    <option>Pakistan</option>
                                    <option>Albania</option>
                                    <option>Algeria</option>
                                </select>
                                @error('country')
                                <p class="text-danger small mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-6 form-group">
                                <label>City</label>
                                <input name="city" class="form-control" type="text" value="{{ old('city', $user->city) }}" placeholder="New York">
                                @error('city')
                                <p class="text-danger small mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-6 form-group">
                                <label>State</label>
                                <input name="state" class="form-control" type="text" value="{{ old('state', $user->state) }}" placeholder="New York">
                                @error('state')
                                <p class="text-danger small mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-6 form-group">
                                <label>ZIP Code</label>
                                <input name="zipcode" class="form-control" type="text" value="{{ old('zipcode', $user->zipcode) }}" placeholder="123">
                                @error('zipcode')
                                <p class="text-danger small mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 form-group text-center">
                                <button type="submit" class="btn btn-info">Update Profile</button>
                            </div>
                        </div>
                </form>

            </div>
            <!-- Content -->
        </div>
    </div>
</div>
@include('components._footer')
@endsection