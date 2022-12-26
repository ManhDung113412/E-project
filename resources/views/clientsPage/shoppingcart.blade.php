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
                                    {{-- <div class="container__cartTotal-big2-info-sub-right">${{$carts[0]->subtotal}}</div> --}}
                                </div>
                                <div class="container__cartTotal-big2-info-ship">
                                    <div class="container__cartTotal-big2-info-left">Shipping</div>
                                    <div class="container__cartTotal-big2-info-right">$5</div>
                                </div>
                                <div class="container__cartTotal-big2-info-deli">
                                    <input type="text" list="ship" placeholder="Delivery Option" />
                                    <datalist id="ship">
                                        <option value="    Standard  - $5">
                                        <option value="    Fast  - $8">
                                        <option value="    Priority - $12">
                                    </datalist>
                                </div>
                                <div class="container__cartTotal-big2-info-give">
                                    <div class="container__cartTotal-big2-info-give-left">Give Code</div>
                                    <div class="container__cartTotal-big2-info-give-right">Free Ship</div>
                                </div>
                                <div class="container__cartTotal-big2-info-code">
                                    <input type="text" placeholder="    Enter Your Code">
                                    <button>
                                        <ion-icon alt="Enter Your Code" name="arrow-forward-outline"></ion-icon>
                                    </button>
                                </div>
                            </div>
                            <hr class="hr1">
                            <div class="container__cartTotal-big2-totalPrice">
                                <div class="container__cartTotal-big2-totalPrice-left">Total Price</div>
                                <div class="container__cartTotal-big2-totalPrice-right">$10000</div>
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

        console.log(productSubtotal);

        $(document).ready(function() {
            $('.incrementQuantity').each(function(index) {
                $(this).on('click', function() {
                    // sibling = $(this).siblings(".result").html()
                    // console.log(sibling);
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
                            // $('.result').html(hehe[0]);
                            // $('.productSubtotal').html("$" + hehe[1]);

                            result[index].innerHTML = hehe[0];
                            productSubtotal[index].innerHTML = "$" + hehe[1];

                            // $(this).siblings(".result").html(hehe[0])
                            // $(this).siblings(".productSubtotal").html(hehe[1])
                            console.log(data);
                        }
                    })
                })
            })

            $('.decrementQuantity').each(function(index) {
                $(this).on('click', function() {
                    console.log($(this).val());


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
                            // $('.result').html(hehe[0]);
                            // $('.productSubtotal').html("$" + hehe[1]);

                            result[index].innerHTML = hehe[0];
                            productSubtotal[index].innerHTML = "$" + hehe[1];
                        }
                    })
                })
            })

        });
    </script>
@stop
