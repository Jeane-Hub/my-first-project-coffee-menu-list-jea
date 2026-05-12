@extends('layouts.main')

@section('content')

<style>
    #sidebar {
      min-width: 250px;
      max-width: 250px;
      height: 100vh;
      top: 0;
      margin-left: 0px;
      flex-direction: column;
    }
    #sidebar .nav-link { 
      padding: 12px 20px; 
      margin: 5px 15px; 
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
    .content-area { padding-left: 0 !important; }
    #sidebar .nav-link:hover, #sidebar .nav-link.active { background: rgba(255,255,255,0.1); }
    @media (max-width: 700px) { #sidebar { display: none; }}
</style>

<div class="d-flex">
    <button class="navbar-toggler d-md-none" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar">
        <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Sidebar -->
    <nav id="sidebar" class="shadow bg-dark position-sticky d-flex flex-column" style="height: 100vh; min-width: 250px;">
        <div class="p-4 text-white">
            <h4 class="fw-bold"><i class="bi bi-cup-hot-fill me-2"></i>JeaneCoffee</h4>
        </div>
        
        <ul class="nav flex-column mb-auto">
            <li><a href="{{ route('user.dashboard') }}" class="nav-link d-block rounded text-decoration-none text-white"><i class="bi bi-speedometer2 me-2"></i>Dashboard</a></li>
            <li><a href="{{ route('user.profile') }}" class="nav-link text-white rounded"><i class="bi bi-gear-wide-connected me-2"></i>Account Settings</a></li>
            
            <hr class="text-white opacity-25">
            <li>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="nav-link text-white border-0 bg-transparent w-100 text-start"><i class="bi bi-box-arrow-left me-2"></i> Logout</button>
                </form>
            </li>
        </ul>
    </nav>

    <!-- Main Content Area -->
    <div class="content-area flex-1 overflow-y-auto w-100 p-0">
        <!-- Top Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm px-4 py-3 w-100 border-0 mb-4">
            <div class="container-fluid p-0 d-flex align-items-center">
                <span class="navbar-text fw-semibold text-dark me-2">USER PORTAL</span>
                <div class="ms-auto d-flex align-items-center">
                    <div class="d-flex align-items-center">
                        <span class="me-2 text-muted small fw-medium text-nowrap">{{ session('user')->name }}</span>
                        <img src="{{ session('user')->profile_pic ? asset('images/profile_pics/' . session('user')->profile_pic) : asset('images/default.png') }}" 
                            class="rounded-circle border shadow-sm object-fit-cover" width="35" height="33">
                    </div>

                    <button type="button" class="btn position-relative fs-5 rounded-circle ms-1 p-0 d-flex align-items-center justify-content-center"> 
                        🔔︎ 
                        <span class="position-absolute top-0 start-100 translate-middle p-1 bg-danger border border-light rounded-circle">
                            <span class="visually-hidden">New alerts</span>
                        </span>
                    </button>
                </div>
            </div>
        </nav>
        
        <!-- Toast Notification Section -->
        <!-- Success Toast -->
        @if(session('success'))
            <div id="successToast" class="toast show inner-toast fw-bold inner-toast-success align-items-center border-0" role="alert">
                <div class="d-flex">
                    <div class="toast-body p-3">{{ session('success') }}</div>
                    <button type="button" class="btn-close me-3 m-auto" data-bs-dismiss="toast"></button>
                </div>
            </div>
        @endif

        <!-- Error Toast -->
        @if(session('error'))
            <div id="errorToast" class="toast show inner-toast fw-bold align-items-center border-0" role="alert" style="background-color: #f38888 !important; color: #8a1616 !important;">
                <div class="d-flex">
                    <div class="toast-body p-3">{{ session('error') }}</div>
                    <button type="button" class="btn-close me-3 m-auto" data-bs-dismiss="toast"></button>
                </div>
            </div>
        @endif

        <!-- Validation Errors Toast -->
        @if($errors->any())
            <div id="validationToast" class="toast show inner-toast fw-bold align-items-center border-0" role="alert">
                <div class="d-flex">
                    <div class="toast-body p-3">{{ $errors->first() }}</div>
                    <button type="button" class="btn-close me-3 m-auto" data-bs-dismiss="toast"></button>
                </div>
            </div>
        @endif

        <div class="container-fluid p-4">
            <!-- Welcome Section -->
            <section id="dashboard" class="mb-5">
                <header class="mb-4">
                    <h2 class="fw-bold display-6">Welcome User, {{ session('user')->name }}!</h2>
                    <p class="text-secondary">Your daily caffeine fix, just the way you like it.</p>
                </header>

                <div class="container-fluid py-4">
                    <!-- Profile Settings Section -->
                    <section id="profile-section" class="mb-5 p-4">
                        <div class="card border-0 shadow-sm rounded-3 p-4 mx-auto" style="max-width: 800px;">
                            <h4 class="fw-bold mb-4">User Profile</h4>
                            
                            <!-- Separate Form for Photo Upload -->
                            <form action="{{ route('user_profile.upload') }}" method="POST" enctype="multipart/form-data" class="mb-4">
                                @csrf
                                <div class="row align-items-center pb-4 border-bottom g-3">
                                    <div class="col-12 col-md-auto text-center">
                                        <img src="{{ session('user')->profile_pic ? asset('images/profile_pics/' . session('user')->profile_pic) : asset('images/default.png') }}" 
                                            class="rounded-circle border shadow-sm object-fit-cover" width="110" height="110">
                                    </div>
                                    <div class="col-12 col-md text-center text-md-start">
                                        <h6 class="fw-bold mb-2">Profile Picture</h6>
                                        <div class="d-flex flex-column flex-sm-row gap-2">
                                            <input type="file" name="profile_pic" class="form-control form-control-sm" required>
                                            <button type="submit" class="btn text-white px-4" style="background-color: #8a1616; white-space: nowrap;">
                                                Upload Photo
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <!-- Form for Update User Info & Password -->
                            <form action="{{ route('user_profile.update') }}" method="POST">
                                @csrf
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label small fw-bold">Full Name</label>
                                        <input type="text" name="name" value="{{ session('user')->name }}" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label small fw-bold">Email</label>
                                        <input type="email" name="email" value="{{ session('user')->email }}" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label small fw-bold">Gender</label>
                                        <select name="gender" class="form-control">
                                            <option value="Male" {{ session('user')->gender == 'Male' ? 'selected' : '' }}>Male</option>
                                            <option value="Female" {{ session('user')->gender == 'Female' ? 'selected' : '' }}>Female</option>
                                        </select>
                                    </div>

                                    <hr class="my-4">
                                    <h6 class="fw-bold">Change Password (Leave blank if not changing)</h6>
                                    <div class="col-md-4">
                                        <input type="password" name="current_password" class="form-control" placeholder="Current Password">
                                    </div>
                                    <div class="col-md-4">
                                        <input type="password" name="new_password" class="form-control" placeholder="New Password">
                                    </div>
                                    <div class="col-md-4">
                                        <input type="password" name="new_password_confirmation" class="form-control" placeholder="Confirm New Password">
                                    </div>
                                </div>

                                <div class="mt-4 d-flex gap-2">
                                    <button type="submit" class="btn text-white px-4" style="background-color: #8a1616;">Save Changes</button>
                                </div>
                            </form>
                        </div>
                    </section>
                </div>
            </section>
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