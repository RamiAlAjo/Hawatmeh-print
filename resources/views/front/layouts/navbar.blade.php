<style>
/* Navbar Branding */
.navbar-brand-NA img {
    height: 100px;
    width: auto;
    max-width: 200px;
    transition: transform 0.3s ease-in-out;
}

/* Logo Hover Effect */
.navbar-brand-NA img:hover {
    transform: scale(1.05);
}

/* Green Space Above Navbar */
.green-space-NA {
    height: 25px;
    background-color: #07d82a;
    display: flex;
    align-items: center; /* Vertically center the items */
    justify-content: flex-start; /* Align items to the left */
    padding-left: 15px; /* Add space to the left */
}

/* Flag Icon and Language Text */
.language-section-NA {
    display: flex;
    align-items: center;
}

.language-flag-NA {
    width: 30px;
    height: auto;
    margin-right: 8px;
}

.language-text-NA {
    font-size: 1rem;
    color: white;
    font-weight: normal;
}

/* Navbar */
.navbar-NA {
    padding: 12px 20px;
    background: #ffffff;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

/* Navbar Links */
.navbar-nav-NA {
    flex-direction: row;
    justify-content: center;
    width: 100%;
}

.navbar-nav-NA .nav-link-NA {
    font-size: 1.2rem;
    font-weight: 500;
    padding: 8px 15px;
    transition: color 0.3s ease, border-bottom 0.3s ease;
}

/* Active Link Styling - Black Underline */
.navbar-nav-NA .nav-link-NA.active {
    font-weight: bold;
    border-bottom: 3px solid #000;
    padding-bottom: 5px;
}

/* Hover Effect - Green Text */
.navbar-nav-NA .nav-link-NA:hover {
    color: #07d82a;
}

/* Transition for Smooth Effect */
.navbar-nav-NA .nav-link-NA {
    transition: all 0.3s ease-in-out;
}

/* Search Container */
.search-container-NA {
    display: flex;
    align-items: center;
    position: relative;
}

/* Search Input Styling (Initially Hidden) */
.search-input-NA {
    width: 0;
    opacity: 0;
    transition: width 0.3s ease, opacity 0.3s ease;
    border: 1px solid #ccc;
    border-radius: 20px;
    padding: 8px 15px;
    font-size: 1rem;
    background: #f8f9fa;
    outline: none;
    position: absolute;
    right: 50px;
    display: none;
}

/* Show Search Input When Active */
.search-input-NA.show {
    display: block;
    width: 220px;
    opacity: 1;
}

/* Search Input Focus */
.search-input-NA:focus {
    border: 2px solid #07d82a;
    box-shadow: 0 0 5px rgba(7, 216, 42, 0.5);
}

/* Search Icon */
#search-toggle-NA {
    font-size: 1.5rem;
    border: none;
    background: none;
    padding: 5px;
    cursor: pointer;
    transition: transform 0.3s ease, color 0.3s ease;
}

/* Hover Effect for Search Icon */
#search-toggle-NA:hover {
    color: #07d82a;
    transform: scale(1.1);
}

/* Focused Search Icon (for accessibility) */
#search-toggle-NA:focus {
    outline: 2px solid #07d82a;
}

/* Mobile Adjustments */
@media (max-width: 991px) {
    .navbar-nav-NA {
        flex-direction: column;
        text-align: center;
    }

    .navbar-nav-NA .nav-link-NA {
        font-size: 1.1rem;
        padding: 10px 0;
    }

    /* Ensure search input is visible in mobile */
    .search-container-NA {
        flex-direction: column;
        align-items: center;
        width: 100%;
        margin-top: 10px;
        position: relative;
    }

    .search-input-NA {
        position: static;
        width: 100%;
        text-align: center;
    }

    .search-input-NA.show {
        width: 100%;
        display: block;
        opacity: 1;
    }

    .navbar-NA {
        padding: 8px 10px;
    }
}

/* Enhance Form Input */
.form-control_NA {
    padding: 12px;
    border: 1px solid #4CAF50;
    border-radius: 5px;
    transition: border-color 0.3s ease;
}

