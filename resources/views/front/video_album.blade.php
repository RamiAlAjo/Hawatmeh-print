@extends('front.layouts.app')

@section('content')

<x-banner pageTitle="Video Gallery" />

<h1 class="text-start my-5 mx-4" style="color: #2E7D32; margin-bottom: 30px;">Video Gallery</h1> <!-- Title Updated -->

<style>
    .VI_GA-card-container {
        display: flex;
        justify-content: center;
        gap: 70px; /* Increased gap between cards */
        padding: 20px;
    }

    .VI_GA-custom-card {
        width: 350px; /* Wider cards */
        height: 460px;
        border-radius: 20px;
        overflow: hidden;
        position: relative;
        transition: all 0.3s ease;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border: 2px solid #2980b9; /* Initial blue border */
    }

    .VI_GA-custom-card:hover {
        transform: translateY(-5px);
        border-color: #27ae60; /* Green border on hover */
    }

    .VI_GA-card-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
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
    }

    .VI_GA-custom-card:hover .VI_GA-gradient-overlay {
        opacity: 1;
    }

    /* Responsive design for smaller screens */
    @media (max-width: 768px) {
        .VI_GA-card-container {
            flex-wrap: wrap; /* Allow cards to wrap in smaller screens */
            gap: 30px; /* Reduce gap for smaller screens */
        }
    }
</style>

<div class="VI_GA-card-container">
    @foreach ($videoAlbums as $videoAlbum)
        <div class="VI_GA-custom-card">
            <img src="{{ Storage::url($videoAlbum->album_image) }}" class="VI_GA-card-image" alt="Album Image">
            <div class="VI_GA-gradient-overlay">{{ $videoAlbum->album_title_en }}</div>
        </div>
    @endforeach
</div>


@endsection
