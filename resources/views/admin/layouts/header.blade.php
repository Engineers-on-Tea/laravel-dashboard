<nav class="navbar header-navbar pcoded-header">
    <div class="navbar-wrapper">

        <div class="navbar-logo">
            <a class="mobile-menu" id="mobile-collapse" href="#!">
                <i class="icofont icofont-navigation-menu"></i>
            </a>
            <a href="index-1.htm">
                <img class="img-fluid" src="{{ asset('admin_dashboard/assets/images/logo.png') }}" alt="Theme-Logo">
            </a>
            <a class="mobile-options">
                <i class="icofont icofont-newspaper"></i>
            </a>
        </div>

        <div class="navbar-container container-fluid">
            <ul class="nav-left">
                <li>
                    <a href="#!" onclick="javascript:toggleFullScreen()">
                        <i class="icofont icofont-maximize full-screen"></i>
                    </a>
                </li>
            </ul>
            <ul class="nav-right">
                <li class="header-notification">
                    <div class="dropdown-primary dropdown">
                        <div class="dropdown-toggle" data-toggle="dropdown">
                            <i class="icofont icofont-notification"></i>
                            <span class="badge bg-c-pink">5</span> {{-- notifications count --}}
                        </div>
                        <ul class="show-notification notification-view dropdown-menu" data-dropdown-in="fadeIn"
                            data-dropdown-out="fadeOut">
                            <li>
                                <h6>{{ _i('Notifications') }}</h6>
                                <label class="label label-danger">{{ _i('New') }}</label>
                            </li>
                            <li>
                                {{-- Notification Item --}}
                                <div class="media">
                                    <img class="d-flex align-self-center img-radius"
                                        src="{{ asset('admin_dashboard/assets/images/avatar-4.jpg') }}"
                                        alt="Generic placeholder image">
                                    <div class="media-body">
                                        <h5 class="notification-user">{{ _i('User name example') }}</h5>
                                        <p class="notification-msg">{{ _i('Notification body example') }}</p>
                                        <span class="notification-time">30 minutes ago</span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="header-notification">
                    <div class="dropdown-primary dropdown">
                        <div class="dropdown-toggle" data-toggle="dropdown">
                            @php
                                $lang = \App\Bll\Lang::getAdminLang();
                                $langs = \App\Bll\Lang::getAll();
                            @endphp
                            <span>
                                <i class="flag-icon flag-icon-background {{ $lang->__get('flag') }}"></i>
                                {{ $lang->__get('title') }}
                            </span>
                        </div>
                        <ul class="dropdown-menu" data-dropdown-in="fadeIn"
                            data-dropdown-out="fadeOut">
                            <li>
                                <h6>{{ _i('Languages') }}</h6>
                            </li>
                            @foreach ($langs as $item)
                                <li >
                                    <a href="{{ route('dashboard.change.lang', $item->__get('id')) }}">
                                        <i class="flag-icon flag-icon-background {{ $item->__get('flag') }}"></i>
                                        {{ $item->__get('title') }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </li>
                <li class="user-profile header-notification">
                    <div class="dropdown-primary dropdown">
                        <div class="dropdown-toggle" data-toggle="dropdown">
                            <img src="{{ asset('admin_dashboard/assets/images/avatar-4.jpg') }}" class="img-radius"
                                alt="User-Profile-Image">
                            <span>John Doe</span> {{-- auth user name --}}
                            <i class="icofont icofont-block-down"></i>
                        </div>
                        <ul class="show-notification profile-notification dropdown-menu" data-dropdown-in="fadeIn"
                            data-dropdown-out="fadeOut">
                            <li>
                                <a href="#!">
                                    <i class="icofont icofont-ui-settings"></i> {{ _i('Settings') }}
                                </a>
                            </li>
                            <li>
                                <a href="user-profile.htm">
                                    <i class="icofont icofont-ui-user"></i> {{ _i('Profile') }}
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('dashboard.logout') }}" data-button="logout">
                                    <i class="icofont icofont-sign-out"></i> {{ _i('Logout') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
