@php
use Illuminate\Support\Facades\Auth;
@endphp
<body>
<div id="preloder">
    <div class="loader"></div>
</div>

<!-- Header Section Begin -->
<header class="header-section">
    <div class="header-top">
        <div class="container">
            <div class="ht-left">
                <div class="mail-service">
                    <i class=" fa fa-envelope"></i>
                    Fashi@gmail.com
                </div>
                <div class="phone-service">
                    <i class=" fa fa-phone"></i>
                    +65 11.188.888
                </div>
            </div>
            <div class="ht-right">
                            <!-- Authentication Links -->
            @if (!auth('admin')->user() and !auth()->user())
            {{-- @guest --}}
                    <a href="{{route('register')}}" class="register-panel"><i class="fa fa-user"></i> Register</a>
                    <a href="{{route('login')}}" class="login-panel"><i class="fa fa-user"></i>Login</a>
            @else
            {{-- @else --}}
            <a  href="{{ route('logout') }}" class="register-panel"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
             @csrf
            </form>
            @endif
            @if (auth('admin')->user())
            <a href="{{route('admin')}}" class="login-panel"> AdminPanel</a>
            @endif
            @if (auth()->user())
            <a   href="{{route('users.show',  Auth::user()->id )}}" role="button" class="login-panel">
                {{ ucfirst(Auth::user()->name) }}</a>
            @endif
             {{-- @endguest --}}
                <div class="lan-selector">
                    <select class="language_drop" name="countries" id="countries" style="width:300px;">
                        <option value='yt' data-image="{{url('assets/img/flag-1.jpg')}}" data-imagecss="flag yt"
                            data-title="English">English</option>
                        <option value='yu' data-image="{{url('assets/img/flag-2.jpg')}}" data-imagecss="flag yu"
                            data-title="Bangladesh">German </option>
                    </select>
                </div>
                <div class="top-social">
                    <a href="https://www.facebook.com"><i class="ti-facebook"></i></a>
                    <a href="https://www.twitter.com"><i class="ti-twitter-alt"></i></a>
                    <a href="https://www.linkedin.com"><i class="ti-linkedin"></i></a>
                    <a href="https://www.pinterest.com"><i class="ti-pinterest"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="inner-header">
            <div class="row">
                <div class="col-lg-2 col-md-2">
                    <div class="logo">
                    <a href="{{route('index')}}">
                            <img src="{{url('assets/img/logo.png')}}" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-lg-7 col-md-7">
                    <div class="advanced-search">
                        <button type="button" class="category-btn">All Categories</button>
                        <form action="#" class="input-group">
                            <input type="text" placeholder="What do you need?">
                            <button type="button"><i class="ti-search"></i></button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-3 text-right col-md-3">
                    <ul class="nav-right">
                        <li class="heart-icon"><a href="#">
                                <i class="icon_heart_alt"></i>
                                <span>1</span>
                            </a>
                        </li>
                        <li class="cart-icon"><a href="#">
                                <i class="icon_bag_alt"></i>
                                <span>3</span>
                            </a>
                            <div class="cart-hover">
                                <div class="select-items">
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td class="si-pic"><img src="{{url('assets/img/select-product-1.jpg')}}" alt=""></td>
                                                <td class="si-text">
                                                    <div class="product-selected">
                                                        <p>$60.00 x 1</p>
                                                        <h6>Kabino Bedside Table</h6>
                                                    </div>
                                                </td>
                                                <td class="si-close">
                                                    <i class="ti-close"></i>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="si-pic"><img src="{{url('assets/img/select-product-2.jpg')}}" alt=""></td>
                                                <td class="si-text">
                                                    <div class="product-selected">
                                                        <p>$60.00 x 1</p>
                                                        <h6>Kabino Bedside Table</h6>
                                                    </div>
                                                </td>
                                                <td class="si-close">
                                                    <i class="ti-close"></i>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="select-total">
                                    <span>total:</span>
                                    <h5>$120.00</h5>
                                </div>
                                <div class="select-button">
                                    <a href="{{route('cart')}}" class="primary-btn view-card">VIEW CART</a>
                                    <a href="{{route('checkOut')}}" class="primary-btn checkout-btn">CHECK OUT</a>
                                </div>
                            </div>
                        </li>
                        <li class="cart-price">$150.00</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="nav-item">
        <div class="container">
            <div class="nav-depart">
                <div class="depart-btn">
                    <i class="ti-menu"></i>
                    <span>All departments</span>
                    <ul class="depart-hover">
                        <li class="active"><a href="#">Womenâ€™s Clothing</a></li>
                        <li><a href="#">Menâ€™s Clothing</a></li>
                        <li><a href="#">Underwear</a></li>
                        <li><a href="#">Kid's Clothing</a></li>
                        <li><a href="#">Brand Fashion</a></li>
                        <li><a href="#">Accessories/Shoes</a></li>
                        <li><a href="#">Luxury Brands</a></li>
                        <li><a href="#">Brand Outdoor Apparel</a></li>
                    </ul>
                </div>
            </div>
            <nav class="nav-menu mobile-menu">
                <ul>
                    <li><a href="{{route('index')}}">Home</a></li>
                    <li><a href="{{route('shop')}}">Shop</a></li>
                    <li><a href="#">Collection</a>
                        <ul class="dropdown">
                            <li><a href="#">Men's</a></li>
                            <li><a href="#">Women's</a></li>
                            <li><a href="#">Kid's</a></li>
                        </ul>
                    </li>
                    <li><a href="{{route('blog')}}">Blog</a></li>
                    <li><a href="{{route('contact')}}">Contact</a></li>

                    <li><a href="#">Pages</a>
                        <ul class="dropdown">
                            <li><a href="{{route('blogDetails')}}">Blog Details</a></li>
                            <li><a href="{{route('cart')}}">Shopping Cart</a></li>
                            <li><a href="{{route('checkOut')}}">Checkout</a></li>
                            <li><a href="{{route('faq')}}"">Faq</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <div id="mobile-menu-wrap"></div>
        </div>
    </div>
</header>
