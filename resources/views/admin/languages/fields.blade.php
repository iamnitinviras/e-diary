<div class="row">


    <div class=" col-md-4">
        @php($lbl_category_name = __('system.fields.language_name'))

        <div class="mb-3 form-group @error('name') has-danger @enderror ">
            <label class="form-label" for="name">{{ $lbl_category_name }} <span class="text-danger">*</span></label>
            {!! html()->text('name')
            ->class('form-control')
            ->id('name')
            ->attribute('placeholder',$lbl_category_name)
            ->required()
            ->attribute('maxlength', 50)
            ->attribute('minlength', 2)
            ->attribute('autocomplete', 'off')
            ->attribute('data-pristine-required-message', __('validation.required', ['attribute' => strtolower($lbl_category_name)]))
            ->attribute('data-pristine-minlength-message', __('validation.custom.invalid', ['attribute' => strtolower($lbl_category_name)])) !!}

            @error('name')
                <div class="pristine-error text-help">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class=" col-md-4">
        @php($lbl_direction = __('system.fields.direction'))

        <div class="mb-3 form-group @error('name') has-danger @enderror ">
            <label class="form-label" for="name">{{ $lbl_direction }} <span class="text-danger">*</span></label>
            {!! html()->select('direction', ['ltr' => 'LTR', 'rtl' => 'RTL'], 'ltr')
            ->class('form-control form-select')
            ->id('direction')
            ->required()
            ->attribute('data-pristine-required-message', __('validation.required', ['attribute' => strtolower($lbl_direction)])) !!}

            @error('name')
            <div class="pristine-error text-help">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>
