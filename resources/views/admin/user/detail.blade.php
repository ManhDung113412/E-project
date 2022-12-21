@extends('admin.layout.master')

@section('title')
User {{$user->username}}
@endsection

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">User
                    <small>Detail</small>
                </h1>
            </div>
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>Code User</th>
                        <th>User Name</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>DOB</th>
                        <th>Email</th>
                        <th>Number Phone</th>
                        <th>Rank</th>
                        <th>Total Spending (Doned Order)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="odd gradeX" align="center">
                        <td>{{$user->Code}}</td>
                        <td>{{$user->username}}</td>
                        <td>{{$user->First_Name}}</td>
                        <td>{{$user->Last_Name}}</td>
                        <td>{{$user->Dob}}</td>
                        <td>{{$user->Email}}</td>
                        <td>{{$user->Number_Phone}}</td>
                        <td>{{$user->Rank}}</td>
                        <td>
                            @php
                                $orders = App\Models\Order::where('Customer_ID', $user->ID)->where('Status', 'Done')->get();
dd($orders);
                                $arrOrders = [];
                                $totalSpending = 0;
                                foreach ($orders as $key => $order) {
                                   array_push($arrOrders, $order->ID);
                                   $order = App\Models\OrderDetail::where('Order_ID', $order->ID)->get();
                                   dd($order);
                                   $totalSpending += $order->Price;
                                }
                                dd($totalSpending);
                                // $orders_id = $orders->ID;
                                // dd($orders);
                                // $total_spending = App\Models\OrderDetail::where('Order_ID', 1)->get();
                                // dd($orders);
                            @endphp
                        </td>
                    </tr>
                </tbody>
            </table>
            <hr>
            {{-- <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>STT</th>
                        <th>Code User</th>
                        <th>User Name</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>DOB</th>
                        <th>Email</th>
                        <th>Number Phone</th>
                        <th>Rank</th>
                        <th>Detail</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $index => $user)
                    <tr class="odd gradeX" align="center">
                        <td>{{$index + 1}}</td>
                        <td>{{$user->Code}}</td>
                        <td>{{$user->username}}</td>
                        <td>{{$user->First_Name}}</td>
                        <td>{{$user->Last_Name}}</td>
                        <td>{{$user->Dob}}</td>
                        <td>{{$user->Email}}</td>
                        <td>{{$user->Number_Phone}}</td>
                        <td>{{$user->Rank}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table> --}}
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection