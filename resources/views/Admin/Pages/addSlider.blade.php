@extends('Admin.Layout.MasterLayout')
@section('content')
<h2>Add Slider</h2>
<div class="container">
<form action="{{route('sliderStore')}}" method="POST" enctype="multipart/form-data">
  @csrf
  <div class="form-group">
    <label for="exampleInputEmail1">Slider Title</label>
    <input type="text" name="title" class="form-control" id="title" aria-describedby="emailHelp" placeholder="Enter Title">
   </div>
   <div class="form-group">
    <label for="exampleInputEmail1">Description</label>
    <textarea id="" cols="30" rows="10" name="description" class="form-control" ></textarea>
    
   </div>
   <div class="form-group">
    <label for="exampleInputEmail1">Image</label>
    <input type="file" name="image" class="form-control" id="image" aria-describedby="emailHelp" placeholder="Enter Title" style="width: 20%;">
   </div>
   <div class="form-group">
    <label for="exampleInputEmail1">Publication Status</label>
    <select name="status" id="" class="form-select" >
        <option value="0">Published</option>
        <option value="1">UnPublished</option>
    </select>
   </div> 
  <button type="submit" class="btn btn-primary">Submit</button>

</form>
</div>

@endsection