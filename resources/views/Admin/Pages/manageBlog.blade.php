@extends('Admin.Layout.MasterLayout')
@section('content')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.css" />
<div style="border: 2px solid teal; margin:5px; padding:5px;" class="overflow-auto">
<div class="container">
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-info mb-2">Manage Blog</a>
            </div>
            <div class="col-md-6">
                <a href="{{route('blog')}}" class="btn btn-primary mb-2" style="float: right;"><i style="font-size:15px" class="fa">&#xf067;</i> Add Blog</a>
            </div>
        </div>

    </div>


<table class="table table-bordered" id="table1">
    <thead>
        <tr style="text-align:center ;">
            <th style="width: 5%;">S.L</th>
            <th style="width: 25%;">Title</th>
            <th style="width: 40%;">Description</th>
            <th style="width: 5%;">Image</th>
            <th style="width: 5%;">Status</th>
            <th style="width: 10%;">Category</th>
            <th style="width: 10%;">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($blogs as $blog)
        <tr>
            <td>{{$loop->index+1}}</td>
            <td>{{$blog->title}}</td>
            <td>{{$blog->description}}</td>
            <td><img src="{{asset('BlogImage/'.$blog->image)}}" alt="" style="width: 50px;"></td>
            <td>
                @if($blog->status = '1')
                Published
                @endif
                @if($blog->status = '0')
                Unpublished
                @endif
            </td>
            <td> {{$blog->Category->name}}</td>
            <td>
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Action
                    </button>
                    <div class="dropdown-menu pl-1 mt-2" aria-labelledby="dropdownMenuButton">
                        <a href="javascript:void(0)" class="btn btn-info" style="width: 47%;" onclick="updateBlog({{ $blog->id }})">Edit</a>
                        <a href="javascript:void(0)" class="btn btn-danger"style="width: 47%;"  onclick="deleteBlog({{ $blog->id }})">delete</a>
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
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js" integrity="sha512-n/4gHW3atM3QqRcbCn6ewmpxcLAHGaDjpEBu4xZd47N0W2oQ+6q7oc3PXstrJYXcbNU1OHdQ1T7pAP+gi5Yu8g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function deleteBlog(id) {
        if (confirm("Do You want to delete this Customer")) {

            let _token = $("input[name=_token]").val();
            $.ajax({
                url: 'http://localhost/internship/internShip/public/deleteBlog/' + id,
                type: 'GET',
                data: {
                    _token: _token
                },
                success: function(response) {
                    window.location.reload();

                }
            });
        }
    }
</script>


<script>
    $(document).ready(function() {
        $('#table1').DataTable();
    });
</script>
<script>
    $('#table1').DataTable({
        "pageLength": 10
    });
</script>
@endsection