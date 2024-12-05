@extends('user_view.layout.layout')
@section('content')
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <section class="bg0 p-t-120 p-b-140">
        <div class="container mt-4">
            <div class="row">
                <div class="col-lg-9 my-lg-0 my-1">
                    <div id="main-content" class="bg-white border">
                        <div class="d-flex flex-column">
                                <div class="card m-b-30">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">Name: {{ $user->name }} </li>
                                        <li class="list-group-item"><i class="fa fa-envelope float-right"></i>Email : {{$user->email}}</li>
                                        <li class="list-group-item"><i class="fa fa-map-marker float-right"></i>Address : Address</li>
                                    </ul>
                                </div>
                        </div>
                        <div class="text-uppercase">Orders</div>
                        <div class="grid-container">
                            @forelse ($orders as $order )
                            <div class="order my-3 bg-white border grid-item">
                                <div class="row">
                                    <div class="col-lg-12 mt-3">
                                        <div class="d-flex flex-column justify-content-between order-summary">
                                            <div class="d-flex align-items-center">
                                                <div class="text-uppercase font-weight-bold">Order ID: <span>{{$order->id}}</span></div>
                                            </div>
                                            <div class="fs-8 text-muted"><span>{{$order->createt_at}}</span></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mt-3">
                                        <div class="d-sm-flex align-items-sm-start justify-content-sm-between">
                                            <a href="{{route('orders.show',$order->id)}}" class="btn btn-primary text-uppercase">order info</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @empty
                            <p>No orders found.</p>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
