@extends('front.layouts.app')

@section('content')

<x-banner pageTitle="{{ app()->getLocale() == 'ar' ? 'عنّا' : 'About Us' }}" />

    <style>

        /* Section Title Styles */
        .AB-section-title {
             color: #fff;
        background-color: #2E7D32;
        padding: 8px 15px;
        margin-bottom: 20px;
        border-radius: 5px;
        display: inline-block;
        font-weight: 600;
        font-size: 2rem;
        }

        /* Section Title Styles */
        .AB-section-title_2 {
             color: #2E7D32;

        padding: 8px 15px;
        margin-bottom: 20px;
        border-radius: 5px;
        display: inline-block;
        font-weight: 600;
        font-size: 2rem;
        }

        /* About Section */
        .AB-about-section {
            display: flex;
            gap: 30px;
            margin-bottom: 50px;
            align-items: center;
            flex-wrap: wrap; /* Ensures wrapping on smaller screens */
        }

        .AB-about-text {
            flex: 1;
            line-height: 1.6;
        }

        .AB-carousel-img {
            width: 100%;
            height: 500px; /* Increased height */
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .AB-carousel-item.active .AB-carousel-img {
            transform: scale(1.02);
        }

        /* Card Styles */
        .AB-service-card, .AB-printing-card, .AB-package-card, .AB-cardboard-card {
            transition: all 0.3s cubic-bezier(.4, 0, .2, 1);
            border-radius: 15px;
            overflow: hidden;
            text-align: center;
            padding: 25px;
            transform-style: preserve-3d;
            background-color: white;
            border: 2px solid #ddd;
            height: 350px; /* Fixed height */
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            box-sizing: border-box;
            margin-bottom: 30px;
        }

        /* Hover Effects for All Cards */
        .AB-service-card:hover, .AB-printing-card:hover, .AB-package-card:hover, .AB-cardboard-card:hover {
            transform: translateY(-10px) rotateY(2deg);
            box-shadow: 0 14px 28px rgba(0, 0, 0, 0.2);
            background: linear-gradient(to bottom, #1e88e5, #00796b);
        }

        /* Icon Container */
        .AB-service-icon-container {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 15px;
            transition: all 0.3s ease;
            background-color: rgba(76, 175, 80, 0.1); /* Light Green */
        }

        .AB-service-icon-container svg {
            fill: #4CAF50;  /* Green color for icons */
        }

        /* Icon Rotation on Hover */
        .AB-service-card:hover .AB-service-icon-container,
        .AB-printing-card:hover .AB-service-icon-container,
        .AB-package-card:hover .AB-service-icon-container,
        .AB-cardboard-card:hover .AB-service-icon-container {
            transform: rotate(360deg);
        }

        /* Service Title and Description */
        .AB-service-title {
            color: #2E7D32;
            margin-bottom: 15px;
            font-weight: 500;
        }

        .AB-service-desc {
            font-size: 15px;
            color: #555;
        }

        /* Objective and Goal Sections */
        .AB-objective,
        .AB-goal {
            margin-bottom: 20px;
            padding: 15px;
        }

        .AB-objective h4,
        .AB-goal h4 {
            margin-bottom: 8px;
            font-weight: 500;
        }

        .AB-objective, .AB-goal {
            display: flex; /* Align items on the same line */
            align-items: center; /* Center vertically */
        }

        .AB-objective h4, .AB-goal h4 {
            margin-right: 15px;
            flex-shrink: 0;
        }

        .AB-objective p, .AB-goal p {
            margin: 0;
            font-size: 15px;
            color: #555;
            flex-grow: 1;
        }

        /* Media Queries for responsiveness */
        @media (max-width: 767px) {
            .AB-about-section {
                flex-direction: column; /* Stack content for small screens */
                align-items: center;
            }

            .AB-carousel-img {
                max-width: 100%; /* Make carousel images responsive */
                height: 300px; /* Smaller height for mobile */
            }

            .AB-service-card {
                height: auto; /* Allow cards to adjust height on smaller screens */
            }

            .AB-service-icon-container {
                width: 60px;
                height: 60px;
            }

            .AB-service-title {
                font-size: 18px;
            }

            .AB-service-desc {
                font-size: 14px;
            }

            .AB-goal-item, .AB-objective, .AB-goal {
                flex-direction: column; /* Stack the goal items */
            }

            .AB-objective p, .AB-goal p {
                font-size: 14px;
            }
        }

        @media (max-width: 992px) {
            .AB-about-section {
                flex-direction: column;
                align-items: center;
            }

            .AB-service-card {
                margin-bottom: 20px; /* More spacing on medium screens */
            }
        }

        /* Style for carousel indicators (dots) */
        .carousel-indicators button {
            background-color: #4CAF50; /* Green color for dots */
            border-color: transparent; /* No border */
        }

        .carousel-indicators .active {
            background-color: #2E7D32; /* Darker green for active dot */
        }

/* Card Styles */
.AB-service-card, .AB-printing-card, .AB-package-card, .AB-cardboard-card {
    transition: all 0.3s cubic-bezier(.4, 0, .2, 1);
    border-radius: 15px;
    overflow: hidden;
    text-align: center;
    padding: 25px;
    transform-style: preserve-3d;
    background-color: white;
    border: 2px solid #ddd;
    height: 450px; /* Increased height for the service cards */
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    box-sizing: border-box;
    margin-bottom: 30px;
}

/* Text color inside cards before hover */
.AB-service-card .AB-service-title, .AB-service-card .AB-service-desc {
    color: #2E7D32;  /* Green text before hover */
}

/* Hover Effects for All Cards */
.AB-service-card:hover, .AB-printing-card:hover, .AB-package-card:hover, .AB-cardboard-card:hover {
    transform: translateY(-10px) rotateY(2deg);
    box-shadow: 0 14px 28px rgba(0, 0, 0, 0.2);
    background: linear-gradient(to bottom, #1e88e5, #00796b); /* Change to gradient or another color for hover */
}

/* Change text color to white on hover */
.AB-service-card:hover .AB-service-title,
.AB-service-card:hover .AB-service-desc {
    color: #fff;  /* White text on hover */
}

/* Icon Container */
.AB-service-icon-container {
    width: 80px;
    height: 100px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 15px;
    transition: all 0.3s ease;
    background-color: rgba(76, 175, 80, 0.1); /* Light Green */
}

.AB-service-icon-container svg {
    fill: #4CAF50;  /* Green color for icons */
}

/* Icon Rotation on Hover */
.AB-service-card:hover .AB-service-icon-container,
.AB-printing-card:hover .AB-service-icon-container,
.AB-package-card:hover .AB-service-icon-container,
.AB-cardboard-card:hover .AB-service-icon-container {
    transform: rotate(360deg);
}

/* Service Title and Description */
.AB-service-title {
    color: #2E7D32;  /* Green title before hover */
    margin-bottom: 15px;
    font-weight: 500;
}

.AB-service-desc {
    font-size: 15px;
    color: #2E7D32;  /* Green description before hover */
}

    </style>

<div class="container" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}"
    style="text-align: {{ app()->getLocale() === 'ar' ? 'right' : 'left' }};">

   {{-- About Us Section --}}
   <div class="row">
       <div class="col-md-12">
           <h2 class="AB-section-title">{{ __('about_us') }}</h2>
           <div class="AB-about-section" style="display: flex; flex-wrap: wrap; gap: 20px; flex-direction: {{ app()->getLocale() === 'ar' ? 'row-reverse' : 'row' }};">

               <div class="AB-about-text" style="flex: 1 1 60%;">
                   <p>
                       {{ app()->getLocale() === 'ar' ? ($aboutUs->about_us_description_ar ?? __('no_description')) : ($aboutUs->about_us_description_en ?? __('no_description')) }}
                   </p>
               </div>

               {{-- Carousel --}}
               <div class="col-md-5" style="border: 3px solid green; border-radius: 15px; flex: 1 1 35%;">
                   @php
                       $images = json_decode($aboutUs->images);
                   @endphp
                   @if($images && is_array($images) && count($images) > 0)
                       <div id="AB-carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                           <div class="carousel-indicators">
                               @foreach($images as $index => $image)
                                   <button type="button" data-bs-target="#AB-carouselExampleControls" data-bs-slide-to="{{ $index }}" class="{{ $index == 0 ? 'active' : '' }}" aria-label="Slide {{ $index + 1 }}"></button>
                               @endforeach
                           </div>

                           <div class="carousel-inner">
                               @foreach($images as $index => $image)
                                   <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                       <img src="{{ Storage::url($image) }}" class="AB-carousel-img" alt="Image {{ $index + 1 }}">
                                   </div>
                               @endforeach
                           </div>
                       </div>
                   @else
                       <p>No images available.</p>
                   @endif
               </div>

           </div>
       </div>
   </div>

   {{-- Goals and Services Section --}}
   <div class="row mt-5">
       <div class="col-md-12">
           <h2 class="AB-section-title_2">{{ __('our_goals_services') }}</h2>

           <div class="AB-goal-section" style="text-align: {{ app()->getLocale() === 'ar' ? 'right' : 'left' }};">
               {{-- Goal 1 --}}
               @if(app()->getLocale() === 'ar')
                   @if(!empty($aboutUs->goals_title_ar) && !empty($aboutUs->goals_description_ar))
                       <div class="AB-goal-item">
                           <h3>{{ $aboutUs->goals_title_ar }}</h3>
                           <div class="AB-objective">
                               <h4>{{ __('objective') }}:</h4>
                               <p>{{ $aboutUs->goals_description_ar }}</p>
                           </div>
                       </div>
                   @endif
               @else
                   @if(!empty($aboutUs->goals_title_en) && !empty($aboutUs->goals_description_en))
                       <div class="AB-goal-item">
                           <h3>{{ $aboutUs->goals_title_en }}</h3>
                           <div class="AB-objective">
                               <h4>{{ __('objective') }}:</h4>
                               <p>{{ $aboutUs->goals_description_en }}</p>
                           </div>
                       </div>
                   @endif
               @endif
           </div>
       </div>
   </div>

   <div class="row mt-5" style="direction: {{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }};">
       @if(app()->getLocale() === 'ar')
           @foreach($serviceTitlesAr as $index => $title_ar)
               <div class="col-md-4 col-sm-6">
                   <div class="AB-service-card" style="text-align: right;">
                       <div class="AB-service-icon-container">
                           <!-- Icon -->
                           {{-- @include('partials.service-icon') --}}
                       </div>
                       <h3 class="AB-service-title">{{ $title_ar }}</h3>
                       <p class="AB-service-desc">{{ $serviceDescriptionsAr[$index] ?? __('no_description') }}</p>
                   </div>
               </div>
           @endforeach
       @else
           @forelse($serviceTitlesEn as $index => $title_en)
               <div class="col-md-4 col-sm-6">
                   <div class="AB-service-card" style="text-align: left;">
                       <div class="AB-service-icon-container">
                           {{-- @include('partials.service-icon') --}}
                       </div>
                       <h3 class="AB-service-title">{{ $title_en }}</h3>
                       <p class="AB-service-desc">{{ $serviceDescriptionsEn[$index] ?? __('no_description') }}</p>
                   </div>
               </div>
           @empty
               <p>{{ __('no_services_available') }}</p>
           @endforelse
       @endif
   </div>
</div>


@endsection
