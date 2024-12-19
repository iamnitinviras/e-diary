@php($languages_array = getAllLanguages(true))
@extends('layouts.app', ['languages_array' => $languages_array])
@section('title', __('system.environment.seo'))
@section('content')
    <div class="row">

        <div class="col-xl-12 col-sm-12">
            <div class="card">
                <div class="card-header">

                    <div class="row">
                        <div class="col-md-6 col-xl-6">
                            <h4 class="card-title">{{ __('system.environment.seo') }}</h4>
                            <div class="page-title-box pb-0 d-sm-flex">
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('system.dashboard.menu') }}</a></li>
                                        <li class="breadcrumb-item active">{{ __('system.environment.seo') }}</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <form autocomplete="off" novalidate="" action="{{ route('admin.environment.setting.seo.update') }}" id="pristine-valid" method="post" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ url('environment/setting') }}">
                                            <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                            <span class="d-none d-sm-block">{{ __('system.environment.application') }}
                                                {{ __('system.environment.title') }}</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ url('environment/setting/email') }}">
                                            <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                            <span class="d-none d-sm-block">{{ __('system.environment.email') }}</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('admin.frontend.admin') }}">
                                            <span class="d-block d-sm-none"><i class="fa fa-globe"></i></span>
                                            <span class="d-none d-sm-block">{{ __('system.dashboard.frontend') }}</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link @if(request()->route()->getName()=='admin.environment.recaptcha') active @endif" href="{{ url('environment/setting/recaptcha') }}">
                                            <span class="d-block d-sm-none"><i class="fa fa-code"></i></span>
                                            <span class="d-none d-sm-block">{{ __('system.environment.recaptcha') }}</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link active" href="{{ url('environment/setting/seo') }}">
                                            <span class="d-block d-sm-none"><i class="fa fa-code"></i></span>
                                            <span class="d-none d-sm-block">{{ __('system.environment.seo') }}</span>
                                        </a>
                                    </li>
                                </ul>
                                @method('put')
                                @csrf
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-4 mb-2">
                                                <div class="form-group">
                                                    <label class="text-label">{{ trans('system.environment.seo_keyword') }}</label>
                                                    <input  value="{{ old('seo_keyword',config('app.seo_keyword'))}}" type="text" name="seo_keyword" class="form-control" placeholder="{{ trans('system.environment.seo_keyword') }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 mb-2">
                                                <div class="form-group">
                                                    <label class="text-label">{{ trans('system.environment.seo_description') }}</label>
                                                    <textarea  rows="2" type="text" name="seo_description" class="form-control" placeholder="{{ trans('system.environment.seo_description') }}">{{ old('seo_description',config('app.seo_description')) }}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-2">
                                                @php($lbl_seo_image = __('system.fields.seo_image'))
                                                <div class="form-group">
                                                    <label class="text-label">{{ trans('system.environment.seo_image') }}</label>
                                                    <div class="d-flex align-items-center ">
                                                        <img src="{{ asset(config('app.seo_image')) }}" class="avatar-xl  preview-image_21 avater-120-contain">
                                                    </div>
                                                    <input type="file" name="seo_image" id="seo_image" class="my-preview mt-2 form-control" accept="image/*" data-pristine-accept-message="{{ __('validation.enum', ['attribute' => strtolower($lbl_seo_image)]) }}" data-preview='.preview-image_21'>
                                                    @error('seo_image')
                                                        <div class="pristine-error text-help px-3">{{ $lbl_seo_image }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 mb-2">
                                                <div class="form-group">
                                                    <label class="text-label">{{ trans('system.environment.analytics_code') }}</label>
                                                    <textarea rows="10" type="text" name="analytics_code" class="form-control" placeholder="{{ trans('system.environment.analytics_code') }}">{{ old('analytics_code',$analytics_code??"") }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="card-footer bg-transparent border-top text-muted">
                        <div class="row">
                            <div class="col-12 mt-1">
                                <button class="btn btn-primary" type="submit">{{ __('system.crud.save') }}</button>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- end card -->
            </div>
        </div>
    </div>
@endsection
