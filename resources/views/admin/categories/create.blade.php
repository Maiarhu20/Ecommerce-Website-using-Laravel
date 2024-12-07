@extends('admin.index')

@section('content')
<div class="container">
    <h1>Create Category</h1>
    
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        
        <div class="form-group">
            <label for="image_slide">Image Slide</label>
            <input type="file" name="image_slide" id="image_slide" class="form-control" onchange="previewImage('image_slide', 'slide-preview')">
            <div id="slide-preview" class="mt-3"></div> <!-- Preview slide image -->
        </div>

        <div class="form-group">
            <label for="image_banner">Image Banner</label>
            <input type="file" name="image_banner" id="image_banner" class="form-control" onchange="previewImage('image_banner', 'banner-preview')">
            <div id="banner-preview" class="mt-3"></div> <!-- Preview banner image -->
        </div>
        
        <button type="submit" class="btn-create-category">Create Category</button>
    </form>
</div>

<!-- Button Styles -->
<style>
    /* General Button Styling */
    .btn {
        padding: 12px 30px;
        font-size: 16px;
        font-weight: bold;
        border-radius: 50px;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-block;
        border: none;
    }

    /* Create Category Button Styling */
    .btn-create-category {
        background-color: #cece74; /* Purple */
        color: white;
        box-shadow: 0 3px 8px rgba(255, 255, 255, 0.4);
        border-radius: 4px;
        padding: 12px 40px; /* Oval shape with enough padding */
        border: none; /* Remove border */
    }

    .btn-create-category:hover {
        background-color: #65b582;
        color: #fff;
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
    }

    /* Image Preview Styling */
    #slide-preview img, #banner-preview img {
        width: 100px;
        height: 100px;
        object-fit: cover;
        margin-right: 10px;
        margin-bottom: 10px;
        display: inline-block;
        border-radius: 5px;
        border: 1px solid #ddd;
    }
</style>

<!-- Image Preview Script -->
<script>
    function previewImage(inputId, previewContainerId) {
        const previewContainer = document.getElementById(previewContainerId);
        previewContainer.innerHTML = ''; // Clear the preview container
        const file = document.getElementById(inputId).files[0];

        if (file) {
            const reader = new FileReader();

            reader.onload = function (e) {
                const imgElement = document.createElement('img');
                imgElement.src = e.target.result;
                previewContainer.appendChild(imgElement);
            };

            reader.readAsDataURL(file);
        }
    }
</script>

@endsection
