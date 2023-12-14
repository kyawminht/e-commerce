@extends('layouts.admin')
@section('title','create user')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <h3>Add User</h3>
                    <a href="{{ url('admin/users') }}" class="btn btn-warning text-white">BACK</a>
                </div>
                <div class="container mt-5 offset-3">
                    <form action="{{ url('admin/user/store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <!-- Title Field -->
                        <div class="form-group col-md-6">
                            <label for="title">Name:</label>
                            <input type="text" class="form-control" id="title" name="name" value="{{ old('name') }}">
                            @error('name')
                            <span style="color: red;">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Description Field -->
                        <div class="form-group col-md-6">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="title" name="email" value="{{ old('email') }}">
                            @error('email')
                            <span style="color: red;">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- pass Field -->
                        <div class="form-group col-md-6">
                            <label for="image" class="form-label">Password:</label>
                            <input type="password" name="password" class="form-control" value="{{ old('password') }}">

                            @error('password')
                            <span style="color: red;">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Status Field -->
                        <div class="form-group col-md-6">
                            <label for="status" class="form-label">Role:</label>
                            <select name="role_as" id="" class="form-control form-select">
                                <option >Select Role</option>
                                <option value="0">User</option>
                                <option value="1">Admin</option>

                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary mb-5">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
