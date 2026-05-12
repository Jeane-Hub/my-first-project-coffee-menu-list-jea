@extends('layouts.main')

@section('content')

<style>
    .about-hero {
      width: 100vw !important;
      height: 400px;
      left: 50%;
      right: 50%;
      margin-left: -50vw !important;
      margin-right: -50vw !important;
      margin-top: -50px !important;
      padding: 100px 0 !important;
      border-bottom: 8px solid #8a1616 !important;
    }
    .hero-bg-img {
      left: 0;
      filter: brightness(40%);
    }
    .btn-brew {
      background-color: #8a1616 !important;
      padding: 12px 30px !important;
    }
    .mission-circle {
      width: 70px;
      height: 70px;
      background-color: #ff9898;
    }
    .carousel-custom-icon {
      width: 35px !important;
      height: 35px !important;
      background-size: 50% 50% !important;
    }
    .image-column {
      border-bottom: 8px solid #8a1616 !important;
      height: 350px !important;
    }
    .text-justify { text-align: justify !important; }
    .testimonial-tag { color: #8a1616; }
</style>

<header class="container-fluid p-0 m-0 overflow-hidden about-hero text-center text-white position-relative">
    <!-- Background Image -->
    <img src="{{ asset('images/img1.webp') }}" alt="Coffee Background" class="hero-bg-img z-1 object-fit-cover position-absolute start-0 top-0">

    <!-- Content -->
    <div class="container hero-content z-2 position-relative">
        <h1 class="hero-title fw-bolder display-1">Our Seed to Sip Story</h1>
        <p class="fs-5 lead">
            You're only one sip away from a good mood. Some <br> 
            days make the coffee, other days the coffee makes you.
        </p>
    </div>
</header>

<main class="container py-5">
    
    <!-- The Essence Section -->
    <section class="container py-5 mt-4">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <div class="shadow-lg rounded-3 overflow-hidden">
                    <img src="{{ asset('images/img12.webp') }}" class="image-column img-fluid d-block w-100 object-fit-cover" alt="The Essence">
                </div>
            </div>
            <div class="col-lg-6">
                <h2 class="display-6 fw-bold mb-4 ">The Essence of Our Brew</h2>
                <p class="text-muted mb-4 lh-1-8 text-justify">
                    At JeaneCoffee, we believe that coffee is more than just a caffeine kick; it’s an artisanal experience. Our "Seed to Sip" philosophy ensures that every bean is ethically sourced, perfectly roasted, and expertly brewed.
                </p>
                <p class="text-muted mb-4 lh-1-8 text-justify">
                    From the moment the green beans reach our roastery, we treat them with the respect they deserve—roasting them in small batches to unlock their unique flavor profiles.
                </p>
                <a href="#" class="btn btn-brew text-white fw-bold">Join the Brew Crew</a>
            </div>
        </div>
    </section>

    <!-- Mission Section -->
    <section class="container py-5 text-center">
        <h2 class="display-6 fw-bold mb-5">Our Mission</h2>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="mission-card-custom h-100 p-5 border rounded-3 shadow-sm bg-white">
                    <div class="mission-circle d-flex align-items-center justify-content-center fs-3 rounded-circle mx-auto mb-4">🏠︎</div>
                    <h5 class="fw-bold">The "Home" Vibe</h5>
                    <p class="text-muted small">To be a cozy sanctuary where every 'Regular' finds ultimate comfort in every expertly handcrafted cup.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mission-card-custom h-100 p-5 border rounded-3 shadow-sm bg-white">
                    <div class="mission-circle d-flex align-items-center justify-content-center fs-3 rounded-circle mx-auto mb-4">🎯︎</div>
                    <h5 class="fw-bold">The Quality Focus</h5>
                    <p class="text-muted small">To deliver uncompromised flavor complexity and comfort to our community, one signature brew at a time.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mission-card-custom h-100 p-5 border rounded-3 shadow-sm bg-white">
                    <div class="mission-circle d-flex align-items-center justify-content-center fs-3 rounded-circle mx-auto mb-4">✷</div>
                    <h5 class="fw-bold">The Experience-Driven</h5>
                    <p class="text-muted small">Crafting a sanctuary where premium quality coffee meets the warmth of home for our loyal regulars.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Why Section -->
    <section class="container py-5 mt-4">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <h2 class="display-6 fw-bold mb-4">Our Why</h2>
                <p class="text-muted mb-4 lh-1-8 text-justify">
                    "We didn't start JeaneCoffee just to serve drinks; we started it to serve moments." In a world that never stops moving, we realized that people need more than just a caffeine boost—they need a pause.
                </p>
                <p class="text-muted mb-4 lh-1-8 text-justify">
                    Our "Why" is rooted in the belief that a single cup of coffee, crafted with intention, can be the catalyst for a better day, a deeper conversation, or a moment of much-needed clarity. We exist to honor the craft of the barista and the hard work of the farmer, bridging the gap between the soil and your soul.
                </p>
            </div>
            <div class="col-lg-6">
                <div class="shadow-lg rounded-3 overflow-hidden">
                    <img src="{{ asset('images/img13.jpg') }}" class="image-column img-fluid d-block w-100 object-fit-cover" alt="Our Why">
                </div>
            </div>
        </div>
    </section>

    <!-- Who We Are Section -->
    <section class="container py-5 mt-4">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <div class="shadow-lg rounded-3 overflow-hidden">
                    <img src="{{ asset('images/img14.avif') }}" class="image-column img-fluid d-block w-100 object-fit-cover" alt="Who We Are">
                </div>
            </div>
            <div class="col-lg-6">
                <h2 class="display-6 fw-bold mb-4">Who We Are</h2>
                <p class="text-muted mb-4 lh-1-8 text-justify">
                    We are a team of dedicated coffee enthusiasts who believe that every cup should be a perfect balance of art and science. At JeaneCoffee, we pride ourselves on being more than just a café; we are a cozy sanctuary built on the foundation of handcrafted quality and genuine hospitality.
                </p>
                <p class="text-muted mb-4 text-justify lh-1-8 text-justify">
                    Above all, we are a community-driven space committed to serving our 'Regulars' with uncompromised flavor complexity and ultimate comfort.
                </p>
            </div>
        </div>
    </section>

    <section class="py-5 bg-white shadow-sm rounded-4 my-5">
      <div class="text-center mb-5">
        <h6 class="text-uppercase fw-bold mb-2 ls-1 testimonial-tag">Testimonials</h6>
        <h2 class="display-6 fw-bold text-dark">What Our Community Says</h2>
      </div>

      <div id="aboutTestimonials" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="row justify-content-center text-center px-4">
              <div class="col-md-8">
                <p class="fs-4 fst-italic mb-4 text-secondary lh-base">
                  "The atmosphere at JeaneCoffee is unmatched. It’s the perfect Spanish Latte that keep me coming back every morning."
                </p>
                <h5 class="fw-bold mb-1 text-dark">Jean Melendres</h5>
                <span class="text-muted small">Daily Regular | Call Center Agent</span>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="row justify-content-center text-center px-4">
              <div class="col-md-8">
                <p class="fs-4 fst-italic mb-4 text-secondary lh-base">
                  "A sanctuary for freelancers! Great Wi-Fi, even better coffee, and a team that makes you feel right at home. JeaneCoffee is a gem."
                </p>
                <h5 class="fw-bold mb-1 text-dark">Jhon Edward Dasalla</h5>
                <span class="text-muted small">Freelance Writer</span>
              </div>
            </div>
          </div>
        </div>

        <!-- Carousel Buttons -->
        <button class="carousel-control-prev" type="button" data-bs-target="#aboutTestimonials" data-bs-slide="prev">
          <span class="carousel-control-prev-icon bg-dark rounded-circle carousel-custom-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#aboutTestimonials" data-bs-slide="next">
          <span class="carousel-control-next-icon bg-dark rounded-circle carousel-custom-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </section>
</main>
@endsection