@extends('admin.layout.master')

@section('title')
Revenue
@endsection

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="heading">
                <div>
                    <h1 class="page-header">Revenue</h1>
                </div>
                <div class="heading-right">
                    <a href="{{route('admin.product.create')}}" class="btn-add-product btn btn-warning">Add Product</a>
                </div>
                <div class="form-group">
                    <input type="month">
                </div>
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
            @if (!empty($error))
                <div class="alert alert-danger">
                    {{ $error }}
                </div>
            @endif
            @if (!empty($brands))
            <table  class="table table-striped table-bordered table-hover">
                <thead>
                    <tr align="center">
                        <th>STT</th>
                        <th>Code</th>
                        <th>Name</th>
                        <th>Logo</th>
                        <th>Information</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody id="table-body-side"></tbody>
                <tbody id="table-body-main">
                    @foreach ($brands as $index => $brand)
                    <tr class="odd gradeX" align="center">
                        <td>{{$index + 1}}</td>
                        <td>{{$brand->Code}}</td>
                        <td>{{$brand->Name}}</td>
                        <td><img width="100" src="{{$brand->Logo}}" alt=""></td>
                        <td>{{$brand->Information}}</td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{{route('admin.brand.delete', $brand->ID)}}"> Delete</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{route('admin.brand.edit', $brand->ID)}}">Edit</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>

<script>
</script>
@endsection