@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-md-12 ">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h3>Edit Color</h3>
                    <a href="{{url('admin/color')}}" class="btn btn-warning text-white">BACK</a>
                </div>
                <div class="container mt-5 offset-3">
                    <form action="{{ url('admin/color/'.$color->id)  }}" method="post" >
                    @csrf
                    @method('put')
                    <!-- Name Field -->
                        <div class="form-group col-md-6">
                            <label for="name">Color Name:</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $color->name }}" >
                            @error('name')
                            <span style="color: red;">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Slug Field -->
                        <div class="form-group col-md-6">
                            <label for="slug">Color Code:</label>
                            <input type="text" class="form-control" name="code" value="{{  $color->code  }}" >
                            @error('code')
                            <span style="color: red;">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Status Field -->
                        <div class="form-group col-md-6">
                            <label for="status">Status:</label>
                            <input type="checkbox" name="status" {{$color->status ? "checked": ''}}>
                        </div>

                        <button type="submit" class="btn btn-primary mb-5">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
