@extends('admin.layouts.app')

@section('content')
<div class="row">
    <div class="col-xl-12">
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">Create Client</h5>

                <form action="{{ route('admin.clients.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="client_title_en">Client Title (EN)</label>
                        <input type="text" class="form-control" id="client_title_en" name="client_title_en" required>
                    </div>

                    <div class="form-group">
                        <label for="client_title_ar">Client Title (AR)</label>
                        <input type="text" class="form-control" id="client_title_ar" name="client_title_ar">
                    </div>

                    <div class="form-group">
                        <label for="client_image">Client Image</label>
                        <input type="file" class="form-control" id="client_image" name="client_image">
                    </div>

                    <button type="submit" class="btn btn-primary mt-3">Save Client</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
