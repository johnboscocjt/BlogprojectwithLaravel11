<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <base href="/public">
      @include('home.homecss')

      <style type="text/css">
        .div_deg{
            text-align: center;
        }

        .img_deg{
            height: 150px;
            width: 250px;
            margin: auto;
        }

        label{
            font-size: 18px;
            font-weight: bold;
            width: 200px;
        }

        .input_deg{
            padding: 30px;
        }

        .title_deg{
            padding:30px;
            font-size:30px;
            font-weight: bold;
        }

      </style>
   </head>
   <body>
      <!-- header section start -->
        <div class="header_section">
          @include('home.header')

        
          <div>
            @if(session()->has('message'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-label="close" aria-hidden="true">
                    x
                </button>
                {{session()->get('message')}}
      
            </div>
            @endif
          </div>

        </div>

        <div class="div_deg">
            <h1 class="title_deg">Update post</h1>
            <form action="{{url('update_post_data', $data->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="input_deg">
                    <label>Title</label>
                    <input type="text" name="title" value="{{$data->title}}">
                </div>

                <div class="input_deg">
                    <label>Description</label>
                   <textarea name="description">{{$data->description}}</textarea>
                </div>

                <div class="input_deg">
                    <label>Current image</label>
                    <img src="/postimage/{{$data->image}}" class="img_deg">
                </div>

                <div class="input_deg">
                    <label>Change current image</label>
                    <input type="file" name="image">
                </div>

                <div class="input_deg">
                    <input type="submit" value="Update" class="btn btn-outline-secondary border-secondary" style="color: black;">
                </div>
            </form>
        </div>
     

      <!-- footer section start -->
        @include('home.footer')  

   </body>
</html>