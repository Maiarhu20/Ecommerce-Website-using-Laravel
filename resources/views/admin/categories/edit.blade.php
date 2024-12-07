@extends('admin.index')

@section('content')
<div class="container">
    <h1>Edit Category</h1>

    <!-- Form to update the category -->
    <form action="{{ route('categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <!-- Category Name -->
        <div class="form-group">
            <label for="name">Category Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $category->name }}" required>
        </div>


        <!-- Category Image Slide -->
        <div class="form-group">
            <label for="image_slide">Image Slide</label>
            <input type="file" name="image_slide" id="image_slide" class="form-control" onchange="previewImage('image_slide', 'image_slide_preview')">
            
            <div id="image_slide_preview" class="mt-3">
                <!-- Preview current image if exists -->
                @if($category->image_slide)
                    <img src="{{ asset('upload/categories/' . $category->image_slide) }}" alt="Category Image Slide" width="150">
                @endif
            </div>
        </div>

        <!-- Category Image Banner -->
        <div class="form-group">
            <label for="image_banner">Image Banner</label>
            <input type="file" name="image_banner" id="image_banner" class="form-control" onchange="previewImage('image_banner', 'image_banner_preview')">
            
            <div id="image_banner_preview" class="mt-3">
                <!-- Preview current image if exists -->
                @if($category->image_banner)
                    <img src="{{ asset('upload/categories/' . $category->image_banner) }}" alt="Category Image Banner" width="150">
                @endif
            </div>
        </div>

        <button type="submit" class="btn-create-category">Update Category</button>
    </form>
</div>

<!-- Button Styles -->
<style>
    .btn-create-category {
        background-color: #cece74; /* Custom yellowish background */
        color: white;
        padding: 12px 30px;
        border-radius: 50px;
        font-weight: bold;
        box-shadow: 0 3px 8px rgba(255, 255, 255, 0.4);
        border: none;
        margin-top: 20px;
    }

    .btn-create-category:hover {
        background-color: #ced0c7;
        color: #fff;
        box-shadow: 0 6px 12px rgba(253, 253, 250, 0.6);
    }

    #image_slide_preview img, #image_banner_preview img {
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
    // Function to preview the image when a new file is chosen
    function previewImage(inputId, previewId) {
        const fileInput = document.getElementById(inputId);
        const previewContainer = document.getElementById(previewId);

        // Clear previous preview
        previewContainer.innerHTML = '';

        // Check if file is selected
        const file = fileInput.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                const imgElement = document.createElement('img');
                imgElement.src = e.target.result;
                imgElement.style.width = '150px'; // Adjust the size as needed
                previewContainer.appendChild(imgElement);
            };
            reader.readAsDataURL(file);
        }
    }
</script>

@endsection
