<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f6f9;
        }
        .form-container {
            max-width: 600px;
            margin: auto;
        }
        .card {
            border: none;
            box-shadow: 0 0 15px rgba(0,0,0,0.05);
        }
        .card-header {
            background-color: #007bff;
            color: white;
        }
    </style>
</head>
<body>

<div class="container py-5">
    <div class="form-container">
        <div class="card">
            <div class="card-header">
                <h4>Edit Product</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('product.update', $product->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Product Name -->
                    <div class="mb-3">
                        <label class="form-label">Product Name</label>
                        <input type="text" name="name" value="{{ old('name', $product->name) }}"
                               class="form-control @error('name') is-invalid @enderror" placeholder="Enter product name">
                        @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <!-- Quantity -->
                    <div class="mb-3">
                        <label class="form-label">Quantity</label>
                        <input type="number" name="quantity" value="{{ old('quantity', $product->quantity) }}"
                               class="form-control @error('quantity') is-invalid @enderror" min="0">
                        @error('quantity') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <!-- Price -->
                    <div class="mb-3">
                        <label class="form-label">Price ($)</label>
                        <input type="number" name="price" value="{{ old('price', $product->price) }}"
                               class="form-control @error('price') is-invalid @enderror" min="0" step="0.01">
                        @error('price') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <!-- Buttons -->
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('product.index') }}" class="btn btn-secondary">← Back</a>
                        <button type="submit" class="btn btn-primary">Update Product</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS (Optional) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>


