@extends('Admin.Layout.MasterLayout')
@section('content')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.css" />
<style>
    .custom {
        margin-bottom: 30px;
        margin-bottom: 30px;
        margin-right: 30px;
        float: right;
    }
</style>
<div style="border: 2px solid teal; margin:5px; padding:5px; ;">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-info mb-2">ManageLogo</a>
            </div>
            <div class="col-md-6">
                <a href="{{route('logo')}}" class="btn btn-info mb-2" style="float: right;"><i style="font-size:15px" class="fa">&#xf067;</i> Add Logo</a>
            </div>
        </div>

    </div>
    <div class="container" >
        <table id="table1" class="table table-bordered">
            <thead>
                <tr>
                    <th style="width:10%; text-align:center;">S.L</th>
                    <th style="width:60%; text-align:center;">Title</th>
                    <th style="width:10%; text-align:center;">Logo</th>
                    <th style="width:10%; text-align:center;">Status</th>
                    <th style="width:10%; text-align:center;">Action</th>
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
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Action
                            </button>
                            <div class="dropdown-menu pl-1 mt-2"  aria-labelledby="dropdownMenuButton">
                                <a href="javascript:void(0)" class="btn btn-info " style="width: 47%;" onclick="updateBlog({{ $logos->id }})" >Edit</a>
                                <a href="javascript:void(0)" class="btn btn-danger" style="width: 47%;" onclick="deletelogos({{ $logos->id }})">delete</a>
                            </div>
                        </div>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- start data delete Modal -->
<div class="modal" id="deletemodal">
    <div class="modal-dialog ">
        <div class="modal-content">
            <!-- Modal body -->
            <div class="modal-header" style="background-color: #AED6F1 ;">

            </div>
            <div class="modal-body">
                <div class="text-center"><img src="{{asset('warning/alert1.jpg')}}" style="width:80px; height:80px; " alt=""></div>

                <h6 class="text-center mt-4 mb-3" style="font-family: tahoma; font-style:italic; font-weight:900; font-size:16px; color:red">Are You Sure Want To Permanent Delete ?</h6>

                <h6 style="font-weight: 900; color:black; padding-top:5px; padding-bottom:5px"><label for="exampleInputEmail1">Please Write <span class="text-primary" style="font-size: 22px;"> &nbsp confirm </span> </label> <input id="confirm" type="text" onchange="myFunction()" class="text-center form-control" placeholder="Write 'confirm' to delete"></h6>
                <hr style=" font-size: 18px; color:black; padding:5px; margin:0;">
            </div>

            <!-- Modal footer -->
            <div class="modal-footer" style="background-color: #AED6F1 ;">
                <button type=" button" class="btn btn-success" id="colseModal" data-bs-dismiss="modal" onclick="closeModal()">Close</button>
                <button id="deleteStudent" type="button" class="btn btn-danger disabled">Delete</button>

            </div>

        </div>

    </div>
</div>

<!--  end data delete modal-->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function deleteBlog(id) {
        $('#deletemodal').modal('show');
        // if (confirm("Do You want to delete this Customer")) {
        $('button#deleteStudent').click(function(e) {
            e.preventDefault();
            $('#deletemodal').modal('hide');

            let _token = $("input[name=_token]").val();
            $.ajax({
                url: 'http://localhost/internship/internShip/public/deleteBlog/' + id,
                type: 'GET',
                data: {
                    _token: _token
                },
                success: function(response) {
                    location.reload();

                }
            });
        })
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