<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>{{ __('Profile Settings') }} | {{ config('app.name') }}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <link rel="shortcut icon" href="{{ asset('backend/assets/images/favicon.ico') }}">
        <link href="{{ asset('backend/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-style" />
        <link href="{{ asset('backend/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />

        <!-- Toastr CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    </head>

    <body data-menu-color="light" data-sidebar="default">
        <div id="app-layout">

            <!-- =============== Topbar =============== -->
            <div class="topbar-custom">
                <div class="container-xxl">
                    <div class="d-flex justify-content-between">
                        <ul class="list-unstyled topnav-menu mb-0 d-flex align-items-center">
                            <li>
                                <button class="button-toggle-menu nav-link ps-0">
                                    <i data-feather="menu" class="noti-icon"></i>
                                </button>
                            </li>
                            <li class="d-none d-lg-block">
                                <div class="position-relative topbar-search">
                                    <input type="text" class="form-control bg-light bg-opacity-75 border-light ps-4" placeholder="{{ __('Search...') }}">
                                    <i class="mdi mdi-magnify fs-16 position-absolute text-muted top-50 translate-middle-y ms-2"></i>
                                </div>
                            </li>
                        </ul>

                        <ul class="list-unstyled topnav-menu mb-0 d-flex align-items-center">
                            <li class="d-none d-sm-flex">
                                <button type="button" class="btn nav-link" data-toggle="fullscreen">
                                    <i data-feather="maximize" class="align-middle fullscreen noti-icon"></i>
                                </button>
                            </li>

                            <!-- User Dropdown -->
                            <li class="dropdown notification-list topbar-dropdown">
                                <a class="nav-link dropdown-toggle nav-user me-0" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                    <img src="{{ auth()->user()->photo ? Storage::url(auth()->user()->photo) : asset('backend/assets/images/users/user-11.jpg') }}" alt="user-image" class="rounded-circle">
                                    <span class="pro-user-name ms-1">
                                        {{ auth()->user()->name }} <i class="mdi mdi-chevron-down"></i>
                                    </span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end profile-dropdown">
                                    <div class="dropdown-header noti-title">
                                        <h6 class="text-overflow m-0">{{ __('Welcome!') }}</h6>
                                    </div>
                                    <a href="{{ route('profile.edit') }}" class="dropdown-item notify-item">
                                        <i class="mdi mdi-account-circle-outline fs-16 align-middle"></i>
                                        <span>{{ __('My Account') }}</span>
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a href="#" class="dropdown-item notify-item"
                                       onclick="event.preventDefault(); document.getElementById('topbar-logout-form').submit();">
                                        <i class="mdi mdi-location-exit fs-16 align-middle"></i>
                                        <span>{{ __('Logout') }}</span>
                                    </a>
                                    <form id="topbar-logout-form" method="POST" action="{{ route('logout') }}" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- End Topbar -->

            <!-- =============== Sidebar =============== -->
            <div class="app-sidebar-menu">
                <div class="h-100" data-simplebar>
                    <div id="sidebar-menu">
                        <div class="logo-box">
                            <a href="{{ url('/dashboard') }}" class="logo logo-light">
                                <span class="logo-sm"><img src="{{ asset('backend/assets/images/logo-sm.png') }}" alt="" height="22"></span>
                                <span class="logo-lg"><img src="{{ asset('backend/assets/images/logo-light.png') }}" alt="" height="24"></span>
                            </a>
                            <a href="{{ url('/dashboard') }}" class="logo logo-dark">
                                <span class="logo-sm"><img src="{{ asset('backend/assets/images/logo-sm.png') }}" alt="" height="22"></span>
                                <span class="logo-lg"><img src="{{ asset('backend/assets/images/logo-dark.png') }}" alt="" height="24"></span>
                            </a>
                        </div>

                        <ul id="side-menu">
                            <li class="menu-title">{{ __('Menu') }}</li>
                            <li>
                                <a href="{{ url('/dashboard') }}" class="tp-link">
                                    <i data-feather="home"></i>
                                    <span> {{ __('Dashboard') }} </span>
                                </a>
                            </li>
                            <li class="menu-title">{{ __('Account') }}</li>
                            <li class="active">
                                <a href="{{ route('profile.edit') }}" class="tp-link">
                                    <i data-feather="user"></i>
                                    <span> {{ __('Profile') }} </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- End Sidebar -->

            <!-- =============== Page Content =============== -->
            <div class="content-page">
                <div class="content">
                    <div class="container-xxl">

                        <!-- Page title -->
                        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                            <div class="flex-grow-1">
                                <h4 class="fs-18 fw-semibold m-0">{{ __('Profile') }}</h4>
                            </div>
                            <div class="text-end">
                                <ol class="breadcrumb m-0 py-0">
                                    <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">{{ __('Dashboard') }}</a></li>
                                    <li class="breadcrumb-item active">{{ __('Profile') }}</li>
                                </ol>
                            </div>
                        </div>

                        <!-- Profile Card -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">

                                        <!-- Profile Header -->
                                        <div class="align-items-center">
                                            <div class="d-flex align-items-center">
                                                <div class="position-relative me-4">
                                                    <img id="profilePhotoPreview"
                                                         src="{{ auth()->user()->photo ? Storage::url(auth()->user()->photo) : asset('backend/assets/images/users/user-11.jpg') }}"
                                                         class="rounded-circle avatar-xxl img-thumbnail"
                                                         alt="profile image"
                                                         style="width:80px;height:80px;object-fit:cover;">
                                                </div>
                                                <div class="overflow-hidden">
                                                    <h4 class="m-0 text-dark fs-20">{{ auth()->user()->name }}</h4>
                                                    <p class="my-1 text-muted fs-16">{{ auth()->user()->email }}</p>
                                                    <span class="badge bg-primary-subtle text-primary px-2 py-1 fs-13 fw-normal">{{ __(ucfirst(auth()->user()->role ?? 'Member')) }}</span>
                                                    @if(auth()->user()->status == 0)
                                                        <span class="badge bg-danger-subtle text-danger px-2 py-1 fs-13 fw-normal ms-1">{{ __('Inactive') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Profile Settings Content -->
                                        <div class="mt-4">
                                            <div>
                                                <div class="row">

                                                    <!-- ── Personal Information Form ── -->
                                                    <div class="col-lg-6 col-xl-6 mb-4">
                                                        <div class="card border mb-0 h-100">
                                                            <div class="card-header">
                                                                <h4 class="card-title mb-0">{{ __('Personal Information') }}</h4>
                                                            </div>
                                                            <div class="card-body">

                                                                {{-- Validation errors --}}
                                                                @if ($errors->any() && !$errors->updatePassword->any() && !$errors->userDeletion->any())
                                                                    <div class="alert alert-danger alert-dismissible fade show mb-3" role="alert">
                                                                        @foreach ($errors->all() as $error)
                                                                            <span class="d-block">{{ $error }}</span>
                                                                        @endforeach
                                                                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                                                    </div>
                                                                @endif

                                                                {{-- Hidden send-verification form (must be outside profileInfoForm) --}}
                                                                <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                                                                    @csrf
                                                                </form>

                                                                <form method="POST" action="{{ route('profile.update') }}" id="profileInfoForm"
                                                                      enctype="multipart/form-data">
                                                                    @csrf
                                                                    @method('patch')

                                                                    <div class="form-group mb-3">
                                                                        <label for="profile_name" class="form-label">{{ __('Name') }}</label>
                                                                        <input class="form-control @error('name') is-invalid @enderror"
                                                                               type="text" id="profile_name" name="name"
                                                                               value="{{ old('name', auth()->user()->name) }}"
                                                                               required autofocus autocomplete="name">
                                                                        @error('name')
                                                                            <small class="text-danger">{{ $message }}</small>
                                                                        @enderror
                                                                    </div>

                                                                    <div class="form-group mb-3">
                                                                        <label for="profile_email" class="form-label">{{ __('Email Address') }}</label>
                                                                        <div class="input-group">
                                                                            <span class="input-group-text"><i class="mdi mdi-email"></i></span>
                                                                            <input class="form-control @error('email') is-invalid @enderror"
                                                                                   type="email" id="profile_email" name="email"
                                                                                   value="{{ old('email', auth()->user()->email) }}"
                                                                                   required autocomplete="username">
                                                                            @error('email')
                                                                                <div class="invalid-feedback"><small>{{ $message }}</small></div>
                                                                            @enderror
                                                                        </div>

                                                                        {{-- Email verification notice --}}
                                                                        @if (auth()->user() instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! auth()->user()->hasVerifiedEmail())
                                                                            <div class="mt-2">
                                                                                <p class="text-sm text-warning mb-1">
                                                                                    <i class="ri-alert-line me-1"></i>{{ __('Your email address is unverified.') }}
                                                                                </p>
                                                                                <button form="send-verification" class="btn btn-sm btn-outline-warning">
                                                                                    {{ __('Re-send verification email') }}
                                                                                </button>
                                                                                @if (session('status') === 'verification-link-sent')
                                                                                    <p class="mt-2 text-success small">
                                                                                        <i class="ri-mail-check-line me-1"></i>{{ __('A new verification link has been sent.') }}
                                                                                    </p>
                                                                                @endif
                                                                            </div>
                                                                        @endif
                                                                    </div>

                                                                    <div class="form-group mb-3">
                                                                        <label for="profile_phone" class="form-label">{{ __('Phone') }}</label>
                                                                        <div class="input-group">
                                                                            <span class="input-group-text"><i class="mdi mdi-phone-outline"></i></span>
                                                                            <input class="form-control @error('phone') is-invalid @enderror"
                                                                                   type="text" id="profile_phone" name="phone"
                                                                                   value="{{ old('phone', auth()->user()->phone) }}"
                                                                                   autocomplete="tel"
                                                                                   placeholder="{{ __('e.g. +1 234 567 8900') }}">
                                                                            @error('phone')
                                                                                <div class="invalid-feedback"><small>{{ $message }}</small></div>
                                                                            @enderror
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group mb-3">
                                                                        <label for="profile_address" class="form-label">{{ __('Address') }}</label>
                                                                        <div class="input-group">
                                                                            <span class="input-group-text align-items-start pt-2"><i class="mdi mdi-map-marker-outline"></i></span>
                                                                            <textarea class="form-control @error('address') is-invalid @enderror"
                                                                                      id="profile_address" name="address" rows="3"
                                                                                      placeholder="{{ __('Enter your address') }}">{{ old('address', auth()->user()->address) }}</textarea>
                                                                            @error('address')
                                                                                <div class="invalid-feedback"><small>{{ $message }}</small></div>
                                                                            @enderror
                                                                        </div>
                                                                    </div>

                                                                    <!-- Photo Upload -->
                                                                    <div class="form-group mb-4">
                                                                        <label class="form-label">{{ __('Profile Photo') }}</label>
                                                                        <div class="d-flex align-items-center gap-3">
                                                                            <img id="formPhotoPreview"
                                                                                 src="{{ auth()->user()->photo ? Storage::url(auth()->user()->photo) : asset('backend/assets/images/users/user-11.jpg') }}"
                                                                                 class="rounded-circle img-thumbnail flex-shrink-0"
                                                                                 style="width:80px;height:80px;object-fit:cover;"
                                                                                 alt="{{ __('Profile Photo') }}">
                                                                            <div>
                                                                                {{-- File input is NOT inside the label to avoid click-swallowing --}}
                                                                                <input type="file" id="photo_input" name="photo"
                                                                                       accept="image/jpeg,image/png,image/gif,image/webp"
                                                                                       class="d-none">
                                                                                <button type="button" class="btn btn-outline-primary btn-sm"
                                                                                        onclick="document.getElementById('photo_input').click()">
                                                                                    <i class="ri-upload-2-line me-1"></i>{{ __('Choose Photo') }}
                                                                                </button>
                                                                                <p id="photoFileName" class="text-muted small mb-0 mt-1">{{ __('No file chosen') }}</p>
                                                                                <p class="text-muted small mb-0">{{ __('JPG, PNG, GIF or WebP — max 2 MB') }}</p>
                                                                            </div>
                                                                        </div>
                                                                        @error('photo')
                                                                            <div class="mt-1"><small class="text-danger">{{ $message }}</small></div>
                                                                        @enderror
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <button type="submit" class="btn btn-primary">
                                                                            <i class="ri-save-line me-1"></i>{{ __('Save Changes') }}
                                                                        </button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- ── Change Password Form ── -->
                                                    <div class="col-lg-6 col-xl-6 mb-4">
                                                        <div class="card border mb-0 h-100">
                                                            <div class="card-header">
                                                                <h4 class="card-title mb-0">{{ __('Change Password') }}</h4>
                                                            </div>
                                                            <div class="card-body">

                                                                {{-- Success flash --}}
                                                                @if (session('status') === 'password-updated')
                                                                    <div class="alert alert-success alert-dismissible fade show mb-3" role="alert">
                                                                        <i class="ri-checkbox-circle-line me-1"></i> {{ __('Password updated successfully.') }}
                                                                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                                                    </div>
                                                                @endif

                                                                {{-- Validation errors --}}
                                                                @if ($errors->updatePassword->any())
                                                                    <div class="alert alert-danger alert-dismissible fade show mb-3" role="alert">
                                                                        @foreach ($errors->updatePassword->all() as $error)
                                                                            <span class="d-block">{{ $error }}</span>
                                                                        @endforeach
                                                                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                                                    </div>
                                                                @endif

                                                                <form method="POST" action="{{ route('password.update') }}" id="changePasswordForm">
                                                                    @csrf
                                                                    @method('put')

                                                                    <div class="form-group mb-3">
                                                                        <label for="current_password" class="form-label">{{ __('Current Password') }}</label>
                                                                        <div class="input-group">
                                                                            <input class="form-control @if($errors->updatePassword->has('current_password')) is-invalid @endif"
                                                                                   type="password" id="current_password"
                                                                                   name="current_password"
                                                                                   autocomplete="current-password"
                                                                                   placeholder="{{ __('Enter current password') }}">
                                                                            <button class="btn btn-outline-secondary" type="button" id="toggleCurrentPwd" tabindex="-1"><i class="ri-eye-line" id="iconCurrentPwd"></i></button>
                                                                            @if($errors->updatePassword->has('current_password'))
                                                                                <div class="invalid-feedback"><small>{{ $errors->updatePassword->first('current_password') }}</small></div>
                                                                            @endif
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group mb-3">
                                                                        <label for="new_password" class="form-label">{{ __('New Password') }}</label>
                                                                        <div class="input-group">
                                                                            <input class="form-control @if($errors->updatePassword->has('password')) is-invalid @endif"
                                                                                   type="password" id="new_password"
                                                                                   name="password"
                                                                                   autocomplete="new-password"
                                                                                   placeholder="{{ __('Enter new password') }}">
                                                                            <button class="btn btn-outline-secondary" type="button" id="toggleNewPwd" tabindex="-1"><i class="ri-eye-line" id="iconNewPwd"></i></button>
                                                                            @if($errors->updatePassword->has('password'))
                                                                                <div class="invalid-feedback"><small>{{ $errors->updatePassword->first('password') }}</small></div>
                                                                            @endif
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group mb-3">
                                                                        <label for="password_confirmation" class="form-label">{{ __('Confirm New Password') }}</label>
                                                                        <div class="input-group">
                                                                            <input class="form-control @if($errors->updatePassword->has('password_confirmation')) is-invalid @endif"
                                                                                   type="password" id="confirm_new_password"
                                                                                   name="password_confirmation"
                                                                                   autocomplete="new-password"
                                                                                   placeholder="{{ __('Confirm new password') }}">
                                                                            <button class="btn btn-outline-secondary" type="button" id="toggleConfirmPwd" tabindex="-1"><i class="ri-eye-line" id="iconConfirmPwd"></i></button>
                                                                        </div>
                                                                        <small id="pwdMatchMsg" class="d-block mt-1"></small>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <button type="submit" class="btn btn-primary me-1">
                                                                            <i class="ri-lock-line me-1"></i>{{ __('Update Password') }}
                                                                        </button>
                                                                        <button type="reset" class="btn btn-secondary">{{ __('Cancel') }}</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- ── Delete Account ── -->
                                                    <div class="col-12 mt-2">
                                                        <div class="card border border-danger mb-0">
                                                            <div class="card-header bg-danger-subtle">
                                                                <h4 class="card-title mb-0 text-danger">
                                                                    <i class="ri-delete-bin-line me-1"></i>{{ __('Danger Zone') }}
                                                                </h4>
                                                            </div>
                                                            <div class="card-body">
                                                                <p class="text-muted mb-3">
                                                                    {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. This action cannot be undone.') }}
                                                                </p>

                                                                {{-- Errors --}}
                                                                @if ($errors->userDeletion->any())
                                                                    <div class="alert alert-danger alert-dismissible fade show mb-3" role="alert">
                                                                        @foreach ($errors->userDeletion->all() as $error)
                                                                            <span class="d-block">{{ $error }}</span>
                                                                        @endforeach
                                                                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                                                    </div>
                                                                @endif

                                                                <button type="button" class="btn btn-danger"
                                                                        data-bs-toggle="modal" data-bs-target="#deleteAccountModal">
                                                                    <i class="ri-delete-bin-line me-1"></i>{{ __('Delete My Account') }}
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Tab Content -->

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Profile Card -->

                    </div>
                </div>

                <!-- Footer -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col fs-13 text-muted text-center">
                                &copy; <script>document.write(new Date().getFullYear())</script>
                                &mdash; {{ config('app.name') }}
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
            <!-- End Page Content -->

        </div>
        <!-- End wrapper -->

        <!-- Delete Account Confirmation Modal -->
        <div class="modal fade" id="deleteAccountModal" tabindex="-1" aria-labelledby="deleteAccountModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-danger" id="deleteAccountModalLabel">
                            <i class="ri-alert-line me-1"></i>{{ __('Confirm Account Deletion') }}
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="POST" action="{{ route('profile.destroy') }}">
                        @csrf
                        @method('delete')
                        <div class="modal-body">
                            <p class="text-muted">
                                {{ __('Please enter your password to confirm you would like to permanently delete your account.') }}
                            </p>
                            <div class="form-group">
                                <label for="delete_password" class="form-label">{{ __('Password') }}</label>
                                <input class="form-control @if($errors->userDeletion->has('password')) is-invalid @endif"
                                       type="password" id="delete_password" name="password"
                                       placeholder="{{ __('Enter your password') }}" required>
                                @if($errors->userDeletion->has('password'))
                                    <div class="invalid-feedback">{{ $errors->userDeletion->first('password') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                            <button type="submit" class="btn btn-danger">
                                <i class="ri-delete-bin-line me-1"></i>{{ __('Yes, Delete My Account') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Vendor -->
        <script src="{{ asset('backend/assets/libs/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('backend/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('backend/assets/libs/simplebar/simplebar.min.js') }}"></script>
        <script src="{{ asset('backend/assets/libs/node-waves/waves.min.js') }}"></script>
        <script src="{{ asset('backend/assets/libs/feather-icons/feather.min.js') }}"></script>

        <!-- App js -->
        <script src="{{ asset('backend/assets/js/app.js') }}"></script>

        <!-- Toastr JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

        <!-- Toast notifications from session -->
        <script>
            toastr.options = {
                "closeButton": true,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "timeOut": "4000"
            };
            @if (session('message'))
                toastr["{{ session('alert-type', 'info') }}"]("{!! session('message') !!}");
            @endif
        </script>

        <script>
            // Live photo preview + filename feedback
            document.getElementById('photo_input').addEventListener('change', function () {
                const file = this.files[0];
                if (!file) return;
                // Show chosen filename
                document.getElementById('photoFileName').textContent = file.name;
                // Live preview in form and topbar header
                const reader = new FileReader();
                reader.onload = function (e) {
                    document.getElementById('formPhotoPreview').src    = e.target.result;
                    document.getElementById('profilePhotoPreview').src = e.target.result;
                };
                reader.readAsDataURL(file);
            });

            // Generic show/hide password toggle helper
            function makeToggle(btnId, inputId, iconId) {
                document.getElementById(btnId).addEventListener('click', function () {
                    const input = document.getElementById(inputId);
                    const icon  = document.getElementById(iconId);
                    if (input.type === 'password') {
                        input.type = 'text';
                        icon.classList.replace('ri-eye-line', 'ri-eye-off-line');
                    } else {
                        input.type = 'password';
                        icon.classList.replace('ri-eye-off-line', 'ri-eye-line');
                    }
                });
            }
            makeToggle('toggleCurrentPwd', 'current_password',  'iconCurrentPwd');
            makeToggle('toggleNewPwd',     'new_password',       'iconNewPwd');
            makeToggle('toggleConfirmPwd', 'confirm_new_password','iconConfirmPwd');

            // Real-time password match feedback
            function checkPwdMatch() {
                const newPwd  = document.getElementById('new_password').value;
                const confirm = document.getElementById('confirm_new_password').value;
                const msg     = document.getElementById('pwdMatchMsg');
                if (!confirm.length) { msg.textContent = ''; return; }
                if (newPwd === confirm) {
                    msg.textContent = '{{ __("Passwords match") }}';
                    msg.className   = 'd-block mt-1 text-success';
                } else {
                    msg.textContent = '{{ __("Passwords do not match") }}';
                    msg.className   = 'd-block mt-1 text-danger';
                }
            }
            document.getElementById('new_password').addEventListener('input', checkPwdMatch);
            document.getElementById('confirm_new_password').addEventListener('input', checkPwdMatch);

            // Auto-open delete modal if there were deletion validation errors
            @if($errors->userDeletion->isNotEmpty())
                var deleteModal = new bootstrap.Modal(document.getElementById('deleteAccountModal'));
                deleteModal.show();
            @endif
        </script>
    </body>
</html>

