@extends('front.layouts.app')

@section('content')

<x-banner pageTitle="Gallery" />

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
    <a href="{{ route('photo.index') }}" class="GA-custom-card" style="display: inline-block; text-decoration: none; color: inherit;">
        <img
            src="{{ asset('assets/placeholder.jpg') }}"
            alt="{{ __('Photos') }}"
            class="GA-card-image"
            style="display: block; width: 100%;"
        >
        <div class="GA-gradient-overlay" style="pointer-events: none;">
            {{ app()->getLocale() === 'ar' ? 'صور' : 'Photos' }}
        </div>
    </a>

    <a href="{{ route('video.index') }}" class="GA-custom-card" style="display: inline-block; text-decoration: none; color: inherit; margin-left: 20px;">
        <img
            src="{{ asset('assets/placeholder.jpg') }}"
            alt="{{ __('Videos') }}"
            class="GA-card-image"
            style="display: block; width: 100%;"
        >
        <div class="GA-gradient-overlay" style="pointer-events: none;">
            {{ app()->getLocale() === 'ar' ? 'فيديوهات' : 'Videos' }}
        </div>
    </a>

</div>



@endsection
