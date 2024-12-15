<header>
    <!-- Header desktop -->
    <div class="container-menu-desktop">
        <!-- Topbar -->
        <div class="top-bar">
            <div class="content-topbar flex-sb-m h-full container">
                <div class="left-top-bar">
                    Free shipping for standard order over $100
                </div>

                <div class="right-top-bar flex-w h-full">
                    <a href="#" class="flex-c-m trans-04 p-lr-25">
                        Help & FAQs
                    </a>

                    <a href="#" class="flex-c-m trans-04 p-lr-25">
                        My Account
                    </a>

                    <a href="#" class="flex-c-m trans-04 p-lr-25">
                        EN
                    </a>

                    <a href="#" class="flex-c-m trans-04 p-lr-25">
                        USD
                    </a>
                </div>
            </div>
        </div>

        <div class="wrap-menu-desktop">
            <nav class="limiter-menu-desktop container">

                <!-- Logo desktop -->
                <a href="{{route('home')}}" class="logo">
                    <img src="{{asset('images/icons/logo-01.png')}}" alt="IMG-LOGO">
                </a>

                <!-- Menu desktop -->
                <div class="menu-desktop">
                    <ul class="main-menu">
                        <li class="{{Route::currentRouteName() == 'home'? 'active-menu' : ''}}">
                            <a href="{{route('home')}}">Home</a>
                        </li>

                        <li class="{{Route::currentRouteName() == 'products.index'? 'active-menu' : ''}}">
                            <a href="{{route('products.index')}}">Shop</a>
                        </li>

                        <li class="label1" data-label1="hot">
                            <a href="{{route('shoping_cart')}}">Features</a>
                        </li>

                        <li class="{{Route::currentRouteName() == 'blog'? 'active-menu' : ''}}">
                            <a href="{{route('blog')}}">Blog</a>
                        </li>

                        <li class="{{Route::currentRouteName() == 'about'? 'active-menu' : ''}}">
                            <a href="{{route('about')}}">About</a>
                        </li>

                        <li class="{{Route::currentRouteName() == 'contact'? 'active-menu' : ''}}">
                            <a href="{{route('contact')}}">Contact</a>
                        </li>
                    </ul>
                </div>

                <!-- Icon header -->
                <div class="wrap-icon-header flex-w flex-r-m">
                    <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11" data-notify="2">
                        <a href ="{{route('cart.index')}}" style="color:black"><i class="zmdi zmdi-shopping-cart"></i></a>

                    </div>
                    <a href="{{route('userProfile.index')}}" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 " >
                        <i class="zmdi zmdi-account-circle"></i>
                    </a>
                    @auth
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="logoutButton" >Logout</button>
                    </form>
                    @else
                    <form action="{{ route('login') }}" method="GET">
                        @csrf
                        <button type="submit" class="logoutButton" >Login</button>
                    </form>
                    @endauth
                </div>
            </nav>
        </div>
    </div>
    <!-- Modal Search -->
    <div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
        <div class="container-search-header">
            <button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
                <img src="{{asset('images/icons/icon-close2.png')}}" alt="CLOSE">
            </button>

            <form class="wrap-search-header flex-w p-l-15">
                <button class="flex-c-m trans-04">
                    <i class="zmdi zmdi-search"></i>
                </button>
                <input class="plh3" type="text" name="search" placeholder="Search...">
            </form>
        </div>
    </div>
</header>
