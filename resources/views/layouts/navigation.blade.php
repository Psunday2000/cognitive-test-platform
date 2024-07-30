<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
    <div class="container">
        <!-- Logo and Navbar Toggle -->
        <a class="navbar-brand" href="{{ route('dashboard') }}">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="d-inline-block align-top" height="30"> <strong><span>{{config('app.name')}}</span></strong>
        </a>

        <!-- Navbar Toggle Button for Mobile View -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        @auth
            <!-- Navbar Links -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <!-- Dashboard Link -->
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a>
                </li>

                @if (Auth::user()->role_id === 2)
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('tests.index') ? 'active' : '' }}" href="{{ route('tests.index') }}">{{ __('Take Test') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('tests.eligible_jobs') ? 'active' : '' }}" href="{{ route('tests.eligible_jobs') }}">{{ __('Job Eligibility') }}</a>
                    </li>
                @endif

                @if (Auth::user()->role_id === 1)
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('admin.cognitive-tests.index') ? 'active' : '' }}" href="{{ route('admin.cognitive-tests.index') }}">{{ __('Tests') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('admin.jobs.index') ? 'active' : '' }}" href="{{ route('admin.jobs.index') }}">{{ __('Jobs') }}</a>
                    </li>
                @endif
            </ul>

            <!-- User Dropdown -->
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                        <li><a class="dropdown-item" href="{{ route('profile.edit') }}">{{ __('Profile') }}</a></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}" class="m-0">
                                @csrf
                                <button type="submit" class="dropdown-item" onclick="event.preventDefault(); this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </button>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        @endauth
    </div>
</nav>
