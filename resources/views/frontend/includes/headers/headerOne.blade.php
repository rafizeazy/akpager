<!-- main header -->
<header class="main-header menu-absolute header-white no-border">

    <!--Header-Upper-->
    <div class="header-upper">
        <div class="container container-1660 clearfix">

            <div class="header-inner py-15 rel d-flex align-items-center">
                <div class="logo-outer">
                    <div class="logo"><a href="{{ route('home') }}"><img src="{{ asset('/assets/images/logos/logo.png') }}" alt="Logo" title="Logo"></a></div>
                </div>

                <div class="nav-outer ms-lg-auto clearfix">
                    <!-- Main Menu -->
                    <nav class="main-menu navbar-expand-lg">
                        <div class="navbar-header py-10">
                            <div class="mobile-logo">
                                <a href="{{ route('home') }}">
                                    <img src="{{ asset('/assets/images/logos/logo.png') }}" alt="Logo" title="Logo">
                                </a>
                            </div>
                            
                            <!-- Toggle Button -->
                            <button type="button" class="navbar-toggle" data-bs-toggle="collapse" data-bs-target=".navbar-collapse">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="navbar-collapse collapse clearfix">
                            <ul class="navigation clearfix">
                                @include('frontend.includes.partials.navbar')
                            </ul>
                        </div>

                    </nav>
                    <!-- Main Menu End-->
                </div>
                
                <!-- Nav Search -->
                <div class="nav-search ms-xl-2 ms-4 py-10">
                    <button class="far fa-search"></button>
                    <form action="#" class="hide">
                        <input type="text" placeholder="Search" class="searchbox" required="">
                        <button type="submit" class="searchbutton far fa-search"></button>
                    </form>
                </div>
                
                <!-- Menu Button -->
                <div class="menu-btns ms-lg-auto d-none d-xl-flex">
                    <a href="#" class="theme-btn" data-bs-toggle="modal" data-bs-target="#loginModal">Login <i class="far fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!--End Header Upper-->
</header>

