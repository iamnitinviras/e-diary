<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-3 ">
                @php($lbl_app_name = __('system.fields.app_name'))
                <div class="mb-3 form-group @error('app_name') has-danger @enderror">
                    <label class="form-label" for="app_name">{{ $lbl_app_name }} <span class="text-danger">*</span></label>
                    {!! html()->text('app_name', config('app.name'))
                    ->class('form-control')
                    ->id('app_name')
                    ->required()
                    ->attribute('placeholder', $lbl_app_name)
                    ->attribute('maxlength', 50)
                    ->attribute('minlength', 1)
                    ->attribute('data-pristine-required-message', __('validation.required', ['attribute' => strtolower($lbl_app_name)]))
                    ->attribute('data-pristine-pattern-message', __('validation.custom.invalid', ['attribute' => strtolower($lbl_app_name)]))
                    ->attribute('data-pristine-minlength-message', __('validation.custom.invalid', ['attribute' => strtolower($lbl_app_name)])) !!}

                    @error('app_name')
                    <div class="pristine-error text-help">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-3 ">
                @php($lbl_support_email = __('system.fields.support_email'))
                <div class="mb-3 form-group @error('support_email') has-danger @enderror">
                    <label class="form-label" for="app_name">{{ $lbl_support_email }} <span class="text-danger">*</span></label>
                    {!! html()->email('support_email', config('app.support_email'))
                    ->class('form-control')
                    ->id('support_email')
                    ->attribute('placeholder', $lbl_support_email)
                    ->required()
                    ->attribute('data-pristine-required-message', __('validation.required', ['attribute' => strtolower($lbl_support_email)])) !!}
                    @error('support_email')
                    <div class="pristine-error text-help">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-3 ">
                @php($lbl_support_phone = __('system.fields.support_phone'))
                <div class="mb-3 form-group @error('support_phone') has-danger @enderror">
                    <label class="form-label" for="support_phone">{{ $lbl_support_phone }} <span class="text-danger">*</span></label>
                    {!! html()->text('support_phone', config('app.support_phone'))
                    ->class('form-control')
                    ->id('support_phone')
                    ->attribute('placeholder', $lbl_support_phone)
                    ->required()
                    ->attribute('data-pristine-required-message', __('validation.required', ['attribute' => strtolower($lbl_support_phone)])) !!}
                    @error('support_email')
                    <div class="pristine-error text-help">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">

            <div class="col-lg-6 mb-2">
                <div class="form-group">
                    <label class="text-label">{{ trans('system.frontend.footer_text') }} <span class="text-danger">*</span></label>
                    <textarea rows="5" data-pristine-required-message="{{__('validation.required', ['attribute' => strtolower(trans('system.frontend.footer_text'))])}}" type="text" name="footer_text" class="form-control" placeholder="{{ trans('system.frontend.footer_text') }}">{{ old('footer_text',config('app.footer_text')) }}</textarea>
                </div>
            </div>
            <div class="col-lg-6 mb-2">
                <div class="form-group">
                    <label class="text-label">{{ trans('system.frontend.about_author') }} <span class="text-danger">*</span></label>
                    <textarea rows="5" data-pristine-required-message="{{__('validation.required', ['attribute' => strtolower(trans('system.frontend.about_author'))])}}" type="text" name="about_author" class="form-control" placeholder="{{ trans('system.frontend.about_author') }}">{{ old('about_author',config('app.about_author')) }}</textarea>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h5 class="mb-0">{{ __('system.fields.app_date_time_settings') }}</h5>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-3">
                @php($lbl_app_timezone = __('system.fields.app_timezone'))
                <div class="mb-3 form-group @error('app_timezone') has-danger @enderror">
                    <label class="form-label" for="input-app_timezone">{{ $lbl_app_timezone }} <span class="text-danger">*</span></label>
                    {!! html()->select('app_timezone', \App\Http\Controllers\Admin\EnvSettingController::GetTimeZones(), config('app.timezone'))
                    ->class('form-select choice-picker')
                    ->id('input-app_timezone')
                    ->required()
                    ->attribute('data-remove_attr', 'data-type') !!}
                    @error('app_timezone')
                    <div class="pristine-error text-help">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-3">
                @php($lbl_app_date_time_format = __('system.fields.app_date_time_format'))

                <div class="mb-3 form-group @error('app_date_time_format') has-danger @enderror">
                    <label class="form-label" for="input-app_date_time_format">{{ $lbl_app_date_time_format }} <span class="text-danger">*</span></label>
                    {!! html()->select('app_date_time_format', App\Http\Controllers\Admin\EnvSettingController::GetDateFormat(), config('app.date_time_format'))
                    ->class('form-control form-select')
                    ->id('input-app_date_time_format')
                    ->required() !!}
                    @error('app_date_time_format')
                    <div class="pristine-error text-help">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <div class="text-left">
            <h5>{{ __('system.fields.social_media') }}</h5>
        </div>
    </div>
    <div class="card-body">
        <div class="row align-items-stretch">
            <div class="col-md-3">
                @php($lbl_facebook_url = __('system.fields.facebook'))
                <div class="mb-3 form-group @error('facebook_url') has-danger @enderror">
                    <label class="form-label" for="facebook_url">{{ $lbl_facebook_url }}</label>
                    {!! html()->text('facebook_url', config('app.facebook_url'))
                    ->class('form-control')
                    ->id('facebook_url')
                    ->attribute('placeholder', $lbl_facebook_url)
                    ->attribute('required', false) !!}
                </div>
                @error('facebook_url')
                <div class="pristine-error text-help">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-3">
                @php($lbl_instagram_url = __('system.fields.instagram'))
                <div class="mb-3 form-group @error('instagram_url') has-danger @enderror">
                    <label class="form-label" for="instagram_url">{{ $lbl_instagram_url }}</label>
                    {!! html()->text('instagram_url', config('app.instagram_url'))
                    ->class('form-control')
                    ->id('instagram_url')
                    ->attribute('placeholder', $lbl_instagram_url)
                    ->attribute('required', false) !!}
                </div>
                @error('instagram_url')
                <div class="pristine-error text-help">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-3">
                @php($lbl_twitter_url = __('system.fields.twitter'))
                <div class="mb-3 form-group @error('twitter_url') has-danger @enderror">
                    <label class="form-label" for="twitter_url">{{ $lbl_twitter_url }}</label>
                    {!! html()->text('twitter_url', config('app.twitter_url'))
                    ->class('form-control')
                    ->id('twitter_url')
                    ->attribute('placeholder', $lbl_twitter_url)
                    ->required(false) !!}
                </div>
                @error('twitter_url')
                <div class="pristine-error text-help">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-3">
                @php($lbl_youtube_url = __('system.fields.youtube'))
                <div class="mb-3 form-group @error('youtube_url') has-danger @enderror">
                    <label class="form-label" for="youtube_url">{{ $lbl_youtube_url }}</label>
                    {!! html()->text('youtube_url', config('app.youtube_url'))
                    ->class('form-control')
                    ->id('youtube_url')
                    ->attribute('placeholder', $lbl_youtube_url)
                    ->required(false) !!}
                </div>
                @error('youtube_url')
                <div class="pristine-error text-help">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-3">
                @php($lbl_linkedin_url = __('system.fields.linkedin'))
                <div class="mb-3 form-group @error('linkedin_url') has-danger @enderror">
                    <label class="form-label" for="linkedin_url">{{ $lbl_linkedin_url }}</label>
                    {!! html()->text('linkedin_url', config('app.linkedin_url'))
                    ->class('form-control')
                    ->id('linkedin_url')
                    ->attribute('placeholder', $lbl_linkedin_url)
                    ->required(false) !!}
                </div>
                @error('linkedin_url')
                <div class="pristine-error text-help">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>
