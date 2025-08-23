<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>My Sponsorships</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <div class="d-flex justify-content-between mb-3">
        <a class="btn btn-outline-primary" href="{{ route('home') }}">Home</a>
        <a class="btn btn-outline-secondary" href="{{ route('donations.my') }}">My Donations</a>
        <a class="btn btn-danger" href="{{ route('logout') }}">Logout</a>
    </div>
    <h3 class="mb-3">My Sponsorships</h3>

    @if($items->isEmpty())
        <div class="alert alert-info">No sponsorships yet.</div>
    @else
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Beneficiary</th>
                <th>Type</th>
                <th>Amount</th>
                <th>Period</th>
                <th>Status</th>
            </tr>
            </thead>
            <tbody>
            @foreach($items as $s)
                <tr>
                    <td>{{ $s->beneficiary_id }}</td>
                    <td>{{ ucfirst($s->type) }}</td>
                    <td>{{ $s->amount ?? '-' }}</td>
                    <td>{{ $s->start_date ?? '-' }} - {{ $s->end_date ?? '-' }}</td>
                    <td>{{ ucfirst($s->status) }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
    <a href="{{ route('sponsorships.create') }}" class="btn btn-primary mt-3">New Sponsorship</a>
</div>
</body>
</html>


