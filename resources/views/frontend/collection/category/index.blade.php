@extends('layouts.app')

@section('title', 'All categories')

@section('content')

    <div class="py-3 py-md-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="mb-4">Our Categories</h4>
                </div>


                 @forelse($categories as $category)
                    <div class="col-6 col-md-3">
                        <div class="category-card">
                            <a href="{{url('collection/'.$category->slug)}}">
                                <div class="category-card-img">
                                    <img src="{{asset($category->image)}}" class="w-100" style="height: 400px" alt="Laptop">
                                </div>
                                <div class="category-card-body">
                                    <h5>{{$category->name}}</h5>
                                </div>
                            </a>
                        </div>
                    </div>
                @empty
                     <div class="col-md-12">
                         <h5>No Category Avaliable</h5>
                     </div>
                @endforelse

            </div>
        </div>
    </div>

@endsection
