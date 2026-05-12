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
    .content-area { 
      padding-left: 0 !important;
      display: flex;
      flex-direction: column;
      min-height: 100vh;
    }
    #sidebar .nav-link:hover, #sidebar .nav-link.active { background: rgba(255,255,255,0.1); }
    @media (max-width: 700px) { #sidebar { display: none; }}
</style>

<div class="d-flex">
    <button class="navbar-toggler d-md-none" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar">
        <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Sidebar -->
    <nav id="sidebar" class="shadow bg-dark position-sticky d-flex">
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
        <section class="section flex-grow-1">
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

            <div class="container-fluid p-4">
                <!-- Welcome Section -->
                <section id="dashboard" class="mb-5">
                    <header class="mb-4">
                        <h2 class="fw-bold display-6">Welcome User, {{ session('user')->name }}!</h2>
                        <p class="text-secondary">Your daily caffeine fix, just the way you like it.</p>
                    </header>

                    <!-- Order Summary Cards -->
                    <div class="row g-3 mb-4">
                        <div class="col-md-4">
                            <div class="card order-card shadow-sm p-3 border-start border-4" style="border-color: #8a1616 !important;">
                                <p class="text-muted small mb-1">Current Orders</p>
                                <h3 class="fw-bold">5</h3>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card order-card p-3 border-start border-4" style="border-color: #8a1616 !important;">
                                <p class="text-muted small mb-1">Total Coffee Ordered</p>
                                <h3 class="fw-bold">100</h3>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card order-card shadow-sm p-3 border-start border-4" style="border-color: #8a1616 !important;">
                                <p class="text-muted small mb-1">Loyalty Points</p>
                                <h3 class="fw-bold">50 out of 100</h3>
                            </div>
                        </div>
                    </div>

                    <!-- Recent Orders Table -->
                    <div class="card border-0 shadow-sm rounded-3">
                        <div class="card-header bg-white py-3">
                            <h5 class="fw-bold mb-0">My Recent Orders</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover align-middle">
                                    <thead class="table-light">
                                        <tr>
                                            <th>ID</th>
                                            <th>MENU ITEM</th>
                                            <th>STATUS</th>
                                            <th>PRICE</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr><td>1</td><td>Caramel Macchiato</td><td><span class="badge text-bg-warning px-3 py-2">Processing</span></td><td>₱165.00</td></tr>
                                        <tr><td>2</td><td>Americano</td><td><span class="badge text-bg-success px-3 py-2">Completed</span></td><td>₱110.00</td></tr>
                                        <tr><td>3</td><td>Cappuccino</td><td><span class="badge text-white px-3 py-2" style="background-color: #8a1616;">Cancelled</span></td><td>₱140.00</td></tr>
                                        <tr><td>4</td><td>Café Latte</td><td><span class="badge text-bg-success px-3 py-2">Completed</span></td><td>₱135.00</td></tr>
                                        <tr><td>5</td><td>Espresso Solo</td><td><span class="badge text-bg-warning px-3 py-2">Processing</span></td><td>₱85.00</td></tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </section> 
            </div>
        </section>
    </div>
</div>
@endsection
