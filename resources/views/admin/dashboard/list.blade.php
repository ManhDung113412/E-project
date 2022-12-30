@extends('admin.layout.master')

@section('title')
    Admin
@endsection

@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="heading">
                    <div>
                        <h1 class="page-header">Dashboard</h1>
                    </div>
                </div>

                <div style="display: inline-grid;">
                    <div class="card" style="width: 50%;">
                        <div class="card-body">
                            <img class="card-img-top" style="width:200px" src="{{ asset('admin/img/Revenue.jpg') }}" alt="Card image">
                            <h1 class="card-title">
                                <i class="fa fa-money fa-fw"></i>
                                Revenue
                            </h1>
                            <a href="{{route('admin.dashboard.revenue')}}" class="btn btn-primary">See Detail</a>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <img class="card-img-top" style="width:200px" src="{{ asset('admin/img/Revenue.jpg') }}" alt="Card image">
                            <h1 class="card-title">
                                <i class="fa fa-money fa-fw"></i>
                                Số lượng sản phẩm bán ra 
                            </h1>
                            <a href="{{route('admin.dashboard.export')}}" class="btn btn-primary">See Detail</a>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <img class="card-img-top" style="width:200px" src="{{ asset('admin/img/Revenue.jpg') }}" alt="Card image">
                            <h1 class="card-title">
                                <i class="fa fa-money fa-fw"></i>
                                Orders
                            </h1>
                            <a href="{{route('admin.dashboard.order')}}" class="btn btn-primary">See Detail</a>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <img class="card-img-top" style="width:200px" src="{{ asset('admin/img/Revenue.jpg') }}" alt="Card image">
                            <h1 class="card-title">
                                <i class="fa fa-money fa-fw"></i>
                                Users
                            </h1>
                            <a href="{{route('admin.dashboard.user')}}" class="btn btn-primary">See Detail</a>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <img class="card-img-top" style="width:200px" src="{{ asset('admin/img/Revenue.jpg') }}" alt="Card image">
                            <h1 class="card-title">
                                <i class="fa fa-money fa-fw"></i>
                                Trending Product
                            </h1>
                            <a href="{{route('admin.dashboard.trending-product')}}" class="btn btn-primary">See Detail</a>
                        </div>
                    </div>
                    
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.2/jquery.min.js"></script>
            <script src="https://cdnjs.com/libraries/Chart.js"></script>
        </div>

        <script></script>
    @endsection
