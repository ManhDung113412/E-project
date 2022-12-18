@extends('layouts.master')
@section('styles')
    <link rel="stylesheet" href="{{ asset('styles/pageStyle/product.css') }}">
@stop
@section('content')
<div class="main">
    <div class="container">
        <div class="container__productImage">
            <div class="container__productImage-preview">
                <div class="container__productImage-preview-image"></div>
                <div class="container__productImage-preview-image"></div>
                <div class="container__productImage-preview-image"></div>
            </div>
            <div class="container__productImage-mainImage"></div>
        </div>
        <div class="container__productInfo">
            <div class="container__productInfo-main">
                <div class="container__productInfo-main-info">
                    <div class="top">
                        <div class="top__name">Product Name</div>
                        <div class="top__favor"><ion-icon name="heart-outline"></ion-icon>
                        </div>
                    </div>
                    <div class="price">
                        <div class="price__discount">5000$</div>
                        <div class="price__cost">10000$</div>
                    </div>
                    <div class="color">
                        <p>Color</p>
                        <div class="white"></div>
                        <div class="grey"></div>
                        <div class="black"></div>
                    </div>
                </div>
                <div class="container__productInfo-main-add">
                    <button>Add to cart</button>
                </div>
                <hr>
                <div class="container__productInfo-main-descrip">
                    <p>Description</p>
                </div>
                <hr>
                <div class="container__productInfo-main-details">
                    <p>Details</p>
                </div>
            </div>
        </div>
    </div>
    <hr class="main__hr">
    <div class="main__alsoLike">
        <p>You May Also Like</p>
        <div class="main__alsoLike-product">
            <div class="main__alsoLike-product-card">
                <div class="main__alsoLike-product-card-image">
                    <img src="./image/div1-right.png" style="width: 281px; height: 375px;" alt="">
                </div>
                <div class="main__alsoLike-product-card-info">
                    <div class="main__alsoLike-product-card-info-name">Product Name</div>
                    <div class="main__alsoLike-product-card-info-price">Price</div>
                </div>
            </div>
            <div class="main__alsoLike-product-card">
                <div class="main__alsoLike-product-card-image">
                    <img src="./image/div1-right.png" style="width: 281px; height: 375px;" alt="">
                </div>
                <div class="main__alsoLike-product-card-info">
                    <div class="main__alsoLike-product-card-info-name">Product Name</div>
                    <div class="main__alsoLike-product-card-info-price">Price</div>
                </div>
            </div>
            <div class="main__alsoLike-product-card">
                <div class="main__alsoLike-product-card-image">
                    <img src="./image/div1-right.png" style="width: 281px; height: 375px;" alt="">
                </div>
                <div class="main__alsoLike-product-card-info">
                    <div class="main__alsoLike-product-card-info-name">Product Name</div>
                    <div class="main__alsoLike-product-card-info-price">Price</div>
                </div>
            </div>
            <div class="main__alsoLike-product-card">
                <div class="main__alsoLike-product-card-image">
                    <img src="./image/div1-right.png" style="width: 281px; height: 375px;" alt="">
                </div>
                <div class="main__alsoLike-product-card-info">
                    <div class="main__alsoLike-product-card-info-name">Product Name</div>
                    <div class="main__alsoLike-product-card-info-price">Price</div>
                </div>
            </div>
        </div>
    </div>
    <hr class="main__hr">
    <div class="main__reivew">
        <p>Reviews</p>
        <button>Write Us A Reviews</button>
    </div>
</div>
<div class="subscribeUs">
    <div class="subscribeUs__text">
        <div class="subscribeUs__text-firstText">Subscribe To Our Newsletter</div>
        <div class="subscribeUs__text-secondText">Keep your finger on the pulse of fashion with weekly round-ups
            of
            our
            latest arrivals, upcoming launches, special promotions and trend-focused editorials.
        </div>
        <input type="text" placeholder="Enter your email address"><button>SUBSCRIBE</button>
    </div>
</div>
@stop