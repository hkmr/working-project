<!-- 
  #########################
  WELCOME TO TWEBOX.COM 
  ########################
 -->
<!DOCTYPE html>
<html lang="en">

  <head>
    @include('partials._head')
  </head>

  <body>


    @include('partials._navBar')

    @include('partials._messages')

    @yield('content')

    @include('partials._footer')

    @include('partials._javascript')

    @yield('scripts')


  </body>


</html>