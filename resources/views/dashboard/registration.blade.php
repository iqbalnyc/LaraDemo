<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Libraries Stylesheet -->
    <link href="{{asset('assets/lib/animate/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
</head>

<body>
    <div class="card mx-auto" style="width: 28rem;  margin-top:30px;">
        <div class="card-body">
            
            <h5 class="card-title text-center">User Registration</h5>
            <hr class="bg-primary" />
            <form action="/admin/store" method="post">
                @csrf
                <div class="form-group">
                    <label for="name" class="block text-sm text-gray-600">User Name</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                    @error('name')
                    <p class="text-danger small mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email" class="block text-sm text-gray-600">User Email</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                    @error('email')
                    <p class="text-danger small mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="nombre" class="block text-sm text-gray-600">Password</label>
                    <input type="password" name="password" class="form-control" required>
                    @error('password')
                    <p class="text-danger small mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="nombre" class="block text-sm text-gray-600">Verify Password</label>
                    <input type="password" name="password_confirmation" class="form-control" required>
                    @error('password_confirmation')
                    <p class="text-danger small mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="userType" class="block mb-2 text-sm text-gray-600">User Type</label>
                    <select name="user_type" class="form-control">
                        <option value="Admin">Admin</option>
                        <option value="Manager">Manager</option>
                        <option value="Support" selected>Support</option>
                    </select>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-info">Registration</button>
                </div>
            </form>
        </div>
    </div>

</body>

</html>