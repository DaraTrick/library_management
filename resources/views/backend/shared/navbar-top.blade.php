<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box d-flex">
                <div>
                    <a href="" class="logo logo-light mr-3">
                        @if(Auth::guard('web')->user()->photo)
                            <span class="logo-sm">
                                <img class="rounded-circle" src="{{ asset('uploads/users/'.Auth::guard('web')->user()->photo) }}" alt="" height="20">
                            </span>
                            <span class="logo-lg my-3">
                                <img class="rounded-circle" src="{{ asset('uploads/users/'.Auth::guard('web')->user()->photo) }}" alt="" height="56">
                            </span>
                        @else
                            <span class="logo-sm">
                                <img src="{{ asset('assets/avatar.png') }}" alt="" height="20">
                            </span>
                            <span class="logo-lg my-3">
                                <img src="{{ asset('assets/avatar.png') }}" alt="" height="56">
                            </span>
                        @endif
                    </a>
                </div>
                <div style="margin-top: 17px; d-sm-none">
                    <h4 style="padding:0; margin:0;font-weight: 400; color:#fff;">{{ Auth::guard('web')->user()->name }}</h4>
                    <p style="font-weight: 10px; d-sm-none ">
                        @if(Auth::guard('web')->user()->role == 1)
                            បណ្ណារក្ស
                        @else
                            សិស្ស
                        @endif
                    </p>
                </div>

            </div>

            <button type="button" class="btn btn-sm mt-1 px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                <i class="mdi mdi-backburger"></i>
            </button>

            <!-- App Search-->
            <div class="mt-4">
                <h3>សូមស្វាគមន៍មកាន់ប្រព័ន្ធគ្រប់គ្រងបណ្ណាល័យ</h3>
            </div>

        </div>

        <div class="d-flex">

            <div class="dropdown d-none d-lg-inline-block ml-1">
                <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                    <i class="mdi mdi-fullscreen"></i>
                </button>
            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                    @if(Auth::guard('web')->user()->photo)
                        <img class="rounded-circle header-profile-user" src="{{ asset('uploads/users/'.Auth::guard('web')->user()->photo) }}" alt="Header Avatar">
                    @else
                        <img class="rounded-circle header-profile-user" src="{{ asset('assets/avatar.png') }}" alt="Header Avatar">
                    @endif
                    <span class="d-none d-sm-inline-block ml-1">សួស្តី! {{ Auth::guard('web')->user()->name }}</span>
                    <i class="mdi mdi-chevron-down d-none d-sm-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                    <!-- item-->
                    <a class="dropdown-item" href="#"><i class="mdi mdi-face-profile font-size-16 align-middle mr-1"></i> ប្រវត្តិរូប</a>
                    <a class="dropdown-item" href="{{ route('register') }}"><i class="mdi mdi-credit-card-outline font-size-16 align-middle mr-1"></i> ចុះឈ្មោះ</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('logout') }}"><i class="mdi mdi-logout font-size-16 align-middle mr-1"></i> ចាកចេញ</a>
                </div>
            </div>

        </div>
    </div>
</header>
