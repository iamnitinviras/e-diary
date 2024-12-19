<ul class="metismenu list-unstyled" id="side-menu">
    <li>
        <a href="{{ route('home') }}" class="{{ Request::is('home') ? 'active' : '' }}">
            <i class="fas fa-home"></i>
            <span data-key="t-dashboard">{{ __('system.dashboard.menu') }}</span>
        </a>
    </li>
    <li>
        <a href="{{ route('admin.categories.index') }}">
            <i class="fas fa-list-alt font-size-18"></i>
            <span data-key="t-{{ __('system.categories.menu') }}">{{ __('system.categories.menu') }}</span>
        </a>
    </li>
    <li>
        <a href="{{ route('admin.notes.index') }}">
            <i class="fas fa-blog font-size-18"></i>
            <span data-key="t-{{ __('system.notes.menu') }}">{{ __('system.notes.menu') }}</span>
        </a>
    </li>

{{--    <li>--}}
{{--        <a href="{{ route('admin.notes.comments') }}">--}}
{{--            <i class="fas fa-comment-alt font-size-18"></i>--}}
{{--            <span data-key="t-{{ __('system.notes.menu') }}">{{ __('system.fields.comments') }}</span>--}}
{{--        </a>--}}
{{--    </li>--}}

    <li>
        <a href="{{ route('admin.cms-page.index') }}">
            <i class="fas fa-pager font-size-18"></i>
            <span data-key="t-{{ __('system.cms.menu') }}">{{ __('system.cms.menu') }}</span>
        </a>
    </li>
    <li>
        <a href="{{ route('admin.contact-request.index') }}">
            <i class="fas fa-envelope font-size-18"></i>
            <span data-key="t-{{ __('system.contact_us.menu') }}">{{ __('system.contact_us.menu') }}</span>
        </a>
    </li>
    <li>
        <a href="{{ route('admin.languages.index') }}">
            <i class="fas  fa-language font-size-18"></i>
            <span data-key="t-{{ __('system.languages.menu') }}">{{ __('system.languages.menu') }}</span>
        </a>
    </li>
    <li>
        <a href="{{ route('admin.environment.setting') }}">
            <i class="fas fa-cog font-size-18"></i>
            <span data-key="t-{{ __('system.environment.menu') }}">{{ __('system.environment.menu') }}</span>
        </a>
    </li>
    <li>
        <a onclick="event.preventDefault(); document.getElementById('logout-form').click();" href="javacript:void(0)">
            <i class="fas fa-power-off font-size-18"></i>
            <form autocomplete="off" action="{{ route('logout') }}" method="POST" class="d-none data-confirm" data-confirm-message="{{ __('system.fields.logout') }}"
                  data-confirm-title=" {{ __('auth.sign_out') }}">
                <button id="logout-form" type="submit"></button>
                @csrf
            </form>
            <span data-key="t-{{ __('auth.sign_out') }}">{{ __('auth.sign_out') }}</span>
        </a>
    </li>
</ul>
