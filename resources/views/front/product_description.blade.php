@extends('front.layouts.app')

@section('content')

<x-banner :pageTitle="__('product_description')" />

    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
            background-color: #fff;
        }

        .section-title.PRO_DESC {
            color: #2E7D32;
            margin-bottom: 30px;
            font-weight: bold;
            font-size: 2rem;
        }

        .package-title.PRO_DESC {
            color: #0275d8;
            margin-bottom: 15px;
            font-size: 24px;
        }

        .package-content.PRO_DESC {
            color: #333;
            line-height: 1.6;
            margin-bottom: 40px;
            font-size: 1.1rem;
        }

        .carousel-item.PRO_DESC img {
            width: 100%;
            height: auto;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }

        .carousel-indicators.PRO_DESC {
            position: static;
            margin-top: 10px;
        }

        .carousel-indicators.PRO_DESC button {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background-color: #ccc;
            border: none;
            margin: 0 5px;
        }

        .carousel-indicators.PRO_DESC .active {
            background-color: #2E7D32;
        }

        .features-section.PRO_DESC, .benefits-section.PRO_DESC {
            margin-bottom: 40px;
        }

        .feature-title.PRO_DESC, .benefit-title.PRO_DESC {
            color: #0275d8;
            margin-bottom: 20px;
            font-size: 24px;
        }

        .feature-item.PRO_DESC, .benefit-item.PRO_DESC {
            display: flex;
            align-items: flex-start;
            margin-bottom: 15px;
            padding-left: 0;
        }

        .check-icon.PRO_DESC {
            color: #4CAF50;
            margin-right: 15px;
            font-size: 24px;
        }

        .feature-text.PRO_DESC, .benefit-text.PRO_DESC {
            color: #0275d8;
            font-size: 1rem;
        }

        .benefit-text.PRO_DESC {
            display: flex;
            flex-direction: column;
        }

        /* Custom Media Queries */
        @media (max-width: 992px) {
            .section-title.PRO_DESC {
                font-size: 1.8rem;
                margin-bottom: 25px;
            }

            .package-title.PRO_DESC {
                font-size: 22px;
            }

            .package-content.PRO_DESC {
                font-size: 1rem;
                margin-bottom: 30px;
            }

            .carousel-inner.PRO_DESC {
                height: 300px;
            }

            .carousel-item.PRO_DESC img {
                height: 100%;
                object-fit: cover;
            }

            .feature-title.PRO_DESC, .benefit-title.PRO_DESC {
                font-size: 22px;
            }

            .feature-item.PRO_DESC, .benefit-item.PRO_DESC {
                flex-direction: column;
            }
        }

        @media (max-width: 768px) {
            .section-title.PRO_DESC {
                font-size: 1.6rem;
                margin-bottom: 20px;
            }

            .package-title.PRO_DESC {
                font-size: 20px;
            }

            .package-content.PRO_DESC {
                font-size: 1rem;
                margin-bottom: 20px;
            }

            .carousel-inner.PRO_DESC {
                height: 250px;
            }

            .carousel-item.PRO_DESC img {
                height: 100%;
                object-fit: cover;
            }

            .feature-item.PRO_DESC, .benefit-item.PRO_DESC {
                flex-direction: column;
                align-items: flex-start;
            }

            .feature-text.PRO_DESC, .benefit-text.PRO_DESC {
                margin-left: 0;
                font-size: 1rem;
            }

            .check-icon.PRO_DESC {
                font-size: 20px;
            }

            .feature-item.PRO_DESC, .benefit-item.PRO_DESC {
                margin-bottom: 10px;
            }
        }

        @media (max-width: 576px) {
            .section-title.PRO_DESC {
                font-size: 1.4rem;
                margin-bottom: 15px;
            }

            .package-title.PRO_DESC {
                font-size: 18px;
            }

            .package-content.PRO_DESC {
                font-size: 0.9rem;
                margin-bottom: 15px;
            }

            .carousel-inner.PRO_DESC {
                height: 200px;
            }

            .carousel-item.PRO_DESC img {
                height: 100%;
                object-fit: cover;
            }

            .feature-item.PRO_DESC, .benefit-item.PRO_DESC {
                flex-direction: column;
                align-items: flex-start;
            }

            .check-icon.PRO_DESC {
                font-size: 20px;
            }

            .feature-text.PRO_DESC, .benefit-text.PRO_DESC {
                font-size: 0.9rem;
            }

            .feature-item.PRO_DESC, .benefit-item.PRO_DESC {
                margin-bottom: 8px;
            }
        }
    </style>

