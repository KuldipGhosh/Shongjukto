<!DOCTYPE html>
<html>
<head>
    <title>Request Help</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            background: linear-gradient(120deg, #e0eafc, #cfdef3 100%);
            min-height: 100vh;
        }
        .help-card {
            max-width: 500px;
            margin: 40px auto;
            border-radius: 1.5rem;
            box-shadow: 0 4px 24px rgba(0,0,0,0.10);
            padding: 2.5rem 2rem 2rem 2rem;
            background: #fff;
        }
        .help-title {
            font-family: 'Segoe UI', sans-serif;
            font-size: 2.1rem;
            font-weight: 700;
            color: #2d6a4f;
            margin-bottom: 1.2rem;
        }
        .help-icon {
            width: 60px;
            margin-bottom: 1rem;
        }
        .form-label {
            font-weight: 600;
            color: #2d6a4f;
        }
        .btn-primary {
            background: linear-gradient(90deg, #2d6a4f 60%, #40916c 100%);
            border: none;
            font-weight: 600;
            letter-spacing: 1px;
        }
        .btn-primary:hover {
            background: linear-gradient(90deg, #40916c 60%, #2d6a4f 100%);
        }
        .logout-btn {
            font-size: 0.95rem;
            padding: 0.4rem 1.1rem;
        }
    </style>
</head>
<body>
<div class="container">

    <div class="d-flex justify-content-between mb-3 mt-3">
        <a href="{{ route('my.requests') }}" class="btn btn-outline-secondary">View My Requests</a>
        <a href="{{ route('logout') }}" class="btn btn-danger logout-btn">Logout</a>
    </div>

    <div class="help-card">
        <div class="text-center">
            <img src="https://img.icons8.com/color/96/000000/helping-hand.png" class="help-icon" alt="Help Icon">
            <div class="help-title">Submit a Help Request</div>
            <p class="text-muted mb-4" style="font-size:1.1rem;">
                Please fill out the form below to request help. Our team will review your request as soon as possible.
            </p>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger mt-2">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="/request-help" class="mt-3">
            @csrf

            <div class="mb-3">
                <label class="form-label">Category</label>
                <select name="category" class="form-control" required>
                    <option value="">-- Select --</option>
                    <option value="Food">Food</option>
                    <option value="Clothes">Clothes</option>
                    <option value="Education">Education</option>
                    <option value="Medical">Medical</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Description (Optional)</label>
                <textarea name="description" class="form-control" rows="4">{{ old('description') }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary w-100 mt-2">Submit Request</button>
        </form>
    </div>
</div>
</body>
</html>