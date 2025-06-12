<style>
/* Ensure the carousel images have a height and maintain aspect ratio */
.carousel-item img {
    height: 450px; /* Default height for larger screens */
    object-fit: cover; /* Ensures the image maintains its aspect ratio */
    width: 100%; /* Makes sure the image takes up the full width of the container */
    transition: transform 0.5s ease-in-out; /* Adds smooth transition on hover */
}

/* Add a subtle effect when the carousel item is hovered */
.carousel-item:hover img {
    transform: scale(1.05); /* Slight zoom effect on hover */
}

/* Style for the carousel caption */
.carousel-caption-HP {
    position: absolute;
    bottom: 40%; /* Position the caption towards the bottom */
    left: 50%;
    transform: translateX(-50%);
    text-align: center;
    color: #fff;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.6);
    /* background-color: rgba(0, 0, 0, 0.5);  */
    padding: 10px;
    border-radius: 8px;
}

/* Style for the title */
.carousel-caption-title-HP {
    font-size: 2.5rem; /* Larger font size for titles */
    font-weight: 700; /* Make the title bold */
    margin: 0;
    text-transform: uppercase; /* Capitalize the title */
    letter-spacing: 2px; /* Adds spacing between letters */
}

/* Optional: Responsive design for smaller screens */
@media (max-width: 768px) {
    .carousel-item img {
        height: 300px; /* Adjust height for smaller screens */
    }

    .carousel-caption-HP {
        bottom: 15%; /* Adjust caption position for smaller screens */
    }

    .carousel-caption-title-HP {
        font-size: 1.5rem; /* Smaller title font on mobile */
    }
}

</style>

{{-- Optionally display page title --}}
{{-- @if($pageTitle)
    <h1>{{ $pageTitle }}</h1>
@endif --}}

{{-- Banner Carousel --}}
@if($banners->isNotEmpty())
    <div id="carouselExampleCaptions" class="carousel slide mb-4">
        <div class="carousel-inner">
            @foreach($banners as $banner)
                <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                    <!-- Display banner image, with a fallback if no image exists -->
                    <img src="{{ asset($banner->image ?: 'path/to/fallback-image.jpg') }}" class="d-block w-100" alt="{{ $banner->title_en ?? 'Banner Image' }}">

                    <!-- Carousel Caption displaying title_en -->
                    <div class="carousel-caption d-none d-md-block carousel-caption-HP">
                        <h3 class="carousel-caption-title-HP">
                            {{ $pageTitle  }}
                        </h3>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@else
    <p>No banners available.</p>
@endif
