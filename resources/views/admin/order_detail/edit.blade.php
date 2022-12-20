@extends('admin.layout.master')

@section('title')
    Edit Order {{$order->ID}}
@endsection

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Order
                    <small>Edit</small>
                </h1>
            </div>
            @if (session('success'))
                 <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="{{ route('admin.order.update', $order->ID) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label>Order Code</label>
                        <h1 class="form-control">
                                {{ $order->Code }}
                        </h1>
                    </div>
                    <button type="submit" class="btn btn-default">Product Edit</button>
                    <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.2/jquery.min.js"></script>
</div>

<script>
    $(document).ready(function(){
        $('#brand').click(function(){
            var brand = $(this).val();
            if(brand != ''){
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url:"{{ route('admin.product.search') }}",
                    method:"POST",
                    data:{brand:brand, _token:_token},
                    success:function(data){
                    $('#categories').html(data);
                    }
                })
            }
        })
    })
</script>
@endsection