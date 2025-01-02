<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <div class="navbar-brand-box">
                <a href="{{ route('home') }}" class="logo logo-light">
                    <span class="logo-sm">
                        <img class="lazyload" src="{{ asset(config('app.favicon_icon')) }}" alt="{{config('app.name')}}" height="30">
                    </span>
                    <span class="logo-lg">
                        <img class="lazyload" src="{{ asset(config('app.app_light_logo')) }}" alt="{{config('app.name')}}" height="60">
                    </span>
                </a>

                <a href="{{ route('home') }}" class="logo logo-dark">
                    <span class="logo-sm">
                        <img class="lazyload" src="{{ asset(config('app.favicon_icon')) }}" alt="{{config('app.name')}}" height="30">
                    </span>
                    <span class="logo-lg">
                        <img class="lazyload" src="{{ asset(config('app.app_light_logo')) }}" alt="{{config('app.name')}}" height="60">
                    </span>
                </a>
            </div>
            <button type="button" class="btn btn-sm px-3 font-size-16 header-item" id="vertical-menu-btn">
                <i class="fa fa-fw fa-bars"></i>
            </button>
        </div>
        <div class="d-flex">
            <div class="dropdown ">
                <div class="dropdown d-none d-sm-inline-block">
                    <button type="button" class="btn header-item" id="mode-setting-btn">
                        <i data-feather="moon" class="icon-lg layout-mode-dark"></i>
                        <i data-feather="sun" class="icon-lg layout-mode-light"></i>
                    </button>
                </div>
                <div class="dropdown d-inline-block">
                    <button type="button" class="btn header-item bg-soft-light " id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        @if (auth()->user()->profile_url != null)
                            <img data-src="{{ auth()->user()->profile_url }}" alt="" class="rounded-circle header-profile-user image-object-cover lazyload">
                        @else
                            <h1 class="rounded-circle header-profile-user font-size-18 px-2 pt-2 text-white d-inline-block font-bold">{{ auth()->user()->logo_name }}</h1>
                        @endif
                        <span class="d-none d-xl-inline-block ms-1 fw-medium">{{ auth()->user()->name }}</span>
                        <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end">
                        <a class="dropdown-item" href="{{ route('admin.profile') }}">
                            <i class="mdi mdi-face-profile font-size-16 align-middle me-1"></i>
                            {{ __('system.profile.menu') }}
                        </a>
                        <div class="dropdown-divider"></div>

                        <a class="dropdown-item" role="button" onclick="event.preventDefault(); document.getElementById('logout-form').click();"><i
                                class="mdi mdi-logout font-size-16 align-middle me-1"></i>
                            {{ __('auth.sign_out') }}
                        </a>
                        <form autocomplete="off" action="{{ route('logout') }}" method="POST" class="d-none data-confirm" data-confirm-message="{{ __('system.fields.logout') }}"
                              data-confirm-title=" {{ __('auth.sign_out') }}">
                            <button id="logout-form" type="submit"></button>
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="vertical-menu">
    <div data-simplebar class="h-100">
        <div id="sidebar-menu">
            <ul class="metismenu list-unstyled" id="side-menu">
                <li>
                    <a href="{{ route('home') }}" class="{{ Request::is('home') ? 'active' : '' }}">
                        <i class="fas fa-home"></i>
                        <span data-key="t-dashboard">{{ __('system.dashboard.menu') }}</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.categories.index') }}">
                        <i class="fas fa-list-alt font-size-18"></i>
                        <span data-key="t-{{ __('system.categories.menu') }}">{{ __('system.categories.menu') }}</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.notes.index') }}">
                        <i class="fas fa-blog font-size-18"></i>
                        <span data-key="t-{{ __('system.notes.menu') }}">{{ __('system.notes.menu') }}</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.environment.setting') }}">
                        <i class="fas fa-cog font-size-18"></i>
                        <span data-key="t-{{ __('system.environment.menu') }}">{{ __('system.environment.menu') }}</span>
                    </a>
                </li>
                <li>
                    <a onclick="event.preventDefault(); document.getElementById('logout-form').click();" href="javacript:void(0)">
                        <i class="fas fa-power-off font-size-18"></i>
                        <form autocomplete="off" action="{{ route('logout') }}" method="POST" class="d-none data-confirm" data-confirm-message="{{ __('system.fields.logout') }}"
                              data-confirm-title=" {{ __('auth.sign_out') }}">
                            <button id="logout-form" type="submit"></button>
                            @csrf
                        </form>
                        <span data-key="t-{{ __('auth.sign_out') }}">{{ __('auth.sign_out') }}</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
