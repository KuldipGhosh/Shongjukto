<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Sponsor a Child</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5" style="max-width: 600px;">
    <div class="d-flex justify-content-between mb-3">
        <a class="btn btn-outline-primary" href="{{ route('home') }}">Home</a>
        <a class="btn btn-outline-secondary" href="{{ route('donations.my') }}">My Donations</a>
        <a class="btn btn-danger" href="{{ route('logout') }}">Logout</a>
    </div>
    <h3 class="mb-3">Sponsor a Child</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="post" action="{{ route('sponsorships.store') }}">
        @csrf
        <div class="mb-3">
            <label class="form-label">Beneficiary User ID</label>
            <input type="number" class="form-control" name="beneficiary_id" value="{{ old('beneficiary_id') }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Support Type</label>
            <select class="form-select" name="type">
                <option value="fees">School Fees</option>
                <option value="books">Books</option>
                <option value="supplies">Supplies</option>
            </select>
        </div>
        <div class="row g-2">
            <div class="col">
                <label class="form-label">Amount (optional)</label>
                <input type="number" step="0.01" class="form-control" name="amount" value="{{ old('amount') }}">
            </div>
            <div class="col">
                <label class="form-label">Start Date</label>
                <input type="date" class="form-control" name="start_date" value="{{ old('start_date') }}">
            </div>
            <div class="col">
                <label class="form-label">End Date</label>
                <input type="date" class="form-control" name="end_date" value="{{ old('end_date') }}">
            </div>
        </div>
        <div class="mt-3 d-grid">
            <button type="submit" class="btn btn-primary">Create Sponsorship</button>
        </div>
    </form>
</div>
</body>
</html>


