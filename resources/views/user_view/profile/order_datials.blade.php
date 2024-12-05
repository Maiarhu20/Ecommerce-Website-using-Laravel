@extends('user_view.layout.layout')
@section('content')
    <section class="bg0 p-t-120 p-b-140">
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
    </section>
@endsection
