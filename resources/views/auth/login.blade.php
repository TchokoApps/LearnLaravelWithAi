<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Log In | {{ config('app.name') }}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc."/>
        <meta name="author" content="Zoyothemes"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('backend/assets/images/favicon.ico') }}">

        <!-- App css -->
        <link href="{{ asset('backend/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-style" />

        <!-- Icons -->
        <link href="{{ asset('backend/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    </head>

    <body class="bg-white">
        <!-- Begin page -->
        <div class="account-page">
            <div class="container-fluid p-0">
                <div class="row align-items-center g-0">
                    <div class="col-xl-5">
                        <div class="row">
                            <div class="col-md-7 mx-auto">
                                <div class="mb-0 border-0 p-md-5 p-lg-0 p-4">
                                    <div class="mb-4 p-0">
                                        <a href="{{ url('/') }}" class="auth-logo">
                                            <img src="{{ asset('backend/assets/images/logo-dark.png') }}" alt="logo-dark" class="mx-auto" height="28" />
                                        </a>
                                    </div>

                                    <div class="pt-0">

                                        <form method="POST" action="{{ route('login') }}" class="my-4" id="loginForm">
                                            @csrf

                                            {{-- Credential / general error alert (from lesson) --}}
                                            @if ($errors->any())
                                                <div class="alert alert-danger alert-dismissible fade show mb-3" role="alert">
                                                    <i class="ri-error-warning-line me-1"></i>
                                                    @foreach ($errors->all() as $error)
                                                        <span>{{ $error }}</span><br>
                                                    @endforeach
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                </div>
                                            @endif

                                            {{-- Rate-limit / throttle message --}}
                                            @if (session('status'))
                                                <div class="alert alert-info alert-dismissible fade show mb-3" role="alert">
                                                    <i class="ri-information-line me-1"></i> {{ session('status') }}
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                </div>
                                            @endif

                                            <!-- Email Address -->
                                            <div class="form-group mb-3">
                                                <label for="emailaddress" class="form-label">{{ __('Email address') }}</label>
                                                <input class="form-control @error('email') is-invalid @enderror"
                                                       type="email"
                                                       id="emailaddress"
                                                       name="email"
                                                       value="{{ old('email') }}"
                                                       required
                                                       autofocus
                                                       autocomplete="username"
                                                       placeholder="{{ __('Enter your email') }}">
                                                @error('email')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>

                                            <!-- Password with show/hide toggle -->
                                            <div class="form-group mb-3">
                                                <label for="password" class="form-label">{{ __('Password') }}</label>
                                                <div class="input-group">
                                                    <input class="form-control @error('password') is-invalid @enderror"
                                                           type="password"
                                                           id="password"
                                                           name="password"
                                                           required
                                                           autocomplete="current-password"
                                                           placeholder="{{ __('Enter your password') }}">
                                                    <button class="btn btn-outline-secondary" type="button" id="togglePassword" tabindex="-1" title="{{ __('Show/hide password') }}">
                                                        <i class="ri-eye-line" id="togglePasswordIcon"></i>
                                                    </button>
                                                    @error('password')
                                                        <div class="invalid-feedback">
                                                            <small class="text-danger">{{ $message }}</small>
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <!-- Remember Me & Forgot Password -->
                                            <div class="form-group d-flex mb-3">
                                                <div class="col-sm-6">
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input" id="checkbox-signin" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="checkbox-signin">{{ __('Remember me') }}</label>
                                                    </div>
                                                </div>
                                                @if (Route::has('password.request'))
                                                    <div class="col-sm-6 text-end">
                                                        <a class="text-muted fs-14" href="{{ route('password.request') }}">{{ __('Forgot password?') }}</a>
                                                    </div>
                                                @endif
                                            </div>

                                            <!-- Submit with loading state -->
                                            <div class="form-group mb-0 row">
                                                <div class="col-12">
                                                    <div class="d-grid">
                                                        <button class="btn btn-primary" type="submit" id="loginBtn">
                                                            <span id="loginBtnText">{{ __('Log In') }}</span>
                                                            <span id="loginBtnSpinner" class="d-none">
                                                                <span class="spinner-border spinner-border-sm me-1" role="status" aria-hidden="true"></span>
                                                                {{ __('Logging in...') }}
                                                            </span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>

                                        <div class="saprator my-4"><span>{{ __('or sign in with') }}</span></div>

                                        <div class="text-center text-muted mb-4">
                                            <p class="mb-0">{{ __("Don't have an account?") }}
                                                @if (Route::has('register'))
                                                    <a class="text-primary ms-2 fw-medium" href="{{ route('register') }}">{{ __('Sign up') }}</a>
                                                @endif
                                            </p>
                                        </div>

                                        <div class="row">
                                            <div class="col-12">
                                                <a class="btn text-dark border fw-normal d-flex align-items-center justify-content-center mb-3">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 48 48" class="me-2">
                                                        <path fill="#ffc107" d="M43.611 20.083H42V20H24v8h11.303c-1.649 4.657-6.08 8-11.303 8c-6.627 0-12-5.373-12-12s5.373-12 12-12c3.059 0 5.842 1.154 7.961 3.039l5.657-5.657C34.046 6.053 29.268 4 24 4C12.955 4 4 12.955 4 24s8.955 20 20 20s20-8.955 20-20c0-1.341-.138-2.65-.389-3.917"/><path fill="#ff3d00" d="m6.306 14.691l6.571 4.819C14.655 15.108 18.961 12 24 12c3.059 0 5.842 1.154 7.961 3.039l5.657-5.657C34.046 6.053 29.268 4 24 4C16.318 4 9.656 8.337 6.306 14.691"/><path fill="#4caf50" d="M24 44c5.166 0 9.86-1.977 13.409-5.192l-6.19-5.238A11.91 11.91 0 0 1 24 36c-5.202 0-9.619-3.317-11.283-7.946l-6.522 5.025C9.505 39.556 16.227 44 24 44"/>
                                                        <path fill="#1976d2" d="M43.611 20.083H42V20H24v8h11.303a12.04 12.04 0 0 1-4.087 5.571l.003-.002l6.19 5.238C36.971 39.205 44 34 44 24c0-1.341-.138-2.65-.389-3.917"/>
                                                    </svg>
                                                    <span>{{ __('Sign in with Google') }}</span>
                                                </a>
                                            </div>

                                            <div class="col-12">
                                                <a class="btn btn-primary fw-normal d-flex align-items-center justify-content-center mb-3">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="me-2">
                                                        <path fill="#ffffff" d="M9.198 21.5h4v-8.01h3.604l.396-3.98h-4V7.5a1 1 0 0 1 1-1h3v-4h-3a5 5 0 0 0-5 5v2.01h-2l-.396 3.98h2.396z"/>
                                                    </svg>
                                                    <span>{{ __('Sign in with Facebook') }}</span>
                                                </a>
                                            </div>

                                            <div class="col-12">
                                                <a class="btn btn-dark fw-normal d-flex align-items-center justify-content-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="me-2">
                                                        <path fill="#ffffff" d="M15.718 5.492c-.575 0-1.109.088-1.603.264c-.494.176-.944.35-1.35.523c-.406.172-.758.258-1.057.258c-.314 0-.662-.082-1.045-.247a23.818 23.818 0 0 0-1.235-.488A4.07 4.07 0 0 0 8.02 5.56c-.942 0-1.85.256-2.722.77c-.874.512-1.59 1.27-2.149 2.274c-.559 1.003-.838 2.24-.838 3.711c0 .919.107 1.838.321 2.757c.215.92.502 1.789.862 2.608c.36.82.758 1.543 1.195 2.172a19.16 19.16 0 0 0 1.66 2.033c.54.567 1.166.85 1.878.85c.467 0 .873-.076 1.218-.23c.345-.153.71-.308 1.097-.465c.387-.157.872-.235 1.454-.235c.444 0 .815.046 1.114.137c.299.092.572.198.821.316c.25.12.512.224.787.316c.276.092.61.138 1 .138c.513 0 .974-.136 1.384-.408c.41-.271.79-.622 1.138-1.05c.348-.43.687-.878 1.017-1.345c.36-.529.652-1.036.878-1.522a13.289 13.289 0 0 0 .672-1.706c-.022-.008-.19-.094-.5-.259c-.31-.164-.662-.427-1.056-.787c-.395-.36-.74-.83-1.034-1.413c-.295-.582-.443-1.294-.443-2.137c0-.735.117-1.369.35-1.901c.234-.533.508-.973.822-1.321c.314-.349.596-.615.845-.799c.249-.184.392-.287.43-.31c-.383-.552-.8-.98-1.252-1.287a5.16 5.16 0 0 0-1.332-.666a5.912 5.912 0 0 0-1.167-.259a8.324 8.324 0 0 0-.752-.051m-.804-1.862c.352-.42.64-.91.861-1.464a4.583 4.583 0 0 0 .333-1.718c0-.168-.011-.318-.034-.448c-.574.023-1.174.195-1.798.517a4.952 4.952 0 0 0-1.545 1.206a5.46 5.46 0 0 0-.873 1.379a4.04 4.04 0 0 0-.38 1.7a1.709 1.709 0 0 0 .046.414c.1.023.204.034.31.034c.514 0 1.06-.153 1.638-.46a4.654 4.654 0 0 0 1.442-1.16"/>
                                                    </svg>
                                                    <span>{{ __('Sign in with Apple') }}</span>
                                                </a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-7">
                        <div class="account-page-bg p-md-5 p-4">
                            <div class="text-center">
                                <h3 class="text-dark mb-3 pera-title">{{ __('Quick, Effective, and Productive With') }} {{ config('app.name') }} {{ __('Admin Dashboard') }}</h3>
                                <div class="auth-image">
                                    <img src="{{ asset('backend/assets/images/authentication.svg') }}" class="mx-auto img-fluid" alt="authentication">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END wrapper -->

        <!-- Vendor -->
        <script src="{{ asset('backend/assets/libs/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('backend/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('backend/assets/libs/simplebar/simplebar.min.js') }}"></script>
        <script src="{{ asset('backend/assets/libs/node-waves/waves.min.js') }}"></script>
        <script src="{{ asset('backend/assets/libs/waypoints/lib/jquery.waypoints.min.js') }}"></script>
        <script src="{{ asset('backend/assets/libs/jquery.counterup/jquery.counterup.min.js') }}"></script>
        <script src="{{ asset('backend/assets/libs/feather-icons/feather.min.js') }}"></script>

        <!-- App js -->
        <script src="{{ asset('backend/assets/js/app.js') }}"></script>

        <script>
            // Show / hide password toggle
            document.getElementById('togglePassword').addEventListener('click', function () {
                const pwd = document.getElementById('password');
                const icon = document.getElementById('togglePasswordIcon');
                if (pwd.type === 'password') {
                    pwd.type = 'text';
                    icon.classList.replace('ri-eye-line', 'ri-eye-off-line');
                } else {
                    pwd.type = 'password';
                    icon.classList.replace('ri-eye-off-line', 'ri-eye-line');
                }
            });

            // Loading state on submit
            document.getElementById('loginForm').addEventListener('submit', function () {
                const btn  = document.getElementById('loginBtn');
                const text = document.getElementById('loginBtnText');
                const spin = document.getElementById('loginBtnSpinner');
                btn.disabled = true;
                text.classList.add('d-none');
                spin.classList.remove('d-none');
            });
        </script>
    </body>
</html>
