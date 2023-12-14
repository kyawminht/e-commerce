@extends('layouts.admin')
@section('title','All users')
@section('content')
    <div>
        <div>
            <div class="row">
                <div class="col-md-12 ">
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if (session('message'))
                        <div class="alert alert-success">{{session('message')}}</div>
                    @endif
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <h3>User Lists</h3>
                            <a href="{{url('admin/user/create')}}"  class="btn btn-primary">Add User</a>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped table-bordered">
                                <thead>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Action</th>
                                </thead>
                                <tbody>
                                @forelse($users as $user)
                                    <tr>
                                        <td>{{$user->id}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->role_as == '1' ? 'Admin' : 'User'}}</td>
                                        <td>
                                            <a href="{{ url('admin/user/'.$user->id) }}" class="btn btn-success">Edit</a>
                                            <a href="{{url('admin/user/'.$user->id.'/delete')}}" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5">No user Found</td>
                                    </tr>
                                @endforelse

                                </tbody>
                            </table>
                            <div class="">
                                {{$users->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
