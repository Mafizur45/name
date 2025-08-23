<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f4f6f9;
        }
        .card {
            border: none;
            box-shadow: 0 0 15px rgba(0,0,0,0.05);
        }
        .card-header {
            background-color: #007bff;
            color: white;
        }
        .product-value {
            font-size: 1.1rem;
        }
    </style>
</head>
<body>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>Product Details</h4>
                    <a href="{{ route('product.index') }}" class="btn btn-light btn-sm">← Back</a>
                </div>

                <div class="card-body">
                    <dl class="row mb-4">
                        <dt class="col-sm-4">Product Name:</dt>
                        <dd class="col-sm-8 product-value">{{ $product->name }}</dd>

                        <dt class="col-sm-4">Quantity:</dt>
                        <dd class="col-sm-8 product-value">{{ $product->quantity }}</dd>

                        <dt class="col-sm-4">Price ($):</dt>
                        <dd class="col-sm-8 product-value">${{ number_format($product->price, 2) }}</dd>
                    </dl>

                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('product.edit', $product->id) }}" class="btn btn-warning">Edit</a>

                        <form action="{{ route('product.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this product?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS (optional) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
