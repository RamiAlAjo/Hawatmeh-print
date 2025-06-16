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
      width: auto; /* Keeps the aspect ratio intact */
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

    .custom-width {
      max-width: 300px;
      margin-left: auto;
      margin-right: auto;
      text-align: center;
    }

    @media (max-width: 767px) {
      .FO-footer {
        text-align: center;
        padding: 20px 10px;
      }

      .FO-footer .FO-logo img,
      .FO-footer .FO-right-img img {
        max-height: 100px;
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

      /* New Adjustments for Smaller Screens */
      .FO-footer .FO-logo img {
        max-width: 80%; /* Adjust logo size */
        transform: scale(1); /* Ensure the logo is not too large */
      }

      .FO-social-icons i {
        font-size: 20px;
        margin: 0 6px;
      }

      /* Adjust visitor counter for small screens */
      .FO-visitor-counter {
        font-size: 14px;
        text-align: center;
      }

      .FO-counter-box {
        padding: 4px 8px;
        font-size: 14px;
      }

      /* Ensure the Follow Us section is centered and responsive */
      .FO-social-text {
        font-size: 12px;
        margin-top: 10px;
      }

      /* Margin adjustments for mobile */
      .FO-footer .FO-copyright {
        font-size: 12px;
        margin-top: 10px;
      }
    }

     /* Enhance the Visitor Counter with smoother animation */
  .FO-visitor-counter {
    font-size: 20px;
    margin-top: 20px;
    text-align: center;
    position: relative;
  }

  .FO-counter-box {
    display: inline-block;
    background-color: #1b5e20;
    padding: 8px 12px;
    margin: 0 5px;
    border-radius: 6px;
    font-weight: bold;
    font-size: 24px;
    color: #fff;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
    transition: transform 0.3s ease-in-out;
  }

  /* Hover effect on the counter numbers for interaction */
  .FO-counter-box:hover {
    transform: scale(1.1);
    background-color: #2e7d32;  /* Slightly darker when hovered */
  }

  /* Add some visual enhancements to the overall container */
  .visitor-count-container {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 6px;
  }

  /* Style the label of the counter */
  .FO-visitor-counter .fw-bold {
    font-size: 20px;
    margin-right: 10px;
    color: #ffffff;
    font-weight: normal;
  }

  /* Mobile responsiveness for the visitor counter */
  @media (max-width: 767px) {
    .FO-visitor-counter {
      font-size: 18px;
      margin-top: 15px;
    }

    .FO-counter-box {
      padding: 6px 10px;
      font-size: 20px;
    }

    .visitor-count-container {
      gap: 4px;
    }
  }

  /* Animations for the counter digits */
  @keyframes countUp {
    0% {
      transform: translateY(20px);
      opacity: 0;
    }
    50% {
      transform: translateY(-10px);
      opacity: 1;
    }
    100% {
      transform: translateY(0);
      opacity: 1;
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
            <div class="visitor-count-container">
              <span class="FO-counter-box" data-digit="1">0</span>
              <span class="FO-counter-box" data-digit="2">0</span>
              <span class="FO-counter-box" data-digit="3">0</span>
              <span class="FO-counter-box" data-digit="4">0</span>
              <span class="FO-counter-box" data-digit="5">0</span>
            </div>
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
