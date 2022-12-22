@extends('admin.layout.master')

@section('title')
List Brands
@endsection

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="heading">
                <div>
                    <h1 class="page-header">Brands
                        <small>List</small>
                    </h1>
                </div>
                <div class="form-group">
                    {{-- <form action="" method="post"> --}}
                        @csrf
                        <input id="brand_search" class="input-search" placeholder="Search...">
                        <button type="submit" class="btn-add-product btn btn-success">Search</button>
                    {{-- </form> --}}
                </div>
                <div class="heading-right">
                    <a href="{{route('admin.product.create')}}" class="btn-add-product btn btn-warning">Add Product</a>
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
                {{-- <tbody id="table-body-side">
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
                </tbody> --}}
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.2/jquery.min.js"></script>
</div>

<script>
     $(document).ready(function(){
        $('#brand_search').keyup(function(){
            var query = $(this).val();
            if(query != ''){
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: "{{ route('admin.brand.search') }}",
                    method: "POST",
                    data:{query:query, _token:_token},
                    success:function(data){
                        $('#table-body-main').hide();
                        console.log(data);
                    }
                })
            }else{
                $('#table-body-main').show();
            }
        })
    })

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