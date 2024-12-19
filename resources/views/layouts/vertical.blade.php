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
                @hasanyrole('Super-Admin')
                <div class="dropdown d-inline-block">
                    <a href="{{ route('/') }}" target="_blank" class="btn">
                        <i class="font-size-16 fas fa-external-link-alt ms-2 " aria-hidden="true"></i>
                    </a>
                </div>
                @else
                    @hasanyrole('vendor')
                    @if(Session::has('super_admin_id'))
                        <a href="{{route('admin.vendors.vendorLogout')}}" target="_self" class="btn btn-danger">
                            <i class="font-size-16 fas fa-times-circle" aria-hidden="true"></i> {{trans('system.fields.switch_to_admin')}}
                        </a>
                    @endif
                    @endhasanyrole
                @endhasanyrole

                    <div class="dropdown d-none d-sm-inline-block">
                        <button type="button" class="btn header-item" id="mode-setting-btn">
                            <i data-feather="moon" class="icon-lg layout-mode-dark"></i>
                            <i data-feather="sun" class="icon-lg layout-mode-light"></i>
                        </button>
                    </div>

                    @if (!isset($languages_array))
                        @php($languages_array = getAllLanguages(true))
                    @endif

                    @if(isset($languages_array) && count($languages_array)>0)
                        <div class="dropdown d-inline-block ms-1">
                            <button type="button" class="btn header-item" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <h1 class="font-size-16 px-2 pt-2 header-item d-inline-block h-auto">
                                    <i class="fas fa-language font-size-18"></i>
                                </h1>
                            </button>
                            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-end">
                                <div class="p-2">


                                    @foreach ($languages_array as $key => $language)
                                        <a class="dropdown-icon-item  @if (App::currentLocale() == $key) bg-light-gray  disabled @endif" @if (App::currentLocale() != $key) role="button"
                                           onclick="event.preventDefault(); document.getElementById('user_set_default_language{{ $key }}').submit();" @endif title="Set as Default">
                                            <div class="row g-0">
                                                <div class="col-12  text-start overflow-hidden">
                                                    <h6 class="px-2">{{ $language }}</h6>
                                                </div>
                                            </div>
                                        </a>
                                        @if (App::currentLocale() != $key)
                                            {!! html()->form('put', route('admin.default.language', ['language' => $key]))
                                             ->class('d-none')
                                             ->id('user_set_default_language' . $key)
                                             ->attribute('autocomplete', 'off')
                                             ->open() !!}
                                            <input type="hidden" name='back' value="{{ request()->fullurl() }}">
                                            {!! html()->closeModelForm() !!}
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif

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
            @include('layouts.sidebar')
        </div>
    </div>
</div>
