<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('styles/pageStyle/header.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    <form action="">
        <div class="header">
            <div id="header__side" class="">
                <div class="header__sideBar">
                    <div class="header__sideBar-button">
                        <button style="background-color: transparent; border: none" id="closeMenu">
                            <ion-icon style="font-size: 50px;" name="close-outline"></ion-icon>
                            <p>Menu</p>
                        </button>
                    </div>
                    <div class="header__sideBar-cate">
                        <div class="header__sideBar-cate-menu">
                            <div><a href="{{ url('client/home') }}">Home</a></div>
                            <div class="" id="dropdown1">
                                <div class="dropdown1__name">Categories</div>
                                <ion-icon name="caret-forward-outline"></ion-icon>
                            </div>
                            <div class="" id="dropdown2">
                                <div class="dropdown2__name">Collection</div>
                                <ion-icon name="caret-forward-outline"></ion-icon>
                            </div>
                            <div class="" id="dropdown3">
                                <div class="dropdown3__name">Brands</div>
                                <ion-icon name="caret-forward-outline"></ion-icon>
                            </div>
                            <div><a href="http://127.0.0.1:8000/client/Cart">My Shopping Cart</a></div>
                            <div><a href="{{ url('client/wishLish') }}">My Wish List</a></div>
                            <div><a href="{{ url('client/aboutUs') }}">About Us</a></div>
                        </div>
                    </div>
                </div>
                <div id="drop1" class="">
                    <div class="header__side-category">
                        <div><a href="{{ url('client/products/long-wallet') }}">Long Wallet</a></div>
                        <div><a href="{{ url('client/products/small-wallet') }}">Small Wallet</a></div>
                        <div><a href="{{ url('client/products/cards-holder') }}">Cards Holder</a></div>
                        <div><a href="{{ url('client/products/chain-and-strap') }}">Chain and Strap Wallet</a></div>
                    </div>
                </div>
                <div id="drop2" class="">
                    <div class="header__side-collection">
                        <div><a href="{{ url('client/products/new-arrival') }}">New Arrivals</a></div>
                        <div><a href="{{ url('client/products/trending') }}">Trending</a></div>
                        <div><a href="{{ url('client/products/discount') }}">On Sales</a></div>
                    </div>
                </div>
                <div id="drop3" class="">
                    <div class="header__side-brand">
                        <div><a href="{{ url('client/products/dior') }}">Dior</a></div>
                        <div><a href="{{ url('client/products/gucci') }}">Gucci</a></div>
                        <div><a href="{{ url('client/products/channel') }}">Channel</a></div>
                        <div><a href="{{ url('client/products/louis-vuiton') }}">Louis Vuitton</a></div>
                    </div>
                </div>
            </div>
            <div id="openLog" class="header__log">
                @if (Auth::guard('users')->check())
                    <div class="header__log-signed" style="">
                        <div class="header__log-signed-profile">
                            <a href="{{ url('client/myProfile') }}">My Profile</a>
                        </div>
                        <div class="header__log-signed-signOut">
                            <a href="{{ url('client/logout') }}">Sign Out</a>
                        </div>
                    </div>
                @else
                    <div class="header__log-notSign">
                        <div class="header__log-notSign-signIn">
                            <a href="{{ url('client/login') }}">Sign In</a>
                        </div>
                        <div class="header__log-notSign-signUp">
                            <a href="">Sign Up</a>
                        </div>
                    </div>
                @endif
            </div>
            <div id="shoppingCart" class="header__cart">
                <div class="header__cart-tittle">Shopping Cart
                    <button id="hideCart">
                        <ion-icon name="chevron-up-outline"></ion-icon>
                    </button>
                </div>
                <div class="header__cart-list">
                    @foreach ($customer_cart as $item)
                    <div class="header__cart-list-items">
                            <div class="header__cart-list-items-img"
                                style="background-image: url('{{ $item->Main_IMG }}')"></div>
                            <div class="header__cart-list-items-info">
                                <div class="header__cart-list-items-info-name">{{ $item->Name }}</div>
                                <div class="header__cart-list-items-info-quantity">
                                    <button>
                                        <ion-icon name="remove-outline"></ion-icon>
                                    </button>
                                    <div class="header__cart-list-items-info-quantity-num">
                                        {{ $item->Product_quantity }}</div>
                                    <a >
                                        <ion-icon name="add-outline"></ion-icon>
                                    </a>
                                </div>
                            </div>
                        <div class="header__cart-list-items-info-right">
                            <div class="header__cart-list-items-info-right-price">${{ $item->Export_Price }}</div>
                            <div class="header__cart-list-items-info-right-action">
                                <a href="{{ url('/client/Cart/removefromcart', $item->Product_Detail_ID) }}">
                                    <ion-icon name="trash-bin-outline"></ion-icon>
                                </a>
                            </div>
                        </div>

                    </div>
                    @endforeach

                </div>
                <div class="header__cart-total">
                    <p><b>Total</b></p>
                    <p>$10000</p>
                </div>
                <div class="header__cart-checkout">
                    <button>Check out</button>
                </div>
            </div>
            <div class="header__update">
                <div id="topUpdate" class="header__update-all">
                    <div class="header__update-1"><a style="color: white" href=""> Sale up to 50%..</a></div>
                    <div class="header__update-1"><a style="color: white" href=""> Give code for..</a></div>
                    <div class="header__update-1"><a style="color: white" href=""> Free ship if..</a></div>
                </div>
            </div>
            <div class="header__nav">
                <div class="header__nav-menu">
                    <button style="background-color: transparent; border: none" id="openMenu">
                        <ion-icon style="font-size: 40px;" name="menu-outline"></ion-icon>
                        <p>Menu</p>
                    </button>
                </div>
                <div class="header__nav-logo">
                    <a style="color: black" href="{{ url('client/home') }}">
                        P U R S E L L E T
                    </a>
                </div>
                <div class="header__nav-right">
                    
                    <button id="log">
                        @if (Auth::guard('users')->check())
                        <div>{{ $customer_infor->username }}</div>
                        <ion-icon name="person"></ion-icon>
                        @else
                        <ion-icon name="person-outline"></ion-icon>
                        @endif
                    </button>
                    <button id="showCart">
                        @if($cart_quantity >0)
                        <div class="quantityCart">{{ $cart_quantity }}</div>
                        @endif
                        <ion-icon name="cart-outline"></ion-icon>
                        </a>
                        <button>
                            <div class="quantityCart">{{ $wishList_quantity }}</div>
                            <ion-icon name="heart-outline"></ion-icon>
                        </button>
                </div>
            </div>
        </div>
    </form>

</body>
<script src="{{ asset('javascript/client/header.js') }}"></script>

</html>
