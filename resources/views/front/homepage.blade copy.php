@extends('front.layouts.app')

@section('content')

{{-- ========================== STYLES ========================== --}}
<style>
    /* Main layout styles */
    .carousel-caption-HP {
        position: absolute;
        bottom: 30%;
        left: 50%;
        transform: translateX(-50%);
        text-align: center;
        color: #fff;
        padding: 0 15px;
    }

    .carousel-caption-title-HP, .carousel-caption-text-HP {
        margin: 0;
        font-weight: bold;
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
        font-size: 1rem;
        padding: 10px 20px;
        text-transform: uppercase;
        border-radius: 5px;
        transition: background-color 0.3s ease;
        background-color: #90ee90;
        color: #333;
        border: none;
    }

    .carousel-btn-HP:hover {
        background-color: #76d76d;
    }

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

    .about-section-HP {
        padding: 30px;
        border-radius: 10px;
        margin-bottom: 40px;
        background-color: #f8f9fa;
    }

    .about-text-HP {
        line-height: 1.7;
        color: #444;
    }

    .product-section-HP {
        margin-bottom: 40px;
    }

    .product-grid-HP {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        gap: 20px;
        margin-bottom: 20px;
    }

    .product-item-HP {
        background-color: white;
        border-radius: 10px;
        overflow: hidden;
        transition: transform 0.3s ease;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .product-item-HP:hover {
        transform: translateY(-5px);
    }

    .product-image-HP {
        position: relative;
        overflow: hidden;
        border-radius: 10px;
        height: 250px;
        border: 2px solid #0d6efd;
    }

    .product-image-HP img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
        transition: transform 0.3s ease;
    }

    .product-image-HP:hover img {
        transform: scale(1.1);
    }

    .product-name-HP {
        padding: 15px;
        text-align: center;
        font-weight: 500;
        font-size: 1.1rem;
        color: #333;
    }

    .more-link-HP {
        display: inline-block;
        color: #2E7D32;
        font-weight: 500;
        text-decoration: none;
        margin-top: 15px;
        float: right;
        text-transform: uppercase;
        padding: 8px;
    }

    .client-section-HP {
        margin-bottom: 40px;
    }

    .client-grid-HP {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
        gap: 20px;
        margin-bottom: 20px;
    }

    .client-item-HP {
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
    }

    .client-item-HP:hover {
        transform: translateY(-5px);
    }

    .client-image-HP {
        position: relative;
        overflow: hidden;
        border-radius: 10px;
        height: 200px;
    }

    .client-image-HP img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
        transition: transform 0.3s ease;
    }

    .client-image-HP:hover img {
        transform: scale(1.1);
    }

    .navigation-arrows-HP {
        display: flex;
        justify-content: space-between;
        width: 100%;
        margin-top: 20px;
    }

    .nav-arrow-HP {
        color: #2E7D32;
        font-size: 2rem;
        cursor: pointer;
    }

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

    .contact-title-HP {
        font-size: 1.8rem;
        font-weight: 600;
    }

    .contact-info-HP {
        text-align: right;
    }

    .contact-item-HP {
        margin-bottom: 10px;
        display: flex;
        align-items: center;
        justify-content: flex-end;
    }

    .contact-icon-HP {
        margin-left: 10px;
        font-size: 1.2rem;
    }

    .company-website-HP {
        text-align: right;
        font-weight: 500;
        margin-top: 20px;
    }

    /* Responsive styles */
    @media (max-width: 1200px) {
        .product-grid-HP {
            grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
        }

        .client-grid-HP {
            grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
        }
    }

    @media (max-width: 992px) {
        .contact-footer-HP {
            flex-direction: column;
            text-align: center;
        }

        .contact-title-HP {
            margin-bottom: 20px;
        }

        .contact-info-HP {
            text-align: center;
        }

        .contact-item-HP {
            justify-content: center;
        }

        .company-website-HP {
            margin-top: 30px;
        }

        .product-grid-HP {
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
        }

        .client-grid-HP {
            grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
        }
    }

    @media (max-width: 768px) {
        .section-title-HP {
            font-size: 1.5rem;
            padding: 6px 12px;
        }

        .product-item-HP, .client-item-HP {
            margin-bottom: 20px;
        }

        .contact-footer-HP {
            padding: 20px;
        }

        .contact-item-HP {
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .more-link-HP {
            float: none;
            display: block;
            text-align: center;
        }

        .carousel-caption-title-HP {
            font-size: 2rem;
        }

        .carousel-caption-text-HP {
            font-size: 1rem;
        }

        .carousel-btn-HP {
            font-size: 0.9rem;
            padding: 8px 15px;
        }
    }

    @media (max-width: 576px) {
        .product-grid-HP, .client-grid-HP {
            grid-template-columns: 1fr;
        }

        .product-name-HP {
            font-size: 1rem;
        }

        .section-title-HP {
            font-size: 1.2rem;
        }

        .carousel-caption-title-HP {
            font-size: 1.8rem;
        }

        .carousel-caption-text-HP {
            font-size: 1rem;
        }
    }

    /* Carousel image height */
    .HP {
        height: 500px;
        object-fit: cover;
    }

    @media (max-width: 767px) {
        .HP {
            height: 300px;
        }
    }

    /* Custom client carousel scroll */
    .client-carousel-HP {
        scroll-behavior: smooth;
        overflow-x: auto;
        scroll-snap-type: x mandatory;
        display: flex;
        gap: 1rem;
        -ms-overflow-style: none;
        scrollbar-width: none;
    }

    .client-carousel-HP::-webkit-scrollbar {
        display: none;
    }

    .client-item-HP {
        scroll-snap-align: start;
        min-width: 33.3333%;
    }

    .nav-arrow-HP {
        font-size: 2rem;
        color: #00b894;
        background: rgba(255, 255, 255, 0.8);
        padding: 5px 12px;
        border-radius: 50%;
        user-select: none;
    }

    .nav-arrow-HP:hover {
        background: #00b894;
        color: #fff;
    }

    .carousel-control-prev-icon,
    .carousel-control-next-icon {
        background-color: #000;
    }

    .carousel-caption-title-HP {
        font-size: 4rem;
        color: #fff;
    }

    .carousel-caption-text-HP {
        color: #fff;
    }

    .carousel-btn-HP {
        background-color: #00b894;
        color: #fff;
    }
</style>

{{-- ========================== BLADE MARKUP ========================== --}}

{{-- Homepage Carousel --}}
<div id="carouselExampleCaptions" class="carousel slide">
    <div class="carousel-indicators">
        @foreach($sliders as $index => $slider)
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{ $index }}"
                class="{{ $index === 0 ? 'active' : '' }}"
                aria-current="{{ $index === 0 ? 'true' : 'false' }}"
                aria-label="{{ __('Slide') }} {{ $index + 1 }}"></button>
        @endforeach
    </div>

    <div class="carousel-inner">
        @foreach($sliders as $index => $slider)
            <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                <img src="{{ asset($slider->image) }}" class="d-block w-100 HP" alt="{{ __('Slider Image') }}">
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
        <span class="visually-hidden">{{ __('Previous') }}</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">{{ __('Next') }}</span>
    </button>
