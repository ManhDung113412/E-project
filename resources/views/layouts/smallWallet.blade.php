@extends('layouts.master')
@section('styles')
    <link rel="stylesheet" href="{{ asset('styles/pageStyle/productPage.css') }}">
    <link rel="stylesheet" href="{{ asset('styles/pageStyle/subsAndScroll.css') }}">
@stop
@section('content')
    <div class="main">

        <div class="container">
            <div class="container__sideBar">
                <div class="container__sideBar-box">
                    <div class="container__sideBar-box-tittle">Categories</div>
                    <hr class="box1">
                    <div class="container__sideBar-box-cate">
                        <input type="checkbox" name="" id="filter" value="filter">
                        <div class="container__sideBar-box-cate-name">Long Wallet</div>
                    </div>
                    <div class="container__sideBar-box-cate">
                        <input type="checkbox" name="" id="filter" value="filter">
                        <div class="container__sideBar-box-cate-name">Small Wallet</div>
                    </div>
                    <div class="container__sideBar-box-cate">
                        <input type="checkbox" name="" id="filter" value="filter">
                        <div class="container__sideBar-box-cate-name">Cards Holder</div>
                    </div>
                    <div class="container__sideBar-box-cate">
                        <input type="checkbox" name="" id="filter" value="filter">
                        <div class="container__sideBar-box-cate-name">Chain and Strap Wallet</div>
                    </div>
                </div>
                <div class="container__sideBar-box">
                    <div class="container__sideBar-box-tittle">Price</div>
                    <hr class="box1">
                    <div class="container__sideBar-box-cate">
                        <input type="checkbox" name="" id="filter" value="filter">
                        <div class="container__sideBar-box-cate-name">High to low</div>
                    </div>
                    <div class="container__sideBar-box-cate">
                        <input type="checkbox" name="" id="filter" value="filter">
                        <div class="container__sideBar-box-cate-name">Low to high</div>
                    </div>
                </div>
                <div class="container__sideBar-box">
                    <div class="container__sideBar-box-tittle">Collection</div>
                    <hr class="box1">
                    <div class="container__sideBar-box-cate">
                        <input type="checkbox" name="" id="filter" value="filter">
                        <div class="container__sideBar-box-cate-name">New Arrivals</div>
                    </div>
                    <div class="container__sideBar-box-cate">
                        <input type="checkbox" name="" id="filter" value="filter">
                        <div class="container__sideBar-box-cate-name">Trending</div>
                    </div>
                    <div class="container__sideBar-box-cate">
                        <input type="checkbox" name="" id="filter" value="filter">
                        <div class="container__sideBar-box-cate-name">Discount</div>
                    </div>
                </div>
            </div>
            <div class="container__list">
                <div class="container__list-tittle">Small Wallet</div>
                <div class="container__list-products">
                    @foreach ($smallWallet as $item)
                        <div class="container__list-products-item">
                            <div src=""
                                style="background-image: url({{ $item->IMG }})"
                                class="container__list-products-item-img"></div>
                            <div class="container__list-products-item-info">
                                <p>{{ $item->Name }}</p>
                                <p>$1000</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    {!! $smallWallet->links() !!}
    <hr class="main1">
    </div>
    <div class="container__featured">
        <div class="container__featured-tittle">You May Also Like</div>
        <div class="container__featured-products">
            <div class="container__featured-products">
                @foreach($randomProduct as $item)
                <div class="container__featured-products-items">
                    <div style="background-image: url({{ $item->IMG }})"
                        class="container__featured-products-items-img"></div>
                    <div class="container__featured-products-items-info">
                        <p>{{ $item->Name }}</p>
                        <p>$1000</p>
                    </div>
                </div>
                @endforeach
        </div>
    </div>
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
    <div class="scrollBackToTop">
        <button id="scrollUp">
            <ion-icon name="chevron-up-outline"></ion-icon>
        </button>
    </div>
    <script src="{{ asset('javascript/client/scrollUp.js') }}"></script>
@stop
