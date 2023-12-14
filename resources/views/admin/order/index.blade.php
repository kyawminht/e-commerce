@extends('layouts.app')

@section('title', 'orders')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>My Orders</h2>
                <hr>
                <table class="table table-striped table-responsive">
                    <thead>
                    <th>Order Id</th>
                    <th>Tracking No</th>
                    <th>Username</th>
                    <th>Payment mode</th>
                    <th>Order date</th>
                    <th>Status message</th>
                    <th>Action</th>
                    </thead>
                    <tbody>
                    @forelse($orders as $order)
                        <tr>
                            <td>{{$order->id}}</td>
                            <td>{{$order->tracking_no}}</td>
                            <td>{{$order->fullname}}</td>
                            <td>{{$order->payment_mode}}</td>
                            <td>{{$order->created_at->format('d-m-Y')}}</td>
                            <td>{{$order->status_message}}</td>
                            <td>
                                <a href="{{url('admin/orders/'.$order->id)}}" class="btn btn-primary">View</a>
                            </td>

                        </tr>
                    @empty
                        <div class="">
                            <tr>
                                <td colspan="6">No Order</td>
                            </tr>
                        </div>
                    @endforelse
                    </tbody>
                </table>
                {{$orders->links()}}
            </div>
        </div>
    </div>

@endsection
