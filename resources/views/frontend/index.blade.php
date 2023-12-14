@extends('layouts.app')

@section('title', 'Home')

@section('content')

    <div id="carouselExampleCaptions" class="carousel slide container mt-5 bg-warning"  data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach($sliders as $key => $slider)
                <div class="carousel-item {{$key == 0 ? 'active' : ''}}">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-md-6">
                            <div class=" text-start">
                                <div class="custom-carousel-content">
                                    <h1 class="display-4 text-black font-weight-medium">
                                        {{ $slider->title }}
                                    </h1>
                                    <p class="lead ">
                                        {{ $slider->description }}
                                    </p>
                                    <a href="#" class="btn btn-primary btn-lg">Get Now</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            @if($slider->image)
                                <img src="{{ asset($slider->image) }}" class="d-block w-100 h-75" alt="Slider Image">
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

@endsection
