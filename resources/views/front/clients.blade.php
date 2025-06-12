@extends('front.layouts.app')

@section('content')

<x-banner pageTitle="{{ app()->getLocale() == 'ar' ?'عملاؤنا'  :'Our Clients'}}" />


<style>

    .CL-client-title {
        color: #00b894; /* This is a shade of green similar to the one in your image */
        margin-bottom: 40px;
        text-align: center;
        font-size: 2.5rem;
        font-weight: bold;
    }

    .CL-client-logos {
        text-align: center;
        margin-bottom: 40px;
    }

    .CL-client-logos img {
        width: 100%;  /* Makes the image responsive */
        max-width: 400px;  /* Increased size */
        margin: 30px;  /* Increased margin */
        transition: transform 0.3s ease;
    }

    .CL-client-logos img:hover {
        transform: scale(1.1);
    }

    .CL-client-logos .CL-logo-container {
        display: inline-block;
        margin: 0 15px;
        border: 2px solid transparent;
        border-radius: 50%;
        padding: 15px; /* Increased padding for better spacing */
        transition: border-color 0.3s ease;
    }
</style>

<div class="container">
    <h1 class="CL-client-title">{{ __('our_clients') }}</h1>
    <div class="row CL-client-logos">
        @foreach($clients as $client)
            <div class="col-4">
                <div class="CL-logo-container">
                    <img src="{{ asset('storage/' . $client->client_image) }}"
                         alt="{{ app()->getLocale() === 'ar' ? $client->client_title_ar : $client->client_title_en }}">
                </div>
            </div>
        @endforeach
    </div>
</div>


@endsection
