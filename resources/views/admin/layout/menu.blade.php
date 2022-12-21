<ul class="nav" id="side-menu">
    <li class="sidebar-search">
        <div class="input-group custom-search-form">
            <input type="text" class="form-control" placeholder="Search...">
            <span class="input-group-btn">
                <button class="btn btn-default" type="button">
                    <i class="fa fa-search"></i>
                </button>
            </span>
        </div>
        <!-- /input-group -->
    </li>
    {{-- <li>
        <a href="#"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
    </li> --}}
    <li>
        <a href="#"><i class="fa fa-th-large fa-fw"></i> Brand<span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">
            <li>
                <a href="{{route('admin.brand.index')}}">List Brand</a>
            </li>
            <li>
                <a href="{{route('admin.brand.create')}}">Add Brand</a>
            </li>
        </ul>
        <!-- /.nav-second-level -->
    </li>
    <li>
        <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Category<span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">
            <li>
                <a href="{{route('admin.category.index')}}">List Category</a>
            </li>
            <li>
                <a href="{{route('admin.category.create')}}">Add Category</a>
            </li>
        </ul>
        <!-- /.nav-second-level -->
    </li>
    <li>
        <a href="#"><i class="fa fa-shopping-cart"></i>  Order<span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">
            <li>
                <a href="{{route('admin.order-detail.index')}}">List Order</a>
            </li>
        </ul>
        <!-- /.nav-second-level -->
    </li>
    <li>
        <a href="#"><i class="fa fa-cube fa-fw"></i> Product<span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">
            <li>
                <a href="{{route('admin.product.index')}}">List Product</a>
            </li>
            <li>
                <a href="{{route('admin.product.create')}}">Add Product</a>
            </li>
        </ul>
        <!-- /.nav-second-level -->
    </li>
    <li>
        <a href="#"><i class="fa fa-list fa-fw"></i> Product Detail<span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">
            <li>
                <a href="{{route('admin.product-detail.index')}}">List Product Detail</a>
            </li>
            {{-- <li>
                <a href="{{route('admin.product-detail.create')}}">Add Product Detail</a>
            </li> --}}
        </ul>
        <!-- /.nav-second-level -->
    </li>
    <li>
        <a href="#"><i class="fa fa-users fa-fw"></i> User<span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">
            <li>
                <a href="{{route('admin.user.index')}}">List User</a>
            </li>
        </ul>
        <!-- /.nav-second-level -->
    </li>
</ul>