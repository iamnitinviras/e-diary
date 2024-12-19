<div class="row">
    <div class="col-md-9">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        @php($lbl_name = __('system.fields.title'))
                        <div
                            class="mb-3 form-group @error('title') has-danger @enderror">
                            <label class="form-label" for="title">{{ $lbl_name }} <span class="text-danger">*</span></label>
                            {!! html()->text('title')
                            ->class('form-control')
                            ->id('title')
                            ->attribute('autocomplete', 'off')
                            ->attribute('placeholder', $lbl_name)
                            ->required()
                            ->attribute('maxlength', 150)
                            ->attribute('minlength', 2)
                            ->attribute('data-pristine-required-message', __('validation.required', ['attribute' => strtolower($lbl_name)]))
                            ->attribute('data-pristine-minlength-message', __('validation.custom.invalid', ['attribute' => strtolower($lbl_name)])) !!}
                            @error('title')
                            <div class="pristine-error text-help">{{ $message }}</div>
                            @enderror

                        </div>
                    </div>
                    <div class="col-md-12">
                        @php($lbl_food_description = __('system.notes.description'))
                        <div class="mb-3 form-group @error('description') has-danger @enderror">
                            <label class="form-label" for="input-address">{{ $lbl_food_description }}</label>
                            {!! html()->textarea('description')
                             ->class('form-control editor')
                             ->id('ckeditor-classic')
                             ->placeholder($lbl_food_description)
                             ->rows(5)
                             ->required()
                             ->attribute('data-pristine-required-message', __('validation.required', ['attribute' => strtolower($lbl_food_description)]))
                             ->attribute('data-pristine-minlength-message', __('validation.custom.invalid', ['attribute' => strtolower($lbl_food_description)])) !!}
                        </div>
                        @error('description')
                        <div class="pristine-error text-help">{{ $message }}</div>
                        @enderror
                    </div>
                    <!-- Tab panes -->
                    @if (isset($edit))
                        <input type="hidden" name="action" value="edit">
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    @php($lbl_category = ucwords(__('system.categories.title')))
                    <div class="col-md-12 form-group">
                        <div class="form-group mb-3 @error('category_id') has-danger @enderror">
                            <label class="form-label" for="category_id">{{ $lbl_category }} <span class="text-danger">*</span></label>
                            <select name="category_id" id="category_id" class="form-control form-select" data-pristine-required
                                    data-pristine-required-message="{{ __('validation.required', ['attribute' => strtolower($lbl_category)]) }}">
                                <option class="d-none" value="">{{ __('system.crud.select') . ' ' . __('system.categories.title') }}</option>
                                @foreach ($categories as $index => $category)
                                    <option value="{{ $category->id }}" {{ old('category_id', $blog->category_id ?? '') == $category->id ? 'selected' : '' }}>{{ $category->category_name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                            <div class="pristine-error text-help">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>


                    @php($lbl_category = ucwords(__('system.fields.status')))
                    <div class="col-md-12 form-group">
                        <div class="form-group mb-3 @error('status') has-danger @enderror">
                            <label class="form-label" for="blog_status">{{ $lbl_category }} <span class="text-danger">*</span></label>
                            <select name="status" id="blog_status" class="form-control form-select">
                                <option value="">{{ __('system.crud.select') . ' ' . $lbl_category }}</option>
                                <option value="published" @if(old('status',$blog->status??'published')=='published') selected @endif>{{trans('system.fields.published')}}</option>
                                <option value="unpublished" @if(old('status',$blog->status??'published')=='unpublished') selected @endif>{{trans('system.fields.unpublished')}}</option>
                            </select>
                            @error('status')
                            <div class="pristine-error text-help">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>



@once
    @push('page_scripts')
        <script src="{{ asset('js/tinymce/tinymce.min.js', config('app.redirect_https')) }}" referrerpolicy="origin"></script>
        <script>
            tinymce.init({
                selector: '.editor',
                plugins: 'preview importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen link template codesample table charmap pagebreak nonbreaking anchor insertdatetime advlist lists wordcount help charmap quickbars',
                editimage_cors_hosts: ['picsum.photos'],
                menubar: 'insert table',
                toolbar: 'undo redo | bold italic underline strikethrough | fontfamily fontsize blocks | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap | fullscreen  preview print | link | ltr rtl ',
                automatic_uploads: true,
                // add custom filepicker only to Image dialog
            });
        </script>
    @endpush
@endonce
