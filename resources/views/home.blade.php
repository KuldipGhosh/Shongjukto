<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Shongjukto – Connect • Help • Support</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { 
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .hero { padding: 80px 0; }
        .hero-card { 
            background: rgba(255,255,255,0.95);
            backdrop-filter: blur(10px);
            border-radius: 1.5rem; 
            box-shadow: 0 20px 60px rgba(0,0,0,0.15); 
            padding: 40px 32px; 
            border: 1px solid rgba(255,255,255,0.2);
        }
        .brand-title { 
            font-family: 'Segoe UI',sans-serif; 
            font-size: 2.6rem; 
            font-weight: 800; 
            color: #1b4332; 
        }
        .subtitle { font-size: 1.15rem; color: #495057; }
        .btn-pill { 
            border-radius: 12px; 
            padding: 12px 24px; 
            font-weight: 600; 
            transition: all 0.3s ease;
        }
        .btn-pill:hover {
            transform: translateY(-2px);
        }
        .feature-card { 
            background: rgba(255,255,255,0.95);
            backdrop-filter: blur(10px);
            border-radius: 1rem; 
            box-shadow: 0 12px 40px rgba(0,0,0,0.12); 
            padding: 30px; 
            height: 100%; 
            border: 1px solid rgba(255,255,255,0.2);
            transition: all 0.3s ease;
        }
        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 60px rgba(0,0,0,0.15);
        }
        .feature-icon { width: 48px; height: 48px; }
        .section-title { font-weight: 800; color:#1b4332; }
        .gallery img { 
            border-radius: 14px; 
            box-shadow: 0 12px 40px rgba(0,0,0,0.15); 
            transition: all 0.3s ease;
        }
        .gallery img:hover {
            transform: scale(1.05);
        }
        .footer { color:#6c757d; font-size:.95rem; }
        .dashboard-section { padding: 60px 0; }
        .dashboard-card { 
            background: rgba(255,255,255,0.95);
            backdrop-filter: blur(10px);
            border-radius: 1.5rem; 
            box-shadow: 0 20px 60px rgba(0,0,0,0.15); 
            padding: 40px; 
            margin-bottom: 24px; 
            border: 1px solid rgba(255,255,255,0.2);
        }
        .stat-card { 
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); 
            color: white; 
            border-radius: 1rem; 
            padding: 30px; 
            text-align: center; 
            transition: all 0.3s ease;
        }
        .stat-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 45px rgba(0,0,0,0.2);
        }
        .stat-number { font-size: 2.5rem; font-weight: 800; margin-bottom: 8px; }
        .stat-label { font-size: 1rem; opacity: 0.9; }
        .quick-action { 
            background: rgba(248,249,250,0.9);
            backdrop-filter: blur(10px);
            border-radius: 1rem; 
            padding: 25px; 
            text-align: center; 
            transition: all 0.3s ease; 
            border: 1px solid rgba(255,255,255,0.2);
        }
        .quick-action:hover { 
            transform: translateY(-5px); 
            background: rgba(233,236,239,0.95);
            box-shadow: 0 15px 45px rgba(0,0,0,0.1);
        }
        .action-icon { width: 45px; height: 45px; margin-bottom: 15px; }
        .navbar {
            backdrop-filter: blur(10px);
            background: rgba(255,255,255,0.1) !important;
        }
        .navbar-brand {
            font-weight: 800;
            color: #1b4332 !important;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-transparent pt-3">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center gap-2" href="#" style="font-weight:800; color:#1b4332;">
                <img src="https://img.icons8.com/color/96/000000/handshake.png" alt="logo" style="width:36px;height:36px;"> Shongjukto
            </a>
            <div class="d-flex gap-2">
                @if(session('user_id'))
                    <a href="{{ route('profile.show') }}" class="btn btn-outline-secondary btn-pill">Profile</a>
                    <a href="{{ route('logout') }}" class="btn btn-danger btn-pill">Logout</a>
                @else
                    <a href="{{ route('map.view') }}" class="btn btn-outline-secondary btn-pill">Live Map</a>
                    <a href="{{ route('login') }}" class="btn btn-outline-primary btn-pill">Login</a>
                    <a href="{{ route('signup') }}" class="btn btn-success btn-pill">Sign up</a>
                @endif
            </div>
        </div>
    </nav>

    @if(session('user_id'))
        @php
            $user = \App\Models\User::find(session('user_id'));
            $role = $user->role;
        @endphp
        
        <section class="dashboard-section">
            <div class="container">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                
                <div class="dashboard-card">
                    <div class="row align-items-center mb-4">
                        <div class="col-md-8">
                            <h2 class="section-title mb-2">Welcome back, {{ $user->name }}!</h2>
                            <p class="text-muted mb-0">Here's your {{ ucfirst($role) }} dashboard with quick access to your activities.</p>
                        </div>
                        <div class="col-md-4 text-md-end">
                            <span class="badge bg-primary fs-6 px-3 py-2" style="border-radius: 12px;">{{ ucfirst($role) }}</span>
                        </div>
                    </div>

                    @if($role === 'donor')
                        <div class="row g-4 mb-4">
                            <div class="col-md-4">
                                <div class="stat-card">
                                    <div class="stat-number">{{ \App\Models\Donation::where('donor_id', session('user_id'))->count() }}</div>
                                    <div class="stat-label">Total Donations</div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="stat-card" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);">
                                    <div class="stat-number">{{ \App\Models\Donation::where('donor_id', session('user_id'))->where('status', 'accepted')->count() }}</div>
                                    <div class="stat-label">Accepted</div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="stat-card" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);">
                                    <div class="stat-number">{{ \App\Models\Donation::where('donor_id', session('user_id'))->where('status', 'pending')->count() }}</div>
                                    <div class="stat-label">Pending</div>
                                </div>
                            </div>
                        </div>
                    @elseif($role === 'volunteer')
                        <div class="row g-4 mb-4">
                            <div class="col-md-4">
                                <div class="stat-card">
                                    <div class="stat-number">{{ \App\Models\Donation::where('volunteer_id', session('user_id'))->count() }}</div>
                                    <div class="stat-label">Accepted Donations</div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="stat-card" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);">
                                    <div class="stat-number">{{ \App\Models\HelpRequest::where('status', 'accepted')->count() }}</div>
                                    <div class="stat-label">Help Requests</div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="stat-card" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);">
                                    <div class="stat-number">{{ \App\Models\HelpRequest::where('status', 'pending')->count() }}</div>
                                    <div class="stat-label">Pending Requests</div>
                                </div>
                            </div>
                        </div>
                    @elseif($role === 'beneficiary')
                        <div class="row g-4 mb-4">
                            <div class="col-md-4">
                                <div class="stat-card">
                                    <div class="stat-number">{{ \App\Models\HelpRequest::where('user_id', session('user_id'))->count() }}</div>
                                    <div class="stat-label">Help Requests</div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="stat-card" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);">
                                    <div class="stat-number">{{ \App\Models\HelpRequest::where('user_id', session('user_id'))->where('status', 'accepted')->count() }}</div>
                                    <div class="stat-label">Accepted</div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="stat-card" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);">
                                    <div class="stat-number">{{ \App\Models\HelpRequest::where('user_id', session('user_id'))->where('status', 'pending')->count() }}</div>
                                    <div class="stat-label">Pending</div>
                                </div>
                            </div>
                        </div>
                    @endif

                    <h5 class="mb-3">Quick Actions</h5>
                    <div class="row g-3">
                        @if($role === 'donor')
                            <div class="col-md-3">
                                <a href="{{ route('donations.create') }}" class="text-decoration-none">
                                    <div class="quick-action">
                                        <img src="https://img.icons8.com/fluency/48/plus-math.png" class="action-icon" alt="Create">
                                        <h6>Schedule Donation</h6>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-3">
                                <a href="{{ route('donations.my') }}" class="text-decoration-none">
                                    <div class="quick-action">
                                        <img src="https://img.icons8.com/fluency/48/list.png" class="action-icon" alt="My Donations">
                                        <h6>My Donations</h6>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-3">
                                <a href="{{ route('sponsorships.create') }}" class="text-decoration-none">
                                    <div class="quick-action">
                                        <img src="https://img.icons8.com/fluency/48/heart.png" class="action-icon" alt="Sponsorship">
                                        <h6>Sponsorship</h6>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-3">
                                <a href="{{ route('profile.show') }}" class="text-decoration-none">
                                    <div class="quick-action">
                                        <img src="https://img.icons8.com/fluency/48/user.png" class="action-icon" alt="Profile">
                                        <h6>Profile</h6>
                                    </div>
                                </a>
                            </div>
                        @elseif($role === 'volunteer')
                            <div class="col-md-3">
                                <a href="{{ route('volunteer.donations') }}" class="text-decoration-none">
                                    <div class="quick-action">
                                        <img src="https://img.icons8.com/fluency/48/package.png" class="action-icon" alt="Donations">
                                        <h6>Available Donations</h6>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-3">
                                <a href="{{ route('volunteer.requests') }}" class="text-decoration-none">
                                    <div class="quick-action">
                                        <img src="https://img.icons8.com/fluency/48/helping-hand.png" class="action-icon" alt="Requests">
                                        <h6>Help Requests</h6>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-3">
                                <a href="{{ route('map.view') }}" class="text-decoration-none">
                                    <div class="quick-action">
                                        <img src="https://img.icons8.com/fluency/48/marker.png" class="action-icon" alt="Map">
                                        <h6>Live Map</h6>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-3">
                                <a href="{{ route('profile.show') }}" class="text-decoration-none">
                                    <div class="quick-action">
                                        <img src="https://img.icons8.com/fluency/48/user.png" class="action-icon" alt="Profile">
                                        <h6>Profile</h6>
                                    </div>
                                </a>
                            </div>
                        @elseif($role === 'beneficiary')
                            <div class="col-md-3">
                                <a href="{{ route('request.help') }}" class="text-decoration-none">
                                    <div class="quick-action">
                                        <img src="https://img.icons8.com/fluency/48/helping-hand.png" class="action-icon" alt="Request Help">
                                        <h6>Request Help</h6>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-3">
                                <a href="{{ route('my.requests') }}" class="text-decoration-none">
                                    <div class="quick-action">
                                        <img src="https://img.icons8.com/fluency/48/list.png" class="action-icon" alt="My Requests">
                                        <h6>My Requests</h6>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-3">
                                <a href="{{ route('appointments.create') }}" class="text-decoration-none">
                                    <div class="quick-action">
                                        <img src="https://img.icons8.com/fluency/48/calendar.png" class="action-icon" alt="Appointments">
                                        <h6>Appointments</h6>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-3">
                                <a href="{{ route('profile.show') }}" class="text-decoration-none">
                                    <div class="quick-action">
                                        <img src="https://img.icons8.com/fluency/48/user.png" class="action-icon" alt="Profile">
                                        <h6>Profile</h6>
                                    </div>
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </section>
    @endif

    <section class="hero">
        <div class="container">
            <div class="row align-items-center g-4">
                <div class="col-lg-6">
                    <div class="hero-card">
                        <div class="brand-title mb-2">Connecting people for help and support</div>
                        <p class="subtitle mb-4">Shongjukto links beneficiaries, donors and volunteers to fulfill urgent needs—food, clothes, education, and medical aid—with transparency and impact.</p>
                        <div class="d-flex gap-2 flex-wrap">
                            <a href="{{ route('signup') }}" class="btn btn-success btn-pill">Get Started</a>
                            <a href="{{ route('map.view') }}" class="btn btn-outline-secondary btn-pill">Explore the Map</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 text-center">
                    <img class="img-fluid" alt="community" src="https://images.unsplash.com/photo-1542810634-71277d95dcbb?q=80&w=1600&auto=format&fit=crop">
                </div>
            </div>
        </div>
    </section>

    <section class="py-4">
        <div class="container">
            <h3 class="section-title mb-4">How it works</h3>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="feature-card h-100">
                        <img class="feature-icon mb-3" src="https://img.icons8.com/fluency/48/marker.png" alt="map">
                        <h5>See needs in real time</h5>
                        <p class="mb-0">A live map shows nearby help requests and donation pickup spots so you can act fast.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card h-100">
                        <img class="feature-icon mb-3" src="https://img.icons8.com/fluency/48/helping-hand.png" alt="donate">
                        <h5>Donate or volunteer</h5>
                        <p class="mb-0">Choose items to donate, schedule collections, or accept tasks as a volunteer.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card h-100">
                        <img class="feature-icon mb-3" src="https://img.icons8.com/fluency/48/compliance.png" alt="impact">
                        <h5>Track your impact</h5>
                        <p class="mb-0">Receive updates with photos and reports showing how your support was used.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-4">
        <div class="container">
            <h3 class="section-title mb-4">In pictures</h3>
            <div class="row g-3 gallery">
                <div class="col-md-4"><img class="img-fluid" alt="img1" src="https://images.unsplash.com/photo-1509099836639-18ba1795216d?q=80&w=1600&auto=format&fit=crop"></div>
                <div class="col-md-4"><img class="img-fluid" alt="img2" src="https://images.unsplash.com/480/photo-1526256262350-7da7584cf5eb?q=80&w=1600&auto=format&fit=crop"></div>
                <div class="col-md-4"><img class="img-fluid" alt="img3" src="https://images.unsplash.com/photo-1509099836639-18ba1795216d?q=80&w=1600&auto=format&fit=crop"></div>
            </div>
        </div>
    </section>

    <footer class="py-4">
        <div class="container text-center footer">
            © {{ date('Y') }} Shongjukto • <a href="{{ route('login') }}">Login</a> • <a href="{{ route('signup') }}">Sign up</a>
        </div>
    </footer>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>