@extends('layouts.master')
@section('styles')
    <link rel="stylesheet" href="{{ asset('styles/pageStyle/product.css') }}">
@stop
@section('content')
<div class="main">
    <div class="container">
        <div class="container__productImage">
            <div class="container__productImage-preview">
                <div class="container__productImage-preview-image" style="background-image: url(./a/8855835508766.png);"></div>
                <div class="container__productImage-preview-image" style="background-image: url(./a/8855835541534.png);"></div>
                <div class="container__productImage-preview-image" style="background-image: url(./a/8855835574302.png);"></div>
            </div>
            <div id="abc" class="container__productImage-mainImage" style="background-image: url(./a/8855835639838.png);"></div>
        </div>
        <div class="container__productInfo">
            <div class="container__productInfo-main">
                <div class="container__productInfo-main-info">
                    <div class="top">
                        <div class="top__name">Product Name</div>
                        <div class="top__favor">
                            <ion-icon name="heart-outline"></ion-icon>
                        </div>
                    </div>
                    <div class="price">
                        <div class="price__discount">5000$</div>
                        <div class="price__cost">10000$</div>
                    </div>
                    <div class="color">
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

</div>
<hr class="main__hr">
<div class="main__reivew">
    <p>Reviews</p>
    <button>Write Us A Reviews</button>
</div>
<div class="container__featured">
    <div class="container__featured-tittle">You May Also Like</div>
    <div class="container__featured-products">
        <div class="container__featured-products-items">
            <div style="background-image: url(./8858227441694-removebg-preview.png)"
                class="container__featured-products-items-img"></div>
            <div class="container__featured-products-items-info">
                <p>Product Name</p>
                <p>$1000</p>
            </div>
        </div>
        <div class="container__featured-products-items">
            <div style="background-image: url(./8858227441694-removebg-preview.png)"
                class="container__featured-products-items-img"></div>
            <div class="container__featured-products-items-info">
                <p>Product Name</p>
                <p>$1000</p>
            </div>
        </div>
        <div class="container__featured-products-items">
            <div style="background-image: url(./8858227441694-removebg-preview.png)"
                class="container__featured-products-items-img"></div>
            <div class="container__featured-products-items-info">
                <p>Product Name</p>
                <p>$1000</p>
            </div>
        </div>
        <div class="container__featured-products-items">
            <div style="background-image: url(./8858227441694-removebg-preview.png)"
                class="container__featured-products-items-img"></div>
            <div class="container__featured-products-items-info">
                <p>Product Name</p>
                <p>$1000</p>
            </div>
        </div>
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
<script src="{{ asset('javascript/client/product.js') }}"></script>
@stop
