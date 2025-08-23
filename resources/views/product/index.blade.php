<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f4f6f9;
        }
        .table thead {
            background-color: #007bff;
            color: #fff;
        }
        .create-btn {
            float: right;
        }
        .card {
            border: none;
            box-shadow: 0 0 15px rgba(0,0,0,0.05);
        }
    </style>
</head>
<body>

<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-primary">Product List</h2>
        <a href="{{ route('product.create') }}" class="btn btn-success">+ Create Product</a>
    </div>

    <!-- Search Form -->
    <form action="{{ route('product.index') }}" method="GET" class="mb-4">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Search by name..." value="{{ request('search') }}">
            <button class="btn btn-outline-primary" type="submit">Search</button>
        </div>
    </form>

    <!-- Product Table -->
    <div class="card">
        <div class="card-body">
            @if ($products->count())
                <div class="table-responsive">
                    <table class="table table-striped align-middle">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $index => $product)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->quantity }}</td>
                                    <td>${{ number_format($product->price, 2) }}</td>
                                    <td class="text-end">
                                        <a href="{{ route('product.show', $product->id) }}" class="btn btn-sm btn-outline-info">View</a>
                                        <a href="{{ route('product.edit', $product->id) }}" class="btn btn-sm btn-outline-warning">Edit</a>
                                        <form action="{{ route('product.destroy', $product->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Are you sure?');">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-outline-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="alert alert-warning text-center mb-0">
                    No products found.
                </div>
            @endif
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

