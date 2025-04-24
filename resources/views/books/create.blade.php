<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<div class="container">
    <h2 style="text-align: center; color: rgb(0, 243, 231)"><b>Add book</b></h2>
    <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="exampleFormControlInput1" class="mb-2">Title</label>
            <input type="text" name="title" class="form-control" id="exampleFormControlInput1" placeholder="Enter Title">
        </div>

        <div class="form-group mt-4">
            <label for="exampleFormControlTextarea1" class="mb-2">Description</label>
            <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>

        <div class="form-group mt-4">
            <label for="exampleFormControlCategory"  class="mb-2">Author</label>
            <input type="text" name="author" class="form-control" id="exampleFormControlInput1" placeholder="Enter author">

        </div>


        <div class="form-group mt-4">
    <label for="" class="mb-2">Categories</label>
    @foreach ($categories as $category)
        <div class="form-check">
            <input 
                name="category_id" 
                class="form-check-input" 
                type="radio" 
                value="{{ $category->id }}" 
                id="category_{{ $category->id }}">
            
            <label class="form-check-label" for="category_{{ $category->id }}">
                {{ $category->name }}
            </label>
        </div>
    @endforeach
</div>




        <button type="submit" class="btn btn-primary" style="margin-top: 10px;">Save</button>
        <a href="{{ url()->previous() }}" class="btn btn-secondary" style="margin-top: 10px;">Cancel</a>
    </form>
    <a href="javascript:history.back()" class="btn btn-secondary mb-3" rel="prev">Back</a>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

</body>
</html>
