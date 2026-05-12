@extends('layouts.main')

@section('content')

<style>
    body {
      min-height: 100vh;
      background: transparent;
    }
    .bg-container {
      top: 0;
      left: 0;
      height: 100%;
    }
    .image-bg-container {
      width: 100%;
      height: 100%;
      filter: brightness(40%); 
    }
    .glass-card { backdrop-filter: blur(10px); }
    .text-primary-custom { color: #8a1616; }
    .btn-custom { background-color: #8a1616 !important; }+
    .map-container { min-height: 450px; }
</style>

<div class="bg-container position-fixed w-100 overflow-hidden z-n1">
    <img src="{{ asset('images/img1.webp') }}" class="image-bg-container object-fit-cover" alt="Background Image" style="width: 100%; height: 100%;">
</div>

<div class="container py-5">

    <!-- Hero & Header Section -->
    <div class="text-center mb-5 text-white">
        <h1 class="fw-bolder display-4">Contact Us</h1>
        <p class="lead">Feel free to send us a message. We'd love to hear from you!</p>
    </div>

    <div class="row g-4 d-flex align-items-stretch">

        <!-- Contact Form Section -->
        <div class="col-lg-6">
            <div class="card glass-card overflow-hidden h-100 shadow">
                <div class="card-body p-4 p-md-5">
                    <h3 class="fw-bold mb-4 text-primary-custom">Get In Touch</h3>
                    
                    <div class="contact-info mb-4 text-dark">
                        <p class="mb-2"><strong>⚲ Location:</strong> Biñan Laguna, Philippines</p>
                        <p class="mb-2"><strong>✆ Phone:</strong> +63 912 345 6781</p>
                        <p class="mb-0"><strong>✉︎ Email:</strong> jeacoffeeshop@gmail.com</p>
                    </div>

                    <hr class="my-4 hr-custom">

                    <!-- Form Logic -->
                    <form method="POST" action="/contact">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label fw-semibold text-secondary">Full Name</label>
                            <input type="text" 
                                   class="form-control border-0 bg-light" 
                                   id="name" 
                                   name="fullname" 
                                   placeholder="Enter your name" 
                                   required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label fw-semibold text-secondary">Email</label>
                            <input type="email" 
                                   class="form-control border-0 bg-light" 
                                   id="email" 
                                   name="email" 
                                   placeholder="name@example.com" 
                                   required>
                        </div>

                        <div class="mb-3">
                            <label for="message" class="form-label fw-semibold text-secondary">Your Message</label>
                            <textarea class="form-control border-0 bg-light" 
                                      id="message" 
                                      rows="4" 
                                      name="message" 
                                      placeholder="How can we help you?" 
                                      required></textarea>
                        </div>

                        <div class="d-grid mt-4">
                            <button type="submit" class="btn btn-lg btn-custom text-white fw-bold shadow-sm">Send Message</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Map Iframe Section -->
        <div class="col-lg-6">
            <div class="card glass-card rounded-3 h-100 shadow border-0">
                <div class="ratio ratio-1x1 h-100 map-container">
                    <iframe 
                        src="https://www.google.com/maps?q=Laguna,Philippines&output=embed"
                        title="JeaneCoffee Shop Location"
                        allowfullscreen="" 
                        style="border:0;"
                        loading="lazy">
                    </iframe>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection