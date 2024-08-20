<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      @include('home.homecss')

      <style type="text/css">
        .post_deg{
            padding: 30px;
            text-align: center;
        }

        .title_deg{
            font-size: 30px;
            font-weight:15px;
            padding: 15px;
        }

        .des_deg{
            font-size: 18px;
            font-weight:15px;
            padding: 15px;
        }

        .img_deg{
            height: 350px;
            width: 400px;
            padding: 30px;
            margin: auto;
        }
        .myposts{
            position: relative;
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
     

     <div class="myposts">
       
      @foreach ($data as $data)
          
      <div class="post_deg">
        <img class="img_deg" src="/postimage/{{$data->image}}">
        <h4 class="title_deg">{{$data->title}}</h4>
        <p class="des_deg">{{$data->description}}</p>
        <a onclick="return confirm('Are you sure you want to delete this post?')" href="{{url('my_post_del', $data->id)}}" class="btn btn-danger">Delete</a>
        <a href="{{url('post_update_page', $data->id)}}" class="btn btn-primary">Update</a>
     </div>
      @endforeach
     </div>

      <!-- footer section start -->
        @include('home.footer')  

    </body>

</html>