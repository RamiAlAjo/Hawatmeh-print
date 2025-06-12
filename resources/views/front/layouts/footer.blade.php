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
    font-size: 22px;
    margin-bottom: 20px;
  }
  .FO-footer .FO-quick-links a {
    display: block;
    color: #fff;
    text-decoration: none;
    margin: 5px 0;
    font-size: 18px;
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


</style>

<footer class="FO-footer">
  <div class="container-fluid">
    <div class="row align-items-center text-center">

      <!-- Left Side: Full Logo Image (includes phone number) -->
      <div class="col-md-3 FO-logo mb-3 mb-md-0">
        <img src="{{ asset('./Hawatmeh Logo.svg') }}" alt="Awatmeh Pack Logo" class="img-fluid" style="transform: scale(2.1);">

        <div class="FO-visitor-counter mt-2">
          Visitors
          <span class="FO-counter-box">1</span>
          <span class="FO-counter-box">2</span>
          <span class="FO-counter-box">3</span>
          <span class="FO-counter-box">4</span>
          <span class="FO-counter-box">5</span>
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
<div class="col-md-3 FO-right-img mb-3 mb-md-0 text-md-start text-center">
    <img src="{{ asset('./new logo.jpeg') }}" alt="Support Logos" class="img-fluid" style="transform: scale(1.2); margin-bottom: 5%;">


    <div class="d-flex align-items-center justify-content-md-start justify-content-center gap-2">
      <div class="FO-social-text">Follow Us</div>
      <div class="FO-social-icons d-flex gap-2">
        <i class="bi bi-facebook"></i>
        <i class="bi bi-instagram"></i>
      </div>
    </div>
  </div>


    </div>
  </div>
</footer>