<!-- Login Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content login-modal-content">
            <!-- Decorative circles -->
            <div class="login-circle login-circle-1"></div>
            <div class="login-circle login-circle-2"></div>
            
            <div class="modal-header border-0 pb-0">
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <div class="modal-body px-4 px-md-5 py-4">
                <!-- Logo/Icon -->
                <div class="text-center mb-4">
                    <div class="login-icon-wrapper">
                        <i class="fas fa-user-shield login-icon"></i>
                    </div>
                    <h3 class="login-title mt-3 mb-2">Welcome Back!</h3>
                    <p class="login-subtitle text-muted">Sign in to access admin dashboard</p>
                </div>

                <form id="loginForm" method="POST" action="{{ route('login') }}">
                    @csrf
                    
                    <!-- Email Input -->
                    <div class="mb-4">
                        <label for="email" class="form-label login-label">
                            <i class="far fa-envelope me-2"></i>Email Address
                        </label>
                        <div class="login-input-group">
                            <i class="far fa-user login-input-icon"></i>
                            <input type="email" class="form-control login-input" id="email" name="email" required 
                                   placeholder="admin@example.com" autocomplete="email">
                        </div>
                        <div class="invalid-feedback" id="emailError"></div>
                    </div>
                    
                    <!-- Password Input -->
                    <div class="mb-4">
                        <label for="password" class="form-label login-label">
                            <i class="far fa-lock me-2"></i>Password
                        </label>
                        <div class="login-input-group">
                            <i class="far fa-lock login-input-icon"></i>
                            <input type="password" class="form-control login-input" id="password" name="password" required 
                                   placeholder="Enter your password" autocomplete="current-password">
                            <button type="button" class="password-toggle" id="togglePassword">
                                <i class="far fa-eye" id="toggleIcon"></i>
                            </button>
                        </div>
                        <div class="invalid-feedback" id="passwordError"></div>
                    </div>
                    
                    <!-- Error Alert -->
                    <div id="loginError" class="alert alert-danger login-alert d-none mt-3" role="alert">
                        <i class="fas fa-exclamation-circle me-2"></i>
                        <span id="loginErrorText"></span>
                    </div>
                    
                    <!-- Submit Button -->
                    <div class="d-grid mb-3">
                        <button type="submit" class="btn login-submit-btn" id="loginBtn">
                            <span id="loginBtnText">
                                <i class="far fa-sign-in me-2"></i>Sign In
                            </span>
                            <span id="loginBtnSpinner" class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                        </button>
                    </div>
                    
                    <!-- Divider -->
                    <div class="login-divider">
                        <span>Secure Admin Access</span>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    /* Modal Backdrop */
    #loginModal .modal-backdrop {
        backdrop-filter: blur(5px);
    }
    
    /* Modal Content */
    #loginModal .login-modal-content {
        border: none;
        border-radius: 20px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
        overflow: hidden;
        position: relative;
    }
    
    /* Decorative Circles */
    .login-circle {
        position: absolute;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.1);
        z-index: 0;
    }
    
    .login-circle-1 {
        width: 200px;
        height: 200px;
        top: -100px;
        right: -50px;
    }
    
    .login-circle-2 {
        width: 150px;
        height: 150px;
        bottom: -75px;
        left: -50px;
    }
    
    /* Modal Header */
    #loginModal .modal-header {
        position: relative;
        z-index: 1;
    }
    
    #loginModal .btn-close-white {
        opacity: 0.8;
        transition: opacity 0.3s;
    }
    
    #loginModal .btn-close-white:hover {
        opacity: 1;
    }
    
    /* Modal Body */
    #loginModal .modal-body {
        background: white;
        border-radius: 15px;
        margin: 0 15px 15px 15px;
        position: relative;
        z-index: 1;
    }
    
    /* Logo/Icon */
    .login-icon-wrapper {
        width: 80px;
        height: 80px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: 50%;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 10px 30px rgba(102, 126, 234, 0.3);
        animation: iconFloat 3s ease-in-out infinite;
    }
    
    @keyframes iconFloat {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-10px); }
    }
    
    .login-icon {
        font-size: 2rem;
        color: white;
    }
    
    .login-title {
        font-weight: 700;
        color: #2d3748;
        font-size: 1.75rem;
    }
    
    .login-subtitle {
        font-size: 0.95rem;
        color: #718096;
    }
    
    /* Form Labels */
    .login-label {
        font-weight: 600;
        color: #4a5568;
        font-size: 0.9rem;
        margin-bottom: 0.5rem;
        display: flex;
        align-items: center;
    }
    
    /* Input Groups */
    .login-input-group {
        position: relative;
        display: flex;
        align-items: center;
    }
    
    .login-input-icon {
        position: absolute;
        left: 16px;
        color: #a0aec0;
        font-size: 1rem;
        z-index: 2;
    }
    
    .login-input {
        padding: 14px 16px 14px 46px;
        border: 2px solid #e2e8f0;
        border-radius: 12px;
        font-size: 0.95rem;
        transition: all 0.3s ease;
        background: #f7fafc;
        width: 100%;
    }
    
    .login-input:focus {
        border-color: #667eea;
        background: white;
        box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        outline: none;
    }
    
    .login-input::placeholder {
        color: #cbd5e0;
    }
    
    /* Password Toggle */
    .password-toggle {
        position: absolute;
        right: 16px;
        background: none;
        border: none;
        color: #a0aec0;
        cursor: pointer;
        padding: 8px;
        transition: color 0.3s;
        z-index: 2;
    }
    
    .password-toggle:hover {
        color: #667eea;
    }
    
    /* Error Alert */
    .login-alert {
        border: none;
        border-radius: 10px;
        padding: 12px 16px;
        font-size: 0.9rem;
        display: flex;
        align-items: center;
        animation: slideDown 0.3s ease;
    }
    
    @keyframes slideDown {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    /* Submit Button */
    .login-submit-btn {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border: none;
        border-radius: 12px;
        padding: 14px 24px;
        font-weight: 600;
        font-size: 1rem;
        color: white;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
        position: relative;
        overflow: hidden;
    }
    
    .login-submit-btn::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: rgba(255, 255, 255, 0.2);
        transition: left 0.5s ease;
    }
    
    .login-submit-btn:hover::before {
        left: 100%;
    }
    
    .login-submit-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(102, 126, 234, 0.5);
    }
    
    .login-submit-btn:active {
        transform: translateY(0);
    }
    
    .login-submit-btn:disabled {
        opacity: 0.7;
        cursor: not-allowed;
        transform: none;
    }
    
    /* Divider */
    .login-divider {
        text-align: center;
        position: relative;
        margin-top: 20px;
    }
    
    .login-divider span {
        background: white;
        padding: 0 15px;
        color: #a0aec0;
        font-size: 0.85rem;
        font-weight: 500;
        position: relative;
        z-index: 1;
    }
    
    .login-divider::before {
        content: '';
        position: absolute;
        top: 50%;
        left: 0;
        right: 0;
        height: 1px;
        background: #e2e8f0;
    }
    
    /* Invalid Feedback */
    #loginModal .invalid-feedback {
        display: block;
        margin-top: 0.5rem;
        font-size: 0.85rem;
        color: #fc8181;
        padding-left: 8px;
    }
    
    #loginModal .form-control.is-invalid {
        border-color: #fc8181;
        background: #fff5f5;
    }
    
    #loginModal .form-control.is-invalid:focus {
        box-shadow: 0 0 0 3px rgba(252, 129, 129, 0.1);
    }
    
    /* Responsive Design */
    @media (max-width: 576px) {
        #loginModal .modal-dialog {
            margin: 10px;
        }
        
        #loginModal .modal-body {
            padding: 1.5rem !important;
        }
        
        .login-title {
            font-size: 1.5rem;
        }
        
        .login-icon-wrapper {
            width: 60px;
            height: 60px;
        }
        
        .login-icon {
            font-size: 1.5rem;
        }
        
        .login-input {
            padding: 12px 14px 12px 40px;
            font-size: 0.9rem;
        }
        
        .login-input-icon {
            left: 12px;
            font-size: 0.9rem;
        }
        
        .password-toggle {
            right: 12px;
        }
        
        .login-submit-btn {
            padding: 12px 20px;
            font-size: 0.95rem;
        }
    }
    
    @media (min-width: 768px) {
        #loginModal .modal-dialog {
            max-width: 480px;
        }
    }
    
    /* Animation for modal */
    #loginModal.show .login-modal-content {
        animation: modalSlideIn 0.4s ease;
    }
    
    @keyframes modalSlideIn {
        from {
            opacity: 0;
            transform: translateY(-50px) scale(0.9);
        }
        to {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const loginForm = document.getElementById('loginForm');
    const loginBtn = document.getElementById('loginBtn');
    const loginBtnText = document.getElementById('loginBtnText');
    const loginBtnSpinner = document.getElementById('loginBtnSpinner');
    const loginError = document.getElementById('loginError');
    const loginErrorText = document.getElementById('loginErrorText');
    const emailError = document.getElementById('emailError');
    const passwordError = document.getElementById('passwordError');
    const togglePassword = document.getElementById('togglePassword');
    const toggleIcon = document.getElementById('toggleIcon');
    const passwordInput = document.getElementById('password');
    
    // Toggle password visibility
    if (togglePassword) {
        togglePassword.addEventListener('click', function(e) {
            e.preventDefault();
            const type = passwordInput.type === 'password' ? 'text' : 'password';
            passwordInput.type = type;
            
            // Toggle icon
            if (type === 'password') {
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            } else {
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            }
        });
    }
    
    // Login form submission
    if (loginForm) {
        loginForm.addEventListener('submit', async function(e) {
            e.preventDefault();
            
            // Reset errors
            loginError.classList.add('d-none');
            emailError.textContent = '';
            passwordError.textContent = '';
            document.getElementById('email').classList.remove('is-invalid');
            passwordInput.classList.remove('is-invalid');
            
            // Show loading
            loginBtnText.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Signing in...';
            loginBtnSpinner.classList.remove('d-none');
            loginBtn.disabled = true;
            
            const formData = new FormData(loginForm);
            
                // Get CSRF token from meta tag or form
                const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || formData.get('_token');

                const response = await fetch(loginForm.action, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': csrfToken
                    },
                    credentials: 'same-origin'
                });
                });
                
                const data = await response.json();
                
                if (response.ok) {
                    setTimeout(() => {
                        window.location.href = '{{ route("admin.dashboard") }}';
                    }, 500);
                    
                    setTimeout(() => {
                        window.location.href = '{{ url("/admin") }}';
                    }, 500);
                } else {
                    // Error handling
                    if (data.errors) {
                        if (data.errors.email) {
                            document.getElementById('email').classList.add('is-invalid');
                            emailError.textContent = data.errors.email[0];
                        }
                        if (data.errors.password) {
                            passwordInput.classList.add('is-invalid');
                            passwordError.textContent = data.errors.password[0];
                        }
                    } else if (data.message) {
                        loginErrorText.textContent = data.message;
                        loginError.classList.remove('d-none');
                    } else {
                        loginErrorText.textContent = 'Invalid email or password. Please try again.';
                        loginError.classList.remove('d-none');
                    }
                    
                    // Reset button
                    loginBtnText.innerHTML = '<i class="far fa-sign-in me-2"></i>Sign In';
                    loginBtnSpinner.classList.add('d-none');
                    loginBtn.disabled = false;
                }
            } catch (error) {
                console.error('Login error:', error);
                loginErrorText.textContent = 'An error occurred. Please try again.';
                loginError.classList.remove('d-none');
                
                // Reset button
                loginBtnText.innerHTML = '<i class="far fa-sign-in me-2"></i>Sign In';
                loginBtnSpinner.classList.add('d-none');
                loginBtn.disabled = false;
            }
        });
    }
    
    // Reset form when modal is closed
    const loginModal = document.getElementById('loginModal');
    if (loginModal) {
        loginModal.addEventListener('hidden.bs.modal', function() {
            loginForm.reset();
            loginError.classList.add('d-none');
            emailError.textContent = '';
            passwordError.textContent = '';
            document.getElementById('email').classList.remove('is-invalid');
            passwordInput.classList.remove('is-invalid');
            loginBtnText.innerHTML = '<i class="far fa-sign-in me-2"></i>Sign In';
            loginBtnSpinner.classList.add('d-none');
            loginBtn.disabled = false;
            loginBtn.classList.remove('btn-success');
            
            // Reset password visibility
            if (passwordInput.type === 'text') {
                passwordInput.type = 'password';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            }
        });
    }
    
    // Add input animation
    const loginInputs = document.querySelectorAll('.login-input');
    loginInputs.forEach(input => {
        input.addEventListener('focus', function() {
            this.parentElement.style.transform = 'translateY(-2px)';
        });
        
        input.addEventListener('blur', function() {
            this.parentElement.style.transform = 'translateY(0)';
        });
    });
});
</script>
