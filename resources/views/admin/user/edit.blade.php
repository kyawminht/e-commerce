@extends('layouts.admin')
@section('title','user edit')
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
                    <h3>Edit User</h3>
                    <a href="{{ url('admin/users') }}" class="btn btn-warning text-white">BACK</a>
                </div>
                <div class="container mt-5 offset-3">
                    <form action="{{ url('admin/user/'.$user->id.'/update') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')

                    <!-- Title Field -->
                        <div class="form-group col-md-6">
                            <label for="title">Name:</label>
                            <input type="text" class="form-control" id="title" name="name" value="{{ $user->name }}">
                            @error('name')
                            <span style="color: red;">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Description Field -->
                        <div class="form-group col-md-6">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="title" name="email"  value="{{ $user->email }}">
                            @error('email')
                            <span style="color: red;">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- pass Field -->
                        <div class="form-group col-md-6">
                            <label for="image" class="form-label">Password:</label>
                            <input type="password" name="password" class="form-control"  value="{{ $user->password }}">

                            @error('password')
                            <span style="color: red;">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Status Field -->
                        <div class="form-group col-md-6">
                            <label for="status" class="form-label">Role:</label>
                            <select name="role_as" id="" class="form-control form-select">
                                <option >Select Role</option>
                                <option value="0" {{ $user->role_as == '0' ? 'selected' : '' }}>User</option>
                                <option value="1" {{ $user->role_as == '1' ? 'selected' : '' }}>Admin</option>


                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary mb-5">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
