@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-md-12 ">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h3>Edit Color</h3>
                    <a href="{{url('admin/slider')}}" class="btn btn-warning text-white">BACK</a>
                </div>
                <div class="container mt-5 offset-3">
                    <form action="{{ url('admin/slider/'.$slider->id)  }}" method="post" enctype="multipart/form-data" >
                    @csrf
                    @method('put')
                    <!-- Name Field -->
                        <div class="form-group col-md-6">
                            <label for="name">Title</label>
                            <input type="text" class="form-control" id="name" name="title" value="{{ $slider->title }}" >
                            @error('title')
                            <span style="color: red;">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Slug Field -->
                        <div class="form-group col-md-6">
                            <label for="slug">Description</label>
                            <textarea type="text" class="form-control" name="description">{{$slider->description}}</textarea>
                            @error('description')
                            <span style="color: red;">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label for="image" class="form-label">Image:</label>
                            <input type="file" name="image" class="form-control">
                            <img src="{{asset($slider->image)}}" class="rounded-circle border" alt="" style="height: 50px; width: 50px">
                        </div>

                        <!-- Status Field -->
                        <div class="form-group col-md-6">
                            <label for="status">Status:</label>
                            <input type="checkbox" name="status" {{$slider->status ? "checked": ''}}>
                        </div>

                        <button type="submit" class="btn btn-primary mb-5">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
