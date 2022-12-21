@extends('admin.layout.master')

@section('title')
List User
@endsection

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">User
                    <small>List</small>
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
                        <td class="center"><i class="fa fa-eye  fa-fw"></i><a href="{{route('admin.user.detail', $user->ID)}}"> View</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection