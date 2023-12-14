@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="d-flex justify-content-between flex-wrap">
                <div class="d-flex align-items-end flex-wrap">
                    <div class="me-md-3 me-xl-5">
                        <h2>Welcome back,</h2>
                        <p class="mb-md-0">Your analytics dashboard template.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-3">
            <div class="card card-body bg-primary mb-4 text-white">
                <label>Total Orders</label>
                <h4>{{$totalOrder}}</h4>
                <a href="{{url('admin/orders')}}" class="btn btn-success">View</a>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card card-body bg-danger mb-4 text-white">
                <label>Today Orders</label>
                <h4>{{$todayOrder}}</h4>
                <a href="{{url('admin/orders')}}" class="btn btn-success">View</a>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card card-body bg-warning mb-4 text-white">
                <label>This Month Orders</label>
                <h4>{{$thisMonthOrder}}</h4>
                <a href="{{url('admin/orders')}}" class="btn btn-success">View</a>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card card-body bg-success mb-4 text-white">
                <label>This Year Orders</label>
                <h4>{{$thisYearOrder}}</h4>
                <a href="{{url('admin/orders')}}" class="btn btn-success">View</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="card card-body bg-primary mb-4 text-white">
                <label>Total Products</label>
                <h4>{{$totalProduct}}</h4>
                <a href="{{url('admin/product')}}" class="btn btn-success">View</a>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card card-body bg-primary mb-4 text-white">
                <label>Total Categories</label>
                <h4>{{$totalCategory}}</h4>
                <a href="{{url('admin/categories')}}" class="btn btn-success">View</a>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card card-body bg-primary mb-4 text-white">
                <label>Total Brands</label>
                <h4>{{$totalBrand}}</h4>
                <a href="{{url('admin/brands')}}" class="btn btn-success">View</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="card card-body bg-primary mb-4 text-white">
                <label>Total User</label>
                <h4>{{$userTotal}}</h4>
                <a href="{{url('admin/users')}}" class="btn btn-success">View</a>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card card-body bg-primary mb-4 text-white">
                <label>All Users</label>
                <h4>{{$allUser}}</h4>
                <a href="{{url('admin/users')}}" class="btn btn-success">View</a>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card card-body bg-primary mb-4 text-white">
                <label>Total Admin</label>
                <h4>{{$allAdmin}}</h4>
                <a href="{{url('admin/users')}}" class="btn btn-success">View</a>
            </div>
        </div>
    </div>
@endsection
