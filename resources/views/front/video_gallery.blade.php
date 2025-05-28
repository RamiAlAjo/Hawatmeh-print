@extends('front.layouts.app')

@section('content')

<x-banner :pageTitle="$videoAlbum->album_title_en ?? 'Video Album'" />

<style>
    /* Same styling from before, adjusted to multiple videos */

    .section-title {
        color: #28a745;
        font-weight: 700;
        font-size: 2.5rem;
        margin-bottom: 40px;
        text-align: center;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        letter-spacing: 1.2px;
        text-transform: uppercase;
        text-shadow: 0 2px 5px rgba(40, 167, 69, 0.4);
    }

    .video-album-section {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 30px;
    }

    .video-card {
        background: linear-gradient(135deg, #d4edda 0%, #c3e6cb 100%);
        border-radius: 20px;
        overflow: hidden;
        transition: transform 0.4s ease, box-shadow 0.4s ease;
        box-shadow: 0 6px 15px rgba(40, 167, 69, 0.25);
        max-width: 420px;
        width: 100%;
        flex: 1 1 400px;
        display: flex;
        flex-direction: column;
    }

    .video-card:hover {
        transform: translateY(-10px) scale(1.03);
        box-shadow: 0 12px 30px rgba(40, 167, 69, 0.5);
        z-index: 5;
    }

    .video-embed {
        width: 100%;
        height: 0;
        padding-bottom: 56.25%; /* 16:9 */
        position: relative;
        border-radius: 20px 20px 0 0;
        overflow: hidden;
        background-color: #000;
        box-shadow: inset 0 0 15px rgba(0,0,0,0.1);
    }

    .video-embed iframe {
        position: absolute;
        top: 0; left: 0;
        width: 100%; height: 100%;
        border: none;
        border-radius: 20px 20px 0 0;
    }

    .video-title {
        padding: 15px 20px;
        text-align: center;
        font-weight: 700;
        font-size: 1.1rem;
        color: #155724;
        background-color: rgba(40, 167, 69, 0.15);
        border-radius: 0 0 20px 20px;
        text-transform: capitalize;
        user-select: none;
        transition: color 0.3s ease;
    }

    .video-card:hover .video-title {
        color: #0b2e13;
    }

    /* Container for multiple embedded videos in one card */
    .video-embed-multiple {
        margin-bottom: 15px;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 0 8px rgba(0,0,0,0.15);
    }

    /* Responsive */
    @media (max-width: 600px) {
        .video-album-section {
            flex-direction: column;
            align-items: center;
        }
        .video-card {
            max-width: 100%;
            flex: 1 1 100%;
        }
    }

    /* Back button */
    .btn-secondary {
        background-color: #28a745;
        border: none;
        padding: 12px 30px;
        font-weight: 600;
        font-size: 1rem;
        border-radius: 50px;
        transition: background-color 0.3s ease;
        box-shadow: 0 4px 15px rgba(40, 167, 69, 0.4);
    }

    .btn-secondary:hover {
        background-color: #1b5e20;
        box-shadow: 0 6px 20px rgba(27, 94, 32, 0.6);
    }
</style>

<div class="container py-5">
    <h2 class="section-title">{{ $videoAlbum->album_title_en ?? 'Video Album' }}</h2>

    @if ($videos->count())
        <div class="video-album-section">
            @foreach ($videos as $video)
                @php
                    $links = $video->youtube_links ? json_decode($video->youtube_links, true) : [];
                @endphp

                <div class="video-card">
                    @foreach ($links as $link)
                        <div class="video-embed-multiple">
                            <div class="video-embed">
                                <iframe
                                    src="https://www.youtube.com/embed/{{ \Illuminate\Support\Str::after($link, 'v=') }}"
                                    allowfullscreen
                                    loading="lazy"
                                    title="{{ $video->video_title_en ?? 'Video' }}"
                                ></iframe>
                            </div>
                        </div>
                    @endforeach
                    <div class="video-title">
                        {{ $video->video_title_en ?? 'Untitled Video' }}
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="text-center text-muted py-4 fs-5 fst-italic">
            No videos available for this album.
        </div>
    @endif

    <div class="text-center mt-5">
        <a href="{{ route('video.index') }}" class="btn btn-secondary shadow-sm">Back to Library</a>
    </div>
</div>

@endsection
