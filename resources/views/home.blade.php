@extends('layouts.main')

@section('content')

<style>
    .hero-header {
      width: 100vw;
      position: relative;
      left: 50%;
      right: 50%;
      margin-left: -50vw;
      margin-right: -50vw;
      margin-top: -50px !important;
      background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('images/img1.webp') no-repeat center/cover;
      height: 500px;
    }
    .icon-circle {
      width: 70px;
      height: 70px;
      background-color: #f38888;
      font-size: 30px;
    }
    .recipe-img-side {
      width: 100%;
      height: 100%;
      min-height: 220px;
    }
    .recipe-control-icon {
      width: 35px !important;
      height: 35px !important;
      background-size: 50% 50% !important;
      background-color: #333;
    }
    .nav-pills .nav-link {
      color: #555;
      border-radius: 50px;
      padding: 10px 25px;
      font-weight: 600;
      transition: all 0.3s ease;
      border: 1px solid #dee2e6;
      margin: 0 5px;
    }
    .nav-pills .nav-link.active {
      background-color: #8a1616 !important;
      border-color: #8a1616 !important;
      color: #fff !important;
    }
    .menu-card {
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .menu-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
    }
    .badge-best-seller {
      font-size: 0.7rem;
      background-color: #ffc107;
      color: #000;
      padding: 4px 10px;
      border-radius: 50px;
    }
    .recipe-horizontal-card { height: 100%; }
    .recipe-carousel-wrapper { padding: 0 100px 60px 100px; }
    .recipe-horizontal-card .row { height: 100%; }
    .text-justify { text-align: justify; line-height: 1.8;}
    .btn-custom { background-color: #8a1616 !important; }
    .carousel-control-prev { left: -29px !important; }
    .carousel-control-next { right: -29px !important; }
</style>

<header class="hero-header d-flex align-items-center text-center py-5">
  <div class="container text-white">
    <h1 class="fw-bolder display-3">Life Begins After Coffee</h1>
    <p class="lead">You're only one sip away from a good mood. Some <br> days make the coffee, other days the coffee makes you.</p>
    <a href="{{ route('about') }}" class="btn btn-custom text-white btn-lg mt-2 shadow border-0">Find out more</a>
  </div>
</header>

<!-- Services Section -->
<section class="py-5 bg-white">
  <div class="container">
    <div class="text-center mb-5">
      <h1 class="fw-bold text-dark">Our Services</h1>
      <p class="text-muted">Providing the best coffee experience for you</p>
    </div>

    <div class="row text-center g-4">
      <div class="col-md-4">
        <div class="p-4 shadow-sm rounded border bg-white h-100">
          <div class="icon-circle rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3">
            <span>☕︎</span>
          </div>
          <h4 class="fw-bold text-dark">Brewing Workshops</h4>
          <p class="text-muted small">Learn to make the perfect cup using different brewing methods with our baristas.</p>
        </div>
      </div>

      <div class="col-md-4">
        <div class="p-4 shadow-sm rounded border bg-white h-100">
          <div class="icon-circle rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3">
            <span>🚐︎</span>
          </div>
          <h4 class="fw-bold text-dark">Coffee Catering</h4>
          <p class="text-muted small">Bring JeaneCoffee to your events! Perfect for weddings, birthdays, and corporate meetings.</p>
        </div>
      </div>

      <div class="col-md-4">
        <div class="p-4 shadow-sm rounded border bg-white h-100">
          <div class="icon-circle rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3">
            <span>📦︎</span>
          </div>
          <h4 class="fw-bold text-dark">Wholesale Beans</h4>
          <p class="text-muted small">Freshly roasted beans delivered to your door. More savings for offices and small cafes.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Experience Section -->
<section class="py-5 bg-light">
  <div class="container">
    <h1 class="text-center fw-bold mb-5 mt-4 text-dark">Experience the freshly ground difference</h1>
    <div class="row">
      
      <!-- Card 1: Espresso -->
      <div class="col-md-4 mb-4">
        <div class="card shadow-sm h-100 border-0">
          <img src="{{ asset('images/img2.webp') }}" class="card-img-top rounded-top" alt="Espresso">
          <div class="card-body d-flex flex-column text-dark text-justify">
            <div class="flex-grow-1">
              <h4 class="fw-bold">Back to the Basics: Mastering the Perfect Double Shot Espresso</h4>
              <hr class="my-3 opacity-25">
              <p class="small text-muted">Most coffee journeys begin with the quest for the "God Shot." In this guide, we focus on the fundamentals of extraction, exploring temperature and pressure.</p>
            </div>
            <a class="btn btn-custom btn-lg w-100 mt-3 text-white" href="#">Learn more →</a>
          </div>
        </div>
      </div>

      <!-- Card 2: Doppio -->
      <div class="col-md-4 mb-4">
        <div class="card shadow-sm h-100 border-0">
          <img src="{{ asset('images/img3.webp') }}" class="card-img-top rounded-top" alt="Doppio">
          <div class="card-body d-flex flex-column text-dark text-justify">
            <div class="flex-grow-1">
              <h4 class="fw-bold">Double Coffee Trouble: Why the Doppio is the Modern Standard</h4>
              <hr class="my-3 opacity-25">
              <p class="small text-muted">In the world of specialty coffee, the Doppio or double shot is the foundation for almost every cafe menu item. We’re diving into why it offers better flavor.</p>
            </div>
            <a class="btn btn-custom btn-lg w-100 mt-3 text-white" href="#">Learn more →</a>
          </div>
        </div>
      </div>

      <!-- Card 3: Macchiato -->
      <div class="col-md-4 mb-4">
        <div class="card shadow-sm h-100 border-0">
          <img src="{{ asset('images/img4.jpg') }}" class="card-img-top rounded-top" alt="Macchiato">
          <div class="card-body d-flex flex-column text-dark text-justify">
            <div class="flex-grow-1">
              <h4 class="fw-bold">The Best Macchiato: It’s Not the Drink You Think It Is</h4>
              <hr class="my-3 opacity-25">
              <p class="small text-muted">A true Caffè Macchiato is simply an espresso "marked" with a dollop of foamed milk. We’ll show you how to texture milk for micro-foam.</p>
            </div>
            <a class="btn btn-custom btn-lg w-100 mt-3 text-white" href="#">Learn more →</a>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- Coffee Menu Section -->
<section class="py-5 bg-light">
  <div class="container">
  
    <div class="text-center mb-4">
      <h1 class="fw-bold text-dark">Our Coffee Menu List</h1>
      <p class="text-muted">Filtered by your favorites</p>
    </div>

    <!-- Category Navigation -->
    <ul class="nav nav-pills justify-content-center mb-5" id="pills-tab" role="tablist">
      <li class="nav-item">
        <button class="nav-link active" id="pills-all-tab" data-bs-toggle="pill" data-bs-target="#pills-all" type="button" role="tab">All Menu</button>
      </li>
      <li class="nav-item">
        <button class="nav-link" id="pills-best-tab" data-bs-toggle="pill" data-bs-target="#pills-best" type="button" role="tab">Best Sellers 🔥</button>
      </li>
      <li class="nav-item">
        <button class="nav-link" id="pills-classic-tab" data-bs-toggle="pill" data-bs-target="#pills-classic" type="button" role="tab">Classic Selection</button>
      </li>
    </ul>

    <!-- Tab Content -->
    <div class="tab-content" id="pills-tabContent">
    
    <!-- Category 1: All Menu -->
    <div class="tab-pane fade show active" id="pills-all" role="tabpanel">
        <div class="row g-4 justify-content-center">
            @foreach($all_menus as $item)
              <div class="col-lg-6 col-md-10">
                  <div class="card menu-card h-100 shadow-sm border-0 rounded-3 overflow-hidden">
                      <div class="row g-0 align-items-center">
                          <div class="col-4">
                              <img src="{{ asset('images/menu_image/' . $item->image) }}" class="img-fluid object-fit-cover" style="height: 120px; width: 100%;" alt="{{ $item->name }}">
                          </div>
                          <div class="col-8">
                              <div class="card-body">
                                  <div class="d-flex justify-content-between align-items-start">
                                      <div>
                                          @if($item->is_best_seller)
                                              <div class="mb-1"><span class="badge-best-seller fw-bold">🔥 Best Seller</span></div>
                                          @endif
                                          <h5 class="fw-bold mb-0">{{ $item->name }}</h5>
                                          <small class="text-muted">{{ $item->description }}</small>

                                          <div style="margin-top: 7px; display: flex; align-items: center; justify-content: space-between;">
                                            <button class="btn" style="background-color: #8a1616; color: white; font-weight: bold; font-size: 0.85rem; padding: 6px 20px; border-radius: 50px; border: none; box-shadow: 0 4px 6px rgba(0,0,0,0.1); transition: 0.3s;">
                                                Order Now
                                            </button>
                                          </div>
                                      </div>
                                      <span class="fw-bold text-primary fs-5">₱{{ number_format($item->price, 2) }}</span>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
            @endforeach
        </div>
    </div>

    <!-- Category 2: Best Sellers -->
    <div class="tab-pane fade" id="pills-best" role="tabpanel">
        <div class="row g-4 justify-content-center">
            @foreach($best_sellers as $item)
              <div class="col-lg-6 col-md-10">
                  <div class="card menu-card h-100 shadow-sm border-0 rounded-3 overflow-hidden">
                      <div class="row g-0 align-items-center">
                          <div class="col-4">
                              <img src="{{ asset('images/menu_image/' . $item->image) }}" class="img-fluid object-fit-cover" style="height: 120px; width: 100%;" alt="{{ $item->name }}">
                          </div>
                          <div class="col-8">
                              <div class="card-body">
                                  <div class="d-flex justify-content-between align-items-start">
                                      <div>
                                          <div class="mb-1"><span class="badge-best-seller fw-bold">🔥 Best Seller</span></div>
                                          <h5 class="fw-bold mb-0">{{ $item->name }}</h5>
                                          <small class="text-muted">{{ $item->description }}</small>

                                          <div style="margin-top: 7px; display: flex; align-items: center; justify-content: space-between;">
                                            <button class="btn" style="background-color: #8a1616; color: white; font-weight: bold; font-size: 0.85rem; padding: 6px 20px; border-radius: 50px; border: none; box-shadow: 0 4px 6px rgba(0,0,0,0.1); transition: 0.3s;">
                                                Order Now
                                            </button>
                                          </div>
                                      </div>
                                      <span class="fw-bold text-primary fs-5">₱{{ number_format($item->price, 2) }}</span>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
            @endforeach
        </div>
    </div>

    <!-- Category 3: Classic Selection -->
    <div class="tab-pane fade" id="pills-classic" role="tabpanel">
        <div class="row g-4 justify-content-center">
            @foreach($classic_menus as $item)
              <div class="col-lg-6 col-md-10">
                  <div class="card menu-card h-100 shadow-sm border-0 rounded-3 overflow-hidden">
                      <div class="row g-0 align-items-center">
                          <div class="col-4">
                              <img src="{{ asset('images/menu_image/' . $item->image) }}" class="img-fluid object-fit-cover" style="height: 120px; width: 100%;" alt="{{ $item->name }}">
                          </div>
                          <div class="col-8">
                              <div class="card-body">
                                  <div class="d-flex justify-content-between align-items-center">
                                      <div>
                                          @if($item->is_best_seller)
                                              <div class="mb-1"><span class="badge-best-seller fw-bold">🔥 Best Seller</span></div>
                                          @endif
                                          <h5 class="fw-bold mb-0">{{ $item->name }}</h5>
                                          <small class="text-muted">{{ $item->description }}</small>

                                          <div style="margin-top: 7px; display: flex; align-items: center; justify-content: space-between;">
                                            <button class="btn" style="background-color: #8a1616; color: white; font-weight: bold; font-size: 0.85rem; padding: 6px 20px; border-radius: 50px; border: none; box-shadow: 0 4px 6px rgba(0,0,0,0.1); transition: 0.3s;">
                                                Order Now
                                            </button>
                                          </div>
                                      </div>
                                      <span class="fw-bold text-primary fs-5">₱{{ number_format($item->price, 2) }}</span>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
            @endforeach
        </div>
    </div>
</div>
</section>
@endsection