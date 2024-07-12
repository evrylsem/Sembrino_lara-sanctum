@extends('mainLayout')

@section('page-title', 'Register')

@section('auth-content')
<div class="login-form">
    <div class="mb-4 header-container">
        <h2 class="header-title">Create an account</h2>
        <p>Already have an account? <a href="{{ route('login') }}">Login</a></p>
    </div>
    
    <form action="{{ route('register') }}" method="POST" class="text-center">
        @csrf
        <div class="form-floating mb-3">
            <input type="text" class="form-control text-field" id="floatingInput" name="name" placeholder="name@example.com">
            <label for="floatingInput">Username</label>
            @error('name')
                <span>{{ $message }}</span>
            @enderror
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control text-field" id="floatingInput" name="email" placeholder="name@example.com">
            <label for="floatingInput">Email</label>
            @error('email')
                <span>{{ $message }}</span>
            @enderror
        </div>
        <div class="form-floating mb-4">
            <input type="password" class="form-control text-field" id="floatingPassword" name="password" placeholder="Password">
            <label for="floatingPassword">Password</label>
            @error('password')
                <span>{{ $message }}</span>
            @enderror
        </div>
        <!-- <div class="form-floating mb-4">
            <input type="password" class="form-control text-field" id="floatingPassword" name="confirm_password" placeholder="Password">
            <label for="floatingPassword">Confirm Password</label>
        </div> -->
        <button type="submit" class="submit-btn">Register</button>
    </form>
</div>
        
@endsection