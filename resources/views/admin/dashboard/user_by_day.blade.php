@extends('admin.layout.master')

@section('title')
    Users By Day
@endsection

@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="heading">
                    <div>
                        <h1 class="page-header">Users
                            <small>By Day</small>
                        </h1>
                    </div>
                </div>
                <div>
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr align="center">
                                <th>Total Users</th>
                                <th>Today's New Users</th>
                                <th>Uers By Month</th>
                                <th>Users By Year</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="odd gradeX" align="center">
                                <td>{{ $total_users[0]->total_users }}</td>
                                <td>{{ $new_users }}</td>
                                <td class="center">
                                    <i class="fa fa-trash-o  fa-fw"></i>
                                    <a href="{{ route('admin.dashboard.user-by-month') }}"> See more</a>
                                </td>
                                <td class="center">
                                    <i class="fa fa-pencil fa-fw"></i>
                                    <a href="{{ route('admin.dashboard.user-by-year') }}"> See more</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div id="chart_div" style="width: 100%; height: 500px;"></div>  
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->

            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
            <script type="text/javascript">
                google.charts.load('current', {
                    'packages': ['corechart']
                });
                google.charts.setOnLoadCallback(drawChart);



                function drawChart() {
                    var data = google.visualization.arrayToDataTable([
                        ['Users',  'Users'],
                        <?php echo $users; ?>

                    ]);

                    var options = {
                        title: "Today' new users",
                        hAxis: {
                            title: 'User',
                            titleTextStyle: {
                                color: '#333'
                            }
                        },
                        vAxis: {
                            minValue: 0
                        }
                    };

                    var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
                    chart.draw(data, options);
                }
            </script>
        </div>
    @endsection
