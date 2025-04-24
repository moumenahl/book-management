<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Edit Book</title>
</head>
<body>
<div class="container">
    <h2 style="text-align: center; color: rgb(0, 243, 231)"><b>Edit book</b></h2>
    <form action="{{ route('books.update', $book->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title" class="mb-2">Title</label>
            <input type="text" name="title" class="form-control" id="title" value="{{ old('title', $book->title) }}" placeholder="Enter Title">
        </div>

        <div class="form-group mt-4">
            <label for="description" class="mb-2">Description</label>
            <textarea class="form-control" name="description" id="description" rows="3">{{ old('description', $book->description) }}</textarea>
        </div>

        <div class="form-group mt-4">
            <label for="author" class="mb-2">Author</label>
            <input type="text" name="author" class="form-control" id="author" value="{{ old('author', $book->author) }}" placeholder="Enter author">
        </div>

        <div class="form-group mt-4">
            <label class="mb-2">Categories</label>
            @foreach ($categories as $category)
                <div class="form-check">
                    <input 
                        name="category_id" 
                        class="form-check-input" 
                        type="radio" 
                        value="{{ $category->id }}" 
                        id="category_{{ $category->id }}"
                        {{ old('category_id', $book->category_id) == $category->id ? 'checked' : '' }}>
                    
                    <label class="form-check-label" for="category_{{ $category->id }}">
                        {{ $category->name }}
                    </label>
                </div>
            @endforeach
        </div>
        <div class="d-flex gap-2 mt-3">
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>
        </div>
        </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
