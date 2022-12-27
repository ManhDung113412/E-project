@extends('layouts.master')
@section('styles')
    <link rel="stylesheet" href="{{ asset('styles/pageStyle/homepage.css') }}">
@stop
@section('content')
    <div class="container">
        <div class="container__slideCol">
            <div id="slideS" class="container__slideCol-list">
                @foreach ($top_slides_img as $top)
                    <div style="background-image: url({{ $top->IMG }})" class="container__slideCol-item">
                        <div class="container__slideCol-item-content">
                            <p class="container__left-frame-text-p1">Best Fashion For You..</p>
                            <p class="container__left-frame-text-p2">New Fashion Collection Trends in 2022</p>
                            <a href="">Shop Now</a>
                        </div>
                    </div>
                @endforeach
                <div id="prevBut" class="container__slideCol-list-button">
                    <button id="prev">
                        <ion-icon name="chevron-back-outline"></ion-icon>
                    </button>
                </div>
                <div id="nextBut" class="container__slideCol-list-button">
                    <button id="next">
                        <ion-icon name="chevron-forward-outline"></ion-icon>
                    </button>
                </div>
            </div>
        </div>
        <div class="container__featured">
            <div class="container__featured-tittle">Featured Products</div>
            <div class="container__featured-products">
                @foreach ($randomPro as $item)
                <div class="container__featured-products-items">
                    <div class="container__featured-products-items-button">
                        <a href="{{ url('client/Cart/addtocart',$item->ID) }}" class="iconProduct">
                            <ion-icon name="cart-outline"></ion-icon>
                        </a>
                        <a href="{{ url('/client/wishlist/addtowishlist',$item->ID) }}" class="iconProduct">
                            <ion-icon name="heart-outline"></ion-icon>
                        </a>
                        {{-- <a href="" class="iconProduct">
                            <ion-icon name="git-compare-outline"></ion-icon>
                        </a> --}}
                    </div>
                    <a href="{{ url('/client/products/specificProduct', $item->Slug) }}"
                        style="background-image: url({{ $item->Main_IMG }})"
                        class="container__featured-products-items-img"></a>
                    <div class="container__featured-products-items-info">
                        <p>{{ $item->Name }}</p>
                        <p>${{ $item->Export_Price }}</p>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
        <div class="container__newArrivals">
            <div class="container__newArrivals-content">
                <div class="container__newArrivals-content-tittle">
                    <a href="{{ url('client/new-arrival') }}">New Arrivals</a>
                </div>
                <div class="container__newArrivals-content-text">
                    Make bold fashion choices with our latest Purse and Wallets
                </div>
                <div class="container__newArrivals-content-button">
                    <a href="{{ url('/client/products/new-arrival') }}">
                        <p>Shop Now</p>
                    </a>
                </div>
            </div>
            <div class="container__newArrivals-collection">
                <div id="colListNew" class="container__newArrivals-collection-slide"
                    style="background-image: ; background-size: cover; background-position: 50% 50%;">
                    @foreach ($middle_slides_img as $middle)
                        <div class="container__newArrivals-collection-list"
                            style="background-image: url({{ $middle->IMG }});">
                        </div>
                    @endforeach
                    <div class="container__newArrivals-collection-button">
                        <button id="prevNew">
                            <ion-icon name="chevron-back-outline"></ion-icon>
                        </button>
                        <button id="nextNew">
                            <ion-icon name="chevron-forward-outline"></ion-icon>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="container__featured">
            <div class="container__featured-tittle"><a href="url('/client/products/trending') "
                    style="color: black">Trending Now</a> </div>
            <div class="container__featured-products">
                @foreach ($trending as $item)
                    <div class="container__featured-products-items">
                        <div class="container__featured-products-items-button">
                            <a href="{{ url('client/Cart/addtocart',$item->ID) }}" class="iconProduct">
                                <ion-icon name="cart-outline"></ion-icon>
                            </a>
                            <a href="{{ url('/client/wishlist/addtowishlist',$item->ID) }}" class="iconProduct">
                                <ion-icon name="heart-outline"></ion-icon>
                            </a>
                            {{-- <a href="" class="iconProduct">
                                <ion-icon name="git-compare-outline"></ion-icon>
                            </a> --}}
                        </div>
                        <a href="{{ url('/client/products/specificProduct', $item->Slug) }}"
                            style="background-image: url({{ $item->Main_IMG }})"
                            class="container__featured-products-items-img"></a>
                        <div class="container__featured-products-items-info">
                            <p>{{ $item->Name }}</p>
                            <p>${{ $item->Export_Price }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        @foreach ($channel as $item)
            <div class="container__listCol">
                <div class="container__listCol-items">
                    <div class="container__listCol-items-img">
                        <div class="container__listCol-items-img-child"
                            style="background-image: url({{ $item->Before_Hover_IMG }});"></div>
                        <div class="container__listCol-items-img-child"
                            style="background-image: url({{ $item->After_Hover_IMG }});"></div>
                        <div class="container__listCol-items-tittle">
                            <button onclick="location.href='{{ url('client/products/channel') }}'">View More</button>
                        </div>
                    </div>
                </div>
        @endforeach
        @foreach ($dior as $item)
            <div class="container__listCol-items">
                <div class="container__listCol-items-img">
                    <div class="container__listCol-items-img-child"
                        style="background-image: url({{ $item->Before_Hover_IMG }});"></div>
                    <div class="container__listCol-items-img-child"
                        style="background-image: url({{ $item->After_Hover_IMG }});"></div>
                    <div class="container__listCol-items-tittle">
                        <button onclick="location.href='{{ url('client/products/dior') }}'">View More</button>
                    </div>
                </div>
            </div>
        @endforeach
        @foreach ($gucci as $item)
            <div class="container__listCol-items">
                <div class="container__listCol-items-img">
                    <div class="container__listCol-items-img-child"
                        style="background-image: url({{ $item->Before_Hover_IMG }});"></div>
                    <div class="container__listCol-items-img-child"
                        style="background-image: url({{ $item->After_Hover_IMG }});">
                    </div>
                    <div class="container__listCol-items-tittle">
                        <button onclick="location.href='{{ url('client/products/gucci') }}'">View More</button>
                    </div>
                </div>
            </div>
        @endforeach
        @foreach ($LV as $item)
            <div class="container__listCol-items">
                <div class="container__listCol-items-img">
                    <div class="container__listCol-items-img-child"
                        style="background-image: url({{ $item->Before_Hover_IMG }});"></div>
                    <div class="container__listCol-items-img-child"
                        style="background-image: url({{ $item->After_Hover_IMG }});"></div>
                    <div class="container__listCol-items-tittle">
                        <button onclick="location.href='{{ url('client/products/louis-vuiton') }}'">View More</button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="brands">
        @foreach ($channel as $item)
            <div class="brands__items">
                <img src="{{ $item->IMG }}" style="height: 100px; width: 100px;" alt="">
                <div class="brands__items-name">Chanel</div>
            </div>
        @endforeach
        @foreach ($dior as $item)
            <div class="brands__items">
                <img src="{{ $item->IMG }}" style="height: 100px; width: 100px;" alt="">
                <div class="brands__items-name">Dior</div>
            </div>
        @endforeach
        @foreach ($gucci as $item)
            <div class="brands__items">
                <img src="{{ $item->IMG }}" style="height: 60px; width: 100px;" alt="">
                <div class="brands__items-name">Gucci</div>
            </div>
        @endforeach
        @foreach ($LV as $item)
            <div class="brands__items">
                <img src="{{ $item->IMG }}" style="height: 100px; width: 100px;" alt="">
                <div class="brands__items-name">Louis Vuitton</div>
            </div>
        @endforeach
    </div>
    <div class="subscribeUs">
        <div class="subscribeUs__text">
            <div class="subscribeUs__text-firstText">Subscribe To Our Newsletter</div>
            <div class="subscribeUs__text-secondText">Keep your finger on the pulse of fashion with weekly
                round-ups
                of
                our
                latest arrivals, upcoming launches, special promotions and trend-focused editorials.
            </div>
            <div class="subscribeUs__text-input">
                <input type="text" placeholder="Email address" autocomplete="off">
                <button>Subscribe</button>
            </div>
        </div>
    </div>
    </div>
    <div class="scrollBackToTop">
        <button id="scrollUp">
            <ion-icon name="chevron-up-outline"></ion-icon>
        </button>
    </div>
    <div class="compareProducts">
        <div class="compareProducts__quantity">
            2
        </div>
        <a href="{{ url('/client/products/compareproduct') }}">
            <ion-icon name="git-compare-outline"></ion-icon>
        </a>
    </div>
    <script src="{{ asset('javascript/client/homepage.js') }}"></script>
    <script src="{{ asset('javascript/client/scrollUp.js') }}"></script>
@stop
