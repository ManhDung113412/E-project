@extends('admin.layout.master')

@section('title')
List Product 
@endsection

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Product
                    <small>List</small>
                </h1>
            </div>
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
                        <th>Code</th>
                        <th>Brand</th>
                        <th>Category</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Delete</th>
                        <th>Edit</th>
                        <th>Add</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $index => $product)
                    <tr class="odd gradeX" align="center">
                        <td>{{$index}}</td>
                        <td>{{$product->Code}}</td>
                        <td>{{$product->brand->Name}}</td>
                        <td>{{$product->category->Name}}</td>
                        <td>{{$product->Name}}</td>
                        <td>{{$product->IMG}}</td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{{route('admin.product.delete', $product->ID)}}"> Delete</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{route('admin.product.edit', $product->ID)}}">Edit</a></td>
                        <td class="center"><i class="fa fa-plus fa-fw"></i> <a href="{{route('admin.product-detail.create', $product->ID)}}">Add</a></td>
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