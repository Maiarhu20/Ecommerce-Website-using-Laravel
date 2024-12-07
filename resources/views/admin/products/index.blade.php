@extends('admin.index')

@section('content')
<div class="container">
    {{-- <h1 class="mb-4 text-center">All Products</h1> --}}
    <a href="{{ route('products.create') }}" class="btn-create-product mb-4">
        <i class="fa fa-plus"></i> 
    </a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <br/><br/><div class="row">
        @foreach($products as $product)
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm">
                @if(!$product->multiimage->isEmpty())
                    <img src="{{ asset('upload/products/' . $product->multiimage->first()->image_path) }}" 
                         class="card-img-top" alt="Product Image" style="width: 100%; height: 380px; object-fit: cover;
                    display: block; border-radius: 5px; border: 1px solid #ddd;">
                @else
                    <img src="{{ asset('upload/products/placeholder.jpg') }}" 
                         class="card-img-top" alt="No Image" style="width: 100%; height: 380px; object-fit: cover;
                    display: block; border-radius: 5px; border: 1px solid #ddd;">
                @endif

                <div class="card-body text-center">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <p class="card-text text-muted">${{ $product->price }}</p>

                    <!-- Edit Button -->
                    <a href="{{ route('products.edit', $product->id) }}" class="btn-edit">Edit</a>

                    <!-- Delete Button -->
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-delete" >Delete</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- Button Styles -->
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

    /* Create Product Button (Oval, No Border, Purple) */
    .btn-create-product {
        background-color: #cece74; /* Purple */
        color: white;
        box-shadow: 0 3px 8px rgba(255, 255, 255, 0.4);
        border-radius: 4px;
        padding: 12px 40px; /* Oval shape with enough padding */
    }

    .btn-create-product:hover {
        background-color: #ced0c7;
        border-color: #f0f0f1;
        color: #fff;
        box-shadow: 0 6px 12px rgba(253, 253, 250, 0.6);
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

    /* Customizations */
    .card-body .btn {
        width: auto; /* Buttons adjust based on content */
        margin: 5px 0;
    }
</style>

@endsection
