@extends('Admin.Layout.MasterLayout')
@section('content')
<h1>Manage Slider</h1>
<a href="{{route('addSlider')}}" class="btn btn-info mt-2 mb-2">Add Slider</a>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>S.L</th>
            <th>Title</th>
            <th>Description</th>
            <th>Image</th>
            <th>Status</th>
            <th>Action</th>
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
                <a href="javascript:void(0)" class="btn btn-info" onclick="updateBlog({{ $sliders->id }})">Edit</a>
                <a href="javascript:void(0)" class="btn btn-danger" onclick="deleteBlog({{ $sliders->id }})">delete</a>
                
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
                    url: 'http://localhost/internship/internShip/public/sliderDelete/' + id,
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