@extends('layouts.master')
@section('styles')
    <link rel="stylesheet" href="{{ asset('styles/pageStyle/order.css') }}">
@stop
@section('content')
    <form action="">
        <div class="container">
            <div class="container__info">
                <div class="container__info-title">
                    <div class="container__info-title-id">{{ $this_order[0]->Code }}</div>
                    <div class="container__info-title-date"{{ $this_order[0]->created_at }}</div>
                    </div>
                    <div class="container__info-status" style="background-color: teal;">
                        {{ $this_order[0]->Status }}
                    </div>
                </div>
                <div class="container__orders">
                    @foreach ($this_order_details as $item)
                        <div class="container__orders-items">
                            <div class="container__orders-items-price">${{ $item->Price }}</div>
                            <div class="container__orders-items-quantity">{{ $item->Quantity }}</div>
                            <div class="container__orders-items-img" style="background-image: url({{ $item->Main_IMG }});">
                            </div>
                            <div class="container__orders-items-info">
                                {{ $item->Name }}
                            </div>
                        </div>
                    @endforeach
                </div>
                @foreach($this_order_details as $item)
                <div class="container__details">
                    <div class="container__details-total">
                        <div class="container__details-total-left">
                            <div class="quantity">
                                <div id="div1">Total quantity</div>
                                <div id="div2">{{ $total_quantity }}</div>
                            </div>
                            <div class="address">
                                <div id="div1">Address</div>
                                <div id="div2">{{ $item->Location }}</div>
                            </div>
                            {{-- <div class="ship">
                        <div id="div1">Delivery</div>
                        <div id="div2">$10</div>
                    </div> --}}
                            <div class="givecode">
                                <div id="div1">Offer</div>
                                <div id="div2">None</div>
                            </div>
                        </div>
                        <div class="container__details-total-right">
                            <div><b>Total Price</b></div>
                            <div>${{ $item->Total_Paid }}</div>
                        </div>
                    </div>
                    <div class="container__details-button">
                        <a href="">Cancel Order</a>
                    </div>
                </div>
                @endforeach
            </div>
    </form>
@stop
