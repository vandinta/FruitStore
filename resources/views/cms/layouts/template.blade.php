<!DOCTYPE html>
<html lang="en">

  @include('cms.layouts.head')

  <body>
    <div class="container-scroller">

      @include('cms.layouts.sidebar')
      
      <div class="container-fluid page-body-wrapper">

        @include('cms.layouts.navbar')
        
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            @yield('content')
          </div>

          @include('cms.layouts.footer')
          
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>

    @include('cms.layouts.js')
    
  </body>
</html>