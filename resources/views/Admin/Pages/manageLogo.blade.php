@extends('Admin.Layout.MasterLayout')
@section('content')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.css" />
<style>
    .custom{
        margin-bottom: 30px;
        margin-bottom: 30px;
        margin-right: 30px;
        float: right;
    }
</style>
<div style="border: 2px solid teal; margin:5px; padding:5px">
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <a href="#" class="btn btn-info mb-2">ManageLogo</a>
        </div>
        <div class="col-md-6" >
            <a href="{{route('logo')}}"  class="btn btn-info mb-2" style="float: right;"><i style="font-size:15px" class="fa">&#xf067;</i> Add Logo</a>
        </div>
    </div>
 
</div>
<div class="container" >
    <table id="table1" class="table table-bordered">
        <thead>
            <tr>
                <th>S.L</th>
                <th>Title</th>
                <th>Logo</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($logo as $logos)
            <tr>
                <td>{{$loop->index+1}}</td>
                <td>{{$logos->name}}</td>
                <td><img src="{{asset('LogoImage/'.$logos->image)}}" alt="" style="width: 50px;"></td>
                <td>
                    @if($logos->status = '1')
                    Published
                    @endif
                    @if($logos->status = '0')
                    Unpublished
                    @endif
                </td>
                <td>
                    <a href="javascript:void(0)" class="btn btn-info" onclick="updateBlog({{ $logos->id }})">Edit</a>
                    <a href="javascript:void(0)" class="btn btn-danger" onclick="deletelogos({{ $logos->id }})">delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        $('#table1').DataTable();
    });
</script>
<script>
    $('#table1').DataTable({
        "pageLength": 3
    });
</script>
@endsection