@extends('theme.app')
@section('seo_title',trans('system.frontend.contact_us'))
@section('seo_description',__('system.frontend.contact_description'))
@section('seo_og_image',asset(config('app.seo_image')))
@section('content')
    <section id="content_main" class="clearfix lara_spost">
        <div class="container">
            @include('flash')
            <div class="row main_content">
                <div class="col-md-12">
                    <h2>{{ __('system.frontend.contact_us') }}</h2>
                </div>
            </div>
            <div class="row main_content">
                <!-- Contact Side Info-->
                <div class="col-12 col-lg-5 col-xl-4">
                    <div class="contact-side-info mb-4 mb-md-0">
                        <p class="mb-4">{{ __('system.frontend.contact_description') }}</p>
                        <div class="contact-mini-card-wrapper">
                            <!-- Contact Mini Card-->
                            @if(config('app.support_email')!=null)
                                <div class="contact-mini-card">
                                    <div class="contact-mini-card-icon">{{trans('system.fields.email')}}</div>
                                    <p><a href="mailto:{{config('app.support_email')}}">{{config('app.support_email')}}</a></p>
                                </div>
                            @endif

                            @if(config('app.support_phone')!=null)
                                <div class="contact-mini-card">
                                    <div class="contact-mini-card-icon">{{trans('system.fields.phone_number')}}</div>
                                    <p><a href="tel:{{config('app.support_phone')}}">{{config('app.support_phone')}}</a></p>
                                </div>
                            @endif

                        </div>
                    </div>
                </div>
                <!-- Contact Form-->
                <div class="col-12 col-lg-7">
                    <div class="contact-form">
                        <form id="contactForm" action="{{ route('contactUs') }}" method="post">
                            @csrf
                            <div class="row mb-2">
                                <div class="col-12 col-lg-6">
                                    <label class="form-label" for="name">{{ __('system.fields.name') }}</label>
                                    <input class="form-control" placeholder="{{ __('system.fields.name') }}" id="name" type="text" value="" name="name" required>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <label class="form-label" for="email">{{ __('system.fields.email') }}</label>
                                    <input autocomplete="off" maxlength="50" class="form-control" id="emailAddress" name="email" type="email" placeholder="{{ __('system.fields.email') }}"/>
                                    @if ($errors->has('email'))
                                        <span class="text-danger custom-error">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <label class="form-label" for="message">{{ __('system.fields.message') }}</label>
                                    <textarea class="form-control" id="message" name="message" type="text" placeholder="{{ __('system.fields.message') }}" style="height: 10rem;" required></textarea>
                                    @if ($errors->has('message'))
                                        <span class="text-danger custom-error">{{ $errors->first('message') }}</span>
                                    @endif
                                </div>
                                @if(config('app.enable_captcha_on_contact_us')==true && config('app.enable_captcha')==true)
                                    <div class="col-12 mb-30 mt-3">
                                        {!! NoCaptcha::renderJs() !!}
                                        {!! NoCaptcha::display() !!}
                                    </div>
                                @endif
                                <div class="col-md-12 mt-3 text-center">
                                    <button class="btn btn-secondary w-100" type="submit">{{trans('system.crud.submit')}}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
