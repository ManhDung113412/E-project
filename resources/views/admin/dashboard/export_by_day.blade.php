@extends('admin.layout.master')

@section('title')
    Export By Day
@endsection

@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="heading">
                    <div>
                        <h1 class="page-header">Export
                            <small>By Day</small>
                        </h1>
                    </div>
                </div>
                <div>
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr align="center">
                                <th>Total Quantity</th>
                                <th>1st Sale</th>
                                <th>2nd Sale</th>
                                <th>3rd Sale</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="odd gradeX" align="center">
                                <td>{{ $total_quantity }}</td>
                                {{-- @php
                                    dd($top_products);
                                @endphp --}}
                                {{-- @foreach ($top_products as $product) --}}
                                    <td>{{ $top_products[0]->Name }}: {{ $top_products[0]->Quantity }} Products</td>
                                    <td>{{ $top_products[1]->Name }}: {{ $top_products[1]->Quantity }} Products</td>
                                    <td>{{ $top_products[2]->Name }}: {{ $top_products[2]->Quantity }} Products</td>
                                {{-- @endforeach --}}
                                {{-- <td class="center">
                                    <i class="fa fa-trash-o  fa-fw"></i>
                                    <a href="{{route('adm   in.dashboard.revenue-by-month')}}"> See more</a>
                                </td>
                                <td class="center">
                                    <i class="fa fa-pencil fa-fw"></i>
                                    <a href="{{route('admin.dashboard.revenue-by-year')}}"> See more</a>
                                </td> --}}
                            </tr>
                        </tbody>
                    </table>
                    <canvas style="width: " id="myChart"></canvas>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.2/jquery.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.1.1/chart.min.js"></script> --}}

            {{-- <script>
                $(document).ready(function() {
                    var top_products = $('#page-wrapper').data('product')

                    console.log(top_products);

                    var listOfRevenue = []

                    top_products.forEach(function(element) {
                        listOfRevenue.push(element.Total_Revenue);
                        listOfProfit.push(element.Total_Profit);
                        listOfHours.push(element.time);
                    });

                    // const ctx = document.getElementById('myChart');

                    new Chart(ctx, {
                        type: 'pie',
                        data: {
                            labels: listOfHours,
                            datasets: [{
                                    label: 'Profit',
                                    data: listOfProfit,
                                    borderWidth: 1
                                },
                                {
                                    label: 'Revenue',
                                    data: listOfRevenue,
                                    borderWidth: 1
                                }
                            ]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });
                })
            </script> --}}
        </div>
    @endsection
