@extends('front.layouts.app')

@section('content')

<x-banner pageTitle="Video Gallery" />

<h1 class="text-start my-5 mx-4" style="color: #2E7D32; margin-bottom: 30px;">
    {{ __('Video Gallery') }}
</h1>

<style>
    .VI_GA-card-container {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 70px;
        padding: 20px;
        justify-content: center;
    }

    .VI_GA-custom-card {
        width: 350px;
        height: 460px;
        border-radius: 20px;
        overflow: hidden;
        position: relative;
        transition: all 0.3s ease;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border: 2px solid #2980b9;
        cursor: pointer;
        margin: 0 auto; /* center card in grid cell */
    }

    .VI_GA-custom-card:hover {
        transform: translateY(-5px);
        border-color: #27ae60;
    }

    .VI_GA-card-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }

    .VI_GA-gradient-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, rgba(76, 209, 55, 0.3) 0%, rgba(52, 152, 219, 0.3) 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 2rem;
        font-weight: bold;
        opacity: 0;
        transition: opacity 0.3s ease;
        text-align: center;
        padding: 0 10px; /* some padding for long titles */
    }

    .VI_GA-custom-card:hover .VI_GA-gradient-overlay {
        opacity: 1;
    }

    /* Responsive: 2 cards per row on tablets */
    @media (max-width: 992px) {
        .VI_GA-card-container {
            grid-template-columns: repeat(2, 1fr);
            gap: 40px;
        }
    }

    /* Responsive: 1 card per row on small/mobile */
    @media (max-width: 576px) {
        .VI_GA-card-container {
            grid-template-columns: 1fr;
            gap: 30px;
            padding: 10px;
        }
        .VI_GA-custom-card {
            width: 100%; /* full width on mobile */
            max-width: 350px;
            margin: 0 auto;
        }
    }
</style>

<div class="VI_GA-card-container">
@foreach ($videoAlbums as $videoGallery)
    <a href="{{ route('video.show', $videoGallery->id) }}" style="text-decoration: none; color: inherit;">
        <div class="VI_GA-custom-card">
            <img src="{{ Storage::url($videoGallery->album_cover) }}" class="VI_GA-card-image" alt="Album Image">
            <div class="VI_GA-gradient-overlay">
                {{ app()->getLocale() === 'ar' ? $videoGallery->album_title_ar : $videoGallery->album_title_en }}
            </div>
        </div>
    </a>
@endforeach

</div>

@endsection
