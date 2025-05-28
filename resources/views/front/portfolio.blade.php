@extends('front.layouts.app')

@section('content')
<x-banner :pageTitle="__('portfolio')" />

<div class="container mt-5">
    <h3 class="text-center mb-4">{{ app()->getLocale() == 'ar' ? 'محفظتنا' : 'Our Portfolio' }}</h3> <!-- Translated section heading -->

    <div class="row">
        @foreach($portfolios as $portfolio)
            <div class="col-md-12 mb-4">
                <div class="card shadow-sm rounded">
                    <div class="card-body">
                        <!-- Translated title -->
                        <h5 class="card-title">{{ app()->getLocale() == 'en' ? $portfolio->title_en : $portfolio->title_ar }}</h5>

                        <!-- Translated description with a character limit for both languages -->
                        <p class="card-text">
                            {{ app()->getLocale() == 'en' ? Str::limit($portfolio->description_en, 100) : Str::limit($portfolio->description_ar, 100) }}
                        </p>

                        <!-- Check if a resume exists, and render it accordingly -->
                        @if($portfolio->resume)
                            <div class="iframe-container" style="display: flex; justify-content: center; align-items: center; height: 500px; overflow: hidden;">
                                <iframe src="{{ asset('/tokyo/storage/app/public/' . $portfolio->resume) }}" style="width: 100%; height: 100%; border: none;"></iframe>
                            </div>
                        @else
                            <p class="text-muted">{{ app()->getLocale() == 'ar' ? 'لا توجد سيرة ذاتية مرفقة.' : 'No resume uploaded.' }}</p> <!-- Translated message when no resume is available -->
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
