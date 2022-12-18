<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('styles/pageStyle/header.css') }}">
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
                            <div><a href="">Home</a></div>
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
                            <div><a href="">My Shopping Cart</a></div>
                            <div><a href="">My Wish List</a></div>
                            <div><a href="">About Us</a></div>
                        </div>
                    </div>
                </div>
                <div id="drop1" class="">
                    <div class="header__side-category">
                        <div><a href="">Long Wallet</a></div>
                        <div><a href="">Small Wallet</a></div>
                        <div><a href="">Cards Holder</a></div>
                        <div><a href="">Chain and Strap Wallet</a></div>
                    </div>
                </div>
                <div id="drop2" class="">
                    <div class="header__side-collection">
                        <div><a href="">New Arrivals</a></div>
                        <div><a href="">Trending</a></div>
                        <div><a href="">On Sales</a></div>
                    </div>
                </div>
                <div id="drop3" class="">
                    <div class="header__side-brand">
                        <div><a href="">Dior</a></div>
                        <div><a href="">Gucci</a></div>
                        <div><a href="">Channel</a></div>
                        <div><a href="">Louis Vuiton</a></div>
                    </div>
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
                    <a style="color: black" href="">
                        P U R S E L L E T
                    </a>
                </div>
                <div class="header__nav-right">
                    <ion-icon name="person-outline"></ion-icon>
                    <ion-icon name="cart-outline"></ion-icon>
                    <ion-icon name="heart-outline"></ion-icon>
                </div>
            </div>
        </div>

    </form>
</body>
<script src="{{ asset('javascript/client/header.js') }}"></script>

</html>
