@if (session()->has('Success'))
    <div class="alert alert-success alert-border-left alert-dismissible fade show success_error_alerts " role="alert">
        <i class="mdi mdi-check-all me-3 align-middle"></i>{{session('Success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@if (session()->has('Error'))
    <div class="alert alert-danger alert-border-left alert-dismissible fade show success_error_alerts" role="alert">
        <i class="mdi mdi-block-helper me-3 align-middle"></i>{{session('Error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
