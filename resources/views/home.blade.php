<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(120deg, #e0eafc, #cfdef3 100%);
        }
        .card {
            box-shadow: 0 4px 24px rgba(0,0,0,0.08);
            border-radius: 1.5rem;
        }
        .brand-title {
            font-family: 'Segoe UI', sans-serif;
            font-size: 2.8rem;
            font-weight: 700;
            color: #2d6a4f;
            margin-bottom: 1rem;
        }
        .subtitle {
            font-size: 1.2rem;
            color: #495057;
            margin-bottom: 2rem;
        }
        .btn-custom {
            min-width: 120px;
            font-size: 1.1rem;
        }
    </style>
</head>
<body class="d-flex justify-content-center align-items-center vh-100">

    <div class="card p-5 text-center" style="max-width: 400px;">
        <div class="mb-4">
            <img src="https://img.icons8.com/color/96/000000/handshake.png" alt="Logo" style="width: 72px;">
        </div>
        <div class="brand-title">Welcome to Shongjukto</div>
        <div class="subtitle">Connecting people for help and support.<br>Join us today!</div>
        <a href="{{ route('signup') }}" class="btn btn-success btn-custom m-2">Signup</a>
        <a href="{{ route('login') }}" class="btn btn-primary btn-custom m-2">Login</a>
    </div>