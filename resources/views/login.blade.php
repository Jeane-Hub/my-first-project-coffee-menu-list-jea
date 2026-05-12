@extends('layouts.main')

@section('content')

<style>
    .login-image-fluid {
      width: 100%;
      height: 100%;
    }
    .inner-toast {
      width: 100% !important;
      margin-bottom: 20px;
      border-radius: 10px;
      background-color: #f38888 !important;
      color: #8a1616 !important; 
      box-shadow: none !important;
    }
    .login-card { max-width: 800px; }
    .btn-maroon { background-color: #8a1616 !important; }
    .text-maroon { color: #8a1616; }
</style>

<div class="container py-5">
  <div class="card shadow-lg login-card overflow-hidden rounded-3 mx-auto">
    <div class="row g-0">

      <!-- Image Column -->
      <div class="col-md-5">
        <img src="{{ asset('images/img1.webp') }}" alt="Login Image" class="login-image-fluid object-fit-cover">
      </div>

      <!-- Form Column -->
      <div class="col-md-7 p-4 p-lg-5 bg-white">

        <!-- Toast Notification Section -->
        @if(session('success'))
            <div id="successToast" class="toast show inner-toast fw-bold inner-toast-success align-items-center border-0" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body p-3">
                        {{ session('success') }}
                    </div>
                    <button type="button" class="btn-close me-3 m-auto" data-bs-dismiss="toast"></button>
                </div>
            </div>
        @endif

        @if(session('error'))
            <div id="errorToast" class="toast show inner-toast fw-bold align-items-center border-0" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body p-3">
                        {{ session('error') }}
                    </div>
                    <button type="button" class="btn-close me-3 m-auto" data-bs-dismiss="toast"></button>
                </div>
            </div>
        @endif

        <div class="mb-4">
          <h3 class="fw-bold text-dark">Login</h3>
          <p class="text-muted small">Step Into Our Caffeinated Corner</p>
        </div>

        <form method="POST" action="{{ route('login') }}">
          @csrf 

          <!-- Email Input -->
          <div class="mb-3">
            <label for="email" class="form-label fw-semibold text-dark">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="amores@example.com" required>
          </div>

          <!-- Password Input -->
          <div class="mb-2">
            <label for="password" class="form-label fw-semibold text-dark">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="••••••••" required>
            <div class="text-end mt-1">
              <a href="#" class="text-maroon small text-decoration-none fw-semibold">Forgot password?</a>
            </div>
          </div>

          <!-- Login Button -->
          <div class="d-grid gap-2">
            <button type="submit" class="btn btn-maroon text-white fw-bold py-2">Login</button>
          </div>
        </form>

        <div class="text-center mt-4">
          <p class="small text-muted">
            Don't have an account? 
            <a href="{{ route('register') }}" class="text-maroon fw-bold text-decoration-none">Register here</a>
          </p>
        </div>
      </div>

    </div> 
  </div> 
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Success Toast
        var successEl = document.getElementById('successToast');
        if(successEl){
            var toast = new bootstrap.Toast(successEl);
            toast.show();
        }

        // Error Toast
        var errorEl = document.getElementById('errorToast');
        if(errorEl){
            var toast = new bootstrap.Toast(errorEl);
            toast.show();
        }

        // 3 Seconds Duration
        setTimeout(() => {
            document.querySelector('.toast.show')?.classList.remove('show');
        }, 3000);
    });
</script>
@endsection