<!DOCTYPE html>
<html>
<head>
    <title>My Help Requests</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <div class="d-flex justify-content-between mb-3">
        <h2>My Help Requests</h2>
        <a href="{{ route('logout') }}" class="btn btn-danger">Logout</a>
    </div>

    @if($requests->isEmpty())
        <p>You have not submitted any help requests yet.</p>
    @else
        <table class="table table-bordered">
            <thead class="table-light">
                <tr>
                    <th>Category</th>
                    <th>Description</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($requests as $request)
                    <tr>
                        <td>{{ $request->category }}</td>
                        <td>{{ $request->description ?? 'N/A' }}</td>
                        <td>{{ ucfirst($request->status) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
</body>
</html>
