<header>
    <div class="main-header-wrapper">
        <div class="container">
            <div class="row">
                <a href="{{ url('/dashboard') }}" class="col-xs-6 si-box-padding">
                    <h3>{{ __('BRM') }}<span>{{ __('Portal') }}</span>.</h3>
                </a>
                <!-- end of col-xs-6 -->
                <div class="col-xs-6 si-box-padding">
                    <div class="admin-user-wrapper clearfix">
                        <div class="user-img">
                            @if (Auth::user()->upload_image)
                                <img src="{{ asset('storage/uploads/users/' . Auth::user()->upload_image) }}" class="img-responsive" />
                            @else
                                <img src="{{ asset('storage/uploads/no_avatar.png') }}" class="img-responsive" />
                            @endif
                        </div>
                        <!-- end of user-img -->
                        <div class="user-name btn-group">
                            <button class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}
                                <span>{{ Auth::user()->position }}</span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-right logout-drop">
                                <li><a href="{{ route('profile.index') }}"><i class="fa-light fa-user"></i><span>{{ __('Profile') }}</span></a></li>
                                <li>
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="fa-light fa-power-off"></i>
                                        <span>{{ __('Logout') }}</span>
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                            <!-- end of dropdown-menu -->
                        </div>
                        <!-- end of user-name -->
                    </div>
                    <!-- end of admin-user-wrapper -->
                </div>
                <!-- end of col-xs-6 -->
            </div>
            <!-- end of row -->
        </div>
        <!-- end of container -->
    </div>
    <!-- end of main-header-wrapper -->
    <div class="menu-list">
        <nav class="navbar navbar-default menu-white-wrapper">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <!-- end of navbar-header -->
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <div class="row sec-cx">
                        <div class="col-md-12 si-box-padding">
                            <ul class="nav navbar-nav">
                                <li class="{{ Request::routeIs('dashboard') ? 'active' : '' }}">
                                    <a href="{{ url('/dashboard') }}">
                                        <i class="fa-light fa-house"></i>{{ __('Dashboard') }}
                                    </a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa-light fa-note"></i>{{ __('Form Management') }}
                                        <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{ route('posts.index') }}">{{ __('Posts') }}</a></li>
                                        <li><a href="{{ route('sermons.index') }}">{{ __('Sermons') }}</a></li>
                                        <li><a href="{{ route('events.index') }}">{{ __('Events') }}</a></li>
                                        <li><a href="{{ route('categories.index') }}">{{ __('Category') }}</a></li>
                                    </ul>
                                    <!-- end of dropdown-menu -->
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa-light fa-shield"></i>{{ __('User Management') }}
                                        <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{ route('users.index') }}">{{ __('Users') }}</a></li>
                                        <li><a href="{{ route('roles.index') }}">{{ __('Roles') }}</a></li>
                                        <li><a href="{{ route('permissions.index') }}">{{ __('Permissions') }}</a></li>
                                    </ul>
                                    <!-- end of dropdown-menu -->
                                </li>
                                <li>
                                    <a href="{{ route('settings') }}">
                                        <i class="fa-light fa-cog"></i>{{ __('Settings') }}
                                    </a>
                                </li>
                                <li class="{{ Request::routeIs('contact') ? 'active' : '' }}">
                                    <a href="{{ route('contact.index') }}">
                                        <i class="fa-light fa-envelope"></i>{{ __('Message') }}
                                    </a>
                                </li>
                            </ul>
                            <!-- end of navbar-nav -->
                        </div>
                        <!-- end of col-md-12 -->
                    </div>
                    <!-- end of row -->
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-fluid -->
        </nav>
        <!-- end of navbar -->
    </div>
    <!-- end of menu-list -->
</header>