</div>


<div class="card">
    <div class="card-header">
        <h5 class="mb-0">{{ __('system.fields.media') }}</h5>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-4 form-group">
                @php($lbl_app_dark_logo= __('system.fields.app_dark_logo'))
                <label class="form-label d-block" for="app_name">{{ $lbl_app_dark_logo }} <span class="text-danger">*</span></label>
                <div class="d-flex align-items-center ">
                    <div class='mx-3 '>
                        <img src="{{ asset(config('app.app_dark_logo')) }}" alt="" class="preview-image-dark avater-120-contain">
                    </div>
                </div>

                <input type="file"
                       name="app_dark_logo"
                       id="app_dark_logo" class="d-none my-preview" accept="image/*"
                       data-pristine-accept-message="{{ __('validation.enum', ['attribute' => strtolower($lbl_app_dark_logo)]) }}"
                       data-preview='.preview-image-dark'>

                <label for="app_dark_logo" class="mb-0">
                    <div for="profile-image" class="btn btn-outline-primary waves-effect waves-light my-2 mdi mdi-upload ">
                        <span class="d-none d-lg-inline">{{ $lbl_app_dark_logo }}</span>
                    </div>
                </label>
                @error('app_dark_logo')
                    <div class="pristine-error text-help px-3">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-4 form-group">
                @php($lbl_app_light_logo= __('system.fields.app_light_logo'))
                <label class="form-label d-block" for="app_name">{{ $lbl_app_light_logo }} <span class="text-danger">*</span></label>
                <div class="d-flex align-items-center ">
                    <div class='mx-3 '>
                        <img src="{{ asset(config('app.app_light_logo')) }}" alt="" class=" preview-image avater-120-contain">
                    </div>
                </div>

                <input type="file"
                       name="app_light_logo"
                       id="app_light_logo" class="d-none my-preview" accept="image/*"
                       data-pristine-accept-message="{{ __('validation.enum', ['attribute' => strtolower($lbl_app_light_logo)]) }}"
                       data-preview='.preview-image'>

                <label for="app_light_logo" class="mb-0">
                    <div for="profile-image" class="btn btn-outline-primary waves-effect waves-light my-2 mdi mdi-upload ">
                        <span class="d-none d-lg-inline">{{ $lbl_app_light_logo }}</span>
                    </div>
                </label>
                @error('app_light_logo')
                <div class="pristine-error text-help px-3">{{ $message }}</div>
                @enderror
            </div>


            <div class="col-md-4 form-group">
                @php($lbl_app_favicon_logo = __('system.fields.app_favicon_logo'))
                <label class="form-label d-block" for="app_name">{{ $lbl_app_favicon_logo }} <span class="text-danger">*</span></label>
                <div class="d-flex align-items-center ">
                    <div class='mx-3 '>
                        <img src="{{ asset(config('app.favicon_icon')) }}" alt="" class="avatar-xl  preview-image_21 avater-120-contain">
                    </div>
                </div>
                <input type="file" name="app_favicon_logo" id="app_favicon_logo" class="d-none my-preview" accept="image/*"
                       data-pristine-accept-message="{{ __('validation.enum', ['attribute' => strtolower($lbl_app_favicon_logo)]) }}" data-preview='.preview-image_21'>
                <label for="app_favicon_logo" class="mb-0">
                    <div for="profile-image" class="btn btn-outline-primary waves-effect waves-light my-2 mdi mdi-upload ">
                        <span class="d-none d-lg-inline"> {{ $lbl_app_favicon_logo }} </span>
                    </div>
                </label>
                @error('app_favicon_logo')
                <div class="pristine-error text-help px-3">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>
</div>








