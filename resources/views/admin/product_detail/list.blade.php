@extends('admin.layout.master')

@section('title')
    List Products Detail
@endsection

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Products Detail
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
                        <th>Import Price</th>
                        <th>Export Price</th>
                        <th>Sale Price</th>
                        <th>Main Image</th>
                        <th>Slide Image 1</th>
                        <th>Slide Image 2</th>
                        <th>Information</th>
                        <th>Material</th>
                        <th>Color</th>
                        <th>Size</th>
                        <th>Quantity</th>
                        <th>Trending</th>
                        <th>Arrivals</th>
                        <th>Feature</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($product_details as $index => $product)
                    <tr class="odd gradeX" align="center">
                        <td>{{$index}}</td>
                        <td>{{$product->Code}}</td>
                        <td>{{$product->Import_Price}}</td>
                        <td>{{$product->Export_Price}}</td>
                        <td>{{$product->Sale_Price}}</td>
                        <td>{{$product->Main_IMG}}</td>
                        <td>{{$product->Slide_IMG_1}}</td>
                        <td>{{$product->Slide_IMG_2}}</td>
                        <td>{{$product->Information}}</td>
                        <td>{{$product->Material}}</td>
                        <td>{{$product->Color}}</td>
                        <td>{{$product->Size}}</td>
                        <td>{{$product->Quantity}}</td>
                        <td>{{$product->Is_Trending ? 'V' : ''}}</td>
                        <td>{{$product->Is_New_Arrivals ? 'V' : ''}}</td>
                        <td>{{$product->Is_Feature ? 'V' : ''}}</td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{{route('admin.product-detail.delete', $product->ID)}}"> Delete</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{route('admin.product-detail.edit', $product->ID)}}">Edit</a></td>
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