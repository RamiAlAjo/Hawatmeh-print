@extends('admin.layouts.app')

@section('content')
<div class="row">
    <div class="col-xl-12">
        <div class="card shadow-sm mb-3">
            <div class="card-body">
                <h5 class="card-title pt-2 text-dark font-weight-bold">Edit Client</h5>

                <form action="{{ route('admin.clients.update', $client->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Tabs -->
                    <ul class="nav nav-pills mb-3" id="client-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="tab-en" data-toggle="pill" href="#en-tab" role="tab" aria-controls="en-tab" aria-selected="true">English</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="tab-ar" data-toggle="pill" href="#ar-tab" role="tab" aria-controls="ar-tab" aria-selected="false">Arabic</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="tab-image" data-toggle="pill" href="#image-tab" role="tab" aria-controls="image-tab" aria-selected="false">Image</a>
                        </li>
                    </ul>

                    <div class="tab-content" id="client-tabContent">
                        <!-- English Tab -->
                        <div class="tab-pane fade show active" id="en-tab" role="tabpanel" aria-labelledby="tab-en">
                            <div class="form-group">
                                <label for="client_title_en" class="font-weight-semibold">Client Title (English)</label>
                                <input type="text" class="form-control shadow-sm rounded" name="client_title_en" value="{{ old('client_title_en', $client->client_title_en) }}">
                                @error('client_title_en')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Arabic Tab -->
                        <div class="tab-pane fade" id="ar-tab" role="tabpanel" aria-labelledby="tab-ar">
                            <div class="form-group text-right" dir="rtl">
                                <label for="client_title_ar" class="font-weight-semibold">عنوان العميل (Arabic)</label>
                                <input type="text" class="form-control shadow-sm rounded" name="client_title_ar" value="{{ old('client_title_ar', $client->client_title_ar) }}">
                                @error('client_title_ar')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Image Tab -->
                        <div class="tab-pane fade" id="image-tab" role="tabpanel" aria-labelledby="tab-image">
                            <div class="form-group">
                                <label for="client_image" class="font-weight-semibold">Client Image</label>
                                <input type="file" class="form-control shadow-sm rounded" name="client_image">
                                @if($client->client_image)
                                    <div class="mt-3">
                                        <img src="{{ asset('storage/' . $client->client_image) }}" alt="Client Image" height="100">
                                    </div>
                                @endif
                                @error('client_image')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Submit -->
                    <div class="form-group mt-3">
                        <button type="submit" class="btn btn-dark rounded-pill shadow-sm">Update</button>
                        <a href="{{ route('admin.clients.index') }}" class="btn btn-light rounded-pill shadow-sm">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
