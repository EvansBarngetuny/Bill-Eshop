<x-admin-layout>
    <x-slot name="style">
        <link rel="stylesheet" href="{{ asset('css/admin/form.css') }}">
    </x-slot>

    <div class="_container">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <div class="form-header">
            <h2>Create a New Product</h2>
        </div>

        <form class="card form-card" action="{{ route('admin.products.store') }}" method="post"
            enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="category_id">Category</label>
                <select name="category_id" id="category_id" required class="form-control">
                    <option value="" disabled selected>Select a category</option>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                        {{ ucfirst($category->title) }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="title">Product Name</label>
                <input type="text" id="title" name="title" value="{{ old('title') }}" required class="form-control"
                    placeholder="Enter product name">
            </div>

            <div class="form-group">
                <label for="image">Choose Image</label>
                <input type="file" id="image" name="image" required class="form-control-file">
            </div>

            <div class="form-group">
                <label for="about">Product Info</label>
                <input type="text" id="about" name="about" value="{{ old('about') }}" required class="form-control"
                    placeholder="Enter product information">
            </div>

            <div class="form-group">
                <label for="price">Product Price (KSh)</label>
                <input type="number" id="price" name="price" min="0" value="{{ old('price') }}" required
                    class="form-control" placeholder="Enter product price">
            </div>

            <div class="form-group">
                <label for="stock_quantity">Product Stock Quantity</label>
                <input type="number" id="stock_quantity" name="stock_quantity" min="0"
                    value="{{ old('stock_quantity') }}" required class="form-control"
                    placeholder="Enter stock quantity">
            </div>

            <div class="form-group">
                <label for="discount">Product Discount (%)</label>
                <input type="number" id="discount" name="discount" min="0" value="{{ old('discount') }}" step="5"
                    class="form-control" placeholder="Enter discount percentage">
            </div>

            <div class="form-group text-center">
                <button type="submit" class="btn btn-primary">Create Product</button>
            </div>
        </form>
    </div>
</x-admin-layout>