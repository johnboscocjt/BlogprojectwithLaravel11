<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/public">
    <!-- basic -->
    @include('home.homecss')
</head>

<body>
    <!-- header section start -->
    <div class="header_section">
        @include('home.header')

    </div>


    <div style="text-align:center;" class="col-md-12">
        {{-- fetch image from db --}}
        <div><img src="/postimage/{{ $post->image }}" style="padding: 20px; height:400px; width:500px; margin: auto;"></div>
        {{-- getting the title from db --}}
        <h3><b>{{ $post->title }}</b></h3>
        <h4>{{ $post->description }}</h4>
        {{-- who uploaded from db --}}
        <p>Post by <b>{{ $post->name }}</b> </p>
        
    </div>

    <!-- footer section start -->
    @include('home.footer')

</body>

</html>
