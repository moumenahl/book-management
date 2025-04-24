@extends('layouts.app')

@section('content')
<style>
    .sidebar {
        width: 250px;
        background-color: #f8f9fa;
        height: 100vh;
        position: fixed;
        top: 0;
        left: 0;
        padding: 30px 15px;
        border-right: 1px solid #dee2e6;
    }

    .main-content {
        margin-left: 250px;
        padding: 30px;
    }

    .sidebar .nav-link {
        font-weight: 500;
        color: #333;
    }

    .sidebar .nav-link:hover {
        background-color: #e2e6ea;
        border-radius: 5px;
    }

    .sidebar h3 {
        font-size: 20px;
        font-weight: bold;
    }
</style>

<div class="sidebar">
    <h3 class="text-center mb-4">Create Categories</h3>
    <ul class="nav flex-column">
        <li class="nav-item mb-2">
            <a class="nav-link" href="/home">🏠 Home</a>
        </li>
        <li class="nav-item mb-2">
            <a class="nav-link" href="{{ route('categories.index') }}">📂 Categories</a>
        </li>
        <li class="nav-item mb-2">
            <a class="nav-link" href="{{ route('books.index') }}">📚 Books</a>
        </li>
    </ul>
    <hr>
    <div class="mt-4">
        <a class="dropdown-item text-danger" href="{{ route('logout') }}"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            🚪 Logout
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>
</div>

<div class="main-content">

    {{-- ====== الفئات ====== --}}
        <div class="d-flex justify-content-between align-items-center mb-3">
    <h2>📚 Categories</h2>
    
    <div class="d-flex">
        <a href="{{ route('categories.create') }}" class="btn btn-success rounded-0 rounded-start">
            ➕ Add Category
        </a>
        <a href="{{ route( 'categories.trash') }}"class="btn btn-outline-danger rounded-0 rounded-end">
            🗑️ View Trash
        </a>
    </div>
</div>

    <ul class="list-group mb-4">
        @forelse($categories as $category)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                {{ $category->name }}

                <div class="btn-group" role="group">
                    <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-outline-primary btn-sm mx-1">✏️ Edit</a>
                    <form action="{{ route('categories.destroy', $category->id) }}" method="post" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger btn-sm mx-1">🗑️ Delete</button>
                    </form>
                    <a href="{{ route('categories.show', $category->id) }}" class="btn btn-outline-success btn-sm mx-1">👁️ Show</a>
                </div>
            </li>
        @empty
            <li class="list-group-item">No categories found.</li>
        @endforelse
    </ul>

    {{-- ====== الكتب ====== --}}
    <div class="d-flex justify-content-between align-items-center mb-3">
    <h2>📖 Books</h2>
    
    <div class="d-flex">
        <a href="{{ route('books.create') }}" class="btn btn-success rounded-0 rounded-start">
            ➕ Add Book
        </a>
        <a href="{{ route('books.trash') }}"class="btn btn-outline-danger rounded-0 rounded-end">
            🗑️ View Trash
        </a>
    </div>
</div>


    <ul class="list-group">
        @forelse($books as $book)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <div>
                    {{ $book->title }}
                    <small class="text-muted">(Category: {{ $book->category->name ?? 'N/A' }})</small>
                </div>
                <div class="btn-group" role="group">
                    <a href="{{ route('books.edit', $book->id) }}" class="btn btn-outline-primary btn-sm mx-1">✏️ Edit</a>
                    <form action="{{ route('books.destroy', $book->id) }}" method="post" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger btn-sm mx-1">🗑️ Delete</button>
                    </form>
                    <a href="{{ route('books.show', $book->id) }}" class="btn btn-outline-success btn-sm mx-1">👁️ Show</a>
                </div>
            </li>
        @empty
            <li class="list-group-item">No books found.</li>
        @endforelse
    </ul>

</div>
@endsection
