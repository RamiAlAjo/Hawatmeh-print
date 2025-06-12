@extends('front.layouts.app')

@section('content')

<x-banner :pageTitle="__('contact_us')" />

<style>

    /* Contact Info Section */
    .CON-contact-info {
        display: flex;
        justify-content: space-around;
        align-items: center;
        margin-bottom: 40px;
        padding: 20px;
        border-radius: 10px;
        background-color: #ffffff;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .CON-contact-item {
        text-align: center;
        padding: 15px;
        border-radius: 8px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .CON-contact-item:hover {
        transform: translateY(-5px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }

    .CON-contact-icon {
        font-size: 2.5rem;
        margin-bottom: 10px;
        transition: color 0.3s ease;
    }

    .CON-phone-icon {
        color: #0d6efd;
    }

    .CON-email-icon {
        color: #198754;
    }

    .CON-location-icon {
        color: #0dcaf0;
    }

    .CON-contact-text {
        font-size: 1.1rem;
        color: #495057;
        font-weight: 500;
    }

    /* Google Map Section */
    .CON-map-container {
        margin: 40px 0;
        position: relative;
        height: 400px;
        width: 100%;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }

    .CON-map-container iframe {
        width: 100%;
        height: 100%;
        border: none;
    }

    /* Form Container */
    .CON-form-container {
        max-width: 1000px;
        margin: 0 auto;
        padding: 40px;
        background-color: white;
        border-radius: 10px;
        border: 2px solid #4CAF50;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }

    .CON-form-title {
        color: #2E7D32;
        margin-bottom: 30px;
        font-weight: 600;
        font-size: 2rem;
        text-align: center;
    }

    .CON-form-control {
        margin-bottom: 20px;
        border-radius: 8px;
        padding: 15px;
        border: 1px solid #4CAF50;
        font-size: 1rem;
        width: 100%;
        transition: border-color 0.3s ease;
    }

    .CON-form-control:focus {
        border-color: #2E7D32;
        outline: none;
        box-shadow: 0 0 5px rgba(46, 125, 50, 0.5);
    }

    textarea.CON-form-control {
        min-height: 200px;
        resize: vertical;
    }

    /* Submit Button */
    .CON-btn-submit {
        background: linear-gradient(90deg, #0d6efd, #198754);
        color: white;
        border: none;
        padding: 15px 30px;
        border-radius: 8px;
        cursor: pointer;
        transition: background-color 0.3s, transform 0.3s;
        font-size: 1.1rem;
        width: 100%;
        text-align: center;
    }

    .CON-btn-submit:hover {
        background: linear-gradient(90deg, #0b5ed7, #157347);
        transform: scale(1.05);
    }

    .CON-btn-submit:focus {
        outline: none;
        box-shadow: 0 0 10px rgba(7, 216, 42, 0.6);
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .CON-contact-info {
            flex-direction: column;
            gap: 30px;
            text-align: center;
        }

        .CON-contact-item {
            width: 100%;
        }

        .CON-map-container {
            height: 250px;
        }

        .CON-form-container {
            padding: 25px;
        }

        .CON-form-control {
            width: 100%;
            margin-bottom: 15px;
        }
    }

    /* For extra small devices */
    @media (max-width: 480px) {
        .CON-form-title {
            font-size: 1.5rem;
        }

        .CON-form-control {
            padding: 12px;
        }

        .CON-btn-submit {
            padding: 12px;
        }
    }
</style>

<div class="container">
   <!-- Contact Info Section -->
   <h2 class="CON-form-title">{{ __('get_in_touch') }}</h2>


    <!-- Google Map Section -->

     <div class="mt-4">
                <!-- Leaflet Map Container -->
                <div id="map" style="width: 100%; height: 370px;"class="CON-map-container"></div>
            </div>

            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    // Extract coordinates from the location URL
                    var locationUrl = "{{ App\Models\WebsiteSetting::first()->location ?? '' }}";
                    var coordinates = null;

                    if (locationUrl) {
                        var regex = /@(-?\d+\.\d+),(-?\d+\.\d+)/;
                        var matches = locationUrl.match(regex);
                        if (matches) {
                            coordinates = [parseFloat(matches[1]), parseFloat(matches[2])];
                        }
                    }

                    // Initialize Leaflet map
                    var map = L.map('map').setView([51.505, -0.09], 13); // Default coordinates

                    if (coordinates) {
                        map.setView(coordinates, 15); // Set view to the extracted coordinates
                    }

                    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                    }).addTo(map);

                    if (coordinates) {
                        // Add a marker to the map
                        L.marker(coordinates).addTo(map)
                            .bindPopup('Your location')
                            .openPopup();
                    }
                });
            </script>
            <!-- Leaflet CSS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

<!-- Leaflet JavaScript -->
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
        </div>
    </div>
</div>


    <!-- Form Section -->
    <div class="CON-form-container">
        <h2 class="CON-form-title">{{ __('get_in_touch') }}</h2>
        <form>
            <div class="row">
                <div class="col-md-6">
                    <input type="text" class="CON-form-control" placeholder="{{ __('name') }}" required>
                    <input type="email" class="CON-form-control" placeholder="{{ __('email') }}" required>
                    <input type="tel" class="CON-form-control" placeholder="{{ __('phone_number') }}">
                    <input type="text" class="CON-form-control" placeholder="{{ __('subject') }}">
                </div>
                <div class="col-md-6">
                    <textarea class="CON-form-control" placeholder="{{ __('message') }}"></textarea>
                </div>
            </div>
            <div class="text-start">
                <button type="submit" class="CON-btn-submit">{{ __('send_message') }}</button>
            </div>
        </form>
    </div>

</div>

@endsection
