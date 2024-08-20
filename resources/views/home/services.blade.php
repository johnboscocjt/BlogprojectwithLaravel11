<div class="services_section layout_padding">
    <div class="container">
       <h1 class="services_taital">Blog posts </h1>
       <p class="services_text">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration</p>
       <div class="services_section_2">
          <div class="row">
            {{-- mention the post variable to get the data from the post table,from homecontroller --}}
            @foreach ($post as $post)

             <div class="col-md-4" style="padding:30px;">
                {{-- fetch image from db --}}
                <div><img src="/postimage/{{$post->image}}" style="margin-bottom: 20px; height:200px; width=350px;" ></div>
                {{-- getting the title from db --}}
                <h4>{{$post->title}}</h4>
                {{-- who uploaded from db --}}
                <p>Post by <b>{{$post->name}}</b> </p>
                <div class="btn_main"><a href="{{url('post_details',$post->id)}}">Read more</a></div>
             </div>
             @endforeach

             {{-- <div class="col-md-4">
                <div><img src="images/img-2.png" class="services_img"></div>
                <div class="btn_main active"><a href="#">Hiking</a></div>
             </div>
             <div class="col-md-4">
                <div><img src="images/img-3.png" class="services_img"></div>
                <div class="btn_main"><a href="#">Camping</a></div>
             </div> --}}
          </div>
       </div>
    </div>
 </div>