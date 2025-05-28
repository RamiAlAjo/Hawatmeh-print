@extends('front.layouts.app')

@section('content')

<x-banner pageTitle="Photo Album" />

<h1 class="text-start my-5 mx-4" style="color: #2E7D32; margin-bottom: 30px;">
    {{ __("photo_album") }}
</h1>

<style>
    .PH_AL-card-container {
        display: flex;
        justify-content: center;
        gap: 70px; /* Increased gap between cards */
        padding: 20px;
    }

    .PH_AL-custom-card {
        width: 350px; /* Wider cards */
        height: 460px;
        border-radius: 20px;
        overflow: hidden;
        position: relative;
        transition: all 0.3s ease;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border: 2px solid #2980b9; /* Initial blue border */
    }

    .PH_AL-custom-card:hover {
        transform: translateY(-5px);
        border-color: #27ae60; /* Green border on hover */
    }

    .PH_AL-gradient-overlay {
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
        font-size: 3rem;
        font-weight: bold;
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .PH_AL-custom-card:hover .PH_AL-gradient-overlay {
        opacity: 1;
    }

    .PH_AL-card-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
</style>

<div class="PH_AL-card-container">
    <!-- Dynamically displaying the gallery cards -->
    @foreach ($photoGalleries as $photoGallery)
        <a href="{{ route('photo.show', $photoGallery->id) }}" style="text-decoration: none; color: inherit;">
            <div class="PH_AL-custom-card">
                <img src="{{ Storage::url($photoGallery->album_cover) }}" alt="{{ $photoGallery->album_title_en }}" class="PH_AL-card-image">
                <div class="PH_AL-gradient-overlay">
                    {{ app()->getLocale() === 'ar' ? $photoGallery->album_title_ar : $photoGallery->album_title_en }}
                </div>
            </div>
        </a>
    @endforeach

</div>

@endsection
