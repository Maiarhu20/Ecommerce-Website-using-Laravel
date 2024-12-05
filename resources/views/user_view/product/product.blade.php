@extends('user_view.layout.layout')
@section('content')
<!-- Product -->
<section class="bg0 p-t-120 p-b-140">
<div class="bg0 m-t-23 p-b-140">
    <div class="container">
        <div class="flex-w flex-sb-m p-b-52">
            <div class="flex-w flex-l-m filter-tope-group m-tb-10">
                <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="*">
                    All Products
                </button>
                @foreach ($categories as $category)
                    <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".{{$category->id}}">
                        {{$category->name}}
                    </button>
                @endforeach
            </div>
        </div>

        <div class="row isotope-grid">
            @foreach($products as $product)
            <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item {{$product->category->id}}">
                <!-- Block2 -->
                <div class="block2">
                    <div class="block2-pic hov-img0">
                        <img src="upload/products/{{$product->multiimage[0]['image_path']}}" alt="IMG-PRODUCT">

                        <a href="{{route('products.show', $product->id)}}" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 ">
                            Quick View
                        </a>
                    </div>

                    <div class="block2-txt flex-w flex-t p-t-14">
                        <div class="block2-txt-child1 flex-col-l ">
                            <a href="{{route('products.show', $product->id)}}" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                {{$product->name}}
                            </a>

                            <span class="stext-105 cl3">
                                ${{$product->price}}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</div>
</section>
@endsection
