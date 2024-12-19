@extends('theme.app')
@section('seo_title',trans('system.privacy_policy.privacy_policy'))
@section('seo_description',config('app.seo_description'))
@section('seo_og_image',asset(config('app.seo_image')))
@section('content')
    <section id="content_main" class="clearfix lara_spost">
        <div class="container">
            <div class="row main_content">
                <div class="col-12">
                    <h2>{{ __('system.privacy_policy.privacy_policy') }}</h2>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row g-4 justify-content-between">
                <div class="col-12 col-lg-12">
                    {!! $privacyPolicy->local_description !!}
                </div>
            </div>
        </div>
        <div class="mb-120 d-block"></div>
    </section>
@endsection