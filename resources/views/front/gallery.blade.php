@extends('front.layouts.app')

@section('content')

<x-banner :pageTitle="__('gallery')" />


<style>
    .GA-card-container {
        display: flex;
        justify-content: center;
        gap: 70px; /* Increased gap between cards */
        padding: 20px;
    }

    .GA-custom-card {
        width: 350px; /* Wider cards */
        height: 460px;
        border-radius: 20px;
        overflow: hidden;
        position: relative;
        transition: all 0.3s ease;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border: 2px solid #2980b9; /* Initial blue border */
    }

    .GA-custom-card:hover {
        transform: translateY(-5px);
        border-color: #27ae60; /* Green border on hover */
    }

    .GA-gradient-overlay {
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

    .GA-custom-card:hover .GA-gradient-overlay {
        opacity: 1;
    }

    .GA-card-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
</style>

<div class="GA-card-container">
    @foreach($galleries as $gallery)
        <div class="GA-custom-card">
            <img
                src="{{ $gallery->gallery_image ? asset('storage/' . $gallery->gallery_image) : 'https://via.placeholder.com/350x460' }}"
                alt="{{ app()->getLocale() === 'ar' ? $gallery->gallery_title_ar : $gallery->gallery_title_en }}"
                class="GA-card-image"
            >

            <div class="GA-gradient-overlay">
                {{
                    app()->getLocale() === 'ar'
                        ? ($gallery->gallery_title_ar ?? __('no_description'))
                        : ($gallery->gallery_title_en ?? __('no_description'))
                }}
            </div>
        </div>
    @endforeach
</div>



@endsection
