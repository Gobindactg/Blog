@extends('Admin.Layout.MasterLayout')
@section('content')
<h1>Manage Slider</h1>
<a href="{{route('category')}}" class="btn btn-info mt-2 mb-2">Add Category</a>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>S.L</th>
            <th>Title</th>
           
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($category as $categorys)
        <tr>
            <td>{{$loop->index+1}}</td>
            <td>{{$categorys->name}}</td>
          
            <td>
                @if($categorys->status = '1')
                Published
                @endif
                @if($categorys->status = '0')
                Unpublished
                @endif
            </td>
            <td>
                <a href="javascript:void(0)" class="btn btn-info" onclick="updateBlog({{ $categorys->id }})">Edit</a>
                <a href="javascript:void(0)" class="btn btn-danger" onclick="deleteBlog({{ $categorys->id }})">delete</a>
                
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js" integrity="sha512-n/4gHW3atM3QqRcbCn6ewmpxcLAHGaDjpEBu4xZd47N0W2oQ+6q7oc3PXstrJYXcbNU1OHdQ1T7pAP+gi5Yu8g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
                    url: 'http://localhost/internship/internShip/public/categoryDelete/' + id,
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
@endsection