@extends('layouts.master')
@section('styles')
    <link rel="stylesheet" href="{{ asset('styles/pageStyle/productPage.css') }}">
@stop
@section('content')
    <div class="container">
        <div class="container__sidebar">
            <div class="container__sidebar-Category">
                <ul>
                    <h3>CATEGORIES</h3>
                    <hr>
                    <li><input type="checkbox">
                        Long Wallet
                    </li>
                    <li><input type="checkbox">
                        Small Wallet
                    </li>
                    <li><input type="checkbox">
                        Cards Holder
                    </li>
                    <li><input type="checkbox">
                        Chain And Strap Wallets
                    </li>
                </ul>
                <ul>
                    <h3>Price</h3>
                    <hr>
                    <li><input type="checkbox">
                        High To Low
                    </li>
                    <li><input type="checkbox">
                        Low To High
                    </li>
                </ul>
                <ul>
                    <h3>For</h3>
                    <hr>
                    <li><input type="checkbox">
                        Men
                    </li>
                    <li><input type="checkbox">
                        Women
                    </li>
                </ul>
                <ul>
                    <h3>For</h3>
                    <hr>
                    <li><input type="checkbox">
                        New Arrivals
                    </li>
                    <li><input type="checkbox">
                        Trending
                    </li>
                    <li><input type="checkbox">
                        Discounted Products
                    </li>
                </ul>
            </div>
        </div>
        <div class="container__mainside">
            <div class="container__mainside-title">
                <h1>New Arrival</h1>
            </div>
            <div class="container__mainside-products-row1">
                <div class="product-card"><img
                        src="{{ asset('assets/image/658610_17WAG_1283_001_080_0000_Light-GG-Marmont-card-case-wallet.jpg') }}"
                        alt=""></div>
                <div class="product-card"><img
                        src="{{ asset('assets/image/louis-vuitton-sarah-wallet--N63551_PM1_Back view.png') }}"
                        alt=""></div>
                <div class="product-card"><img
                        src="{{ asset('assets/image/louis-vuitton-sarah-wallet--N63551_PM1_Interior view.png') }}"
                        alt=""></div>
            </div>
            <div class="container__mainside-products-row2">
                <div class="product-card"><img
                        src="{{ asset('assets/image/louis-vuitton-sarah-wallet--N63551_PM1_Side view.png') }}"
                        alt=""></div>
                <div class="product-card"></div>
                <div class="product-card"></div>
            </div>
            <div class="container__mainside-products-row3">
                <div class="product-card"></div>
                <div class="product-card"></div>
                <div class="product-card"></div>
            </div>
            <div class="container__mainside-products-row4">
                <div class="product-card"></div>
                <div class="product-card"></div>
                <div class="product-card"></div>
            </div>
        </div>
    </div>
@stop
