@extends('Admin.Layout.MasterLayout')
@section('content')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.css" />
<div style="border: 2px solid teal; margin:5px; padding:5px;" class="overflow-auto">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-info mb-2">Deleted Blog</a>
            </div>
        </div>
    </div>
    <table class="table table-bordered" id="table1">
        <thead>
            <tr style="text-align:center ;">
                <th style="width: 5%;">S.L</th>
                <th style="width: 25%;">Title</th>
                <th style="width: 5%;">Image</th>
                <th style="width: 10%;">Category</th>
                <th style="width: 10%;">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($blogs as $blog)
            <tr>
                <td>{{$loop->index+1}}</td>
                <td>{{$blog->title}}</td>
               
                <td><img src="{{asset('BlogImage/'.$blog->image)}}" alt="" style="width: 50px;"></td>
             
                <td> {{$blog->Category->name}}</td>
                <td>
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Action
                        </button>
                        <div class="dropdown-menu pl-1 mt-2" aria-labelledby="dropdownMenuButton">
                            <a href="{{route('restore',$blog->id)}}" class="btn btn-info" style="width: 47%;">Restore</a>
                            <a href="javascript:void(0)" class="btn btn-danger" style="width: 47%;" onclick="deleteBlog({{ $blog->id }})">delete</a>
                        </div>
                    </div>


                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
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
@endsection