<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    @include('frontend.shared.link-css')

    <title>Home - Bannaly IT</title>
  </head>
  <body>
        @include('frontend.shared.navbar')
        
        @yield('main-content')

        @include('frontend.shared.link-java')
</body>
</html>