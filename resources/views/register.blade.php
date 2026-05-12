@extends('layouts.main')

@section('content')

<style>
    .register-image-fluid {
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
    .inner-toast-success {
      background-color: #d1e7dd !important;
      color: #0f5132 !important;
      box-shadow: none !important;
    }
    .register-card { max-width: 1000px; }
    .btn-maroon { background-color: #8a1616 !important; }
    .text-maroon { color: #8a1616; }
</style>

<div class="container py-5">
  <div class="card shadow-lg register-card overflow-hidden rounded-3 mx-auto">
    <div class="row g-0">

      <!-- Image Column -->
      <div class="col-md-5">
        <img src="{{ asset('images/img1.webp') }}" alt="Registration Image" class="register-image-fluid object-fit-cover">
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

        <!-- Toast for Password Mismatch -->
        @if ($errors->any())
            <div id="errorToast" class="toast show inner-toast fw-bold align-items-center border-0" role="alert" aria-live="assertive" aria-atomic="true" style="background-color: #f38888 !important; color: #8a1616 !important;">
                <div class="d-flex">
                    <div class="toast-body p-3">
                        {{-- This will display the first error found --}}
                        {{ $errors->first() }}
                    </div>
                    <button type="button" class="btn-close me-3 m-auto" data-bs-dismiss="toast"></button>
                </div>
            </div>
        @endif

        <div class="mb-4">
          <h3 class="fw-bold text-dark">Register</h3>
          <p class="text-muted small">Your Coffee Journey Starts Here</p>
        </div>

        <!-- Submit Form Data -->
        <form action="/register" method="POST">
          @csrf 

          <!-- Name & Email -->
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="name" class="form-label fw-semibold">Full Name</label>
              <input type="text" class="form-control" id="name" name="fullname" placeholder="Jeane Rose Amores" required>
            </div>
            <div class="col-md-6 mb-3">
              <label for="email" class="form-label fw-semibold">Email</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="amores@example.com" required>
            </div>
          </div>

          <!-- Password & Confirm Password -->
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="pass" class="form-label fw-semibold">Password</label>
              <input type="password" class="form-control" id="pass" name="password" placeholder="••••••••" required>
            </div>
            <div class="col-md-6 mb-3">
              <label for="confirm_pass" class="form-label fw-semibold">Confirm Password</label>
              <input type="password" class="form-control" id="confirm_pass" name="confirmpassword" placeholder="••••••••" required>
            </div>
          </div>

          <!-- Gender -->
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="gender" class="form-label fw-semibold">Gender</label>
              <select class="form-select" id="gender" name="gender">
                <option selected disabled>Choose...</option>
                <option>Male</option>
                <option>Female</option>
              </select>
            </div>
          </div>

          <!-- Register Button -->
          <div class="d-grid">
            <button type="submit" class="btn btn-maroon text-white fw-bold py-2">Register</button>
          </div>
        </form>

        <div class="text-center mt-4">
          <p class="small text-muted">
            Already have an account? 
            <a href="{{ route('login') }}" class="text-maroon fw-bold text-decoration-none">Login here</a>
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