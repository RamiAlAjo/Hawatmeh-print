<style>
  .FO-footer {
    background: linear-gradient(to right, #a3d4a4, #0a6d2d);
    color: #fff;
    padding: 30px 15px;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  }

  .FO-footer .FO-logo img,
  .FO-footer .FO-right-img img {
    max-height: 140px;
  }
  .FO-footer .FO-quick-links h5 {
    font-weight: bold;
    font-size: 26px;
    margin-bottom: 20px;
  }
  .FO-footer .FO-quick-links a {
    display: block;
    color: #fff;
    text-decoration: none;
    margin: 5px 0;
    font-size: 20px;
  }
  .FO-footer .FO-quick-links a:hover {
    text-decoration: underline;
  }
  .FO-visitor-counter {
    font-size: 18px;
    margin-top: 15px;
  }
  .FO-counter-box {
    display: inline-block;
    background-color: #1b5e20;
    padding: 5px 8px;
    margin: 0 2px;
    border-radius: 4px;
    font-weight: bold;
  }
  .FO-social-icons i {
    font-size: 24px;
    margin: 0 5px;
    color: white;
  }
  .FO-copyright {
    font-size: 14px;
    margin-top: 20px;
    text-align: center;
  }
  .FO-social-text {
    font-size: 14px;
    margin-top: 10px;
  }

  .FO-social-icons i {
  font-size: 24px;
  color: white;
  margin-right: 5px;
}
.custom-width {
    max-width: 300px;     /* Or use 30% if you want fluid width */
    margin-left: auto;
    margin-right: auto;
    text-align: center;   /* Optional: centers text inside */
}

@media (max-width: 767px) {
  .FO-footer {
    text-align: center;
    padding: 20px 10px;
  }

  .FO-footer .FO-logo img,
  .FO-footer .FO-right-img img {
    max-height: 100px;
    transform: scale(1.2);
    margin: 0 auto;
  }

  .FO-footer .FO-quick-links {
    margin-top: 20px;
  }

  .FO-footer .FO-quick-links h5 {
    font-size: 22px;
    margin-bottom: 15px;
  }

  .FO-footer .FO-quick-links a {
    font-size: 18px;
    margin: 4px 0;
  }

  .FO-footer .FO-quick-links .row {
    flex-direction: column;
  }

  .FO-footer .FO-quick-links .col {
    margin-bottom: 10px;
  }

  .FO-social-icons {
    justify-content: center;
  }

  .FO-social-icons i {
    font-size: 22px;
    margin: 0 8px;
  }

  .FO-visitor-counter {
    font-size: 16px;
    margin-top: 10px;
  }

  .FO-counter-box {
    padding: 4px 6px;
    margin: 0 1px;
    font-size: 14px;
  }

  .custom-width {
    max-width: 100%;
    padding: 0 10px;
  }
}
</style>

<footer class="FO-footer">
  <div class="container-fluid">
    <div class="row align-items-center text-center">

      <!-- Left Side: Full Logo Image (includes phone number) -->
      <div class="col-md-3 FO-logo mb-3 mb-md-0">
        <img src="{{ asset('./Hawatmeh Logo.svg') }}" alt="Awatmeh Pack Logo" class="img-fluid" style="transform: scale(2.1);">

        <div class="FO-visitor-counter mt-2" aria-label="Visitor counter" role="group">
            <span class="fw-bold">Visitors</span>
            <span class="visually-hidden">Visitor count is</span>
            <span class="FO-counter-box" data-digit="1">0</span>
            <span class="FO-counter-box" data-digit="2">0</span>
            <span class="FO-counter-box" data-digit="3">0</span>
            <span class="FO-counter-box" data-digit="4">0</span>
            <span class="FO-counter-box" data-digit="5">0</span>
          </div>

      </div>

<!-- Center: Quick Links -->
<div class="col-md-6 FO-quick-links custom-width">
    <h5>{{ __('Quick Link') }}</h5>
    <div class="row gx-2">
        <div class="col">
            <a href="{{ route('home') }}">{{ __('home') }}</a>
            <a href="{{ route('about.index') }}">{{ __('about_us') }}</a>
            <a href="{{ route('products.index') }}">{{ __('our_products') }}</a>
            <a href="{{ route('clients.index') }}">{{ __('our_clients') }}</a>
        </div>
        <div class="col">
            <a href="{{ route('gallery.index') }}">{{ __('gallery') }}</a>
            <a href="{{ route('portfolio.index') }}">{{ __('portfolio') }}</a>
            <a href="{{ route('contact.index') }}">{{ __('contact_us') }}</a>
        </div>
    </div>
    <div class="FO-copyright">
        &copy;2025 by Jordan Code &#10006;
    </div>
</div>

<!-- Right Side: Full Image (includes Arabic text) -->
<div class="col-md-3 FO-right-img mb-3 mb-md-0 text-center">
    <img src="{{ asset('new logo.jpeg') }}" alt="Support Logos" class="img-fluid" style="transform: scale(1.2); margin-bottom: 5%;">

    <!-- Centered "Follow Us" Section -->
    <div class="d-flex flex-column align-items-center gap-2">
        <div class="FO-social-text">Follow Us</div>
        @php
        $settings = \App\Models\WebsiteSetting::first(); // Adjust if you have multiple rows
    @endphp

    <!-- Social Icons (conditionally rendered) -->
    <div class="FO-social-icons d-flex gap-2 justify-content-center">
        @if(!empty($settings?->facebook))
            <a href="{{ $settings->facebook }}" target="_blank" class="text-decoration-none text-dark">
                <i class="bi bi-facebook"></i>
            </a>
        @endif

        @if(!empty($settings?->instagram))
            <a href="{{ $settings->instagram }}" target="_blank" class="text-decoration-none text-dark">
                <i class="bi bi-instagram"></i>
            </a>
        @endif
    </div>

    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
      document.querySelectorAll(".animated-counter").forEach((box, index) => {
        const target = parseInt(box.getAttribute("data-digit"), 10);
        if (isNaN(target)) return;

        let current = 0;

        const interval = setInterval(() => {
          box.textContent = current;
          box.classList.add("counting");
          if (current >= target) {
            clearInterval(interval);
            box.classList.remove("counting");
          }
          current++;
        }, 100 + index * 30); // staggered animation delay
      });
    });
  </script>


</footer>
