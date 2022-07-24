@extends('Admin.Layout.MasterLayout')
@section('content')
<h2>Add Blog</h2>
<div class="container">
<form id="addBlog" type="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="exampleInputEmail1">Blog Title</label>
      <input type="text" name="title" class="form-control" id="title" aria-describedby="emailHelp" placeholder="Enter Title" >
      <span id="nameError"></span>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1"> Blog Description</label>
      <textarea id="" cols="30" rows="10" name="description" class="form-control"></textarea>

    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Image</label>
      <input type="file" name="image" class="form-control" id="image" aria-describedby="emailHelp" placeholder="Enter Title" style="width: 20%;">
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Category</label>

      <select name="category" id="" class="form-select">
        @foreach($category as $cat)
        <option value="{{$cat->id}}">{{$cat->name}}</option>
        @endforeach
      </select>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Publication Status</label>
      <select name="status" id="" class="form-select">
        <option value="0">Published</option>
        <option value="1">UnPublished</option>
      </select>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>

  </form>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js" integrity="sha512-n/4gHW3atM3QqRcbCn6ewmpxcLAHGaDjpEBu4xZd47N0W2oQ+6q7oc3PXstrJYXcbNU1OHdQ1T7pAP+gi5Yu8g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  $('#addBlog').submit(function(e) {
    e.preventDefault();

    let formData = new FormData(this);
    $('#image-input-error').text('');
    $.ajax({
      type: "POST",
      url: "{{route('blogStore')}}",
      data: formData,
      contentType: false,
      processData: false,

      success: (response) => {
        if (response) {
          this.reset();
          alert('Image has been uploaded successfully');
        }
      },
      error: function(response) {
        console.log(response);
        $('#image-input-error').text(response.responseJSON.errors.file);
      }


    });
  });
</script>
@endsection