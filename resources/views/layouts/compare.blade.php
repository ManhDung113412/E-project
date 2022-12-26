@extends('layouts.master')
@section('styles')
    <link rel="stylesheet" href="{{ asset('styles/pageStyle/compare.css') }}">
@stop
@section('content')
    <div class="container">
        <div class="maintable">
            <table>
                <tr>
                    <th>

                    </th>
                    <td >
                       <img src="{{ $product_1 ->Main_IMG  }}" alt=""> 
                    </td>
                    <td>
                        <img src="{{ $product_2 ->Main_IMG  }}" alt=""> 
                    </td>
                </tr>
                <tr>
                    <th>
                        Name
                    </th>
                    <td>
                        {{ $product_1->Name }}
                    </td>
                    <td>
                        {{ $product_2->Name }}
                    </td>
                </tr>
                <tr>
                    <th>
                        Price
                    </th>
                    <td>
                       $ {{ $product_1->Export_Price }}
                    </td>
                    <td>
                        $ {{ $product_2->Export_Price }}
                    </td>
                </tr>
                <tr>
                    <th>
                        Color
                    </th>
                    <td>
                        {{ $product_1->Color }}
                    </td>
                    <td>
                        {{ $product_2->Color }}
                    </td>
                </tr>
                <tr>
                    <th>
                        Materials
                    </th>
                    <td>
                        {{ $product_1->Material }}
                    </td>
                    <td>
                        {{ $product_2->Material }}
                    </td>
                </tr>
                <tr>
                    <th>
                        Size
                    </th>
                    <td>
                        {{ $product_1->Size }}
                    </td>
                    <td>
                        {{ $product_2->Size }}
                    </td>
                </tr>
                <tr>
                    <th>

                    </th>
                    <td>
                        <a href="{{ url('/client/wishlist/addtowishlist', $product_1->ID) }}">Add To Wishlist</a>
                        <a href="{{ url('/client/wishlist/addtocart', $product_1->ID) }}">Add To Cart</a>
                    </td>
                    <td>
                        <a href="{{ url('/client/wishlist/addtowishlist', $product_2->ID) }}">Add To Wishlist</a>
                        <a href="{{ url('/client/wishlist/addtocart', $product_2->ID) }}">Add To Cart</a>
                    </td>
                </tr>
            </table>
        </div>
    </div>
@stop
