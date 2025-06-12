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
    width: 30px; /* Increase the size of the flag */
    height: auto;
    margin-right: 8px; /* Space between the flag and text */
}

.language-text-NA {
    font-size: 1rem;
    color: white;
    font-weight: normal; /* Remove bold from text */
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
    border-bottom: 3px solid #000; /* Black underline */
    padding-bottom: 5px;
}

/* Hover Effect - Green Text */
.navbar-nav-NA .nav-link-NA:hover {
    color: #07d82a; /* Green on hover */
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
    right: 50px; /* Moves input left of the icon */
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

    /* Make sure search input is visible inside the burger menu */
    .search-container-NA {
        flex-direction: column;
        align-items: center;
        width: 100%;
        margin-top: 10px;
        position: relative;
    }

    .search-input-NA {
        position: static; /* Removes absolute positioning in mobile */
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

.form-control_NA {
    /* margin-bottom: 15px; */
    /* border-radius: 5px; */
    padding: 12px;
    border: 1px solid #4CAF50;
}

/* Parent Container (assuming it's the search container) */
.search-container-NA {
    position: relative; /* Ensure the parent is relative */
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
    position: relative; /* Ensure it's relative to the parent */
    right: 50px; /* Moves input left of the icon */
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
    top: 100%; /* Position directly below the search input */
    left: -50;
    width: 100%; /* Match the width of the search input */
    max-width: 220px; /* Maximum width */
    max-height: 250px; /* Maximum height */
    overflow-y: auto; /* Scroll if content overflows */
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
    let searchTimeout;
    searchInput.addEventListener("input", function () {
        let query = this.value.trim();

        if (searchTimeout) clearTimeout(searchTimeout);

        if (query.length > 2) {
            searchTimeout = setTimeout(() => {
                loadingIndicator.style.display = "block";
                fetch(`/search?query=${query}`)
                    .then(response => response.json())
                    .then(data => {
                        displaySearchResults(data);
                        loadingIndicator.style.display = "none";
                    })
                    .catch(error => {
                        console.error("Error fetching search results:", error);
                        searchResults.innerHTML = "<p class='search-no-results'>Error fetching results.</p>";
                        loadingIndicator.style.display = "none";
                    });
            }, 300); // Adds a delay (throttling) to prevent multiple API calls
        } else {
            searchResults.innerHTML = "";
            loadingIndicator.style.display = "none";
        }
    });

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
        }
    }

    // Hide search results when clicking outside
    document.addEventListener("click", function (event) {
        if (!searchResults.contains(event.target) && !searchInput.contains(event.target)) {
            searchResults.innerHTML = "";
        }
    });
});

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
        </script>
