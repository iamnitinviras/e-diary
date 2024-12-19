@extends('layouts.app')
@section('title', __('system.dashboard.menu'))
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">{{ __('system.dashboard.menu') }}</h4>
            </div>
        </div>
    </div>
    <div class="row">
        @hasanyrole('Super-Admin')
        @php

            $show_admin_boarding = false;
            $show_smtp = false;
            $show_system = false;
            if (empty(config('mail.from.address')) || empty(config('mail.mailers.smtp.host')) || empty(config('mail.mailers.smtp.port')) || empty(config('mail.mailers.smtp.encryption')) || empty(config('mail.mailers.smtp.username')) || empty(config('mail.mailers.smtp.password'))) {
                $show_admin_boarding = true;
                $show_smtp = true;
            }

            if (empty(config('app.timezone')) || empty(config('app.date_time_format')) || empty(config('app.date_format')) || (empty(config('app.favicon_icon')) || config('app.favicon_icon') == '/assets/images/defualt_logo/logo.png') || (empty(config('app.logo')) || config('app.logo') == '/assets/images/defualt_logo/logo.png')) {
                $show_admin_boarding = true;
                $show_system = true;
            }

            if (!extension_loaded('imagick')){
                $show_admin_boarding = true;
            }
        @endphp
        @if ($show_admin_boarding)
            <div class="col-md-12">
                <div class="card card-h-100">
                    <div class="card-header">
                        <h5 class="mb-0">{{ __('system.fields.setting_reconfigure') }}</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">

                            @if (!extension_loaded('imagick'))
                                <div class="col-md-6 mb-3">
                                    <div class="alert alert-info alert-dismissible alert-label-icon label-arrow fade show mb-0" role="alert">
                                        <a href="https://github.com/Imagick/imagick" target="_blank">
                                            <i class="mdi mdi-qrcode-scan label-icon"></i>
                                            {{ __('system.fields.imagick_install') }} Imagick PHP Extension
                                        </a>
                                    </div>
                                </div>
                            @endif

                            @if ($show_smtp)
                                <div class="col-md-6 mb-3">
                                    <div class="alert alert-info alert-dismissible alert-label-icon label-arrow fade show mb-0" role="alert">
                                        <a href="{{ route('admin.environment.setting.email') }}">
                                            <i class="mdi mdi-email label-icon"></i>
                                            {{ __('system.dashboard.missing_smpt') }}
                                        </a>
                                    </div>
                                </div>
                            @endif

                            @if ($show_system)
                                <div class="col-md-6 mb-3">
                                    <div class="alert alert-info alert-dismissible alert-label-icon label-arrow fade show mb-0" role="alert">
                                        <a href="{{ route('admin.environment.setting') }}">
                                            <i class="mdi mdi-alert-circle-outline label-icon"></i>
                                            {{ __('system.dashboard.missing_system_details') }}
                                        </a>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endif
        @endhasanyrole

        <div class="col-xl-3 col-md-6">
            <div class="card card-h-100">
                <div class="card-body">
                    <a href="{{ route('admin.categories.index') }}">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1">
                                <span class="text-muted mb-3 lh-1 d-block text-truncate">{{ __('system.dashboard.total_categories') }}</span>
                                <h4 class="mb-3">
                                    <span class="counter-value" data-target="{{ $total_categories ?? 0 }}">{{$total_categories}}</span>
                                </h4>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>


        <div class="col-xl-3 col-md-6">
            <div class="card card-h-100">
                <div class="card-body">
                    <a href="{{ route('admin.notes.index') }}">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1">
                                <span class="text-muted mb-3 lh-1 d-block text-truncate">{{ __('system.dashboard.total_notes') }}</span>
                                <h4 class="mb-3">
                                    <span class="counter-value" data-target="{{ $total_notes ?? 0 }}">{{$total_notes}}</span>
                                </h4>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card card-h-100">
                <div class="card-body">
                    <a href="{{ route('admin.contact-request.index') }}">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1">
                                <span class="text-muted mb-3 lh-1 d-block text-truncate">{{ __('system.dashboard.contact_us') }}</span>
                                <h4 class="mb-3">
                                    <span class="counter-value" data-target="{{ $total_contact_request ?? 0 }}">{{$total_contact_request}}</span>
                                </h4>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
