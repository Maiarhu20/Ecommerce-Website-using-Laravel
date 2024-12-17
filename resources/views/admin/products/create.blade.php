@extends('admin.index')

@section('content')
<div class="container">
    <h1>Create Product</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" step="0.01" name="price" id="price" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="category_id">Category</label>
            <select name="category_id" id="category_id" class="form-control" required>
                @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="quantity">Quantity</label>
            <input type="number" name="quantity" id="quantity" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="images">Images</label>
            <input type="file" name="images[]" id="images" class="form-control" multiple onchange="previewImages()">
            <div id="image-preview" class="mt-3"></div> <!-- Preview images here -->
        </div>

        <button type="submit" class="btn-create-product">Create Product</button>
    </form>
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
        border: none; /* Remove border */
    }

    .btn-create-product:hover {
        background-color: #ced0c7;
        color: #fff;
        box-shadow: 0 6px 12px rgba(253, 253, 250, 0.6);
    }

    /* Image Preview Styling */
    #image-preview img {
        width: 100px;
        height: 100px;
        object-fit: cover;
        margin-right: 10px;
        margin-bottom: 10px;
        display: inline-block;
        border-radius: 5px;
        border: 1px solid #ddd;
    }

    .image-delete-btn {
        background-color: red;
        color: white;
        border: none;
        border-radius: 50%;
        padding: 5px 10px;
        font-size: 12px;
        cursor: pointer;
        margin-top: -20px;
        margin-left: 40px;
    }

    .image-delete-btn:hover {
        background-color: darkred;
    }
</style>

<!-- Image Preview and Delete Script -->
<script>
    // Function to preview images on file input change
    function previewImages() {
        const previewContainer = document.getElementById('image-preview');
        previewContainer.innerHTML = ''; // Clear the preview container
        const files = document.getElementById('images').files;

        for (let i = 0; i < files.length; i++) {
            const file = files[i];
            const reader = new FileReader();

            reader.onload = function (e) {
                const imgElement = document.createElement('img');
                imgElement.src = e.target.result;

                const deleteButton = document.createElement('button');
                deleteButton.innerText = 'X';
                deleteButton.classList.add('image-delete-btn');
                deleteButton.onclick = function () {
                    removeImagePreview(i, imgElement, deleteButton);
                };

                const container = document.createElement('div');
                container.style.position = 'relative';
                container.appendChild(imgElement);
                container.appendChild(deleteButton);

                previewContainer.appendChild(container);
            };

            reader.readAsDataURL(file);
        }
    }

    // Function to remove the image preview and update the file input
    function removeImagePreview(index, imgElement, deleteButton) {
        imgElement.remove();
        deleteButton.remove();

        // Get the file input and remove the corresponding file
        const input = document.getElementById('images');
        const dt = new DataTransfer(); // Creates a new DataTransfer object for updating file list

        // Re-add the remaining files to the DataTransfer object
        for (let i = 0; i < input.files.length; i++) {
            if (i !== index) {
                dt.items.add(input.files[i]);
            }
        }

        // Update the file input with the new list
        input.files = dt.files;
    }
</script>

@endsection
