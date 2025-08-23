<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Book Clinic Appointment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5" style="max-width: 600px;">
    <div class="d-flex justify-content-between mb-3">
        <a class="btn btn-outline-primary" href="{{ route('home') }}">Home</a>
        <a class="btn btn-outline-secondary" href="{{ route('my.requests') }}">My Requests</a>
        <a class="btn btn-danger" href="{{ route('logout') }}">Logout</a>
    </div>
    <h3 class="mb-3">Book Clinic Appointment</h3>

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

    <form method="post" action="{{ route('appointments.store') }}">
        @csrf
        <div class="mb-3">
            <label class="form-label">Clinic Name</label>
            <input type="text" class="form-control" name="clinic_name" value="{{ old('clinic_name') }}">
        </div>
        <div class="row g-2">
            <div class="col">
                <label class="form-label">Date</label>
                <input type="date" class="form-control" name="appointment_date" value="{{ old('appointment_date') }}">
            </div>
            <div class="col">
                <label class="form-label">Time</label>
                <input type="time" class="form-control" name="appointment_time" value="{{ old('appointment_time') }}">
            </div>
        </div>
        <div class="mt-3 d-grid">
            <button type="submit" class="btn btn-primary">Book</button>
        </div>
    </form>
</div>
</body>
</html>