/* Focus on Form Input */
.form-control_NA:focus {
    border-color: #07d82a;
    outline: none;
    box-shadow: 0 0 5px rgba(7, 216, 42, 0.5);
}

/* Parent Container for Search */
.search-container-NA {
    position: relative;
    display: flex;
    align-items: center;
}

/* Search Input */
.search-input-NA {
    width: 0;
    opacity: 0;
    transition: width 0.3s ease, opacity 0.3s ease;
    border: 1px solid #ccc;
    border-radius: 20px;
    padding: 8px 15px;
    font-size: 1rem;
    background: #f8f9fa;
    outline: none;
    position: relative;
    right: 50px;
    display: none;
}

/* Show Search Input When Active */
.search-input-NA.show {
    display: block;
    width: 220px;
    opacity: 1;
}

/* Search Results Container */
#search-results {
    background: white;
    position: absolute;
    top: 100%;
    left: -50px;
    width: 100%;
    max-width: 220px;
    max-height: 250px;
    overflow-y: auto;
    border-radius: 8px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
    display: none;
    z-index: 1000;
    transition: all 0.3s ease-in-out;
}

/* Show results when content is added */
#search-results:not(:empty) {
    display: block;
}

/* Search Results List */
.search-results-list {
    list-style: none;
    padding: 10px;
    margin: 0;
}

/* Search Result Item */
.search-result-item {
    padding: 10px;
    border-bottom: 1px solid #eee;
    transition: background-color 0.3s ease;
}

/* Last item should not have a border */
.search-result-item:last-child {
    border-bottom: none;
}

/* Search Result Link */
.search-result-link {
    text-decoration: none;
    color: #333;
    font-weight: 500;
    display: block;
    transition: 0.2s ease-in-out;
}

/* Hover Effect */
.search-result-link:hover {
    color: #07d82a;
    background: #f1f1f1;
    padding-left: 10px;
}

/* No Results Text */
.search-no-results {
    padding: 10px;
    text-align: center;
    color: #888;
    font-size: 14px;
}

/* Loading Indicator */
#loading-indicator {
    display: none;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    font-size: 1rem;
    color: #07d82a;
}

/* ===============================
   RESPONSIVE ENHANCEMENTS
   =============================== */
/* ===============================
   ENHANCED RESPONSIVE DESIGN FOR SMALLER SCREENS
   =============================== */

/* General Mobile Enhancements */
@media (max-width: 767px) {

    /* Navbar Branding (Logo) */
    .navbar-brand-NA img {
        height: 60px;
        max-width: 150px;
        margin: 0 auto;
        display: block;
        transform: scale(1.6); /* Less aggressive scaling */
        transition: transform 0.3s ease-in-out; /* Smooth scale transition */
    }

    /* Green Space Above Navbar (Align text and space properly) */
    .green-space-NA {
        flex-direction: column;
        justify-content: center;
        align-items: center;
        padding: 10px; /* Adjust for better spacing */
        text-align: center;
    }

    /* Language Section (Center the flag and text) */
    .language-section-NA {
        flex-direction: row;
        justify-content: center;
        margin-bottom: 10px; /* Better separation */
    }

    .language-flag-NA {
        width: 25px; /* Slightly reduce flag size */
        margin-right: 5px; /* Reduce space between flag and text */
    }

    .language-text-NA {
        font-size: 0.9rem; /* Adjust font size for mobile */
        color: white;
        font-weight: normal;
    }

    /* Navbar Links */
    .navbar-nav-NA {
        flex-direction: column;
        justify-content: center;
        text-align: center;
        width: 100%;
    }

    .navbar-nav-NA .nav-link-NA {
        padding: 10px 0;
        font-size: 1.1rem; /* Ensure text is legible */
        font-weight: 500;
    }

    /* Active Link Styling */
    .navbar-nav-NA .nav-link-NA.active {
        font-weight: bold;
        border-bottom: 3px solid #000;
        padding-bottom: 5px;
    }

    /* Search Bar (Mobile View) */
    .search-container-NA {
        flex-direction: column;
        align-items: center;
        width: 100%;
        margin-top: 10px;
        padding: 5px; /* Adjust search bar padding */
    }

    .search-input-NA {
        width: 90%;
        max-width: 100%;
        text-align: center;
        margin-top: 10px;
        font-size: 1rem; /* Ensure readability */
    }

    /* Search Icon (Increase tap area for touch devices) */
    #search-toggle-NA {
        font-size: 1.6rem; /* Slightly increase icon size */
        padding: 8px;
        margin-top: 10px;
    }

    /* Search Results Container */
    #search-results {
        left: 0;
        max-width: 100%;
        width: 90%;
        margin-top: 10px;
    }

    /* Navbar Toggler and Collapse Enhancements */
    .navbar-toggler {
        font-size: 1.6rem; /* Increase size for better accessibility */
        padding: 8px;
        margin-top: 10px;
    }

    /* Ensure the collapsed navbar items are easy to click/tap */
    .navbar-collapse {
        padding-top: 10px;
        text-align: center;
    }

    .navbar-collapse .nav-link-NA {
        padding: 12px 0;
        font-size: 1.2rem;
    }

    /* Adjusting the 'See All' button and links */
    .see-all-container {
        margin-top: 10px;
        text-align: center;
    }

    .see-all-link {
        color: rgb(46, 57, 141);
        font-weight: bold;
        font-size: 1.1rem; /* Increase font size for easy tap */
        text-decoration: none;
        cursor: pointer;
    }

    .see-all-link:hover {
        text-decoration: underline;
    }
}

