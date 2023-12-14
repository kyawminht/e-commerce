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
                            <h3>Slider Lists</h3>
                            <a href="{{url('admin/slider/create')}}"  class="btn btn-primary">Add Slider</a>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped table-bordered">
                                <thead>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Action</th>
                                </thead>
                                <tbody>
                                @forelse($sliders as $slider)
                                    <tr>
                                        <td>{{$slider->id}}</td>
                                        <td>{{$slider->title}}</td>
                                        <td>{{$slider->description}}</td>
                                        <td>
                                            <img src="{{asset($slider->image)}}" alt="" style="width: 50px; height: 50px" class="rounded-circle">
                                        </td>
                                        <td>{{$slider->status == '1' ? 'Visible': 'Hidden'}}</td>
                                        <td>
                                            <a href="{{ url('admin/slider/'.$slider->id.'/edit') }}" class="btn btn-success">Edit</a>
                                            <a href="{{url('admin/slider/'.$slider->id.'/delete')}}" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>

                                @empty
                                    <tr>
                                        <td colspan="7">No Slider Found</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                            <div class="">
                                {{$sliders->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
