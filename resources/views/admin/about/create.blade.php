@extends('admin.layouts.app')

@section('content')
<div class="row">
    <div class="col-xl-12">
        <div class="card shadow-sm mb-3">
            <div class="row no-gutters">
                <div class="col-md-12">
                    <div class="card-body">
                        <h5 class="card-title pt-2 text-dark font-weight-bold">Create About Us</h5>
                        <form action="{{ route('admin.about.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <!-- Tabs Navigation -->
                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="pills-english-tab" data-toggle="pill" href="#nav-english" role="tab" aria-controls="nav-english" aria-selected="true">English</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-arabic-tab" data-toggle="pill" href="#nav-arabic" role="tab" aria-controls="nav-arabic" aria-selected="false">Arabic</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-images-tab" data-toggle="pill" href="#nav-images" role="tab" aria-controls="nav-images" aria-selected="false">Images</a>
                                </li>
                            </ul>

                            <div class="tab-content" id="pills-tabContent">
                                <!-- English Tab -->
                                <div class="tab-pane fade show active" id="nav-english" role="tabpanel" aria-labelledby="pills-english-tab">
                                    <div class="form-group">
                                        <label for="about_us_description_en" class="font-weight-semibold">About Us Description (English)</label>
                                        <textarea class="form-control shadow-sm rounded" name="about_us_description_en" id="about_us_description_en" rows="4">{{ old('about_us_description_en') }}</textarea>
                                        @error('about_us_description_en')
                                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Goals Section -->
                                    <div class="form-group">
                                        <label for="goals_main_title_en" class="font-weight-semibold">Goals Main Title (English)</label>
                                        <input type="text" class="form-control shadow-sm rounded" name="goals_main_title_en" id="goals_main_title_en" value="{{ old('goals_main_title_en') }}">
                                        @error('goals_main_title_en')
                                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="goals_title_en" class="font-weight-semibold">Goals Title (English)</label>
                                        <input type="text" class="form-control shadow-sm rounded" name="goals_title_en" id="goals_title_en" value="{{ old('goals_title_en') }}">
                                        @error('goals_title_en')
                                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="goals_description_en" class="font-weight-semibold">Goals Description (English)</label>
                                        <textarea class="form-control shadow-sm rounded" name="goals_description_en" id="goals_description_en" rows="4">{{ old('goals_description_en') }}</textarea>
                                        @error('goals_description_en')
                                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Services Card Section -->
                                    <div class="form-group">
                                        <label for="services_card" class="font-weight-semibold">Services Cards</label>
                                        <div id="services_cards_en">
                                            <!-- Services Card 1 -->
                                            <div class="services-card-input mb-3">
                                                <input type="text" class="form-control shadow-sm rounded" name="services_card_title_en[]" placeholder="Service Card Title (English)">
                                                <textarea class="form-control shadow-sm rounded mt-2" name="services_card_description_en[]" placeholder="Service Card Description (English)" rows="3"></textarea>
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-primary btn-sm rounded-pill shadow-sm" id="add-service-card-en">Add Service Card</button>
                                        @error('services_card_title_en')
                                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Arabic Tab -->
                                <div class="tab-pane fade" id="nav-arabic" role="tabpanel" aria-labelledby="pills-arabic-tab">
                                    <div class="text-right" dir="rtl">
                                        <div class="form-group">
                                            <label for="about_us_description_ar" class="font-weight-semibold">About Us Description (Arabic)</label>
                                            <textarea class="form-control shadow-sm rounded" name="about_us_description_ar" id="about_us_description_ar" rows="4">{{ old('about_us_description_ar') }}</textarea>
                                            @error('about_us_description_ar')
                                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Goals Section -->
                                        <div class="form-group">
                                            <label for="goals_main_title_ar" class="font-weight-semibold">Goals Main Title (Arabic)</label>
                                            <input type="text" class="form-control shadow-sm rounded" name="goals_main_title_ar" id="goals_main_title_ar" value="{{ old('goals_main_title_ar') }}">
                                            @error('goals_main_title_ar')
                                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="goals_title_ar" class="font-weight-semibold">Goals Title (Arabic)</label>
                                            <input type="text" class="form-control shadow-sm rounded" name="goals_title_ar" id="goals_title_ar" value="{{ old('goals_title_ar') }}">
                                            @error('goals_title_ar')
                                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="goals_description_ar" class="font-weight-semibold">Goals Description (Arabic)</label>
                                            <textarea class="form-control shadow-sm rounded" name="goals_description_ar" id="goals_description_ar" rows="4">{{ old('goals_description_ar') }}</textarea>
                                            @error('goals_description_ar')
                                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Services Card Section -->
                                        <div class="form-group">
                                            <label for="services_card_ar" class="font-weight-semibold">خدمات (Arabic)</label>
                                            <div id="services_cards_ar">
                                                <!-- Services Card 1 -->
                                                <div class="services-card-input mb-3">
                                                    <input type="text" class="form-control shadow-sm rounded" name="services_card_title_ar[]" placeholder="عنوان الخدمة (Arabic)">
                                                    <textarea class="form-control shadow-sm rounded mt-2" name="services_card_description_ar[]" placeholder="وصف الخدمة (Arabic)" rows="3"></textarea>
                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-primary btn-sm rounded-pill shadow-sm" id="add-service-card-ar">إضافة خدمة</button>
                                            @error('services_card_title_ar')
                                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- Images Tab -->
                                <div class="tab-pane fade" id="nav-images" role="tabpanel" aria-labelledby="pills-images-tab">
                                    <div class="form-group">
                                        <label for="images" class="font-weight-semibold">Upload Images</label>
                                        <input id="images" type="file" class="form-control shadow-sm rounded" name="images[]" multiple>
                                        @error('images')
                                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div id="images-preview" class="d-flex flex-wrap"></div>
                                </div>
                            </div>

                            <div class="form-group mt-3">
                                <button type="submit" class="btn btn-dark rounded-pill shadow-sm">Create</button>
                                <button type="button" class="btn btn-light rounded-pill shadow-sm" onclick="window.location='{{ route('admin.about.index') }}'">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Add Service Card English
    let serviceCardCountEn = 1;
    document.getElementById('add-service-card-en').addEventListener('click', function() {
        if (serviceCardCountEn < 3) {  // Limit to 3 service cards
            let serviceCardInput = document.createElement('div');
            serviceCardInput.classList.add('services-card-input', 'mb-3');
            serviceCardInput.innerHTML = `
                <input type="text" class="form-control shadow-sm rounded" name="services_card_title_en[]" placeholder="Service Card Title (English)">
                <textarea class="form-control shadow-sm rounded mt-2" name="services_card_description_en[]" placeholder="Service Card Description (English)" rows="3"></textarea>
            `;
            document.getElementById('services_cards_en').appendChild(serviceCardInput);
            serviceCardCountEn++;
        }
    });

    // Add Service Card Arabic
    let serviceCardCountAr = 1;
    document.getElementById('add-service-card-ar').addEventListener('click', function() {
        if (serviceCardCountAr < 3) {  // Limit to 3 service cards
            let serviceCardInput = document.createElement('div');
            serviceCardInput.classList.add('services-card-input', 'mb-3');
            serviceCardInput.innerHTML = `
                <input type="text" class="form-control shadow-sm rounded" name="services_card_title_ar[]" placeholder="عنوان الخدمة (Arabic)">
                <textarea class="form-control shadow-sm rounded mt-2" name="services_card_description_ar[]" placeholder="وصف الخدمة (Arabic)" rows="3"></textarea>
            `;
            document.getElementById('services_cards_ar').appendChild(serviceCardInput);
            serviceCardCountAr++;
        }
    });
</script>

@endsection
