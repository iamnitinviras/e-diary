@extends('layouts.app')
@section('title', __('system.categories.update.menu'))
@section('content')
    <div class="row">
        <div class="col-xl-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-mb-8 col-xl-8">
                            <h4 class="card-title">{{ __('system.categories.update.menu') }}</h4>
                            <div class="page-title-box pb-0 d-sm-flex">
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('system.dashboard.menu') }}</a></li>
                                        <li class="breadcrumb-item "><a href="{{ route('admin.categories.index') }}">{{ __('system.categories.menu') }}</a></li>
                                        <li class="breadcrumb-item active">{{ __('system.categories.update.menu') }}</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {!! html()->modelForm($category,'PUT',  route('admin.categories.update', $category->id))
                 ->id('pristine-valid')
                 ->attribute('enctype', 'multipart/form-data')
                 ->open() !!}

                @if (request()->query->has('back'))
                    <input type="hidden" name="back" value="{{ request()->query->get('back') }}">
                @endif
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                @include('admin.categories.fields', ['edit' => true])
                            </div>
                        </div>
                    </div>
                    <div class="card-footer bg-transparent border-top text-muted">
                        <div class="row">
                            <div class="col-12">
                                <button class="btn btn-primary" type="submit">{{ __('system.crud.save') }}</button>
                                <a href="{{ route('admin.categories.index') }}"class="btn btn-secondary">{{ __('system.crud.back') }}</a>
                            </div>
                        </div>
                    </div>
                {!! html()->closeModelForm() !!}
            </div>
        </div>
    </div>
@endsection
