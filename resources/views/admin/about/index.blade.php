@extends('admin.layouts.app')

@section('content')
<div class="row">
    <div class="col-xl-12">
        <div class="card mb-3">
            <div class="row no-gutters">
                <div class="col-md-12">
                    <div class="card-body">
                        <!-- Message Handling -->
                        @if(session('status-success'))
                            <div class="alert alert-success">
                                {{ session('status-success') }}
                            </div>
                        @endif

                        @if(session('status-error'))
                            <div class="alert alert-danger">
                                {{ session('status-error') }}
                            </div>
                        @endif

                        <div class="row">
                            <div class="col-md-6 col-6">
                                <h5 class="card-title pt-2">About Us</h5>
                            </div>
                            <div class="col-md-6 col-6 text-right">
                                @if($aboutUs)
                                    <span class="btn btn-secondary" disabled>About Us entry already exists</span>
                                @else
                                    <a href="{{ route('admin.about.create') }}" class="btn btn-primary">Add New</a>
                                @endif
                            </div>
                        </div>

                        <!-- Tabs for language switching -->
                        <ul class="nav nav-tabs" id="languageTabs" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" id="en-tab" data-bs-toggle="tab" href="#en" role="tab" aria-controls="en" aria-selected="true">English</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="ar-tab" data-bs-toggle="tab" href="#ar" role="tab" aria-controls="ar" aria-selected="false">Arabic</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="languageTabsContent">
                            <!-- English Tab Content -->
                            <div class="tab-pane fade show active" id="en" role="tabpanel" aria-labelledby="en-tab">
                                <div class="table-responsive mt-3">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Main Title (EN)</th>
                                                <th scope="col">About Us Description (EN)</th>
                                                <th scope="col">Goals Title (EN)</th>
                                                <th scope="col">Services Title (EN)</th>
                                                <th scope="col">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if(!$aboutUs)
                                                <tr>
                                                    <td colspan="6" class="text-center">No About Us data found.</td>
                                                </tr>
                                            @else
                                                <tr>
                                                    <td scope="row">{{ $aboutUs->id }}</td>
                                                    <td>{{ $aboutUs->goals_main_title_en }}</td>
                                                    <td>{!! $aboutUs->about_us_description_en !!}</td>
                                                    <td>{{ $aboutUs->goals_title_en }}</td>
                                                    <td>{{ $aboutUs->services_card_title_en }}</td>
                                                    <td>
                                                        <a class="btn btn-sm btn-info" href="{{ route('admin.about.edit', $aboutUs->id) }}">Edit</a>
                                                        <form action="{{ route('admin.about.destroy', $aboutUs->id) }}" method="POST" style="display:inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#staticBackdrop{{ $aboutUs->id }}">Delete</button>

                                                            <div class="modal fade" id="staticBackdrop{{ $aboutUs->id }}" data-bs-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="staticBackdropLabel">Delete Confirmation</h5>
                                                                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            Are you sure you want to delete the About Us entry?
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                                            <button type="submit" class="btn btn-sm btn-danger">Yes</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- Arabic Tab Content -->
                            <div class="tab-pane fade" id="ar" role="tabpanel" aria-labelledby="ar-tab">
                                <div class="table-responsive mt-3">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Main Title (AR)</th>
                                                <th scope="col">About Us Description (AR)</th>
                                                <th scope="col">Goals Title (AR)</th>
                                                <th scope="col">Services Title (AR)</th>
                                                <th scope="col">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if(!$aboutUs)
                                                <tr>
                                                    <td colspan="6" class="text-center">No About Us data found.</td>
                                                </tr>
                                            @else
                                                <tr>
                                                    <td scope="row">{{ $aboutUs->id }}</td>
                                                    <td>{{ $aboutUs->goals_main_title_ar }}</td>
                                                    <td>{!! $aboutUs->about_us_description_ar !!}</td>
                                                    <td>{{ $aboutUs->goals_title_ar }}</td>
                                                    <td>{{ $aboutUs->services_card_title_ar }}</td>
                                                    <td>
                                                        <a class="btn btn-sm btn-info" href="{{ route('admin.about.edit', $aboutUs->id) }}">Edit</a>
                                                        <form action="{{ route('admin.about.destroy', $aboutUs->id) }}" method="POST" style="display:inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#staticBackdrop{{ $aboutUs->id }}">Delete</button>

                                                            <div class="modal fade" id="staticBackdrop{{ $aboutUs->id }}" data-bs-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="staticBackdropLabel">Delete Confirmation</h5>
                                                                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            Are you sure you want to delete the About Us entry?
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                                            <button type="submit" class="btn btn-sm btn-danger">Yes</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div> <!-- End of tab content -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('admin.layouts.app')

