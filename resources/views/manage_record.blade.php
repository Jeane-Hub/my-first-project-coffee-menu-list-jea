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
      flex: 1;
      display: flex;
      flex-direction: column;
      min-height: 100vh;
      background-color: #f8f9fa;
    }
    footer.custom-footer {
      width: 100%;
      background-color: #212529;
      margin-top: auto; 
    }
    @media (max-width: 768px) {
      #sidebar { display: none; }
      .content-area { width: 100%; }
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
    #sidebar .nav-link { padding: 12px 20px; margin: 5px 15px; transition: 0.3s; }
    #sidebar .nav-link:hover, #sidebar .nav-link.active { background: rgba(255,255,255,0.1); }
</style>


<div class="d-flex">
    <button class="navbar-toggler d-md-none" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar">
        <span class="navbar-toggler-icon"></span>
    </button>

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
    <div class="content-area flex-1 overflow-y-auto w-100 p-0">
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

        <div class="container-fluid py-4">

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
    
                <!-- Coffee Menu List Table Section -->
                <div class="card border-0 shadow-sm rounded-3 overflow-hidden">
                    <div class="card-header bg-white border-0 py-4 px-4">
                        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
                            <div>
                                <h4 class="fw-bold mb-1" style="color: #8a1616;">Coffee Menu List</h4>
                                <p class="text-muted small mb-0">Manage your daily caffeine offerings and best seller highlights.</p>
                            </div>
                            <div>
                                <!-- Add Record Button -->
                                <button class="btn btn-sm text-white fw-bold px-4 py-2 rounded-3 shadow-sm" data-bs-toggle="modal" data-bs-target="#addRecordModal" style="background-color: #8a1616; border: none;">
                                    <i class="bi bi-person-plus-fill me-2"></i>Add New Record
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Search Input Form for Admin -->
                    <div class="mb-3">
                        <form action="{{ route('admin.manage.record') }}" method="GET" class="d-flex" style="max-width: 300px;">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control" placeholder="Search for coffee..." value="{{ $search ?? '' }}">
                                <button class="btn btn-outline-secondary" type="submit">Search</button>
                                
                                @if(request()->filled('search'))
                                    <a href="{{ route('admin.manage.record') }}" class="btn btn-danger d-flex align-items-center justify-content-center" style="padding: 0 12px; text-decoration: none;">X</a>
                                @endif
                            </div>
                        </form>
                    </div>

                    <!-- Read Table Section -->
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-5">
                            <thead class="bg-light" style="border-bottom: 2px solid #8a1616;">
                                <tr class="text-muted small">
                                    <th class="ps-4 py-3">ID</th>
                                    <th class="ps-4 py-3">NAME</th>
                                    <th class="py-3">CATEGORY</th>
                                    <th class="py-3">DESCRIPTION</th>
                                    <th class="py-3">PRICE</th>
                                    <th class="py-3">IMAGE</th>
                                    <th class="py-3">CREATED DATE</th>
                                    <th class="py-3">UPDATED DATE</th>
                                    <th class="text-center py-3">ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($menus as $item)
                                    <tr>
                                        <td class="ps-4">{{ $item->id }}</td>
                                        <td class="fw-bold">{{ $item->name }}</td>
                                        <td>{{ $item->category }}</td>
                                        <td class="small text-muted">{{ Str::limit($item->description ?? 'No description', 30) }}</td>
                                        <td>₱{{ number_format($item->price, 2) }}</td>
                                        <td>
                                            <img src="{{ asset('images/menu_image/' . $item->image) }}" 
                                                class="rounded border" 
                                                width="40" height="40" 
                                                style="object-fit: cover;"
                                                alt="coffee">
                                        </td>
                                        <td>{{ $item->created_at ? $item->created_at->format('M d, Y') : 'N/A' }}</td> 
                                        <td>{{ $item->updated_at ? $item->updated_at->format('M d, Y') : 'N/A' }}</td>
                                        <td class="text-center">
                                            <button class="btn btn-sm px-3 fw-bold rounded-3 text-bg-warning border-0" data-bs-toggle="modal" data-bs-target="#editModal{{ $item->id }}">Edit</button>
                                            <button class="btn btn-sm text-white px-3 fw-bold rounded-3 ms-1 border-0" style="background-color: #8a1616;" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $item->id }}">Delete</button>
                                        </td>
                                    </tr>

                                    <!-- Modal for Edit -->
                                    <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content border-0 shadow text-start">
                                                <div class="modal-header border-0 px-4 pt-4">
                                                    <h5 class="fw-bold" style="color: #8a1616;"><i class="bi bi-pencil-square me-2"></i>Edit Menu Details</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>
                                                <div class="modal-body p-4">
                                                    <form action="{{ route('menu.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        
                                                        <div class="mb-3">
                                                            <label class="form-label small fw-bold text-muted">NAME</label>
                                                            <input type="text" name="name" value="{{ $item->name }}" class="form-control bg-light border-0 py-2" required>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label class="form-label small fw-bold text-muted">CATEGORY</label>
                                                            <select name="category" class="form-select bg-light border-0 py-2" required>
                                                                <option value="Classic" {{ $item->category == 'Classic' ? 'selected' : '' }}>Classic</option>
                                                                <option value="Best Seller" {{ $item->category == 'Best Seller' ? 'selected' : '' }}>Best Seller</option>
                                                            </select>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label class="form-label small fw-bold text-muted text-uppercase">DESCRIPTION</label>
                                                            <textarea name="description" class="form-control bg-light border-0 py-2" rows="3">{{ $item->description }}</textarea>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label class="form-label small fw-bold text-muted text-uppercase">PRICE</label>
                                                            <input type="text" name="price" value="{{ $item->price }}" class="form-control bg-light border-0 py-2" required>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label class="form-label small fw-bold text-muted text-uppercase">IMAGE</label>
                                                            <input type="file" name="image" class="form-control bg-light border-0 py-2">
                                                            <small class="text-muted">Current: {{ $item->image }}</small>
                                                        </div>

                                                        <button type="submit" class="btn btn-warning w-100 fw-bold py-2 shadow-sm text-dark">Update Record</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Modal for Delete -->
                                    <div class="modal fade" id="deleteModal{{ $item->id }}" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-sm modal-dialog-centered">
                                            <div class="modal-content border-0 shadow">
                                                <div class="modal-body text-center p-4">
                                                    <form action="{{ route('menu.destroy', $item->id) }}" method="POST">
                                                        @csrf
                                                        <div class="mb-3" style="font-size: 3.5rem; color: #8a1616;">🗑️</div>
                                                        <h5 class="fw-bold text-dark">Delete Record</h5>
                                                        <p class="text-muted small">Are you sure you want to delete <strong>{{ $item->name }}</strong>?</p>
                                                        <div class="d-grid gap-2 mt-4">
                                                            <button type="submit" class="btn text-white fw-bold py-2" style="background-color: #8a1616;">Confirm Delete</button>
                                                            <button type="button" class="btn btn-light fw-bold text-muted border py-2" data-bs-dismiss="modal">Cancel</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>

                        <!-- Modal for Insert -->
                        <div class="modal fade" id="addRecordModal" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content border-0 shadow">
                                    <div class="modal-header border-0 px-4 pt-4">
                                        <h5 class="fw-bold" style="color: #8a1616;">Add New Coffee</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body p-4">
                                        <form action="{{ route('menu.store') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="mb-3">
                                                <label class="form-label small fw-bold text-muted">NAME</label>
                                                <input type="text" name="name" class="form-control bg-light border-0 py-2" placeholder="e.g. Americano" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label small fw-bold text-muted">CATEGORY</label>
                                                <select name="category" class="form-select bg-light border-0 py-2" required>
                                                    <option value="Classic">Classic Selection</option>
                                                    <option value="Best Seller">Best Seller</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label small fw-bold text-muted">DESCRIPTION</label>
                                                <textarea name="description" class="form-control bg-light border-0 py-2" rows="3" placeholder="e.g. Simply scrumptious"></textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label small fw-bold text-muted text-uppercase">PRICE</label>
                                                <input type="text" name="price" class="form-control bg-light border-0 py-2" placeholder="e.g. 150" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label small fw-bold text-muted">MENU IMAGE</label>
                                                <input type="file" name="image" class="form-control bg-light border-0 py-2" accept="image/*">
                                            </div>
                                            <button type="submit" class="btn text-white w-100 fw-bold py-2 shadow-sm" style="background-color: #8a1616;">Save to Menu</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>  
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