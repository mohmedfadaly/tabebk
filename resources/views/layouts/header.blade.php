<header>
        <div class="header-area ">
            <div class="header-top_area">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-md-6 ">
                            <div class="social_media_links">
                                <a href="#">
                                    <i class="fa fa-linkedin"></i>
                                </a>
                                <a href="#">
                                    <i class="fa fa-facebook"></i>
                                </a>
                                <a href="#">
                                    <i class="fa fa-google-plus"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-6 col-md-6">
                            <div class="short_contact_list">
                                <ul>
                                    <li><a href="#"> <i class="fa fa-envelope"></i> info@docmed.com</a></li>
                                    <li><a href="#"> <i class="fa fa-phone"></i> 160160</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="sticky-header" class="main-header-area">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-3 col-lg-2">
                            <div class="logo">
                            <a class="navbar-brand" href="{{ route('frontend.landing') }}" rel="tooltip" title="Coded by videohatk" data-placement="bottom">
        طبيبك
        </a>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-7">
                            <div class="main-menu  d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                    <li class="nav-item dropdown">
                                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    التخصصات
                                                </a>
                                            <ul class="submenu" aria-labelledby="navbarDropdownMenuLink">
                                            @foreach($specialties as $specialties)
                                                        <a class="dropdown-item" href="{{ route('front.Specialty' , ['id' => $specialties->id]) }}">{{ $specialties->name }}</a>
                                            @endforeach
                                            </ul>
                                    </li>

                        @guest
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                            </li>
                                            @if (Route::has('register'))
                                                <li class="nav-item">
                                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                                </li>
                                            @endif
                                        @else
                                            <li class="nav-item dropdown">
                                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                    {{ Auth::user()->name }} <span class="caret"></span>
                                                </a>

                                                <ul class="submenu" aria-labelledby="navbarDropdown">

                                                <a class="dropdown-item" href="{{ route('front.profile' , ['id' => auth()->user()->id]) }}" >Profile</a>
                                                <a class="dropdown-item" href="{{ route('chat') }}" >chat</a>
                                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                                    onclick="event.preventDefault();
                                                                    document.getElementById('logout-form').submit();">
                                                        {{ __('Logout') }}
                                                    </a>

                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                        @csrf
                                                    </form>
                                                </ul>
                                            </li>
                                        @endguest
                                        

                                        <li>
                                        <form class="form-inline ml-auto" style="margin-top: 15px" action="{{ route('home') }}">
                                            <div class="form-group has-white">
                                                <input type="text" name="search" class="form-control" placeholder="Search">
                                            </div>
                                        </form>
                                        </li>
                                    </ul>
                                </nav>

                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 d-none d-lg-block">
                                            <div class="Appointment">
                                                <div class="book_btn d-none d-lg-block">
                                                    <a class="popup-with-form" href="#test-form">حجز</a>
                                                </div>
                                            </div>
                                        </div>
                        
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>