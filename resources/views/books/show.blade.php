<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Show Book</title>
</head>
<body>
    <div class="container py-4">
        <!-- Add New Button -->
        <div class="d-flex justify-content-end mb-3">
            <a href="{{ route('books.create') }}" class="btn btn-info text-white">➕ Add New</a>
        </div>

        <!-- Book Card -->
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h3 class="card-title fw-bold mb-3">{{ $book->title }}</h3>
                        <p class="card-text">{{ $book->description }}</p>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Category:</label>
                            <p class="mb-0">{{ $book->category->name }}</p>
                        </div>

                        <!-- Action Buttons -->
                        <div class="d-flex gap-2">
                            <a href="{{ route('books.edit', $book->id) }}" class="btn btn-primary">✏️ Edit</a>

                            <form action="{{ route('books.destroy', $book->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">🗑️ Move To Trash</button>
                            </form>

                            <a href="{{ url()->previous() }}" class="btn btn-secondary ms-auto">🔙 Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
    