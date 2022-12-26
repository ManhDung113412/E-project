@extends('layouts.master')
@section('styles')
    <link rel="stylesheet" href="{{ asset('styles/pageStyle/checkOut.css') }}">

@stop
@section('content')
    <div class="main">
        <form action="Cart" method="POST" class="ajaxform">
            @csrf
            <div class="container">
                <div class="container__product">
                    <div class="container__product-big">
                        <div class="container__product-categories">
                            <div class="container__product-categories-product">Product</div>
                            <div class="container__product-categories-price">Price</div>
                            <div class="container__product-categories-quantity">Quantity</div>
                            <div class="container__product-categories-total">Total</div>
                            <div class="container__product-categories-button"></div>
                        </div>
                        <div class="container__product-list">
                            @foreach ($carts as $index => $item)
                                <div class="container__product-list-cart">
                                    <div class="container__product-list-cart-image">
                                        <a class="container__product-list-cart-image-img" href="">
                                            <img src="{{ $item->Main_IMG }}" style="width: 89px; height: 110px;"
                                                alt="">
                                        </a>
                                        <div class="container__product-list-cart-image-info">
                                            <div class="container__product-list-cart-info-name">{{ $item->Name }}</div>
                                            <div class="container__product-list-cart-info-cate"
                                                style="background-color: {{ $item->Color }}"></div>
                                        </div>
                                    </div>
                                    <input class="container__product-list-cart-price"
                                        value="{{ $item->Export_Price }}"></input>
                                    <div class="container__product-list-cart-quantity">

                                        {{-- -- --}}
                                        <button type="button" class="decrementQuantity"
                                            value="{{ $item->Product_Detail_ID }}">
                                            <ion-icon class="icon" name="remove-outline"></ion-icon>
                                        </button>

                                        <div class="result" max="5">{{ $item->Product_quantity }}</div>


                                        {{-- ++ --}}
                                        <button type="button" class="incrementQuantity"
                                            value="{{ $item->Product_Detail_ID }}">
                                            <ion-icon class="icon" name="add-outline"></ion-icon>
                                        </button>

                                        {{ csrf_field() }}

                                    </div>

                                    <div class="productSubtotal container__product-list-cart-total">
                                        ${{ $item->subtotal }}</div>
                                    <div class="container__product-list-cart-button">
                                        <a
                                            href="{{ url('/client/Cart/removefromcart', $item->Product_Detail_ID) }}">Remove</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </div>
                </div>
                <div class="container__cartTotal">
                    <div class="container__cartTotal-big">
                        <div class="container__cartTotal-big2">
                            <div class="container__cartTotal-big2-tittle">Cart Totals</div>
                            <hr class="hr1">
                            <div class="container__cartTotal-big2-info">
                                <div class="container__cartTotal-big2-info-sub">
                                    <div class="container__cartTotal-big2-info-sub-left">Subtotals</div>
                                    <div class="subtotals container__cartTotal-big2-info-sub-right">${{ $subtotals }}
                                    </div>
                                </div>
                                <div class="container__cartTotal-big2-info-ship">
                                    <div class="container__cartTotal-big2-info-left">Shipping</div>
                                    <div class="ship-money container__cartTotal-big2-info-right">$5</div>
                                </div>
                                <div class="container__cartTotal-big2-info-deli">
                                    {{-- <input type="text" list="ship" id="ship" placeholder="Delivery Option" /> --}}
                                    <select name="ship" id="ship">
                                        <option value="5">Standard - $5</option>
                                        <option value="8">Fast - $8</option>
                                        <option value="12">Priority - $12</option>
                                    </select>
                                </div>
                                <div class="container__cartTotal-big2-info-give">
                                    <div class="container__cartTotal-big2-info-give-left">Give Code</div>
                                    <div class="container__cartTotal-big2-info-give-right">Free Ship</div>
                                </div>

                                <div class="container__cartTotal-big2-info-code">
                                    <input id="discount-code" type="text" placeholder="    Enter Your Code">
                                    <button type="button" id="discount-code_btn">
                                        <ion-icon alt="Enter Your Code" name="arrow-forward-outline"></ion-icon>
                                    </button>
                                    <div id="discount">hehe</div>
                                </div>

                            </div>
                            <hr class="hr1">
                            <div class="container__cartTotal-big2-totalPrice">
                                <div class="container__cartTotal-big2-totalPrice-left">Total Price</div>
                                <div class="total-price container__cartTotal-big2-totalPrice-right"></div>
                            </div>
                            <div class="container__cartTotal-big2-button">
                                <button type="submit">Check Out</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </form>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>





    <script>
        var result = document.querySelectorAll("div .result");
        var productSubtotal = document.querySelectorAll("div .productSubtotal");


        $(document).ready(function() {
            var totalPrice = 0;
            var shipPrice = +$('#ship').val();
            var subtotals = +$('.subtotals').html().replace('$', '');
            var discount = $('#discount').html()
            if (discount.includes('-') || discount.includes('%')) {
                discount = $('#discount').html().replace('-', '');
                discount = $('#discount').html().replace('%', '');
                totalPrice = subtotals / discount + shipPrice;
            } else {
                totalPrice = subtotals + shipPrice;
            }
            $('.total-price').html("$" + totalPrice);

            // Increase Button
            $('.incrementQuantity').each(function(index) {
                $(this).on('click', function() {
                    var quantity = +result[index].innerHTML;
                    if (quantity === 5) {
                        return;
                    } else {
                        var product = $(this).val();
                        var _token = $('input[name="_token"]').val();
                        $.ajax({
                            url: "{{ route('client.shopping-cart.handle-increase-quantity') }}",
                            method: "POST",
                            data: {
                                product: product,
                                _token: _token
                            },
                            success: function(data) {
                                var hehe = JSON.parse(data);
                                result[index].innerHTML = hehe[0];
                                productSubtotal[index].innerHTML = "$" + hehe[
                                    1];
                                $('.subtotals').html("$" + hehe[2]);
                            }
                        })
                    }
                })
            })

            // Decrease Button
            $('.decrementQuantity').each(function(index) {
                $(this).on('click', function() {
                    var quantity = +result[index].innerHTML;
                    if (quantity === 0) {
                        return;
                    } else {
                        var product = $(this).val();
                        var _token = $('input[name="_token"]').val();
                        $.ajax({
                            url: "{{ route('client.shopping-cart.handle-decrease-quantity') }}",
                            method: "POST",
                            data: {
                                product: product,
                                _token: _token
                            },
                            success: function(data) {
                                var hehe = JSON.parse(data);
                                result[index].innerHTML = hehe[0];
                                productSubtotal[index].innerHTML = "$" + hehe[
                                    1];
                                $('.subtotals').html("$" + hehe[2]);

                            }
                        })
                    }
                })
            })

            // Ship Option
            $('#ship').on('change', function() {
                $('.ship-money').html("$" + this.value)
            });

            $('#discount-code_btn').on('click', function() {
                var discountCount = $('#discount-code').val();
                if (discountCount) {
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                        url: "{{ route('client.shopping-cart.get-discount-code') }}",
                        method: "POST",
                        data: {
                            discountCount: discountCount,
                            _token: _token
                        },
                        success: function(data) {
                            console.log(data);
                            if (typeof data == 'object') {
                                $('#discount').css('color', 'red').html(data['error']);
                            } else {
                                $('#discount').removeAttr('style').html("-" + data +
                                    "%");
                            }
                        }
                    })
                }
            });
        });
    </script>
@stop