/* ===============================
   ENHANCED RESPONSIVE DESIGN FOR MEDIUM SCREENS (<=991px)
   =============================== */
@media (max-width: 991px) {

    /* Navbar Branding (Logo) */
    .navbar-brand-NA img {
        height: 80px;
        max-width: 160px;
        margin: 0 auto;
        display: block;
        transform: scale(1.4); /* Scaling for medium screens */
    }

    /* Adjusting padding and alignment for the navbar links */
    .navbar-nav-NA {
        flex-direction: column;
        text-align: center;
    }

    .navbar-nav-NA .nav-link-NA {
        font-size: 1.1rem;
        padding: 12px 0;
    }

    /* Improve spacing between logo and nav items */
    .navbar-NA {
        padding: 12px 20px;
    }

    /* Search Container and Input */
    .search-container-NA {
        flex-direction: column;
        align-items: center;
        width: 100%;
        margin-top: 10px;
        padding: 5px;
    }

    .search-input-NA {
        width: 100%;
        max-width: 100%;
        text-align: center;
        margin-top: 10px;
    }

    /* Search Icon Enhancements */
    #search-toggle-NA {
        font-size: 1.6rem;
        padding: 8px;
        margin-top: 10px;
    }

    /* Adjust the 'See All' Button */
    .see-all-container {
        margin-top: 10px;
        text-align: center;
    }

    .see-all-link {
        color: rgb(46, 57, 141);
        font-weight: bold;
        text-decoration: none;
        font-size: 1.1rem; /* Increased size for readability on tablets */
        cursor: pointer;
    }

    .see-all-link:hover {
        text-decoration: underline;
    }
}

/* ===============================
   GLOBAL MOBILE/SMALL SCREEN ADJUSTMENTS
   =============================== */

/* Add more padding to navbar items for touch targets */
.navbar-nav-NA .nav-link-NA {
    padding: 14px 0; /* Ensure larger clickable area */
}

/* Improve search input clarity on small screens */
.search-input-NA {
    width: 90% !important; /* Force a responsive width */
    font-size: 1rem; /* Adjust font size for readability */
}

/* Make search results fit better on smaller devices */
#search-results {
    max-width: 100%;
    width: 90%;
    left: 0;
    right: 0;
    margin: 0 auto;
}

/* Make sure the results are easily tappable */
.search-result-item {
    padding: 12px; /* Slightly increase padding for better tap targets */
    font-size: 1rem; /* Adjust font size for better legibility */
}

