@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-md-12 ">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h3>Edit Category</h3>
                    <a href="{{url('admin/category')}}" class="btn btn-warning text-white">BACK</a>
                </div>
                <div class="container mt-5 offset-3">
                    <form action="{{ url('admin/category/'.$category->id)  }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <!-- Name Field -->
                        <div class="form-group col-md-6">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $category->name }}" >
                            @error('name')
                            <span style="color: red;">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Slug Field -->
                        <div class="form-group col-md-6">
                            <label for="slug">Slug:</label>
                            <input type="text" class="form-control" id="slug" name="slug" value="{{ $category->slug  }}" >
                            @error('slug')
                            <span style="color: red;">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Description Field -->
                        <div class="form-group col-md-6">
                            <label for="description">Description:</label>
                            <textarea class="form-control" id="description" name="description" rows="4" >{{ $category->description  }}</textarea>
                            @error('description')
                            <span style="color: red;">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Image Field -->
                        <div class="form-group col-md-6">
                            <label for="image">Image:</label>
                            <input type="file" class="form-control-file" id="image" name="image" value="{{ old('image') }}">
                            <img src="{{asset('/uploads/category/'.$category->image)}}" alt="" height="60px" width="60px">
                            @error('image')
                            <span style="color: red;">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Meta Title Field -->
                        <div class="form-group col-md-6">
                            <label for="meta_title">Meta Title:</label>
                            <input type="text" class="form-control" id="meta_title" name="meta_title" value="{{$category->metal_title }}" >
                            @error('meta_title')
                            <span style="color: red;">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Meta Description Field -->
                        <div class="form-group col-md-6">
                            <label for="meta_description">Meta Description:</label>
                            <input type="text" class="form-control" id="meta_description" name="meta_description"  value="{{$category->metal_description }}">

                            @error('meta_description')
                            <span style="color: red;">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Meta Description Field -->
                        <div class="form-group col-md-6">
                            <label for="meta_description">Meta Keyword:</label>
                            <input type="text" class="form-control" id="meta_keyword" name="meta_keyword" value="{{ $category->meta_keyword  }}" >
                            @error('meat_keyword')
                            <span style="color: red;">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Status Field -->
                        <div class="form-group col-md-6">
                            <label for="status">Status:</label>
                            <input type="checkbox" name="status" value="{{ $category->status == '1'? 'checked' : ''  }}">
                        </div>



                        <button type="submit" class="btn btn-primary mb-5">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
