@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h3>Add Slider</h3>
                    <a href="{{ url('admin/slider') }}" class="btn btn-warning text-white">BACK</a>
                </div>
                <div class="container mt-5 offset-3">
                    <form action="{{ url('admin/slider/store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <!-- Title Field -->
                        <div class="form-group col-md-6">
                            <label for="title">Title:</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
                            @error('title')
                            <span style="color: red;">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Description Field -->
                        <div class="form-group col-md-6">
                            <label for="description">Description</label>
                            <textarea class="form-control" name="description">{{ old('description') }}</textarea>
                            @error('description')
                            <span style="color: red;">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Image Field -->
                        <div class="form-group col-md-6">
                            <label for="image" class="form-label">Image:</label>
                            <input type="file" name="image" class="form-control">

                            @error('image')
                            <span style="color: red;">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Status Field -->
                        <div class="form-group col-md-6">
                            <label for="status" class="form-label">Status:</label>
                            <input type="checkbox" name="status" class="form-check"> Checked is Hidden and Unchecked is Visible
                        </div>

                        <button type="submit" class="btn btn-primary mb-5">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
