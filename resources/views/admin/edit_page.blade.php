<!DOCTYPE html>
<html>
  <head> 
    <base href="/public">
    @include('admin.css')
    <style>
        .post_title{
            font-size: 30px;
            font-weight: bold;
            text-align: center;
            padding:30px;
            color: white;
        }

        .div_center{
            text-align: center;
            padding: 30px;
        }

        labe{
            display: inline-block;
            width: 200px;
        }
    </style>
    
  </head>
  <body>
     @include('admin.header')
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
        @include('admin.sidebar')
      <!-- Sidebar Navigation end-->

        {{-- @include('admin.body') --}}
        <div class="page-content">
            
            @if (session()->has('message'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                {{session()->get('message')}}
            </div>
            @endif

            <h1 class="post_title">Update Post</h1>

            <form action="{{url('update_post', $post->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                   
                <div class="div_center">
                    <label>Post Title</label>
                    <input type="text" name="title" value="{{$post->title}}">
                </div>

                <div class="div_center">
                    <label>Post Description</label>
                    <textarea name="description">{{$post->description}}</textarea>
                </div>

                <div class="div_center">
                    <label>Old Image</label>
                    <img style="margin: auto;" height="100px" width="150px" src="/postimage/{{$post->image}}">
                </div>

                <div class="div_center">
                    <label>Update old Image</label>
                    <input type="file" name="image">
                </div>

                <div class="div_center">
                <input type="submit" value="Update" class="btn btn-primary">
                </div>
                   
            </form>
        </div>

     @include('admin.footer')
     
  </body>
</html>