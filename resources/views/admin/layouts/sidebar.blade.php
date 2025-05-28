 <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <!-- Use Material Symbols (optional modern version) -->
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />

<aside class="left-sidebar sidebar-dark" id="left-sidebar">
    <div id="sidebar" class="sidebar sidebar-with-footer">
        <!-- Application Brand -->
        <div class="app-brand">
            <a href="/" class="text-decoration-none">
                <span class="brand-name">Admin Dashboard</span>
            </a>
        </div>

        <!-- Sidebar Scrollbar -->
        <div class="sidebar-left" data-simplebar style="height: 100%;">
            <!-- Sidebar Menu -->
            <ul class="nav sidebar-inner" id="sidebar-menu">

                <!-- Dashboard -->
                <li class="active">
                    <a class="sidenav-item-link" href="{{ route('admin.admin_home') }}">
                        <span class="material-icons">dashboard</span>
                        <span class="nav-text">Dashboard</span>
                    </a>
                </li>

                <!-- Homepage -->
                <li class="has-sub">
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#Homepage" aria-expanded="false" aria-controls="Homepage">
                        <span class="material-icons">home</span>
                        <span class="nav-text">Homepage</span>
                        <b class="caret"></b>
                    </a>
                    <ul class="collapse sub-menu" id="Homepage">
                        <li><a class="sidenav-item-link" href="{{ route('admin.slider.create') }}"><span class="nav-text">Slider</span></a></li>
                        <li><a class="sidenav-item-link" href="{{ route('admin.about-section.index') }}"><span class="nav-text">About Us Section</span></a></li>
                    </ul>
                </li>

                <!-- Pages Banner -->
                <li class="has-sub">
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#banner" aria-expanded="false" aria-controls="banner">
                        <span class="material-icons">image</span>
                        <span class="nav-text">Pages Banner</span>
                        <b class="caret"></b>
                    </a>
                    <ul class="collapse sub-menu" id="banner">
                        <li><a class="sidenav-item-link" href="{{ route('admin.banner.create') }}"><span class="nav-text">Banner</span></a></li>
                    </ul>
                </li>

                <!-- Pages Title -->
                <li class="section-title">Pages</li>

                <!-- About Us -->
                <li class="has-sub">
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#About" aria-expanded="false" aria-controls="About">
                        <span class="material-icons">info</span>
                        <span class="nav-text">About Us</span>
                        <b class="caret"></b>
                    </a>
                    <ul class="collapse sub-menu" id="About">
                        <li><a class="sidenav-item-link" href="{{ route('admin.about.index') }}"><span class="nav-text">About Us</span></a></li>
                    </ul>
                </li>

                <!-- Products -->
                <li class="has-sub">
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#Products" aria-expanded="false" aria-controls="Products">
                        <span class="material-icons">shopping_cart</span>
                        <span class="nav-text">Products</span>
                        <b class="caret"></b>
                    </a>
                    <ul class="collapse sub-menu" id="Products">
                        <li><a class="sidenav-item-link" href="{{ route('admin.products.index') }}"><span class="nav-text">Products List</span></a></li>
                        <li><a class="sidenav-item-link" href="{{ route('admin.products.create') }}"><span class="nav-text">Create Product</span></a></li>
                    </ul>
                </li>

                <!-- Gallery -->
                <li class="has-sub">
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#galleryMenu" aria-expanded="false" aria-controls="galleryMenu">
                        <span class="material-icons">photo_library</span>
                        <span class="nav-text">Gallery</span>
                        <b class="caret"></b>
                    </a>
                    <ul class="collapse sub-menu" id="galleryMenu">

                        <!-- Albums -->
                        <li class="has-sub">
                            <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#albumsMenu" aria-expanded="false" aria-controls="albumsMenu">
                                <span class="nav-text">Albums</span>
                                <b class="caret"></b>
                            </a>
                            <ul class="collapse sub-menu" id="albumsMenu">
                                <li><a class="sidenav-item-link" href="{{ route('admin.photo-album.index') }}"><span class="nav-text">Photo Albums</span></a></li>
                                <li><a class="sidenav-item-link" href="{{ route('admin.video-album.index') }}"><span class="nav-text">Video Albums</span></a></li>
                            </ul>
                        </li>

                        <!-- Media -->
                        <li class="has-sub">
                            <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#mediaMenu" aria-expanded="false" aria-controls="mediaMenu">
                                <span class="nav-text">Media</span>
                                <b class="caret"></b>
                            </a>
                            <ul class="collapse sub-menu" id="mediaMenu">
                                <li><a class="sidenav-item-link" href="{{ route('admin.photos.index') }}"><span class="nav-text">Photos</span></a></li>
                                <li><a class="sidenav-item-link" href="{{ route('admin.videos.index') }}"><span class="nav-text">Videos</span></a></li>
                            </ul>
                        </li>

                        <!-- Create -->
                        <li class="has-sub">
                            <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#createMenu" aria-expanded="false" aria-controls="createMenu">
                                <span class="nav-text">Create</span>
                                <b class="caret"></b>
                            </a>
                            <ul class="collapse sub-menu" id="createMenu">
                                <li><a class="sidenav-item-link" href="{{ route('admin.photo-album.create') }}"><span class="nav-text">Create Photo Album</span></a></li>
                                <li><a class="sidenav-item-link" href="{{ route('admin.video-album.create') }}"><span class="nav-text">Create Video Album</span></a></li>
                            </ul>
                        </li>

                        <!-- Overview -->
                        <li><a class="sidenav-item-link" href="{{ route('admin.gallery.index') }}"><span class="nav-text">Overview</span></a></li>
                    </ul>
                </li>

                <!-- Portfolio -->
                <li class="has-sub">
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#Portfolio" aria-expanded="false" aria-controls="Portfolio">
                        <span class="material-icons">work</span>
                        <span class="nav-text">Portfolio</span>
                        <b class="caret"></b>
                    </a>
                    <ul class="collapse sub-menu" id="Portfolio">
                        <li><a class="sidenav-item-link" href="{{ route('admin.portfolio.index') }}"><span class="nav-text">Portfolio List</span></a></li>
                    </ul>
                </li>

                <!-- Clients -->
                <li class="has-sub">
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#Clients" aria-expanded="false" aria-controls="Clients">
                        <span class="material-icons">people</span>
                        <span class="nav-text">Clients</span>
                        <b class="caret"></b>
                    </a>
                    <ul class="collapse sub-menu" id="Clients">
                        <li><a class="sidenav-item-link" href="{{ route('admin.clients.index') }}"><span class="nav-text">Clients List</span></a></li>
                        <li><a class="sidenav-item-link" href="{{ route('admin.clients.create') }}"><span class="nav-text">Create Client</span></a></li>
                    </ul>
                </li>

                <!-- Website Settings -->
                <li>
                    <a class="sidenav-item-link" href="{{ route('admin.setting.index') }}">
                        <span class="material-icons">settings</span>
                        <span class="nav-text">Website Setting</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- Sidebar Footer -->
        <div class="sidebar-footer">
            <div class="sidebar-footer-content">
                <ul class="d-flex">
                    <li>
                        <a href="{{ route('admin.setting.index') }}" data-toggle="tooltip" title="Profile settings">
                            <span class="material-icons">settings</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</aside>

