@extends('layouts.main')

@section('content')

<style>
    #sidebar {
      min-width: 250px; 
      max-width: 250px; 
      height: 100vh;
      position: sticky;
      top: 0; 
      background-color: #212529;
      display: flex;
      flex-direction: column;
    }
    .content-area {
      flex-grow: 1;
      display: flex;
      flex-direction: column;
      min-height: 100vh;
    }
    footer.custom-footer {
      width: 100%;
      margin-top: auto;
    }
    @media (max-width: 768px) {
      #sidebar { display: none; } 
      .content-area { width: 100%; }
    }
    #sidebar .nav-link { padding: 12px 20px; margin: 5px 15px; transition: 0.3s; }
    #sidebar .nav-link:hover, #sidebar .nav-link.active { background: rgba(255,255,255,0.1); }
</style>

<div class="d-flex">
    <!-- Sidebar -->
    <nav id="sidebar" class="shadow d-flex flex-column">
        <div class="p-4 text-white">
            <h4 class="fw-bold"><i class="bi bi-cup-hot-fill me-2"></i>JeaneCoffee</h4>
        </div>
        <ul class="nav flex-column mb-auto px-1">
            <li><a href="{{ route('admin.dashboard') }}" class="nav-link text-white active rounded"><i class="bi bi-speedometer2 me-2"></i>Dashboard</a></li>
            <li><a href="{{ route('admin.manage.user') }}" class="nav-link text-white rounded"><i class="bi bi-person-circle me-2"></i>Manage Users</a></li>
            <li><a href="{{ route('admin.manage.record') }}" class="nav-link text-white rounded"><i class="bi bi-person-circle me-2"></i>Manage Coffee Record</a></li>
            <li><a href="{{ route('admin.profile') }}" class="nav-link text-white rounded"><i class="bi bi-gear-wide-connected me-2"></i>Account Settings</a></li>
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
    <div class="content-area">
        <!-- Top Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm px-4 py-3 border-0">
            <div class="container-fluid p-0 d-flex align-items-center">
                <span class="navbar-text fw-bold text-dark me-2">ADMIN PORTAL</span>
                <div class="ms-auto d-flex align-items-center">
                    <div class="me-3 text-end d-none d-sm-block">
                        <span class="d-block small fw-bold">{{ session('user')->name }}</span>
                    </div>
                    <img src="{{ session('user')->profile_pic ? asset('images/profile_pics/' . session('user')->profile_pic) : asset('images/default.png') }}" 
                        class="rounded-circle border shadow-sm object-fit-cover" width="38" height="38">
                </div>
            </div>

            <!-- Notification Button -->
            <button type="button" class="btn position-relative fs-5 rounded-circle ms-1 p-0 d-flex align-items-center justify-content-center"> 
                🔔︎ 
                <span class="position-absolute top-0 start-100 translate-middle p-1 bg-danger border border-light rounded-circle">
                    <span class="visually-hidden">New alerts</span>
                </span>
            </button>
        </nav>

        <div class="p-4">
            <!-- Welcome User -->
            <header class="mb-4">
                <h2 class="fw-bold">Welcome Admin, {{ session('user')->name }}!</h2>
                <p class="text-secondary small">Providing the best coffee experience for you.</p>
            </header>

            <div class="row g-3 mb-5">
                <!-- Total Sales Card -->
                <div class="col-md-3 col-sm-6">
                    <div class="card border-0 border-top border-danger border-5 shadow-sm h-100" style="border-top-color: #8a1616 !important;">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div>
                                <h3 class="fw-bold mb-0">3,645</h3>
                                <small class="text-muted">Total Cups Sold</small>
                            </div>
                            <div class="p-4 rounded-circle display-6">☕︎</div>
                        </div>
                    </div>
                </div>
                <!-- Total Customers -->
                <div class="col-md-3 col-sm-6">
                    <div class="card border-0 border-top border-danger border-5 shadow-sm h-100" style="border-top-color: #8a1616 !important;">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div>
                                <h3 class="fw-bold mb-0">951</h3>
                                <small class="text-muted">Total Customers</small>
                            </div>
                            <div class="p-2 rounded-circle display-6">👤︎</div>
                        </div>
                    </div>
                </div>
                <!-- Pending Orders -->
                <div class="col-md-3 col-sm-6">
                    <div class="card border-0 border-top border-danger border-5 shadow-sm h-100" style="border-top-color: #8a1616 !important;">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div>
                                <h3 class="fw-bold mb-0">152</h3>
                                <small class="text-muted">Pending Orders</small>
                            </div>
                            <div class="p-2 rounded-circle display-6">📓︎</div>
                        </div>
                    </div>
                </div>
                <!-- Feedback -->
                <div class="col-md-3 col-sm-6">
                    <div class="card border-0 border-top border-danger border-5 shadow-sm h-100" style="border-top-color: #8a1616 !important;">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div>
                                <h3 class="fw-bold mb-0">22</h3>
                                <small class="text-muted">Unread Feedback</small>
                            </div>
                            <div class="p-2 rounded-circle display-6">✉︎</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sales Analytics -->
            <div class="row g-4">
                <div style="position: relative; height: 400px; width: 600px; margin: auto;">
                    <h5 class="fw-bold mb-0 text-dark">Sales Analytics</h5>
                    <canvas id="myChart"></canvas>
                </div>

                <!-- Booking Calendar -->
                <div class="col-lg-4">
                    <div class="row align-items-center g-2 mb-3">
                        <div class="col-12 col-sm-6 text-start">
                            <h5 class="fw-bold mb-0 text-dark">Schedules</h5>
                        </div>
                        
                        <!-- Date Section -->
                        <div class="col-12 col-sm-6 text-sm-end">
                            <small class="fw-bold text-muted d-inline-block px-2 py-1 bg-light rounded shadow-xs fs-0.2">
                                FEBRUARY 2026
                            </small>
                        </div>
                    
                        <div class="table-responsive">
                            <table class="table table-sm table-borderless text-center align-middle fs-0.3">
                                <thead>
                                    <tr class="text-muted small">
                                        <th>S</th><th>M</th><th>T</th><th>W</th><th>T</th><th>F</th><th>S</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td><td>2</td><td>3</td><td>4</td><td>5</td><td>6</td><td class="rounded-circle bg-warning-subtle fw-bold py-2">7</td>
                                    </tr>
                                    <tr>
                                        <td>8</td><td>9</td><td class="rounded-circle text-white py-2 fw-bold" style="background-color: #8a1616;">10</td><td>11</td><td>12</td><td>13</td><td>14</td>
                                    </tr>
                                    <tr>
                                        <td>15</td><td class="rounded-circle bg-warning-subtle fw-bold py-2">16</td><td>17</td><td>18</td><td>19</td><td>20</td><td>21</td>
                                    </tr>
                                    <tr>
                                        <td>22</td><td>23</td><td>24</td><td>25</td><td>26</td><td>27</td><td>28</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-3">
                            <div class="d-flex align-items-center mb-2">
                                <span class="d-inline-block rounded-circle me-2 bg-warning-subtle" style="width:10px; height:10px;"></span>
                                <small class="text-muted">Coffee Catering (Event)</small>
                            </div>
                            <div class="d-flex align-items-center">
                                <span class="d-inline-block rounded-circle me-2" style="width:10px; height:10px; background-color: #8a1616;"></span>
                                <small class="text-muted">Bulk Delivery Order</small>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent Bookings & Deliveries -->
                <div class="col-lg-4">
                    <div class="card border-0 shadow-sm p-4 h-100">
                        <h5 class="fw-bold mb-4">Recent Activity</h5>
                        <div class="vstack gap-4">
                            <div class="d-flex flex-column flex-sm-row justify-content-between align-items-start gap-2">
                                <div>
                                    <h6 class="mb-0 fw-bold">Marcial Punay</h6>
                                    <small class="text-muted">Wedding Catering (30pax)</small>
                                </div>
                                <span class="badge text-white px-3 py-2 fs-0.2" style="background-color: #8a1616;">Booked</span>
                            </div>
                            <div class="d-flex flex-column flex-sm-row justify-content-between align-items-start gap-2 border-top pt-3">
                                <div>
                                    <h6 class="mb-0 fw-bold">Angie Melendrez</h6>
                                    <small class="text-muted">Office Delivery (5 Drinks)</small>
                                </div>
                                <span class="badge text-bg-warning px-3 py-2 fs-0.2">Pending</span>
                            </div>
                            <div class="d-flex flex-column flex-sm-row justify-content-between align-items-start gap-2 border-top pt-3">
                                <div>
                                    <h6 class="mb-0 fw-bold">Jhon Edward Dasalla</h6>
                                    <small class="text-muted">Espresso Bulk Order</small>
                                </div>
                                <span class="badge text-bg-success px-3 py-2 fs-0.2">Delivered</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- System Data -->
                <div class="card border-0 shadow-sm p-4 mt-5" style="max-width: 800px; margin: auto; border-radius: 15px;">
                    <div class="row align-items-center">
                        <div class="col-md-7">
                            <h5 class="fw-bold text-dark mb-3">System Overview</h5>
                            <div style="height: 300px;">
                                <canvas id="systemChart"></canvas> 
                            </div>
                        </div>

                        <div class="col-md-5 ps-md-4">
                            <h5 class="fw-bold text-dark mb-1">Data Summary</h5>
                            <p class="text-muted small mb-4">Total records in database</p>
                            
                            <!-- User Card -->
                            <div class="card text-white mb-3 border-0" style="background-color: #8a1616;">
                                <div class="card-body py-2">
                                    <small>Total Users</small>
                                    <h3 class="mb-0">{{ $usercount }}</h3>
                                </div>
                            </div>

                            <!-- Menu Card -->
                            <div class="card text-white border-0" style="background-color: #a12a2a;"> 
                                <div class="card-body py-2">
                                    <small>Total Menu Items</small>
                                    <h3 class="mb-0">{{ $menucount }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://jsdelivr.net"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        
        // Bar Chart (Sales 2026)
        const ctxBar = document.getElementById('myChart');
        if (ctxBar) {
            new Chart(ctxBar, {
                type: 'bar',
                data: {
                    labels: {!! json_encode($chartLabels) !!},
                    datasets: [{
                        label: 'Sales 2026',
                        data: {!! json_encode($chartData) !!},
                        backgroundColor: '#8a1616'
                    }]
                },
                options: { responsive: true, maintainAspectRatio: false }
            });
        }

        // Bar Chart (System Data)
        const ctxSystem = document.getElementById('systemChart');
        if (ctxSystem) {
            new Chart(ctxSystem, {
                type: 'bar',
                data: {
                    labels: ['Users', 'Menu Items'],
                    datasets: [{
                        label: 'System Data',
                        data: [{{ $usercount }}, {{ $menucount }}],
                        backgroundColor: ['#8a1616', '#b02a2a'], 
                        borderWidth: 1
                    }]
                },
                options: { 
                    responsive: true,
                    scales: {
                        y: { beginAtZero: true }
                    }
                }
            });
        }
    });
</script>
@endsection