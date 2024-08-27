<x-admin-layout>
    <x-slot name="style">
        <link rel="stylesheet" href="{{ asset('css/admin/form.css') }}">
    </x-slot>

    {{-- ------------------- 
                $slot 
        ------------------ --}}
    <div class="_container">
        @if ($errors->any())
        @foreach ($errors->all() as $error)
        <p style="color: red">{{ $error }}</p>
        @endforeach
        @endif
        <h2 style="text-align:center">Update product</h2>
        <form class="card form-card" action="{{ route('admin.products.update', ['product' => $product->id]) }}"
            method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <fieldset style="max-width: 200px">
                <legend>Category</legend>
                <select name="category_id" required class="form-control">
                    @foreach ($categories as $category)
                    @if ($category->id == $product->category_id)
                    <option selected value="{{$category->id}}">{{ ucfirst($category->title) }}</option>
                    @continue
                    @endif
                    <option value="{{$category->id}}">{{ ucfirst($category->title) }}</option>
                    @endforeach
                </select>
            </fieldset><br>
            <div class="form-group">
                <label for="title">Product Name: </label>
                <input type="text" name="title" value="{{ $product->title }}" required class="form-control"
                    placeholder="Product name">
            </div>
            <div class="form-group">
                <label for="title">Choose Image: </label> <br>
                <input id="up_img" type="file" name="image" class="form-control"><br>
                {{-- preview image --}}
                <img id="preview_img" style="max-width: 100px" src="{{ asset('storage/' . $product->image) }}"
                    alt="{{ $product->title }}">
            </div>
            <div class="form-group">
                <label for="title">Product info: </label>
                <input type="text" name="about" value="{{ $product->about }}" required class="form-control"
                    placeholder="Product info">
            </div>

            <div class="form-group">
                <label for="title">Product price:</label>
                <input type="number" name="price" min="0" value="{{ $product->price }}" required class="form-control">
            </div>
            <div class="form-group">
                <label for="title">Product stock quantity: </label>
                <input type="number" min="0" name="stock_quantity" value="{{ $product->stock_quantity }}"
                    class="form-control" required>
            </div>
            <div class="form-group">
                <label for="title">Product discount </label>
                <input type="number" min="0" name="discount" value="{{ $product->discount }}" class="form-control"
                    step="5">
            </div>
            <div class="text-center">
                <input type="submit" class="btn btn-primary" value="Update product">
            </div>
        </form>
    </div>
    <script>
    // edit
    up_img.onchange = evt => {
        const [file] = up_img.files
        if (file) {
            preview_img.src = URL.createObjectURL(file)
        }
    }
    </script>
    {{-- ------------------- 
            $slot 
    ------------------ --}}
</x-admin-layout>