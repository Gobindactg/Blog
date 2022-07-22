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
                    @if($blog->status == '1')
                        <a class="btn btn-success" type="submit" href="{{route('blogPublished',$blog->id)}}">Published</a>
                    @endif
                    @if($blog->status =='0')
                        <a class="btn btn-danger" type="submit"  href="{{route('blogUnpublished',$blog->id)}}">Unpublished</a>
                    
                    @endif
                </td>
                <td> {{$blog->Category->name}}</td>
                <td>
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Action
                        </button>
                        <div class="dropdown-menu pl-1 mt-2" aria-labelledby="dropdownMenuButton">
                            <a href="javascript:void(0)" class="btn btn-info" style="width: 47%;" onclick="updateBlog({{ $blog->id }})">Edit</a>
                            <a href="javascript:void(0)" class="btn btn-danger" style="width: 47%;" onclick="deleteBlog({{ $blog->id }})">delete</a>
                        </div>
                    </div>


                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
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

<!-- start data update Modal -->

<div class="modal" id="dataUpdate">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-body">
                <h3 class="text-center" style="font-family: tahoma; font-style:italic; font-weight:900; font-size:25px; color:teal" id="blogId"></h3>
                <div class="container">
                    <form id="addBlog" type="POST" enctype="multipart/form-data" name="edit_product_form">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1" style="font-family: tahoma; font-style:italic; font-weight:700;font-size:15px">Blog Title</label>
                            <input type="text" name="title" class="form-control" id="title" aria-describedby="emailHelp" placeholder="Enter Title">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1" style="font-family: tahoma; font-style:italic; font-weight:700;font-size:15px"> Blog Description</label>
                            <textarea id="description" cols="30" rows="10" name="description" class="form-control"></textarea>

                        </div>
                        <div class="form-group">

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="exampleInputEmail1" style="font-family: tahoma; font-style:italic; font-weight:700;font-size:15px">Add New Image</label>
                                    <input type="file" name="image" class="form-control" id="image" aria-describedby="emailHelp" placeholder="Enter Title" style="width: 20%;">
                                </div>
                                <div class="col-md-6">
                                    <label for="exampleInputEmail1" style="font-family: tahoma; font-style:italic; font-weight:700;font-size:15px">Old Image</label><br>
                                    <img src="" alt="" id="blogImg" style="width: 50px;">
                                </div>
                            </div>

                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1" style="font-family: tahoma; font-style:italic; font-weight:700;font-size:15px">Category</label>
                            <select name="category" id="category2" class="form-select" onclick="closeValue()">
                                <option class="invisible" value="" id="category" selected></option>
                                @foreach(App\Models\Category::category() as $cat)
                                <option value="">{{$cat->id}} {{$cat->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1" style="font-family: tahoma; font-style:italic; font-weight:700;font-size:15px">Publication Status</label>
                            <select name="status" id="" class="form-select">
                                <option value="0">Published</option>
                                <option value="1">UnPublished</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>

                    </form>
                </div>

            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal" onclick="closeModal1()">Close</button>
            </div>

        </div>

    </div>
</div>


<!-- end data update Modal -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js" integrity="sha512-n/4gHW3atM3QqRcbCn6ewmpxcLAHGaDjpEBu4xZd47N0W2oQ+6q7oc3PXstrJYXcbNU1OHdQ1T7pAP+gi5Yu8g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->

<!-- start data delete function -->
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
    function closeModal() {
        $('#deletemodal').modal('hide');
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
<!-- end student data delete -->
<!-- start data update Modal -->

<script>
    function updateBlog(id) {
        $('#dataUpdate').modal('show');
        $.get('http://localhost/internship/internShip/public/update-blog/' + id,
            function(blog) {
                $("#blogId").text('Update Blog # ' + blog.id);
                $("#title").val(blog.title);
                $("#description").val(blog.description);
                $("#category").text(blog.category_id);
                $("#blogImg").attr('src', 'BlogImage/' + blog.image);
            })
    }
</script>
<script>
    function closeModal1() {
        $('#dataUpdate').modal('hide');
    }
</script>

<!-- end data update Modal -->

<!-- <script>
    function deleteStudent(id) {
        $('#deletemodal').modal('show');
        // if (confirm("Do You want to delete this Customer")) {
        $('button#deleteStudent').click(function(e) {
            e.preventDefault();
            $('#deletemodal').modal('hide');

            let _token = $("input[name=_token]").val();
            $.ajax({
                url: 'http://localhost/My_Web/Update/School_Management/public/student/student/delete1/' + id,
                type: 'POST',
                data: {
                    _token: _token
                },
                success: function(response) {
                    var message = "Your Data Has Been Deleted Successfully";
                    document.getElementById('successMessage').innerHTML = message;
                    $("#student" + id).remove();

                }
            });
        })
    }
</script> -->

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