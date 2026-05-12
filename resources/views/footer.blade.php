<style>
    footer.custom-footer {
        width: 100%;
        background-color: #212529;
    }
    .footer-logo {
      width: 60px;
      height: 50px;
      margin-left: -15px;
      filter: brightness(0) saturate(100%) invert(37%) sepia(93%) saturate(3015%) hue-rotate(337deg) brightness(108%) contrast(101%);
    }
    .social-img {
      width: 25px;
      height: 25px;
      filter: brightness(0) invert(1); 
    }
    .footer-name { margin-left: -20px; }
</style>

<footer class="custom-footer text-white pt-5 pb-3 mt-auto">
  <div class="container-fluid px-4">
    <div class="row">

      <!-- Logo & Tagline -->
      <div class="col-lg-3 col-md-6 mb-4">
        <a class="d-flex align-items-center text-decoration-none text-white mb-1" href="{{ route('home') }}">
          <img src="{{ asset('images/img15.png') }}" alt="JeaneCoffee Logo" class="footer-logo object-fit-contain">
          <span class="footer-name fw-bold">JeaneCoffee</span>
        </a> 
        <p class="small text-white-50 mt-0">
          You're only one sip away from a good mood. Some days make the coffee, other days the coffee makes you.
        </p>
      </div>

      <!-- Quick Links -->
      <div class="col-lg-3 col-md-6 mb-4 d-flex justify-content-lg-center">
        <div class="text-start">
          <h6 class="fw-bold mb-3">Quick Links</h6>
          <ul class="list-unstyled small">
            <li class="mb-2"><a href="{{ route('home') }}" class="text-white-50 text-decoration-none hover-white">Home</a></li>
            <li class="mb-2"><a href="{{ route('about') }}" class="text-white-50 text-decoration-none hover-white">About</a></li>
            <li class="mb-2"><a href="{{ route('contact') }}" class="text-white-50 text-decoration-none hover-white">Contact</a></li>
          </ul>
        </div>
      </div>

      <!-- Contact Section -->
      <div class="col-lg-3 col-md-6 mb-4 d-flex justify-content-lg-center">
        <div class="text-start">
          <h6 class="fw-bold mb-3">Contact</h6>
          <div class="small text-white-50">
            <p class="mb-1">+63 912 345 6781</p>
            <p class="mb-1">Biñan Laguna, Philippines</p>
            <p class="mb-0">jeacoffeeshop@gmail.com</p>
          </div>
        </div>
      </div>

      <!-- Social Media Section -->
      <div class="col-lg-3 col-md-6 mb-4 d-flex justify-content-lg-center">
        <div class="text-start">
          <h6 class="fw-bold mb-3">Follow Us</h6>
          <div class="d-flex gap-3 align-items-center">
            <a href="https://facebook.com" target="_blank"><img src="{{ asset('images/f1.png') }}" class="social-img"></a>
            <a href="https://instagram.com" target="_blank"><img src="{{ asset('images/i1.png') }}" class="social-img"></a>
            <a href="https://tiktok.com" target="_blank"><img src="{{ asset('images/t11.png') }}" class="social-img"></a>
          </div>
        </div>
      </div>
    </div>

    <hr class="border-secondary mt-4">
    <div class="text-center small text-white-50">
      &copy; {{ date('Y') }} JeaneCoffee. All rights reserved.
    </div>
  </div>
</footer>