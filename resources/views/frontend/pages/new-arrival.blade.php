@extends('layouts.app')

@section('title', 'new-arrivals')

@section('content')

    <div class="py-3 py-md-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="mb-4">New Arrivals</h4>
                </div>


                @forelse($newArrivals as $new)
                    <div class="col-6 col-md-3">
                        <div class="category-card">
                            <a href="{{url('collection/'.$new->slug)}}">
                                <span class="badge rounded-pill bg-danger">New</span>
                                <div class="category-card-img">
                                    <img src="{{asset($new->productImage[0]->image)}}" class="w-100" style="height: 400px" alt="Laptop">
                                </div>
                                <div class="category-card-body">
                                    <h5>{{$new->name}}</h5>
                                </div>
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-md-12">
                        <h5>No Product Avaliable</h5>
                    </div>
                @endforelse

            </div>
        </div>
    </div>

@endsection
