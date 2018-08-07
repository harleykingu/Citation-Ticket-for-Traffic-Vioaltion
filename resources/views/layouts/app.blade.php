<!DOCTYPE html>
<html lang="en">
  <head>
    @include('layouts._head')
    @yield('stylesheets')
  </head>

  <body>

    <div class="container-fluid"><br>
    <div class="col-md-9 col-sm-12">
    @yield('content')
    </div> <!--col-->

    <div class="col-md-3 col-sm-12">
    @yield('admin')
    </div>
    </div>

    @include('layouts._javascript')
    @yield('scripts')


  </body>
</html>
