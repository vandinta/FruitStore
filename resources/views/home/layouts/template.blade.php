<!DOCTYPE html>
<html lang="en">

@include('home.layouts.head')

@yield('content_head')

<body>

  @yield('popup')

  <!--PreLoader-->
  <div class="loader">
    <div class="loader-inner">
      <div class="circle"></div>
    </div>
  </div>
  <!--PreLoader Ends-->

  @include('home.layouts.navbar')

  @yield('content')

  @include('home.layouts.footer')

  @include('home.layouts.js')

  @yield('content_js')

</body>

</html>