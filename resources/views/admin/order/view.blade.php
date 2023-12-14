@extends('layouts.app')

@section('title', 'order-show')

@section('content')

    <div class="py-5 ">
        <div class="container">
            <div class="row shadow ">
                <div class="col-md-12 ">
                    <h4>
                        My Order Details
                        <a href="{{url('admin/orders'.$order->id)}}" class="btn btn-success float-end">Back</a>
                        <a href="{{url('admin/order/'.$order->id)}}" target="_blank" class="btn btn-warning float-end">Download Invoice</a>
                        <a href="{{url('admin/order/'.$order->id.'/invoice')}}" class="btn btn-dark float-end">View Invoice</a>

                    </h4>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <h5>Order details</h5>
                            <hr>
                            <h5>User Name: {{$order->fullname}}</h5>
                            <h5>Emial: {{$order->email}}</h5>
                            <h5>Pincode: {{$order->pincode}}</h5>
                            <h5>Phone: {{$order->phone}}</h5>
                            <h5>Address: {{$order->address}}</h5>

                        </div>

                        <div class="col-md-6">
                            <h5>Order details</h5>
                            <hr>
                            <h5>Order Id : {{$order->id}}</h5>
                            <h5>Tracking No : {{$order->tracking_no}}</h5>
                            <h5>Order created date: {{$order->created_at->format('d-m-Y')}}</h5>
                            <h5>Payment mode: {{$order->payment_mode}}</h5>
                            <h5>Order Status: {{$order->status_message}}</h5>

                        </div>
                    </div>
                    <br>
                    <h5>Order item</h5>
                    <hr>
                    <table class="table table-striped table-responsive">
                        <thead>
                        <th>Itme Id</th>
                        <th>Image</th>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                        </thead>
                        <tbody>
                        @php
                            $totalPrice=0;
                        @endphp
                        @foreach($order->orderItems as $orderItem)
                            <tr>
                                <td>{{$orderItem->id}}</td>
                                <td>
                                    <img src="{{asset( $orderItem->product->productImage[0]->image) }}" style="width: 50px; height: 50px" alt="{{ $orderItem->product->productImage[0]->name }}"/>
                                </td>
                                <td>{{$orderItem->product->name}}</td>
                                <td>{{$orderItem->quantity}}</td>

                                <td>{{$orderItem->price}}</td>
                                <td class="fw-bold">${{$orderItem->price}}</td>
                            </tr>
                            @php
                                $totalPrice +=$orderItem->quantity *  $orderItem->price;
                            @endphp
                        @endforeach
                        <tr>
                            <td colspan="5" class="fw-bold">Total amount</td>
                            <td colspan="1" class="fw-bold">${{$totalPrice}}</td>
                        </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
