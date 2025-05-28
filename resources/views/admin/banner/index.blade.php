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
                                <h5 class="card-title pt-2">Banners</h5>
                            </div>
                            <div class="col-md-6 col-6 text-right">
                                <a href="{{ route('admin.banner.create') }}" class="btn btn-primary">Add Banner</a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Title (EN)</th>
                                        <th scope="col">Title (AR)</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($banners as $banner)
                                        <tr>
                                            <td scope="row">{{ $banner->id }}</td>
                                            <td>{{ $banner->title_en ?? 'No title' }}</td>
                                            <td>{{ $banner->title_ar ?? 'No title' }}</td>
                                            <td>
                                                <img src="{{ asset($banner->image) }}" width="80" height="80" alt="Banner Image">
                                            </td>
                                            <td>
                                                <a class="btn btn-sm btn-info" href="{{ route('admin.banner.edit', $banner->id) }}">Edit</a>
                                                <form action="{{ route('admin.banner.destroy', $banner->id) }}" method="POST" class="d-inline">
                                                    <a class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal{{ $banner->id }}">Delete</a>
                                                    @csrf
                                                    @method('DELETE')

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="deleteModal{{ $banner->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="deleteModalLabel">Delete Confirmation</h5>
                                                                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Are you sure you want to delete banner: "{{ $banner->title_en ?? 'No title' }}"?
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
                        </div> <!-- table responsive -->
                    </div> <!-- card-body -->
                </div> <!-- col-md-12 -->
            </div> <!-- row -->
        </div> <!-- card -->
    </div> <!-- col-xl-12 -->
</div> <!-- row -->
@endsection