<div class="container PRO_DESC" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
    <h1 class="section-title PRO_DESC" style="text-align: {{ app()->getLocale() === 'ar' ? 'right' : 'left' }};">
        {{ __('Product Description') }}
    </h1>

    <div class="row PRO_DESC">
        <div class="col-lg-5 col-md-12 PRO_DESC">
            <div id="carouselExampleControls" class="carousel slide PRO_DESC" data-bs-ride="carousel"
                 style="direction: {{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }};">

                <div class="carousel-inner PRO_DESC">
                    @php
                        $images = json_decode($product->images, true) ?: [];
                    @endphp

                    @if(count($images) > 0)
                        @foreach($images as $image)
                            <div class="carousel-item {{ $loop->first ? 'active' : '' }} PRO_DESC">
                                <img src="{{ asset('storage/' . $image) }}" alt="Product Image {{ $loop->iteration }}" class="PRO_DESC">
                            </div>
                        @endforeach
                    @else
                        <div class="carousel-item active PRO_DESC">
                            <img src="https://via.placeholder.com/800x400" alt="{{ __('No image available') }}" class="PRO_DESC">
                        </div>
                    @endif
                </div>

                @if(app()->getLocale() === 'ar')
                    <button class="carousel-control-next PRO_DESC" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev" style="left: unset; right: 0;">
                        <span class="carousel-control-next-icon PRO_DESC"></span>
                    </button>
                    <button class="carousel-control-prev PRO_DESC" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next" style="right: unset; left: 0;">
                        <span class="carousel-control-prev-icon PRO_DESC"></span>
                    </button>
                @else
                    <button class="carousel-control-prev PRO_DESC" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon PRO_DESC"></span>
                    </button>
                    <button class="carousel-control-next PRO_DESC" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                        <span class="carousel-control-next-icon PRO_DESC"></span>
                    </button>
                @endif

                <div class="carousel-indicators PRO_DESC">
                    @foreach($images as $index => $image)
                        <button type="button" data-bs-target="#carouselExampleControls" data-bs-slide-to="{{ $index }}" class="{{ $loop->first ? 'active' : '' }} PRO_DESC"></button>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="col-lg-7 col-md-12 PRO_DESC" style="text-align: {{ app()->getLocale() === 'ar' ? 'right' : 'left' }};">
            <h2 class="package-title PRO_DESC">
                {{ app()->getLocale() === 'ar' ? $product->title_ar : $product->title_en }}
            </h2>
            <p class="package-content PRO_DESC">
                {{ app()->getLocale() === 'ar' ? $product->description_ar : $product->description_en }}
            </p>
        </div>
    </div>

    {{-- Features Section --}}
    @php
    $features = json_decode(app()->getLocale() === 'ar' ? $product->features_ar : $product->features_en, true) ?? [];
    @endphp

    @if(!empty($features))
    <div class="features-section PRO_DESC">
        <h2 class="feature-title PRO_DESC" style="text-align: {{ app()->getLocale() === 'ar' ? 'right' : 'left' }};">{{ __('Featured') }}</h2>
        <div class="row PRO_DESC">
            @foreach($features as $feature)
                <div class="col-md-4 PRO_DESC">
                    <div class="feature-item PRO_DESC" style="text-align: {{ app()->getLocale() === 'ar' ? 'right' : 'left' }};">
                        <span class="check-icon PRO_DESC"><i class="bi bi-check-circle"></i></span>
                        <span class="feature-text PRO_DESC">{{ $feature }}</span>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    @endif

    {{-- Benefits Section --}}
    @php
    $benefits = json_decode(app()->getLocale() === 'ar' ? $product->benefits_ar : $product->benefits_en, true) ?? [];
    @endphp

    @if(!empty($benefits))
    <div class="benefits-section PRO_DESC">
        <h2 class="benefit-title PRO_DESC" style="text-align: {{ app()->getLocale() === 'ar' ? 'right' : 'left' }};">{{ __('Benefits') }}</h2>
        <div class="row PRO_DESC">
            @foreach($benefits as $benefit)
                <div class="col-md-6 PRO_DESC">
                    <div class="benefit-item PRO_DESC" style="text-align: {{ app()->getLocale() === 'ar' ? 'right' : 'left' }};">
                        <span class="check-icon PRO_DESC"><i class="bi bi-check-circle"></i></span>
                        <div class="benefit-text PRO_DESC">{{ $benefit }}</div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    @endif
</div>


@endsection
