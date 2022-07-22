@extends('Admin.Layout.MasterLayout')
@section('content')
<h2>Add Logo</h2>
<div class="container">

<form action="{{route('logoStore')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="exampleInputEmail1">Blog Title</label>
      <input type="text" name="name" class="form-control" id="title" aria-describedby="emailHelp" placeholder="Enter Title">
    </div>
  
    <div class="form-group">
      <label for="exampleInputEmail1">Image</label>
      <input type="file" name="image" class="form-control" id="image" aria-describedby="emailHelp" placeholder="Enter Title" style="width: 20%;">
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
  $('#addLogo').submit(function(e) {
    e.preventDefault();

    let formData = new FormData(this);
    $('#image-input-error').text('');
    $.ajax({
      type: "POST",
      url: "{{route('logoStore')}}",
      data: formData,
      contentType: false,
      processData: false,

      success: (response) => {
        if (response) {
          this.reset();
          alert('Logo has been uploaded successfully');
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