@extends('layouts.master')
@section('styles')
    <link rel="stylesheet" href="{{ asset('styles/pageStyle/wishList.css') }}">
@stop
@section('content')
<div class="main">
    <div class="container">
        <div class="container__sideBar">
            <div class="container__sideBar-box">
                <div class="container__sideBar-box-tittle">Category</div>
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
            <div class="container__list-tittle">Favorite List</div>
            <div class="container__list-products">
                <div class="container__list-products-top">
                    <div class="container__list-products-top-checkbox">
                        <input type="checkbox" name="" value="favor">
                    </div>
                    <div class="container__list-products-top-right">
                        <div class="container__list-products-top-right-total">
                            <p>Total</p>
                            <p>5 items</p>
                        </div>
                        <div class="container__list-products-top-right-button">
                            <button>Remove</button>
                            <button>Add To Cart</button>
                        </div>
                    </div>
                </div>
                <div class="container__list-products-list">
                    @foreach($this_customer as $item)
                    <div class="container__list-products-list-cart">
                        <div class="container__list-products-list-cart-checkbox">
                            <input type="checkbox" name="" value="favor">
                        </div>
                        <div class="container__list-products-list-cart-child">
                            <div class="container__product-list-cart-image">
                                <div class="container__product-list-cart-image-img">
                                    <img src="{{ $item->Main_IMG }}" style="width: 89px; height: 110px;"
                                        alt="">
                                </div>
                                <div class="container__product-list-cart-image-info">
                                    <div class="container__product-list-cart-info-name">{{ $item->Name }}</div>
                                </div>
                            </div>
                            <div class="container__product-list-cart-price">{{ $item->Color }}</div>
                            {{-- <div class="container__product-list-cart-quantity">
                               {{ $item-> }}
                            </div> --}}
                            <div class="container__product-list-cart-total">${{ $item->Export_Price }}</div>
                            <div class="container__product-list-cart-button">
                                <button>Remove</button>
                                <button>Add To Cart</button>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    {{-- <div class="container__list-products-list-cart">
                        <div class="container__list-products-list-cart-checkbox">
                            <input type="checkbox" name="" value="favor">
                        </div>
                        <div class="container__list-products-list-cart-child">
                            <div class="container__product-list-cart-image">
                                <div class="container__product-list-cart-image-img">
                                    <img src="./image/div1-right.png" style="width: 89px; height: 110px;"
                                        alt="">
                                </div>
                                <div class="container__product-list-cart-image-info">
                                    <div class="container__product-list-cart-info-name">Product Name</div>
                                </div>
                            </div>
                            <div class="container__product-list-cart-price">Color</div>
                            <div class="container__product-list-cart-quantity">
                                Category
                            </div>
                            <div class="container__product-list-cart-total">$1000</div>
                            <div class="container__product-list-cart-button">
                                <button>Remove</button>
                                <button>Add To Cart</button>
                            </div>
                        </div>
                    </div>
                    <div class="container__list-products-list-cart">
                        <div class="container__list-products-list-cart-checkbox">
                            <input type="checkbox" name="" value="favor">
                        </div>
                        <div class="container__list-products-list-cart-child">
                            <div class="container__product-list-cart-image">
                                <div class="container__product-list-cart-image-img">
                                    <img src="./image/div1-right.png" style="width: 89px; height: 110px;"
                                        alt="">
                                </div>
                                <div class="container__product-list-cart-image-info">
                                    <div class="container__product-list-cart-info-name">Product Name</div>
                                </div>
                            </div>
                            <div class="container__product-list-cart-price">Color</div>
                            <div class="container__product-list-cart-quantity">
                                Category
                            </div>
                            <div class="container__product-list-cart-total">$1000</div>
                            <div class="container__product-list-cart-button">
                                <button>Remove</button>
                                <button>Add To Cart</button>
                            </div>
                        </div>
                    </div>
                    <div class="container__list-products-list-cart">
                        <div class="container__list-products-list-cart-checkbox">
                            <input type="checkbox" name="" value="favor">
                        </div>
                        <div class="container__list-products-list-cart-child">
                            <div class="container__product-list-cart-image">
                                <div class="container__product-list-cart-image-img">
                                    <img src="./image/div1-right.png" style="width: 89px; height: 110px;"
                                        alt="">
                                </div>
                                <div class="container__product-list-cart-image-info">
                                    <div class="container__product-list-cart-info-name">Product Name</div>
                                </div>
                            </div>
                            <div class="container__product-list-cart-price">Color</div>
                            <div class="container__product-list-cart-quantity">
                                Category
                            </div>
                            <div class="container__product-list-cart-total">$1000</div>
                            <div class="container__product-list-cart-button">
                                <button>Remove</button>
                                <button>Add To Cart</button>
                            </div>
                        </div>
                    </div>
                    <div class="container__list-products-list-cart">
                        <div class="container__list-products-list-cart-checkbox">
                            <input type="checkbox" name="" value="favor">
                        </div>
                        <div class="container__list-products-list-cart-child">
                            <div class="container__product-list-cart-image">
                                <div class="container__product-list-cart-image-img">
                                    <img src="./image/div1-right.png" style="width: 89px; height: 110px;"
                                        alt="">
                                </div>
                                <div class="container__product-list-cart-image-info">
                                    <div class="container__product-list-cart-info-name">Product Name</div>
                                </div>
                            </div>
                            <div class="container__product-list-cart-price">Color</div>
                            <div class="container__product-list-cart-quantity">
                                Category
                            </div>
                            <div class="container__product-list-cart-total">$1000</div>
                            <div class="container__product-list-cart-button">
                                <button>Remove</button>
                                <button>Add To Cart</button>
                            </div>
                        </div>
                    </div>
                    <div class="container__list-products-list-cart">
                        <div class="container__list-products-list-cart-checkbox">
                            <input type="checkbox" name="" value="favor">
                        </div>
                        <div class="container__list-products-list-cart-child">
                            <div class="container__product-list-cart-image">
                                <div class="container__product-list-cart-image-img">
                                    <img src="./image/div1-right.png" style="width: 89px; height: 110px;"
                                        alt="">
                                </div>
                                <div class="container__product-list-cart-image-info">
                                    <div class="container__product-list-cart-info-name">Product Name</div>
                                </div>
                            </div>
                            <div class="container__product-list-cart-price">Color</div>
                            <div class="container__product-list-cart-quantity">
                                Category
                            </div>
                            <div class="container__product-list-cart-total">$1000</div>
                            <div class="container__product-list-cart-button">
                                <button>Remove</button>
                                <button>Add To Cart</button>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
    <hr class="main1">
</div>

@stop
