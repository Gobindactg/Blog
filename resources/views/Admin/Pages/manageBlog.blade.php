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
                <th style="width: 15%;">Image</th>
                <th style="width: 20%;">Title</th>
                <th style="width: 40%;">Description</th>

                <th style="width: 10%;">Status</th>

                <th style="width: 10%; text-align:center">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($blogs as $blog)
            <tr>
                <td>{{$loop->index+1}}</td>
                <td><img src="{{asset('BlogImage/'.$blog->image)}}" alt="" style="width: 50px;"></td>

                <td>{{$blog->title}} <br>{{$blog->Category->name}} </td>
                <td>{{$blog->description}}</td>

                <td>
                    @if($blog->publication_status == '1')
                    <a class="btn btn-success" type="submit" href="{{route('blogPublished',$blog->id)}}" style="width:100%">Published</a>
                    @endif
                    @if($blog->publication_status =='0')
                    <a class="btn btn-danger" type="submit" href="{{route('blogUnpublished',$blog->id)}}" style="width:100%">Unpublished</a>

                    @endif
                </td>

                <!-- <td> -->
                <!-- <div class="dropdown"> -->


                <td style="text-align:center">
                    <div class="dropdown">
                        <span class="btn btn-success rounded btn-sm px-3 " type="button" id="action" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-ellipsis-vertical"></i>
                        </span>
                        <ul class="dropdown-menu text-center" aria-labelledby="action">
                            <li><button class="m-2 btn btn-sm btn-success edit_button rounded" value="'.$blog->id.'"> Edit</button></li>
                            <li><button class="m-2 btn btn-sm btn-danger delete_button rounded" value="'.$blog->id.'">Delete</button></li>
                        </ul>
                    </div>
                    <!-- <div class="btn-group">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                            <i class="fas fa-cog"></i> <span class="caret"></span></button>
                        <ul class="dropdown-menu dropdown-menu-right" style="border: 1px solid gray;" role="menu">
                            <li class="action" onclick="editParty({{$blog->id}})"><a  class="btn" ><i class="fas fa-edit"></i> Edit </a></li>
                        </ul> -->
</div>
</td>

<!-- <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Action
                        </button>
                        <div class="dropdown-menu pl-1 mt-2" aria-labelledby="dropdownMenuButton">
                            <a href="javascript:void(0)" class="btn btn-info" style="width: 47%;" onclick="updateBlog({{ $blog->id }})">Edit</a>
                            <a href="javascript:void(0)" class="btn btn-danger" style="width: 47%;" onclick="deleteBlog({{ $blog->id }})">delete</a>
                        </div>
                    </div> -->


<!-- </td> -->
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
                    <form id="updateBlogs" type="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" id="id" name="id" value="">
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
                                    <input type="file" name="image" class="form-control" id="image" aria-describedby="emailHelp" placeholder="Enter Title" style="width: 70%;">
                                </div>
                                <div class="col-md-6">
                                    <label for="exampleInputEmail1" style="font-family: tahoma; font-style:italic; font-weight:700;font-size:15px">Old Image</label><br>
                                    <img src="" alt="" id="blogImg" style="width: 50px;">
                                </div>
                            </div>

                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1" style="font-family: tahoma; font-style:italic; font-weight:700;font-size:15px">Category</label>
                            <select name="category" id="category2" class="form-select" required onclick="closeValue()">
                                <option class="invisible" value="" id="category" selected></option>
                                @foreach(App\Models\Category::category() as $cat)
                                <option value="{{$cat->id}}">{{$cat->id}} {{$cat->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1" style="font-family: tahoma; font-style:italic; font-weight:700;font-size:15px">Category</label>
                            <select name="status" id="status" class="form-select" required>
                                <option class="invisible" value="" id="status" selected></option>
                                <option value="1">1 Published</option>
                                <option value="0"> 0 Unpublished</option>
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
                $("#id").val(blog.id);
                $("#blogId").text('Update Blog # ' + blog.id);
                $("#title").val(blog.title);
                $("#description").val(blog.description);
                $("#category").text(blog.category_id);
                $("#status").val(blog.publication_status);
                $("#blogImg").attr('src', 'BlogImage/' + blog.image);
            })
    }
</script>
<script>
    function closeModal1() {
        $('#dataUpdate').modal('hide');
    }
</script>

<!-- start data update Modal -->
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#updateBlogs').submit(function(e) {
        e.preventDefault();

        let formData = new FormData(this);
        $('#image-input-error').text('');
        $.ajax({
            type: "POST",
            url: "{{route('blogUpdateStore')}}",
            data: formData,
            contentType: false,
            processData: false,

            success: (response) => {
                if (response) {
                    this.reset();
                    alert('Blog uploaded successfully');
                    $('#dataUpdate').modal('hide');
                }
            },
            error: function(response) {
                console.log(response);
                $('#image-input-error').text(response.responseJSON.errors.file);
            }


        });
    });
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