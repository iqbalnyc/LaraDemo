<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <!-- Libraries Stylesheet -->
    <link href="{{asset('assets/lib/animate/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
</head>

<body>
    <div class="card mx-auto" style="width: 28rem;  margin-top:30px;">
        <div class="card-body">
            <h5 class="card-title text-center">Forgot Password</h5>
            <hr class="bg-primary" />
            @if(session('success'))
            <div class="text-danger small text-center">
                <p>{{ session('success') }}</p>
            </div>
            @endif
    
            <form action="/admin/forgotPassword" method="post">
                @csrf
                <!-- Error Message -->
                @error('email')
                    <p class="text-danger text-center mt-2">{{ $message }}</p>
                @enderror
                
                <div class="form-group">
                    <label for="nombre" class="block text-sm text-gray-600">User Email</label>
                    <input type="text" name="email" class="form-control" value="{{ old('email') }}" required>
                    
                </div>
                
                <div class="text-center">
                    <button type="submit" class="btn btn-info">Login Admin</button>
                </div>
            </form>
        </div>
    </div>

</body>

</html>