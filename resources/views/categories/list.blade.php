<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    @vite('resources/css/app.css')
    <style>
        body {
            min-height: 100vh;
            display: flex;
            flex-direction: row;
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

<!-- Main Content -->
<div class="main-content">
     <!-- Action Buttons -->
     <div class="d-flex flex-wrap align-items-center mb-4">
    <a href="categories/create" class="btn btn-primary me-3">
        ➕ Create Category
    </a>

    <a href="{{ route('categories.trash') }}" class="btn btn-outline-danger me-3">
        🗑️ View Trash
    </a>
    <a href="javascript:history.back()" class="btn btn-secondary" rel="prev">
        🔙 Back
    </a>
</div>

    <h2 class="mb-3">Categories and Books</h2>
    <table class="table table-bordered table-striped">
        <thead class="table-light">
            <tr>
                <th>Category Name</th>
                <th style="width: 250px;">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
            <tr>
                <td>{{ $category->name }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <!-- Edit -->
                        <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-outline-primary btn-sm mx-1">✏️ Edit</a>
                        
                        <!-- Delete -->
                        <form action="{{ route('categories.destroy', $category->id) }}" method="post" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger btn-sm mx-1">🗑️ Delete</button>
                        </form>

                        <!-- Show -->
                        <a href="{{ route('categories.show', $category->id) }}" class="btn btn-outline-success btn-sm mx-1">👁️ Show</a>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
