<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign Up - Shongjukto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body { 
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); 
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .signup-form { 
            max-width: 500px; 
            margin: 60px auto; 
            padding: 40px; 
            background: rgba(255,255,255,0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px; 
            box-shadow: 0 20px 60px rgba(0,0,0,0.15); 
            border: 1px solid rgba(255,255,255,0.2);
        }
        .title { 
            font-weight:800; 
            color:#1b4332; 
            margin-bottom: 30px;
        }
        .btn-custom {
            border-radius: 12px;
            padding: 12px 24px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        .btn-custom:hover {
            transform: translateY(-2px);
        }
        .topbar { 
            position: absolute; 
            top: 20px; 
            right: 20px; 
            display:flex; 
            gap:10px; 
        }
        .form-control, .form-select {
            border-radius: 12px;
            border: 2px solid #e9ecef;
            padding: 12px 16px;
            transition: all 0.3s ease;
        }
        .form-control:focus, .form-select:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
        }
        .form-label {
            font-weight: 600;
            color: #495057;
            margin-bottom: 8px;
        }
        .brand-logo {
            text-align: center;
            margin-bottom: 20px;
        }
        .brand-logo img {
            width: 60px;
            height: 60px;
            margin-bottom: 15px;
        }
        .input-group-text {
            background: transparent;
            border: 2px solid #e9ecef;
            border-right: none;
            border-radius: 12px 0 0 12px;
        }
        .input-group .form-control {
            border-left: none;
            border-radius: 0 12px 12px 0;
        }
        .input-group:focus-within .input-group-text {
            border-color: #667eea;
        }
        .alert {
            border-radius: 12px;
            border: none;
        }
        .role-card {
            border: 2px solid #e9ecef;
            border-radius: 12px;
            padding: 15px;
            margin-bottom: 10px;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .role-card:hover {
            border-color: #667eea;
            background: rgba(102, 126, 234, 0.05);
        }
        .role-card.selected {
            border-color: #667eea;
            background: rgba(102, 126, 234, 0.1);
        }
        .role-icon {
            font-size: 24px;
            margin-right: 10px;
        }
    </style>
</head>
<body>

<div class="topbar">
    <a href="{{ route('home') }}" class="btn btn-outline-primary btn-custom">
        <i class="fas fa-home"></i> Home
    </a>
    @if(session('user_id'))
        <a href="{{ route('profile.show') }}" class="btn btn-outline-secondary btn-custom">
            <i class="fas fa-user"></i> Profile
        </a>
        <a href="{{ route('logout') }}" class="btn btn-danger btn-custom">
            <i class="fas fa-sign-out-alt"></i> Logout
        </a>
    @endif
</div>

<div class="signup-form">
    <div class="brand-logo">
        <img src="https://img.icons8.com/color/96/000000/handshake.png" alt="Shongjukto">
        <h2 class="title">Join Shongjukto</h2>
        <p class="text-muted">Create your account and start making a difference</p>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fas fa-exclamation-triangle"></i> Please fix the following errors:
            <ul class="mb-0 mt-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <form action="/signup" method="post">
        @csrf

        <div class="mb-4">
            <label class="form-label">
                <i class="fas fa-user text-primary"></i> Full Name
            </label>
            <div class="input-group">
                <span class="input-group-text">
                    <i class="fas fa-user"></i>
                </span>
                <input type="text" name="name" value="{{ old('name') }}" 
                       class="form-control @error('name') is-invalid @enderror" 
                       placeholder="Enter your full name">
            </div>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label class="form-label">
                <i class="fas fa-envelope text-primary"></i> Email Address
            </label>
            <div class="input-group">
                <span class="input-group-text">
                    <i class="fas fa-envelope"></i>
                </span>
                <input type="email" name="email" value="{{ old('email') }}" 
                       class="form-control @error('email') is-invalid @enderror" 
                       placeholder="Enter your email">
            </div>
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label class="form-label">
                <i class="fas fa-lock text-primary"></i> Password
            </label>
            <div class="input-group">
                <span class="input-group-text">
                    <i class="fas fa-lock"></i>
                </span>
                <input type="password" name="password" 
                       class="form-control @error('password') is-invalid @enderror" 
                       placeholder="Create a strong password">
            </div>
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label class="form-label">
                <i class="fas fa-users text-primary"></i> I want to join as
            </label>
            <div class="role-options">
                <div class="role-card {{ old('role') == 'beneficiary' ? 'selected' : '' }}" 
                     onclick="selectRole('beneficiary')">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-hands-helping role-icon text-success"></i>
                        <div>
                            <strong>Beneficiary</strong>
                            <div class="text-muted small">I need help and support</div>
                        </div>
                    </div>
                </div>
                <div class="role-card {{ old('role') == 'volunteer' ? 'selected' : '' }}" 
                     onclick="selectRole('volunteer')">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-heart role-icon text-danger"></i>
                        <div>
                            <strong>Volunteer</strong>
                            <div class="text-muted small">I want to help others</div>
                        </div>
                    </div>
                </div>
                <div class="role-card {{ old('role') == 'donor' ? 'selected' : '' }}" 
                     onclick="selectRole('donor')">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-gift role-icon text-primary"></i>
                        <div>
                            <strong>Donor</strong>
                            <div class="text-muted small">I want to donate items</div>
                        </div>
                    </div>
                </div>
            </div>
            <select name="role" id="roleSelect" class="form-select @error('role') is-invalid @enderror" style="display: none;">
                <option value="">-- Select Role --</option>
                <option value="beneficiary" {{ old('role') == 'beneficiary' ? 'selected' : '' }}>Beneficiary</option>
                <option value="volunteer" {{ old('role') == 'volunteer' ? 'selected' : '' }}>Volunteer</option>
                <option value="donor" {{ old('role') == 'donor' ? 'selected' : '' }}>Donor</option>
            </select>
            @error('role')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="d-grid mb-4">
            <button type="submit" class="btn btn-primary btn-custom" style="padding: 14px; font-size: 1.1rem;">
                <i class="fas fa-user-plus"></i> Create Account
            </button>
        </div>
    </form>

    <div class="text-center">
        <p class="text-muted mb-0">
            Already have an account? 
            <a href="{{ route('login') }}" class="text-decoration-none fw-bold">
                <i class="fas fa-sign-in-alt"></i> Sign in here
            </a>
        </p>
    </div>
</div>

<script>
function selectRole(role) {
    // Remove selected class from all cards
    document.querySelectorAll('.role-card').forEach(card => {
        card.classList.remove('selected');
    });
    
    // Add selected class to clicked card
    event.currentTarget.classList.add('selected');
    
    // Update the hidden select
    document.getElementById('roleSelect').value = role;
}
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
