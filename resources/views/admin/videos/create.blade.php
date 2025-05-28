@extends('admin.layouts.app')

@section('content')
<div class="row">
    <div class="col-xl-12">
        <div class="card mb-3">
            <div class="row no-gutters">
                <div class="col-md-12">
                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-6 col-6">
                                <h5 class="card-title pt-2">Create Video</h5>
                            </div>
                            <div class="col-md-6 col-6 text-right">
                                <a href="{{ route('admin.videos.index') }}" class="btn btn-secondary">Back to Videos</a>
                            </div>
                        </div>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('admin.videos.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <!-- Select Album -->
                            <div class="form-group">
                                <label for="video_album_id">Select Video Album</label>
                                <select name="video_album_id" id="video_album_id" class="form-control" required>
                                    <option value="">-- Select Album --</option>
                                    @foreach($albums as $album)
                                        <option value="{{ $album->id }}" {{ old('video_album_id') == $album->id ? 'selected' : '' }}>
                                            {{ $album->album_title_en }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Language Tabs -->
                            <ul class="nav nav-tabs mb-3" id="languageTabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="en-tab" data-bs-toggle="tab" href="#en" role="tab" aria-controls="en" aria-selected="true">English</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="ar-tab" data-bs-toggle="tab" href="#ar" role="tab" aria-controls="ar" aria-selected="false">Arabic</a>
                                </li>
                            </ul>

                            <div class="tab-content" id="languageTabsContent">
                                <!-- English -->
                                <div class="tab-pane fade show active" id="en" role="tabpanel" aria-labelledby="en-tab">
                                    <div class="form-group">
                                        <label for="video_title_en">Video Title (EN)</label>
                                        <input type="text" class="form-control" id="video_title_en" name="video_title_en" value="{{ old('video_title_en') }}">
                                    </div>
                                </div>

                                <!-- Arabic -->
                                <div class="tab-pane fade" id="ar" role="tabpanel" aria-labelledby="ar-tab">
                                    <div class="form-group">
                                        <label for="video_title_ar">Video Title (AR)</label>
                                        <input type="text" class="form-control" id="video_title_ar" name="video_title_ar" value="{{ old('video_title_ar') }}">
                                    </div>
                                </div>
                            </div>

                            <!-- Video Thumbnail -->
                            <div class="form-group mt-3">
                                <label for="video_thumbnail">Video Thumbnail (optional)</label>
                                <input type="file" class="form-control-file" id="video_thumbnail" name="video_thumbnail">
                            </div>

                       <!-- YouTube Links -->
<div class="form-group mt-3">
    <label>YouTube Links</label>
    <div id="youtube-links">
        <div class="youtube-link-wrapper mb-3">
            <input type="url" name="youtube_links[]" class="form-control youtube-link-input" placeholder="Enter YouTube video URL" required>
            <div class="video-info mt-2 d-none">
                <img src="" class="img-thumbnail mb-2 preview-thumbnail" style="max-width: 200px;">
                <p class="preview-title font-weight-bold"></p>
                <p class="preview-description text-muted"></p>
            </div>
        </div>
    </div>
    <button type="button" class="btn btn-sm btn-secondary mt-2" onclick="addYoutubeLink()">+ Add another link</button>
</div>


                            <!-- Submit -->
                            <div class="form-group mt-4">
                                <button type="submit" class="btn btn-primary">Create Video</button>
                            </div>
                        </form>

                    </div> <!-- card-body -->
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JS for dynamic input fields -->
<script>
    function addYoutubeLink() {
        const container = document.getElementById('youtube-links');
        const wrapper = document.createElement('div');
        wrapper.className = 'youtube-link-wrapper mb-3';

        wrapper.innerHTML = `
            <input type="url" name="youtube_links[]" class="form-control youtube-link-input" placeholder="Enter YouTube video URL" required>
            <div class="video-info mt-2 d-none">
                <img src="" class="img-thumbnail mb-2 preview-thumbnail" style="max-width: 200px;">
                <p class="preview-title font-weight-bold"></p>
                <p class="preview-description text-muted"></p>
            </div>
        `;

        container.appendChild(wrapper);
    }

    // Fetch video details when the input loses focus
    document.addEventListener('input', function(e) {
        if (e.target && e.target.classList.contains('youtube-link-input')) {
            const input = e.target;

            clearTimeout(input.fetchTimer);
            input.fetchTimer = setTimeout(() => {
                const url = input.value.trim();
                if (!url) return;

                fetch(`/admin/videos/fetch-details?youtube_url=${encodeURIComponent(url)}`)

                    .then(response => response.json())
                    .then(data => {
                        const infoBox = input.nextElementSibling;

                        if (data.success) {
                            infoBox.classList.remove('d-none');
                            infoBox.querySelector('.preview-thumbnail').src = data.thumbnail_url;
                            infoBox.querySelector('.preview-title').textContent = data.title;
                            infoBox.querySelector('.preview-description').textContent = data.description || '';
                        } else {
                            infoBox.classList.add('d-none');
                        }
                    })
                    .catch(() => {
                        alert("Failed to fetch video details.");
                    });
            }, 500); // debounce
        }
    });
</script>

@endsection