</div>

{{-- Page Content --}}
<div class="container mt-4">

    {{-- About Us --}}
    <h2 class="section-title-HP">{{ __('About Us') }}</h2>
    <div class="about-section-HP">
        <p>{{ app()->getLocale() === 'ar' ? $aboutsection->about_section_description_ar : $aboutsection->about_section_description_en ?? __('No description available.') }}</p>
    </div>

    {{-- Our Product --}}
    <h2 class="section-title-HP">{{ __('Our Product') }}</h2>
    <div class="product-section-HP">
        <div class="row">
            @foreach($products->take(4) as $product)
                <div class="col-md-3 col-sm-6 col-12">
                    <a href="{{ route('products.show', $product->id) }}" class="text-decoration-none text-dark">
                        <div class="product-item-HP">
                            <div class="product-image-HP mb-3">
                                <img src="{{ asset('storage/' . $product->image) }}"
                                     alt="{{ app()->getLocale() === 'ar' ? $product->title_ar : ($product->title_en ?? __('Product')) }}">
                            </div>
                            <div class="product-name-HP">
                                {{ app()->getLocale() === 'ar' ? $product->title_ar : $product->title_en }}
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
        <a href="{{ route('products.index') }}" class="more-link-HP">{{ __('More') }}</a>
    </div>

    {{-- Our Client --}}
    <h2 class="section-title-HP">{{ __('Our Client') }}</h2>
    <div class="client-section-HP position-relative">
        <div class="client-carousel-HP d-flex overflow-hidden" id="client-carousel">
            @foreach($clients as $client)
                <div class="client-item-HP flex-shrink-0" style="width: 33.3333%;">
                    <div class="client-image-HP text-center">
                        <img src="{{ asset('storage/' . $client->client_image) }}"
                             alt="{{ app()->getLocale() === 'ar' ? $client->client_title_ar : $client->client_title_en }}">
                    </div>
                </div>
            @endforeach
        </div>

        {{-- Arrows --}}
        <div class="navigation-arrows-HP d-flex justify-content-between position-absolute w-100 top-50 px-3" style="transform: translateY(-50%);">
            <span class="nav-arrow-HP" id="prev-client">&#10094;</span>
            <span class="nav-arrow-HP" id="next-client">&#10095;</span>
        </div>
    </div>

    {{-- Contact Footer --}}
    <div class="contact-footer-HP mb-4" style="background-image: url('./Banner For ( Get In Touch ).svg'); height: 250px; font-size: 1.3rem;">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-md-6">
                    <div class="contact-title-HP" style="font-size: 2.5rem; text-align: left;">
                        {{ __('Get In Touch') }}
                    </div>
                </div>
                <div class="col-md-6 d-flex flex-column justify-content-center">
                    <div class="contact-info-HP text-center text-md-start">
                        <div class="contact-item-HP d-flex align-items-center mb-2 justify-content-center justify-content-md-start">
                            <i class="bi bi-envelope contact-icon-HP me-2"></i>
                            <a href="mailto:{{ $globalsettings->contact_email ?? 'info@companyname.com' }}" class="text-white text-decoration-none">
                                {{ $globalsettings->contact_email ?? 'info@companyname.com' }}
                            </a>
                        </div>
                        <div class="contact-item-HP d-flex align-items-center mb-2 justify-content-center justify-content-md-start">
                            <i class="bi bi-telephone contact-icon-HP me-2"></i>
                            <a href="tel:{{ $globalsettings->phone ?? '+053845777' }}" class="text-white text-decoration-none">
                                {{ $globalsettings->phone ?? '(05) 384 5777' }}
                            </a>
                        </div>
                        <div class="contact-item-HP d-flex align-items-center mb-2 justify-content-center justify-content-md-start">
                            <i class="bi bi-geo-alt contact-icon-HP me-2"></i>
                            <span>{{ $globalsettings->address ?? '4366+FPH, Zarqa' }}</span>
                        </div>
                    </div>
                    <div class="company-website-HP text-end">
                        <a href="{{ $globalsettings->url ?? 'https://www.companyname.com' }}" class="text-white text-decoration-none">
                            {{ $globalsettings->url ?? 'www.companyname.com' }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

{{-- ========================== JS ========================== --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const carousel = document.getElementById('client-carousel');
        const prev = document.getElementById('prev-client');
        const next = document.getElementById('next-client');
        const scrollStep = carousel.offsetWidth;

        prev.addEventListener('click', () => {
            carousel.scrollBy({ left: -scrollStep, behavior: 'smooth' });
        });

        next.addEventListener('click', () => {
            carousel.scrollBy({ left: scrollStep, behavior: 'smooth' });
        });
    });
</script>

@endsection
