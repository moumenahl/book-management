<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Books Trash</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"/>
    @vite('resources/css/app.css')
    <style>
        body {
            min-height: 100vh;
            display: flex;
        }

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
            width: 100%;
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
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <h3 class="text-center mb-4">📚 Manage Books</h3>
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

    <!-- Main Content -->
    <div class="main-content">
        <div class="container">
            <h1 class="mb-4">🗑️ Books Trash</h1>
            <a href="javascript:history.back()" class="btn btn-outline-secondary mb-3">🔙 Back</a>

            <table class="table table-bordered align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Category</th>
                        <th>Author</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($books as $book)
                    <tr>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->description }}</td>
                        <td>{{ $book->category->name }}</td>
                        <td>{{ $book->author }}</td>
                        <td class="d-flex gap-2">
                            <form action="{{ route('books.restore', $book->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-success btn-sm">Restore</button>
                            </form>
                            <form action="{{ route('books.forceDelete', $book->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to permanently delete this book?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Force Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
