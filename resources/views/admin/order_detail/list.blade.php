@extends('admin.layout.master')

@section('title')
    Order
@endsection

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Order
                    <small>List</small>
                </h1>
            </div>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <!-- /.col-lg-12 -->
            <div style="overflow: scroll; width: 100%">
                <table style="width: 100%;" class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr align="center">
                            <th>STT</th>
                            <th>Order Code</th>
                            <th>Customer Code</th>
                            <th>Customer</th>
                            <th>Total Quantity</th>
                            <th>Total Price</th>
                            <th>Status</th>
                            <th>Location</th>
                            <th>Payment</th>
                            <th>Date</th>
                            <th>Detail</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $index => $order)
                        <tr class="odd gradeX" align="center">
                            <td>{{$index + 1}}</td>
                            <td>{{$order->Code}}</td>
                            <td>
                                @php
                                    $user = App\Models\User::where('id', $order->Customer_ID)->get();
                                    echo $user[0]->Code;
                                @endphp    
                            </td>
                            <td>{{$order->customer->Last_Name}}</td>
                            <td>{{ App\Models\OrderDetail::where('Order_ID', $order->ID)->sum('Quantity') }}</td>
                            <td>${{ App\Models\OrderDetail::where('Order_ID', $order->ID)->sum('Price') }}</td>
                            <th 
                            @if ($order->Status == 'Pending')
                                class="btn-success"
                            @elseif ($order->Status == 'Cancel')
                                class="btn-danger"
                            @elseif ($order->Status == 'Done')
                                class="btn-warning"
                            @endif
                            >{{$order->Status}}
                            </th>
                            <td>{{$order->Location}}</td>
                            <td>{{$order->payment->Method}}</td>
                            <td>{{$order->created_at}}</td>
                            <td class="center"><i class="fa fa-eye  fa-fw"></i><a href="{{route('admin.order-detail.detail', $order->ID)}}"> View</a></td>
                            <td class="center"><i class="fa fa-pencil  fa-fw"></i><a href="{{route('admin.order-detail.edit', $order->ID)}}"> Edit</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{-- {!! $product_details->links() !!} --}}
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection