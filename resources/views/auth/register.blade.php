@extends('layouts.app')

@section('content')
<!-- Font Awesome CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<div class="container" style="max-width: 400px; margin-top: 5rem;">
    <h2 class="mb-4 text-center">Register</h2>

    <form method="POST" action="{{ route('register.store') }}" class="needs-validation" novalidate>
        @csrf

        <!-- Name Input -->
        <div class="mb-3 position-relative">
            <label for="name" class="form-label">Name</label>
            <div class="input-group">
                <span class="input-group-text">
                    <i class="fa-solid fa-user"></i>
                </span>
                <input 
                    type="text" 
                    name="name" 
                    id="name" 
                    class="form-control" 
                    placeholder="Enter your name" 
                    required 
                >
                <div class="invalid-feedback">Name is required.</div>
            </div>
        </div>

        <!-- Email Input -->
        <div class="mb-3 position-relative">
            <label for="email" class="form-label">Email</label>
            <div class="input-group">
                <span class="input-group-text">
                    <i class="fa-solid fa-envelope"></i>
                </span>
                <input 
                    type="email" 
                    name="email" 
                    id="email" 
                    class="form-control" 
                    placeholder="Enter your email" 
                    required 
                >
                <div class="invalid-feedback">Please enter a valid email.</div>
            </div>
        </div>

        <!-- Password Input -->
        <div class="mb-3 position-relative">
            <label for="password" class="form-label">Password</label>
            <div class="input-group">
                <span class="input-group-text">
                    <i class="fa-solid fa-lock"></i>
                </span>
                <input 
                    type="password" 
                    name="password" 
                    id="password" 
                    class="form-control" 
                    placeholder="Enter your password" 
                    required
                >
                <button 
                    type="button" 
                    class="btn btn-outline-secondary" 
                    onclick="togglePasswordVisibility()"
                >
                    <i id="toggle-icon" class="fa-solid fa-eye"></i>
                </button>
                <div class="invalid-feedback">Password is required.</div>
            </div>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary w-100">
            <i class="fa-solid fa-user-plus"></i> Register
        </button>
    </form>
</div>

<script>
    // Toggle Password Visibility
    function togglePasswordVisibility() {
        const passwordInput = document.getElementById('password');
        const toggleIcon = document.getElementById('toggle-icon');
        
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            toggleIcon.classList.replace('fa-eye', 'fa-eye-slash');
        } else {
            passwordInput.type = 'password';
            toggleIcon.classList.replace('fa-eye-slash', 'fa-eye');
        }
    }

    // Client-side form validation
    (() => {
        'use strict';
        const forms = document.querySelectorAll('.needs-validation');

        Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    })();
</script>
@endsection
