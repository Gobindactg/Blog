@extends('Admin.Layout.MasterLayout')
@section('content')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.css" />
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <a href="#" class="btn btn-info mb-2">Manage Slider</a>
        </div>
        <div class="col-md-6">
            <a href="{{route('addSlider')}}" class="btn btn-primary mb-2" style="float: right;"><i style="font-size:15px" class="fa">&#xf067;</i> Add Slider</a>
        </div>
    </div>

</div>

<table class="table table-bordered" id="table1">
    <thead>
        <tr>
            <th style="width: 7%;">S.L</th>
            <th style="width: 20%;">Title</th>
            <th style="width: 48%;">Description</th>
            <th style="width: 10%;">Image</th>
            <th style="width: 7%;">Status</th>
            <th style="width: 7%;">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($slider as $sliders)
        <tr>
            <td>{{$loop->index+1}}</td>
            <td>{{$sliders->title}}</td>
            <td>{{$sliders->description}}</td>
            <td><img src="{{asset('BlogImage/'.$sliders->image)}}" alt="" style="width: 50px;"></td>
            <td>
                @if($sliders->status = '1')
                Published
                @endif
                @if($sliders->status = '0')
                Unpublished
                @endif
            </td>
            <td>
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Action
                    </button>
                    <div class="dropdown-menu pl-1 mt-2" aria-labelledby="dropdownMenuButton">
                        <a href="javascript:void(0)" class="btn btn-info" style="width: 47%;" onclick="updateBlog({{ $sliders->id }})">Edit</a>
                        <a href="javascript:void(0)" class="btn btn-danger" style="width: 47%;" onclick="deleteBlog({{ $sliders->id }})">delete</a>
                    </div>
                </div>

            </td>
        </tr>
        @endforeach
    </tbody>
</table>

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
                url: 'http://localhost/internship/internShip/public/sliderDelete/' + id,
                type: 'GET',
                data: {
                    _token: _token
                },
                success: function(response) {
                    window.location.reload();

                }
            });
        })
    }
</script>

<script>
    function myFunction() {
        var confirm = document.getElementById("confirm").value;
        var element = document.getElementById("deleteStudent");

        if (confirm == 'confirm') {
            element.classList.remove("disabled");
        } else {
            element.classList.add("disabled");
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