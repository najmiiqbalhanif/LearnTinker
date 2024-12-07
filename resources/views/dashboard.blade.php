<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container mt-5">
        <h1>Dashboard</h1>
        <p>Welcome, {{ Auth::user()->name }} (Role: {{ Auth::user()->getRoleNames()->first() }})</p>

        <h2>Permissions</h2>
        <ul>
            @foreach(Auth::user()->getPermissionsViaRoles() as $permission)
                <li>{{ $permission->name }}</li>
            @endforeach
        </ul>

        @if(Auth::user()->hasRole('admin'))
            <h3>Admin Actions</h3>
            <a href="{{ route('articles.create') }}" class="btn btn-primary">Create Article</a>
            <a href="{{ route('categories.index') }}" class="btn btn-secondary">Manage Categories</a>
        @endif
    </div>
</body>
</html>
