@extends('front.layouts.app')

@section('content')

<x-banner pageTitle="Photo Gallery" />

<style>
    /* Photo Gallery Section */
    .photo-gallery-section {
        margin-bottom: 40px;
        position: relative;
    }

    /* Carousel Controls */
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

    /* Carousel Item */
    .carousel-item {
        padding: 20px;
    }

    /* Gallery Item (Card) */
    .gallery-item {
        background-color: white;
        border-radius: 15px;
        overflow: hidden;
        transition: transform 0.3s ease;
        position: relative;
        border: 2px solid #0d6efd; /* Border around each card */
        margin-right: 15px; /* Increase gap between cards */
    }

    /* Hover effect for cards */
    .gallery-item:hover {
        transform: translateY(-5px);
        border-color: #2E7D32; /* Green border on hover */
    }

    /* Card Image */
    .gallery-image {
        height: 600px; /* Increased height for the cards */
        width: 400px;
        overflow: hidden;
        border-bottom: 2px solid #0d6efd;
    }

    .gallery-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .gallery-item:hover .gallery-image img {
        transform: scale(1.1); /* Slight zoom effect on hover */
    }

    /* Card Title */
    .album-title {
        padding: 10px;
        text-align: center;
        font-weight: 500;
        font-size: 1rem;
        color: #0d6efd;  /* Blue text */
        transition: color 0.3s ease; /* Smooth text color transition */
    }

    /* Change text color on hover */
    .gallery-item:hover .album-title {
        color: #2E7D32; /* Green text on hover */
    }
    .gallery-item {
        width: 300px; /* fixed width for 3 cards to fit in one row */
        background-color: white;
        border-radius: 15px;
        overflow: hidden;
        transition: transform 0.3s ease;
        position: relative;
        border: 2px solid #0d6efd;
    }

    .gallery-image {
        height: 400px; /* adjust height if you want */
        width: 100%;
        overflow: hidden;
        border-bottom: 2px solid #0d6efd;
    }

    /* Adjusting the number of cards per slide in different screen sizes */
    @media (max-width: 1200px) {
        .carousel-inner {
            display: flex;
        }

        .carousel-item {
            flex: 1 0 33.33%; /* 3 cards per slide */
        }
    }

    @media (max-width: 900px) {
        .carousel-inner {
            display: flex;
        }

        .carousel-item {
            flex: 1 0 50%; /* 2 cards per slide */
        }
    }

    @media (max-width: 600px) {
        .carousel-inner {
            display: flex;
        }

        .carousel-item {
            flex: 1 0 100%; /* 1 card per slide */
        }
    }
</style>

<div class="container">
    <!-- Photo Gallery Section -->
    <h2 class="section-title" style="color: #2E7D32; margin-bottom: 30px;">
        {{ __("our_photo_gallery") }}
    </h2>

    <div class="photo-gallery-section">
        @if (!empty($photoGalleries) && $photoGalleries->count())
            <div id="photoGalleryCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach ($photoGalleries->chunk(3) as $chunkIndex => $chunk)
                        <div class="carousel-item {{ $chunkIndex === 0 ? 'active' : '' }}">
                            <div class="d-flex justify-content-center">
                                @foreach ($chunk as $gallery)
                                    <div class="gallery-item me-3"> <!-- me-3 for right margin -->
                                        <div class="gallery-image">
                                            <img src="{{ asset('storage/' . $gallery->album_images) }}" alt="Gallery Image">
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Carousel Controls -->
                <a class="carousel-control-prev" href="#photoGalleryCarousel" role="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </a>
                <a class="carousel-control-next" href="#photoGalleryCarousel" role="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </a>
            </div>
        @else
            <div class="text-center text-muted py-4">
                No photo galleries available.
            </div>
        @endif
    </div>
</div>
@endsection
