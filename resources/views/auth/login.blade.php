@extends('mainLayout')

@section('page-title', 'Login')

@section('auth-content')
<div class="login-form">
    <div class="mb-4 header-container">
        <h2 class="header-title">Login</h2>
        <p>Don't have an account? <a href="{{ route('register') }}">Register here</a></p>
    </div>
    
    <form action="{{ route('login') }}" method="POST" class="text-center">
        @csrf
        <div class="form-floating mb-3">
            <input type="text" class="form-control text-field" id="floatingInput" name="name" placeholder="name@example.com">
            <label for="floatingInput">Username</label>
            @error('name')
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
        <button type="submit" class="submit-btn">Login</button>
    </form>
</div>
        
@endsection