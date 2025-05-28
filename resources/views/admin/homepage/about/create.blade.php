@extends('admin.layouts.app')

@section('content')
<div class="row">
    <div class="col-xl-12">
        <div class="card mb-3">
            <div class="row no-gutters">
                <div class="col-md-12">
                    <div class="card-body">
                        <h5 class="card-title pt-2">Add About Section</h5>
                        <form action="{{ route('admin.about-section.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <!-- Tabs for different sections -->
                            <ul class="nav nav-tabs mb-3" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="pills-english-tab" data-toggle="pill" href="#nav-tabs-english" role="tab" aria-controls="nav-tabs-english" aria-selected="true">English</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="nav-arabic-tab" data-toggle="pill" href="#nav-arabic" role="tab" aria-controls="nav-arabic" aria-selected="false">Arabic</a>
                                </li>
                            </ul>

                            <!-- Tab content -->
                            <div class="tab-content" id="pills-tabContent">

                                <!-- English Tab -->
                                <div class="tab-pane fade show active" id="nav-tabs-english" role="tabpanel" aria-labelledby="pills-english-tab">
                                    <div class="form-group">
                                        <label class="form-label" for="about_section_description_en">Description (English)</label>
                                        <textarea class="form-control" name="about_section_description_en" id="about_section_description_en" rows="4" placeholder="Enter description in English">{{ old('about_section_description_en') }}</textarea>
                                    </div>
                                </div>

                                <!-- Arabic Tab -->
                                <div class="tab-pane fade" id="nav-arabic" role="tabpanel" aria-labelledby="nav-arabic-tab">
                                    <div class="text-right" dir="rtl">
                                        <div class="form-group">
                                            <label class="form-label" for="about_section_description_ar">الوصف (Arabic)</label>
                                            <textarea class="form-control" name="about_section_description_ar" id="about_section_description_ar" rows="4" placeholder="Enter description in Arabic">{{ old('about_section_description_ar') }}</textarea>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <!-- Submit and Cancel buttons -->
                            <div class="form-group mt-2">
                                <button type="submit" class="btn btn-dark">Create</button>
                                <button type="button" class="btn btn-light" onclick="window.history.back()">Cancel</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
