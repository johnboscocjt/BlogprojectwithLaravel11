{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

   
</x-app-layout> --}}


<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
  </head>
  <body>
     @include('admin.header')
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
        @include('admin.sidebar')
      <!-- Sidebar Navigation end-->

        @include('admin.body')

     @include('admin.footer')
     
  </body>
</html>