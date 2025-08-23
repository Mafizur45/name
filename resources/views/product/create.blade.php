<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Create Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
<div class="container py-5">
    <h2 class="mb-4">Create New Product</h2>

    <form action="{{ route('product.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Name</label>
            <input name="name" value="{{ old('name') }}" type="text" class="form-control @error('name') is-invalid @enderror" />
            @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Quantity</label>
            <input name="quantity" value="{{ old('quantity') }}" type="number" min="0" class="form-control @error('quantity') is-invalid @enderror" />
            @error('quantity')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Price ($)</label>
            <input name="price" value="{{ old('price') }}" type="number" min="0" step="0.01" class="form-control @error('price') is-invalid @enderror" />
            @error('price')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <button type="submit" class="btn btn-success">Save</button>
        <a href="{{ route('product.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
