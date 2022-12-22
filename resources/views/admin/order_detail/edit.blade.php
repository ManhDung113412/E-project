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
                <form action="{{ route('admin.order-detail.update', $order->ID) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <h1 class="form-control">
                            <label>Order Code</label>:
                                {{ $order->Code }}
                        </h1>
                    </div>
                    <div class="form-group">
                        <h1 class="form-control">
                            <label>Customer Code</label>:
                            {{$user->Code}}
                        </h1>
                    </div>
                    <div class="form-group">
                        <h1 class="form-control">
                            <label>Customer Name</label>:
                                {{ $order->customer->Last_Name }}
                        </h1>
                    </div>
                    <div class="form-group">
                        <h1 class="form-control">
                            <label>Customer Name</label>:
                                {{ $order->Location}}
                        </h1>
                    </div>
                    <div class="form-group">
                        <h1 class="form-control">
                            <label>Payment</label>:
                                {{ $order->payment->Method }}
                        </h1>
                    </div>
                    <div class="form-group">
                        <h1 class="form-control">
                            <label>Discount Code</label>:
                                {{ $order->code->Code }}
                        </h1>
                    </div>
                    <div class="form-group">
                        <h1 class="form-control">
                            <label>Discount Code</label>:
                            <select name="status">
                                <option @if ($order->Status == "Pending") selected @endif value="Pending">Pending</option>
                                <option @if ($order->Status == "Done") selected @endif value="Done">Done</option>
                                <option @if ($order->Status == "Cancel") selected @endif value="Cancel">Cancel</option>
                            </select>
                        </h1>
                    </div>
                    <button type="submit" class="btn btn-default">Order Edit</button>
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