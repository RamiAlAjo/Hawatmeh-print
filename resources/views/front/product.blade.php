@extends('front.layouts.app')

@section('content')

<x-banner :pageTitle="__('Products')" />

<style>
    /* Product Section */
    .product-section-PRO {
        margin-bottom: 40px;
        position: relative;
    }

    /* Carousel controls */
    .carousel-control-prev,
    .carousel-control-next {
        background-color: #2E7D32;
        color: white;
        width: 40px;
        height: 40px;
        border-radius: 0;
        top: 50%;
        transform: translateY(-50%);
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .carousel-control-prev:hover,
    .carousel-control-next:hover {
        background-color: #1B5E20;
    }

    /* Product Item */
    .product-item-PRO {
        background-color: white;
        border-radius: 15px;
        overflow: hidden;
        transition: transform 0.3s ease;
        position: relative;
    }

    .product-item-PRO:hover {
        transform: translateY(-5px);
        border-color: #2E7D32; /* Green border on hover */
    }

    .product-image-PRO {
        position: relative;
        overflow: hidden;
        border-radius: 15px;
        height: 300px; /* Increased height here */
        border: 2px solid #0d6efd; /* Blue border */
        transition: border-color 0.3s ease; /* Smooth border color transition */
    }

    /* Hover effect for border color */
    .product-image-PRO:hover {
        border-color: #2E7D32; /* Green border on hover */
    }

    .product-image-PRO img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
        transition: transform 0.3s ease, filter 0.3s ease;
    }

    .product-image-PRO:hover img {
        transform: scale(1.05);
        filter: blur(5px);
    }

    .more-button {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: rgba(46, 125, 50, 0.8);
        color: white;
        padding: 10px 20px;
        border-radius: 5px;
        opacity: 0;
        transition: opacity 0.3s ease;
        text-decoration: none;
        font-weight: bold;
    }

    .product-image-PRO:hover .more-button {
        opacity: 1;
    }

    .product-name-PRO {
        padding: 10px;
        text-align: center;
        font-weight: 500;
        font-size: 1rem;
        color: #0d6efd;  /* Blue text */
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        transition: color 0.3s ease; /* Smooth text color transition */
    }

    /* Change text color on hover */
    .product-item-PRO:hover .product-name-PRO {
        color: #2E7D32; /* Green text on hover */
    }
</style>

<div class="container">
    <!-- Product Section Title -->
    <h2 class="section-title-PRO" style="color: #2E7D32; margin-bottom: 30px;">{{ __('Our Product') }}</h2>

    <div class="product-section-PRO position-relative">
        <!-- Carousel Component -->
        <div id="productCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach ($products->chunk(8) as $chunkIndex => $chunk)
                    <div class="carousel-item {{ $chunkIndex === 0 ? 'active' : '' }}">
                        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
                            @foreach ($chunk as $product)
                                <div class="col">
                                    <div class="product-item-PRO">
                                        <div class="product-image-PRO">
                                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ app()->getLocale() === 'ar' ? $product->title_ar : $product->title_en }}">
                                            <a href="{{ route('products.show', $product->id) }}" class="more-button">{{ __('More') }}</a>
                                        </div>
                                        <div class="product-name-PRO">
                                            {{ app()->getLocale() === 'ar' ? $product->title_ar : $product->title_en }}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Carousel Controls -->
            <button class="carousel-control-prev" type="button" data-bs-target="#productCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">{{ __('Previous') }}</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#productCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">{{ __('Next') }}</span>
            </button>
        </div>
    </div>
</div>


@endsection
