@extends('admin.index')

@section('content')
<head>
	<title>Coza Store</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
	<link rel="icon" type="image/png" href="{{ asset('images/icons/favicon.png') }}"/>
	<!-- Bootstrap -->
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
	<!-- Font Awesome -->
	<link rel="stylesheet" type="text/css" href="{{ asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
	<!-- Material Design Icons -->
	<link rel="stylesheet" type="text/css" href="{{ asset('fonts/iconic/css/material-design-iconic-font.min.css') }}">
	<!-- Linear Icons -->
	<link rel="stylesheet" type="text/css" href="{{ asset('fonts/linearicons-v1.0.0/icon-font.min.css') }}">
	<!-- Animate -->
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/animate/animate.css') }}">
	<!-- Hamburgers -->
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/css-hamburgers/hamburgers.min.css') }}">
	<!-- Animsition -->
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/animsition/css/animsition.min.css') }}">
	<!-- Select2 -->
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/select2/select2.min.css') }}">
	<!-- Date Range Picker -->
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/daterangepicker/daterangepicker.css') }}">
	<!-- Slick -->
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/slick/slick.css') }}">
	<!-- Magnific Popup -->
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/MagnificPopup/magnific-popup.css') }}">
	<!-- Perfect Scrollbar -->
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/perfect-scrollbar/perfect-scrollbar.css') }}">
	<!-- Custom CSS -->
	<link rel="stylesheet" type="text/css" href="{{ asset('css/util.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">
    <!--===============================================================================================-->
</head>

<div class="wrap-table-shopping-cart">
    <table class="table-shopping-cart">
        <tr class="table_head">
            <th class="column-1">Product</th>
            <th class="column-2">Name</th>
            <th class="column-3">Price</th>
            <th class="column-4">Quantity</th>
            <th class="column-5">Total</th>
        </tr>
        @foreach ($order->items as $item)
        <tr class="table_row">
            <td class="column-1">
                <div class="how-itemcart1">
                    @if ($item->product->multiimage->isNotEmpty())
                    <img src="{{asset('upload/products/'.$item->product->multiimage[0]['image_path'])}}" alt="IMG">
                    @else
                    <img src="images/defult_image.png" alt="No image available">
                    @endif
                </div>
            </td>
            <td class="column-2">{{$item->product->name}}</td>
            <td class="column-3">${{number_format($item->product->price, 2)}}</td>
            <td class="column-4">
                {{$item->quantity}}
            </td>
            <td class="column-5">$ {{number_format($item->product->price * $item->quantity, 2)}}</td>
        </tr>
        @endforeach
    </table>
</div>


@endsection