/* Mobile-Friendly Input Focus */
.form-control_NA:focus {
    border-color: #07d82a;
    outline: none;
    box-shadow: 0 0 5px rgba(7, 216, 42, 0.5);
    background-color: #f0f8f4;
}

/* Mobile-Friendly Button Focus */
#search-toggle-NA:focus {
    outline: 3px solid #07d82a;
    border-radius: 5px;
}


    </style>

<div class="green-space-NA"
style="width: 100%; display: flex; justify-content: {{ app()->getLocale() === 'ar' ? 'flex-start' : 'flex-end' }}; padding: 10px;">

<a href="{{ route('change.language', app()->getLocale() === 'ar' ? 'en' : 'ar') }}"
  class="language-section-NA"
  style="cursor: pointer; display: flex; align-items: center;">

   <span class="language-text-NA">
       {{ app()->getLocale() === 'ar' ? 'English' : 'العربية' }}
   </span>

   <img
       id="language-flag-NA"
       src="{{ app()->getLocale() === 'ar'
           ? 'https://upload.wikimedia.org/wikipedia/en/thumb/a/ae/Flag_of_the_United_Kingdom.svg/330px-Flag_of_the_United_Kingdom.svg.png'
           : 'https://upload.wikimedia.org/wikipedia/commons/thumb/c/c0/Flag_of_Jordan.svg/320px-Flag_of_Jordan.svg.png' }}"
       alt="Language Flag"
       class="language-flag-NA"
       style="width: 32px; height: 20px; margin-left: 8px;"
   >

