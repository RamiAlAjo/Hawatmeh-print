<style>
    body {
        margin: 0;
        padding: 0;
    }

    .footer {
        background: linear-gradient(to right, #a8db95, #046600);
        color: white;
        padding: 20px;
        text-align: center;
    }

    .footer h4 {
        font-weight: bold;
        margin-bottom: 10px;
        font-size: 22px;
    }

    .footer a {
        color: white;
        text-decoration: none;
        display: block;
        margin: 2px 0;
        font-size: 20px;
    }

    .footer a:hover {
        text-decoration: underline;
    }

    .social-FO-icons {
        display: flex; /* Use flexbox to align the icons horizontally */
        gap: 10px; /* Add space between the icons */
        justify-content: center; /* Center the icons horizontally */
        flex-wrap: wrap; /* Wrap icons if there's not enough space */
    }

    .social-FO-icons a {
        font-size: 2rem; /* Adjust the size of the icons */
        color: #0d6efd; /* Default color for the icons */
        background-color: #90ff8d;
        padding: 10px;
        border-radius: 50%;
        transition: color 0.3s ease; /* Smooth color transition on hover */
    }

    .social-FO-icons a:hover {
        color: #0d6efd; /* Change color on hover (blue) */
    }

    .visitor-FO-counter {
        font-size: 30px;
        font-weight: bold;
        background: white;
        color: black;
        padding: 10px 20px;
        border-radius: 10px;
        display: inline-block;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .visitor-FO-counter:hover {
        transform: scale(1.05);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
    }

    .col-FO-custom {
        flex: 0 0 33.33%; /* Custom column width for large screens */
        padding: 10px;
    }

    /* Mobile Responsive Adjustments */
    @media (max-width: 768px) {
        .footer {
            padding: 15px;
        }

        .col-FO-custom {
            flex: 0 0 100%; /* Stacks the columns vertically on smaller screens */
            margin-bottom: 20px;
        }

        .footer h4 {
            font-size: 20px; /* Smaller heading for mobile */
        }

        .footer a {
            font-size: 18px; /* Smaller link font for mobile */
        }

        .visitor-FO-counter {
            font-size: 25px; /* Smaller counter text for mobile */
            padding: 8px 15px;
        }

        .social-FO-icons {
            flex-wrap: wrap; /* Allows the icons to wrap on small screens */
            justify-content: flex-start; /* Align icons to the left */
        }

        .social-FO-icons a {
            font-size: 1.5rem; /* Adjust the icon size for mobile */
            margin-right: 10px; /* Add some space between the icons */
        }

        /* Image adjustments */
        .footer img {
            width: 120px; /* Make the image smaller on mobile */
            height: auto; /* Maintain aspect ratio */
            margin-bottom: 10px;
        }

        .col-md-4 {
            text-align: center; /* Ensure text is centered for smaller devices */
        }

        /* Additional fine-tuning for columns in footer */
        .footer .row {
            margin-left: 0;
            margin-right: 0;
        }

        .footer .col-md-4 {
            margin-bottom: 20px;
        }
    }

    /* Larger screens for desktops */
    @media (min-width: 1024px) {
        .footer img {
            width: 150px; /* Slightly larger image on desktop */
            height: auto;
        }
    }
</style>



<div class="footer mt-4">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-4 text-center col-FO-custom">
                <img src="./new logo.jpeg" alt="Hawatmeh Logo" width="150" style="margin-right: 15%; height: 200px; width: 200px;">
            </div>

            <div class="col-md-4 col-FO-custom">
                <h4>{{ __('quick_links') }}</h4>
                <div class="row" style="text-align: start;">
                    <div class="col-md-6">
                        <a href="{{ route('home') }}">{{ __('home') }}</a>
                        <a href="{{ route('about.index') }}">{{ __('about_us') }}</a>
                        <a href="{{ route('products.index') }}">{{ __('our_products') }}</a>
                        <a href="{{ route('clients.index') }}">{{ __('our_clients') }}</a>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ route('gallery.index') }}">{{ __('photo_gallery') }}</a>
                        <a href="{{ route('portfolio.index') }}">{{ __('portfolio') }}</a>
                        <a href="{{ route('contact.index') }}">{{ __('contact_us') }}</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 text-center col-FO-custom">
                <p style="font-size: 20px;">{{ __('visitors') }}</p>
                <span class="visitor-FO-counter" id="visitorCounter">12345</span>
                <p style="font-size: 20px;">{{ __('follow_us') }}</p>
                <div class="social-FO-icons">
                    <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#"><i class="bi bi-instagram"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>


    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Function to update the visitor counter
            function updateVisitorCounter() {
                const counterElement = document.getElementById('visitorCounter');
                let currentCount = parseInt(counterElement.innerText, 10);
                currentCount += 1; // Increment the count
                counterElement.innerText = currentCount;
            }

            // Update the counter every 5 seconds (5000 milliseconds)
            setInterval(updateVisitorCounter, 5000);
        });
    </script>
</div>



