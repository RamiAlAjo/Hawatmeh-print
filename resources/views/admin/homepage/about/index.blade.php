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
                                <h5 class="card-title pt-2">About Section</h5>
                            </div>
                            <div class="col-md-6 col-6 text-right">
                                <a href="{{ route('admin.about-section.create') }}" class="btn btn-primary">Add About Section</a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Description (EN)</th>
                                        <th scope="col">Description (AR)</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($aboutSections as $aboutSection)
                                    <tr>
                                        <td scope="row">{{ $aboutSection->id }}</td>
                                        <td>{{ $aboutSection->about_section_description_en ?? 'No description' }}</td>
                                        <td>{{ $aboutSection->about_section_description_ar ?? 'لا يوجد وصف' }}</td>
                                        <td>
                                            <a type="button" class="btn btn-sm btn-info" href="{{ route('admin.about-section.edit', $aboutSection->id) }}">Edit</a>
                                            <form action="{{ route('admin.about-section.destroy', $aboutSection->id) }}" method="POST" style="display:inline;">
                                                @method('DELETE')
                                                @csrf
                                                <a type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#staticBackdrop{{ $aboutSection->id }}">Delete</a>

                                                <!-- Modal for Deletion Confirmation -->
                                                <div class="modal fade" id="staticBackdrop{{ $aboutSection->id }}" data-bs-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="staticBackdropLabel">Delete</h5>
                                                                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Are you sure you want to delete the About Section with ID {{ $aboutSection->id }}?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                                <button type="submit" class="btn btn-sm btn-danger">Yes, Delete</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
