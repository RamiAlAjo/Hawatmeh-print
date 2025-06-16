@extends('front.layouts.app')

@section('content')

{{-- Styles for the homepage --}}
<style>
    /* Carousel Caption Styling */
    .carousel-caption-HP {
        position: absolute;
        bottom: 30%;
        left: 50%;
        transform: translateX(-50%);
        text-align: center;
        color: #fff;
        padding: 0 15px;
    }

    .carousel-caption-title-HP {
        font-size: 3rem;
        font-weight: 600;
    }

    .carousel-caption-text-HP {
        font-size: 1.2rem;
    }

    .carousel-btn-HP {
        margin-top: 15px;
        padding: 10px 20px;
        font-size: 1rem;
        text-transform: uppercase;
        border-radius: 5px;
        background-color: #90ee90;
        color: #333;
        border: none;
        transition: background-color 0.3s ease;
    }

    .carousel-btn-HP:hover {
        background-color: #76d76d;
    }

    /* Section Title Styling */
    .section-title-HP {
        color: #fff;
        background-color: #2E7D32;
        padding: 8px 15px;
        margin-bottom: 20px;
        border-radius: 5px;
        display: inline-block;
        font-weight: 600;
        font-size: 2rem;
        text-transform: uppercase;
    }

    /* About Us Section */
    .about-section-HP {
        padding: 30px;
        background-color: #f8f9fa;
        border-radius: 10px;
    }

    /* Product Section */
    .product-grid-HP {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        gap: 20px;
    }

    .product-item-HP {
        background-color: white;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
    }

    .product-item-HP:hover {
        transform: translateY(-5px);
    }

    .product-image-HP {
        position: relative;
        height: 250px;
        overflow: hidden;
        border-radius: 10px;
        border: 2px solid #0d6efd;
    }

    .product-name-HP {
        padding: 15px;
        text-align: center;
        font-weight: 500;
        font-size: 1.1rem;
        color: #333;
    }

    /* Client Section */
    .client-carousel-HP {
        display: flex;
        overflow-x: auto;
        scroll-snap-type: x mandatory;
        gap: 1rem;
        -ms-overflow-style: none;
        scrollbar-width: none;
    }

    .client-item-HP {
        scroll-snap-align: start;
        min-width: 33.3333%;
        border-radius: 10px;
        box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
    }

    .client-image-HP img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    /* Navigation Arrows for Client Section */
    .nav-arrow-HP {
        font-size: 2rem;
        color: #00b894;
        background: rgba(255, 255, 255, 0.8);
        padding: 5px 12px;
        border-radius: 50%;
        cursor: pointer;
    }

    .nav-arrow-HP:hover {
        background: #00b894;
        color: white;
    }

    /* Contact Footer Section */
    .contact-footer-HP {
        background-color: rgba(46, 125, 50, 0.8);
        color: white;
        border-radius: 10px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        background-size: cover;
        background-position: center;
    }

    .contact-item-HP {
        margin-bottom: 10px;
        display: flex;
        align-items: center;
    }

    .contact-icon-HP {
        margin-left: 10px;
        font-size: 1rem;
    }

    .company-website-HP {
        text-align: right;
        font-weight: 500;
        font-size: 1rem;
    }

    /* Media Queries for Responsiveness */
    @media (max-width: 1200px) {
        .product-grid-HP {
            grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
        }

        .client-carousel-HP {
            grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
        }
    }

    @media (max-width: 768px) {
        .section-title-HP {
            font-size: 1.5rem;
        }

        .product-item-HP, .client-item-HP {
            margin-bottom: 20px;
        }

        .contact-footer-HP {
            padding: 20px;
        }

        .carousel-caption-title-HP {
            font-size: 2rem;
        }

        .carousel-btn-HP {
            font-size: 0.9rem;
            padding: 8px 15px;
        }
    }

    @media (max-width: 576px) {
        .product-grid-HP {
            grid-template-columns: 1fr;
        }

        .client-carousel-HP {
            grid-template-columns: 1fr;
        }

        .product-name-HP {
            font-size: 1rem;
        }

        .carousel-caption-title-HP {
            font-size: 1.8rem;
        }

        .carousel-caption-text-HP {
            font-size: 1rem;
        }
    }
</style>

{{-- Homepage Carousel --}}
<div id="carouselExampleCaptions" class="carousel slide">
    <div class="carousel-indicators">
        @foreach($sliders as $index => $slider)
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{ $index }}"
                class="{{ $index === 0 ? 'active' : '' }}" aria-label="Slide {{ $index + 1 }}"></button>
        @endforeach
    </div>

    <div class="carousel-inner">
        @foreach($sliders as $index => $slider)
            <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                <img src="{{ asset($slider->image) }}" class="d-block w-100 HP" alt="Slider Image">
                <div class="carousel-caption d-none d-md-block carousel-caption-HP">
                    <h5 class="carousel-caption-title-HP">
                        {{ app()->getLocale() === 'ar' ? $slider->title_ar : $slider->title_en }}
                    </h5>
                    <p class="carousel-caption-text-HP">
                        {{ app()->getLocale() === 'ar' ? $slider->description_ar : $slider->description }}
                    </p>
                    <a href="{{ $slider->url ?? '#' }}" class="btn btn-light carousel-btn-HP" rel="noopener">
                        {{ __('Learn More') }}
                    </a>
                </div>
            </div>
        @endforeach
    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
    </button>
</div>

{{-- About Us Section --}}
<div class="container mt-4">
    <h2 class="section-title-HP">{{ __('About Us') }}</h2>
    <div class="about-section-HP">
        <p>{{ app()->getLocale() === 'ar' ? $aboutsection->about_section_description_ar : $aboutsection->about_section_description_en ?? __('No description available.') }}</p>
    </div>

    {{-- Our Product Section --}}
    <h2 class="section-title-HP">{{ __('Our Product') }}</h2>
    <div class="product-section-HP">
        <div class="product-grid-HP">
            @foreach($products->take(4) as $product)
                <div class="product-item-HP">
                    <div class="product-image-HP">
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->title_en }}">
                    </div>
                    <div class="product-name-HP">
                        {{ app()->getLocale() === 'ar' ? $product->title_ar : $product->title_en }}
                    </div>
                </div>
            @endforeach
        </div>
        <a href="{{ route('products.index') }}" class="more-link-HP">{{ __('More') }}</a>
    </div>

    {{-- Our Client Section --}}
    <h2 class="section-title-HP">{{ __('Our Client') }}</h2>
    <div class="client-carousel-HP">
        @foreach($clients as $client)
            <div class="client-item-HP">
                <div class="client-image-HP">
                    <img src="{{ asset('storage/' . $client->image) }}" alt="{{ $client->name }}">
                </div>
            </div>
        @endforeach
    </div>
</div>

{{-- Footer Section with Contact --}}
<div class="contact-footer-HP mt-5 py-3">
    <div class="container">
        <div class="contact-item-HP">
            <i class="bi bi-geo-alt"></i>
            <span>{{ $settings->address }}</span>
        </div>
        <div class="contact-item-HP">
            <i class="bi bi-telephone"></i>
            <span>{{ $settings->phone }}</span>
        </div>
        <div class="contact-item-HP">
            <i class="bi bi-envelope"></i>
            <span>{{ $settings->email }}</span>
        </div>
        <div class="company-website-HP">
            <p>{{ __('Visit Our Website') }}</p>
        </div>
    </div>
</div>

@endsection
