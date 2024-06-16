<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <!-- ! Hide app brand if navbar-full -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <div class="app-brand demo" style="background-color: pink">
        <a href="{{ url('/') }}" class="app-brand-link">
            <span class="app-brand-logo demo">
                @include('_partials.macros', ['width' => 25, 'withbg' => 'var(--bs-primary)'])
            </span>
            {{-- <span class="app-brand-text demo menu-text fw-bold ms-2">{{ config('variables.templateName') }}</span> --}}
            <span class="app-brand-text demo menu-text fw-bold ms-2">Dashboard</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1" style="background-color: pink">
        <li class="menu-item">
            <a href="{{ url('/dashboard') }}" class="menu-link">
                <i class="menu-icon fa-solid bx bx-home"></i>
                <div>{{ __('messages.dashboard') }}</div>
            </a>
        </li>

        <li class="menu-item">
            <a href="{{ route('country#countryPage') }}" class="menu-link">
                <i class="fa-solid fa-flag menu-icon"></i>
                <div>{{ __('messages.countries') }}</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{ url('/girlPage') }}" class="menu-link">
                <i class="fa-solid fa-child-dress menu-icon"></i>
                <div>{{ __('messages.girls') }}</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{ url('/girl_on_off') }}" class="menu-link">
                <i class="fa-solid fa-toggle-on menu-icon"></i>
                <div>{{ __('messages.girls on/off') }}</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{ route('order#orderList') }}" class="menu-link">
                <i class="fa-solid fa-arrows-down-to-people menu-icon"></i>
                <div>{{ __('messages.ordes management') }}</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{ route('report#reportList') }}" class="menu-link">
                <i class="fa-solid fa-paper-plane menu-icon"></i>
                <div>{{ __('messages.report') }}</div>
            </a>
        </li>

        <li class="menu-item">
            <a href="{{ url('commission_reportList') }}" class="menu-link">
                <i class="fa-solid fa-percent menu-icon"></i>
                <div>{{ __('messages.girl commission report') }}</div>
            </a>
        </li>

        <li class="menu-item">
            <a href="{{ url('text') }}" class="menu-link">
                <i class="fa-solid fa-font menu-icon"></i>
                <div>{{ __('messages.create text') }}</div>
            </a>
        </li>
        {{-- <li class="menu-item">
          <a href="{{ url('/dashboard') }}" class="menu-link">
              <i class="fa-solid fa-earth-asia menu-icon"></i>
              <div>Country</div>
          </a>
      </li> --}}
        {{-- <li class="menu-item">
          <a href="{{ url('/dashboard') }}" class="menu-link">
              <i class="fa-solid fa-user-plus menu-icon"></i>
              <div>User</div>
          </a> --}}
        </li>

    </ul>

</aside>
