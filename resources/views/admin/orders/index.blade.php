
@extends('admin.index')

@section('content')
{{-- <div class="text-uppercase">Orders</div> --}}
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
                        {{-- <a href="{{route('admin.orders.show',$order->id)}}" class="btn btn-primary text-uppercase">order info</a> --}}

                        <!-- show details order Button -->
                    <a href="{{ route('admin.orders.show',$order->id) }}" class="btn-edit text-uppercase">order info</a>

                    <!-- remove Button -->
                    <form action="{{ route('admin.orders.remove', $order->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-delete">Remove</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <p>No orders found.</p>
        @endforelse
    </div>

    <style>
        /* General Button Styling */
        .btn {
            padding: 12px 30px; /* Adjusting padding for better text spacing */
            font-size: 16px;
            font-weight: bold;
            border-radius: 50px; /* Oval shape */
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
            border: none;
        }
    
       
    
        /* Edit Button (Grey) */
        .btn-edit {
            background-color: #cece74; /* Grey */
            color: white;
            padding: 8px 16px;
            font-size: 16px;
            border-radius: 4px; /* Slightly rounded corners */
            box-shadow: 0 2px 6px rgba(108, 117, 125, 0.2);
            text-decoration: none; /* Removing underline */
        }
    
        .btn-edit:hover {
            background-color: #5a636b;
            color: #fff;
            box-shadow: 0 4px 8px rgba(108, 117, 125, 0.4);
        }
    
        /* Delete Button (Grey) - Same as Edit (no border) */
        .btn-delete {
            background-color: #cece74; /* Grey */
            color: white;
            padding: 8px 16px;
            font-size: 16px;
            border-radius: 4px; /* Slightly rounded corners */
            box-shadow: 0 2px 6px rgba(108, 117, 125, 0.2);
            text-decoration: none; /* Removing underline */
            border: none; /* Removed border */
        }
    
        .btn-delete:hover {
            background-color: #5a636b;
            color: #fff;
            box-shadow: 0 4px 8px rgba(108, 117, 125, 0.4);
        }
    

    .grid-container {
    display: grid;
    grid-template-columns: repeat(4, 1fr); /* 3 equal-width columns */
    gap: 16px; /* Space between grid items */
   }

    .grid-item {
        background-color: #f3f3f3;
        padding: 16px;
        border: 1px solid #ddd;
        border-radius: 8px;
    }

    #main-content {
        padding: 30px;
        border-radius: 15px;
    }

    #main-content .h5,
    #main-content .text-uppercase {
        font-weight: 600;
        margin-bottom: 0;
    }

    #main-content .h5+div {
        font-size: 0.9rem;
    }

    #main-content .box {
        padding: 10px;
        border-radius: 6px;
        width: 170px;
        height: 90px;
    }


    .order {
        padding: 10px 30px;
        min-height: 150px;
    }

    .order .order-summary {
        height: 100%;
    }


    .order .fs-8 {
        font-size: 0.85rem;
    }

    .order .btn.btn-primary {
        background-color: #ffffff;
        color: #717fe0;
        border: 1px solid #717fe0;
    }

    .order .btn.btn-primary:hover {
        background-color: #717fe0;
        color: #ffffff;
    }
    </style>
@endsection