</a>
</div>
        <nav class="navbar navbar-expand-lg navbar-light navbar-NA"
        dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
        <a class="navbar-brand navbar-brand-NA" href="{{ route('home') }}">
            <img src="{{ asset('./Hawatmeh Logo.svg') }}" alt="Logo" style="transform: scale(2.1); margin-left:100%;">
        </a>

        <!-- Burger Menu -->
        <button class="navbar-toggler navbar-toggler-NA" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav-NA" aria-controls="navbarNav-NA" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar Links -->
        <div class="collapse navbar-collapse" id="navbarNav-NA">
            <ul class="navbar-nav navbar-nav-NA">
                <li class="nav-item">
                    <a class="nav-link nav-link-NA {{ Request::is('/') ? 'active' : '' }}" href="{{ route('home') }}">{{ __('home') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-NA {{ Request::is('about') ? 'active' : '' }}" href="{{ route('about.index') }}">{{ __('about_us') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-NA {{ Request::is('products') ? 'active' : '' }}" href="{{ route('products.index') }}">{{ __('our_products') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-NA {{ Request::is('clients') ? 'active' : '' }}" href="{{ route('clients.index') }}">{{ __('our_clients') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-NA {{ Request::is('gallery') ? 'active' : '' }}" href="{{ route('gallery.index') }}">{{ __('gallery') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-NA {{ Request::is('portfolio') ? 'active' : '' }}" href="{{ route('portfolio.index') }}">{{ __('portfolio') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-NA {{ Request::is('contact') ? 'active' : '' }}" href="{{ route('contact.index') }}">{{ __('contact_us') }}</a>
                </li>
            </ul>

            <div class="search-container-NA">
                <!-- Search Input -->
                <input type="text" class="form-control_NA search-input-NA" id="search-input-NA" placeholder="Search...">

                <!-- Search Results Container -->
                <div id="search-results"></div>

                <!-- Loading Indicator -->
                <div id="loading-indicator">Loading...</div>

                <!-- Search Button -->
                <button id="search-toggle-NA">
                    <i class="bi bi-search"></i>
                  </button>

            </div>
        </div>
    </nav>

        <script>

document.addEventListener("DOMContentLoaded", function () {
    const searchToggle = document.getElementById("search-toggle-NA");
    const searchInput = document.getElementById("search-input-NA");
    const searchResults = document.getElementById("search-results");
    const loadingIndicator = document.getElementById("loading-indicator");
    let searchTimeout;
    let cache = {};  // Cache results to prevent multiple API calls for the same query

    // Toggle search input visibility
    searchToggle.addEventListener("click", function (e) {
        e.preventDefault();
        searchInput.classList.toggle("show");

        if (searchInput.classList.contains("show")) {
            searchInput.focus();
        } else {
            searchInput.value = "";
            searchResults.innerHTML = ""; // Clear results when closing
        }
    });

    // Function to fetch and display search results
    searchInput.addEventListener("input", debounce(function () {
        let query = searchInput.value.trim();

        if (query.length > 2) {
            // Check if the query is already cached
            if (cache[query]) {
                displaySearchResults(cache[query]);
            } else {
                loadingIndicator.style.display = "block";
                fetchSearchResults(query);
            }
        } else {
            searchResults.innerHTML = "";
            loadingIndicator.style.display = "none";
        }
    }, 300)); // Debounce input to delay the API call

    // Fetch search results from the server
    function fetchSearchResults(query) {
        fetch(`/search?query=${query}`)
            .then(response => response.json())
            .then(data => {
                cache[query] = data;  // Cache the results
                displaySearchResults(data);
                loadingIndicator.style.display = "none";
            })
            .catch(error => {
                console.error("Error fetching search results:", error);
                searchResults.innerHTML = "<p class='search-no-results'>Error fetching results.</p>";
                loadingIndicator.style.display = "none";
            });
    }

    // Function to display search results dynamically
    function displaySearchResults(products) {
        searchResults.innerHTML = ""; // Clear previous results

        if (products.length === 0) {
            searchResults.innerHTML = "<p class='search-no-results'>No results found.</p>";
        } else {
            let ul = document.createElement("ul");
            ul.classList.add("search-results-list");

            products.forEach(product => {
                let li = document.createElement("li");
                li.classList.add("search-result-item");
                li.innerHTML = `<a href="/products/${product.id}" class="search-result-link">${product.title_en}</a>`;
                ul.appendChild(li);
            });

            searchResults.appendChild(ul);

            // Add "See All" link at the bottom
            let seeAllDiv = document.createElement("div");
            seeAllDiv.classList.add("see-all-container");
            seeAllDiv.innerHTML = `<a href="/search_results?query=${encodeURIComponent(searchInput.value.trim())}" class="see-all-link">See All</a>`;
            searchResults.appendChild(seeAllDiv);
        }
    }

    // Handle "Enter" key press in search input
    searchInput.addEventListener("keydown", function (e) {
        if (e.key === "Enter") {
            e.preventDefault(); // prevent form submission or default behavior
            const query = searchInput.value.trim();
            if (query.length > 2) {
                // Redirect to search_results page with the query
                window.location.href = `/search_results?query=${encodeURIComponent(query)}`;
            }
        }
    });

    // Hide search results when clicking outside
    document.addEventListener("click", function (event) {
        if (!searchResults.contains(event.target) && !searchInput.contains(event.target)) {
            searchResults.innerHTML = "";
        }
    });

    // Debounce function to limit the rate of API calls
    function debounce(func, delay) {
        return function () {
            clearTimeout(searchTimeout);
            searchTimeout = setTimeout(func, delay);
        };
    }

    // Toggle language flag (Arabic/English)
    function toggleFlag() {
        const flagImg = document.getElementById("language-flag-NA");
        const flagText = document.querySelector(".language-text-NA");

        // Check the current flag source and toggle between Jordan and UK flags
        if (flagImg.src.includes("Flag_of_Jordan")) {
            // Change to UK flag
            flagImg.src = "https://upload.wikimedia.org/wikipedia/commons/thumb/a/a4/Flag_of_the_United_Kingdom.svg/800px-Flag_of_the_United_Kingdom.svg.png";
            flagText.textContent = "English";
        } else {
            // Change back to Jordan flag
            flagImg.src = "https://upload.wikimedia.org/wikipedia/commons/thumb/c/c0/Flag_of_Jordan.svg/320px-Flag_of_Jordan.svg.png";
            flagText.textContent = "Arabic";
        }
    }

    // Expose toggleFlag function to global scope if needed
    window.toggleFlag = toggleFlag;
});

        </script>
