@extends('layouts.admin')

@section('content')
    <div>
        <div>
    <div class="row">
                <div class="col-md-12 ">
                    @if (session('message'))
                        <div class="alert alert-success">{{session('message')}}</div>
                    @endif
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <h3>Color Lists</h3>
                            <a href="{{url('admin/color/create')}}"  class="btn btn-primary">Add Color</a>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped table-bordered">
                                <thead>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Code</th>
                                <th>Status</th>
                                <th>Action</th>
                                </thead>
                                <tbody>
                                @forelse($colors as $color)
                                    <tr>
                                        <td>{{$color->id}}</td>
                                        <td>{{$color->name}}</td>
                                        <td>{{$color->code}}</td>
                                        <td>{{$color->status == '1' ? 'Visible': 'Hidden'}}</td>
                                        <td>
                                            <a href="{{url('admin/color/'.$color->id.'/edit')}}" class="btn btn-success">Edit</a>
                                            <a href="{{url('admin/color/'.$color->id.'/delete')}}" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>

                                @empty
                                    <tr>
                                        <td colspan="7">No Color Found</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            <div class="">
                                {{$colors->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
  </div>
@endsection
