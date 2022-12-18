@extends('layouts.master')
@section('styles')
    <link rel="stylesheet" href="{{ asset('styles/pageStyle/homepage.css') }}">
@stop
@section('content')
    <div class="container">
        <div class="container__slideCol">
            <div id="slideS" class="container__slideCol-list">
                @foreach ($img_header_collection as $img)
                    <div style="background-image: url('{{ $img->img_source }}')" class="container__slideCol-item">
                        <div class="container__slideCol-item-content">
                            <p class="container__left-frame-text-p1">Best Fashion For You..</p>
                            <p class="container__left-frame-text-p2">New Fashion Collection Trends in 2022</p>
                            <a href="">Shop Now</a>
                        </div>
                    </div>
                @endforeach
                {{-- <div id="item2" style="background-image: url(./charles-keith-home-s-banner-1920.jpg)"
                    class="container__slideCol-item">
                    <div class="container__slideCol-item-content">
                        <p class="container__left-frame-text-p1">Best Fashion For You..</p>
                        <p class="container__left-frame-text-p2">New Fashion Collection Trends in 2022</p>
                        <a href="">Shop Now</a>
                    </div>
                </div>
                <div id="item2" style="background-image: url(./Bag-Chanel.jpg)" class="container__slideCol-item">
                    <div class="container__slideCol-item-content">
                        <p class="container__left-frame-text-p1">Best Fashion For You..</p>
                        <p class="container__left-frame-text-p2">New Fashion Collection Trends in 2022</p>
                        <a href="">Shop Now</a>
                    </div>
                </div> --}}
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
                <a href="" class="container__featured-products-items">
                    <div style="background-image: url('')" class="container__featured-products-items-img"></div>
                    <div class="container__featured-products-items-info">
                        <p>Product Name</p>
                        <p>$1000</p>
                    </div>
                </a>
                <div class="container__featured-products-items">
                    <div style="background-image: url('')" class="container__featured-products-items-img"></div>
                    <div class="container__featured-products-items-info">
                        <p>Product Name</p>
                        <p>$1000</p>
                    </div>
                </div>
                <div class="container__featured-products-items">
                    <div style="background-image: url('')" class="container__featured-products-items-img"></div>
                    <div class="container__featured-products-items-info">
                        <p>Product Name</p>
                        <p>$1000</p>
                    </div>
                </div>
                <div class="container__featured-products-items">
                    <div style="background-image: url('')" class="container__featured-products-items-img"></div>
                    <div class="container__featured-products-items-info">
                        <p>Product Name</p>
                        <p>$1000</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container__newArrivals">
            <div class="container__newArrivals-content">
                <div class="container__newArrivals-content-tittle">
                    <a href="">New Arrivals</a>
                </div>
                <div class="container__newArrivals-content-text">
                    Make bold fashion choices with our latest Purse and Wallets
                </div>
                <div class="container__newArrivals-content-button">
                    <a href="">
                        <p>Shop Now</p>
                    </a>
                </div>
            </div>
            <div class="container__newArrivals-collection">
                <div id="colListNew" class="container__newArrivals-collection-slide">
                    @foreach ($img_middle_collection as $img)
                        <div class="container__newArrivals-collection-list"
                            style="background-image: url({{ $img->img_source }});">
                            <div class="content">
                                <div class="tittle">{{ $img->title }}</div>
                                <button>See more >></button>
                            </div>
                        </div>
                    @endforeach
                    {{-- <div class="container__newArrivals-collection-list" style="background-image: url(./Bag-Chanel.jpg);">
                        <div class="content">
                            <div class="tittle">Spring is coming</div>
                            <button>See more >></button>
                        </div>
                    </div>
                    <div class="container__newArrivals-collection-list"
                        style="background-image: url(./Chanel-Fashion-Show-Detail-SS-2020.jpg);">
                        <div class="content">
                            <div class="tittle">Winter is back</div>
                            <button>See more >></button>
                        </div>
                    </div>
                    <div class="container__newArrivals-collection-list"
                        style="background-image: url(./Chanel-Bag-Womenswear.jpg);">
                        <div class="content">
                            <div class="tittle">Spring is coming</div>
                            <button>See more >></button>
                        </div>
                    </div>
                    <div class="container__newArrivals-collection-list"
                        style="background-image: url(./HeroRegularStandard_GUCCI-GIFT-G.jpg);">
                        <div class="content">
                            <div class="tittle">Spring is coming</div>
                            <button>See more >></button>
                        </div>
                    </div>
                    <div class="container__newArrivals-collection-list"
                        style="background-image: url(./SS-2020-Bag-Chanel.jpg);">
                        <div class="content">
                            <div class="tittle">Winter is back</div>
                            <button>See more >></button>
                        </div>
                    </div>
                    <div class="container__newArrivals-collection-list"
                        style="background-image: url(./Bag-Chanel-Spring-Summer-2020.jpg);">
                        <div class="content">
                            <div class="tittle">Spring is coming</div>
                            <button>See more >></button>
                        </div>
                    </div> --}}
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
            <div class="container__featured-tittle">Trending Now</div>
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
        <div class="container__listCol">
            <div class="container__listCol-items">
                <div class="container__listCol-items-img">
                    <div class="container__listCol-items-img-child"
                        style="background-image: url('https://res.cloudinary.com/dsqiav317/image/upload/v1671113133/collection/Bag-Chanel-Summer-Trends-2020_bkn7sd.jpg');">
                    </div>
                    <div class="container__listCol-items-img-child"
                        style="background-image: url('https://res.cloudinary.com/dsqiav317/image/upload/v1671113135/collection/Chanel-Summer-2020-Bag_ww9sil.jpg');">
                    </div>
                    <div class="container__listCol-items-tittle">
                        <button>View More</button>
                    </div>
                </div>
            </div>
            <div class="container__listCol-items">
                <div class="container__listCol-items-img">
                    <div class="container__listCol-items-img-child"
                        style="background-image: url('https://res.cloudinary.com/dsqiav317/image/upload/v1671113147/collection/Dior-Fall-2020-Runway-Bag-Collection-5_g5j7l6.jpg');">
                    </div>
                    <div class="container__listCol-items-img-child"
                        style="background-image: url('https://res.cloudinary.com/dsqiav317/image/upload/v1671113146/collection/Dior-Fall-2020-Runway-Bag-Collection_tjvue5.jpg');">
                    </div>
                    <div class="container__listCol-items-tittle">
                        <button>View More</button>
                    </div>
                </div>

            </div>
            <div class="container__listCol-items">
                <div class="container__listCol-items-img">
                    <div class="container__listCol-items-img-child"
                        style="background-image: url('https://res.cloudinary.com/dsqiav317/image/upload/v1671113156/collection/63aeece630d8df78acf77978c2161515_dfmbyn.jpg');">
                    </div>
                    <div class="container__listCol-items-img-child"
                        style="background-image: url('https://res.cloudinary.com/dsqiav317/image/upload/v1671113158/collection/original_jc9vqg.jpg');">
                    </div>
                    <div class="container__listCol-items-tittle">
                        <button>View More</button>
                    </div>
                </div>

            </div>
            <div class="container__listCol-items">
                <div class="container__listCol-items-img">
                    <div class="container__listCol-items-img-child"
                        style="background-image: url('https://res.cloudinary.com/dsqiav317/image/upload/v1671113170/collection/W_Fa_Wild_at_Heart_V2_hdta49.png');">
                    </div>
                    <div class="container__listCol-items-img-child"
                        style="background-image: url('https://res.cloudinary.com/dsqiav317/image/upload/v1671113171/collection/W_Fa_Wild_at_Heart_V4_nwfyd9.png');">
                    </div>
                    <div class="container__listCol-items-tittle">
                        <button>View More</button>
                    </div>
                </div>

            </div>
        </div>
        <div class="brands">
            <div class="brands__items">
                <img src="https://res.cloudinary.com/dsqiav317/image/upload/v1671117308/collection/kisspng-chanel-no-5-coco-designer-fashion-5b3814a67e60a8.5145910415304019585177_my5lub.png"
                    style="height: 100px; width: 100px;" alt="">
                <div class="brands__items-name">Chanel</div>
            </div>
            <div class="brands__items">
                <img src="https://res.cloudinary.com/dsqiav317/image/upload/v1671117299/collection/kisspng-christian-dior-se-parfums-christian-dior-miss-dior-cognitive-5b2e17476580a9.5535051615297472714158_yqbev0.png"
                    style="height: 100px; width: 100px;" alt="">
                <div class="brands__items-name">Dior</div>
            </div>
            <div class="brands__items">
                <img src="https://res.cloudinary.com/dsqiav317/image/upload/v1671117291/collection/kisspng-gucci-milan-fashion-week-italian-fashion-logo-logo-gucci-5b23156f47e071.8334917815290259032944_uhxjcj.png"
                    style="height: 60px; width: 100px;" alt="">
                <div class="brands__items-name">Gucci</div>
            </div>
            <div class="brands__items">
                <img src="https://res.cloudinary.com/dsqiav317/image/upload/v1671117244/collection/kisspng-lvmh-brand-logo-clothing-fashion-logo-gucci-5b492e7b831ea3.3283494915315226835371_mndvzs.png"
                    style="height: 100px; width: 100px;" alt="">
                <div class="brands__items-name">Louis Vuitton</div>
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
    </div>
    <div class="scrollBackToTop">
        <button id="scrollUp">
            <ion-icon name="chevron-up-outline"></ion-icon>
        </button>
    </div>
    <script src="{{ asset('javascript/client/homepage.js') }}"></script>
    <script>
        document.getElementById('next').onclick = function(e) {
            e.preventDefault();
            let lists = document.querySelectorAll('.container__slideCol-item');
            document.getElementById('slideS').appendChild(lists[0]);
        }

        document.getElementById('nextNew').onclick = function(e) {
            e.preventDefault();
            let colLists = document.querySelectorAll('.container__newArrivals-collection-list');
            document.getElementById('colListNew').appendChild(colLists[0]);
        }
    </script>
@stop