@section('content')
<div class="row">
    <div class="col-xl-12">
        <div class="card mb-3">
            <div class="row no-gutters">
                <div class="col-md-12">
                    <div class="card-body">
                        <!-- Message Handling -->
                        @if(session('status-success'))
                            <div class="alert alert-success">
                                {{ session('status-success') }}
                            </div>
                        @endif

                        @if(session('status-error'))
                            <div class="alert alert-danger">
                                {{ session('status-error') }}
                            </div>
                        @endif

                        <div class="row">
                            <div class="col-md-6 col-6">
                                <h5 class="card-title pt-2">About Us</h5>
                            </div>
                            <div class="col-md-6 col-6 text-right">
                                @if($aboutUs)
                                    <span class="btn btn-secondary" disabled>About Us entry already exists</span>
                                @else
                                    <a href="{{ route('admin.about.create') }}" class="btn btn-primary">Add New</a>
                                @endif
                            </div>
                        </div>

                        <!-- Tabs for language switching -->
                        <ul class="nav nav-tabs" id="languageTabs" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" id="en-tab" data-bs-toggle="tab" href="#en" role="tab" aria-controls="en" aria-selected="true">English</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="ar-tab" data-bs-toggle="tab" href="#ar" role="tab" aria-controls="ar" aria-selected="false">Arabic</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="languageTabsContent">
                            <!-- English Tab Content -->
                            <div class="tab-pane fade show active" id="en" role="tabpanel" aria-labelledby="en-tab">
                                <div class="table-responsive mt-3">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Main Title (EN)</th>
                                                <th scope="col">About Us Description (EN)</th>
                                                <th scope="col">Goals Title (EN)</th>
                                                <th scope="col">Services Title (EN)</th>
                                                <th scope="col">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if(!$aboutUs)
                                                <tr>
                                                    <td colspan="6" class="text-center">No About Us data found.</td>
                                                </tr>
                                            @else
                                                <tr>
                                                    <td scope="row">{{ $aboutUs->id }}</td>
                                                    <td>{{ $aboutUs->goals_main_title_en }}</td>
                                                    <td>{!! $aboutUs->about_us_description_en !!}</td>
                                                    <td>{{ $aboutUs->goals_title_en }}</td>
                                                    <td>{{ $aboutUs->services_card_title_en }}</td>
                                                    <td>
                                                        <a class="btn btn-sm btn-info" href="{{ route('admin.about.edit', $aboutUs->id) }}">Edit</a>
                                                        <form action="{{ route('admin.about.destroy', $aboutUs->id) }}" method="POST" style="display:inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#staticBackdrop{{ $aboutUs->id }}">Delete</button>

                                                            <div class="modal fade" id="staticBackdrop{{ $aboutUs->id }}" data-bs-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="staticBackdropLabel">Delete Confirmation</h5>
                                                                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            Are you sure you want to delete the About Us entry?
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                                            <button type="submit" class="btn btn-sm btn-danger">Yes</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- Arabic Tab Content -->
                            <div class="tab-pane fade" id="ar" role="tabpanel" aria-labelledby="ar-tab">
                                <div class="table-responsive mt-3">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Main Title (AR)</th>
                                                <th scope="col">About Us Description (AR)</th>
                                                <th scope="col">Goals Title (AR)</th>
                                                <th scope="col">Services Title (AR)</th>
                                                <th scope="col">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if(!$aboutUs)
                                                <tr>
                                                    <td colspan="6" class="text-center">No About Us data found.</td>
                                                </tr>
                                            @else
                                                <tr>
                                                    <td scope="row">{{ $aboutUs->id }}</td>
                                                    <td>{{ $aboutUs->goals_main_title_ar }}</td>
                                                    <td>{!! $aboutUs->about_us_description_ar !!}</td>
                                                    <td>{{ $aboutUs->goals_title_ar }}</td>
                                                    <td>{{ $aboutUs->services_card_title_ar }}</td>
                                                    <td>
                                                        <a class="btn btn-sm btn-info" href="{{ route('admin.about.edit', $aboutUs->id) }}">Edit</a>
                                                        <form action="{{ route('admin.about.destroy', $aboutUs->id) }}" method="POST" style="display:inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#staticBackdrop{{ $aboutUs->id }}">Delete</button>

                                                            <div class="modal fade" id="staticBackdrop{{ $aboutUs->id }}" data-bs-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="staticBackdropLabel">Delete Confirmation</h5>
                                                                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            Are you sure you want to delete the About Us entry?
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                                            <button type="submit" class="btn btn-sm btn-danger">Yes</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div> <!-- End of tab content -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
