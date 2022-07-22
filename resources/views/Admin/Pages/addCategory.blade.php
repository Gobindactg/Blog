@extends('Admin.Layout.MasterLayout')
@section('content')
<h2>Add Category</h2>
<div class="container">
<form action="{{route('categoryStore')}}" method="POST" enctype="multipart/form-data">
  @csrf
  <div class="form-group">
    <label for="exampleInputEmail1">Category Name</label>
    <input type="text" name="name" class="form-control" id="title" aria-describedby="emailHelp" placeholder="Enter Category Name">
   </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>

</form>
</div>

@endsection