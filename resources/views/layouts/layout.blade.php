<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
      <link rel="shortcut icon" href="/img/DubaiFilm_Logo.png" type="image/x-icon">
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <meta name="description" content="">
        <title>Dubai Film Inventory</title>

        <!-- Fonts -->
        <link href="/css/Nunito.css" rel="stylesheet">
        <link rel="preload" as="style" href="/css/main.css">
        <link href="/css/main.css" rel="stylesheet">
        <link href="/css/bootstrap.css" rel="stylesheet">
        <link href="/css/dataTables.bootstrap4.min.css" rel="stylesheet">
        <link href="/css/responsive.bootstrap4.min.css" rel="stylesheet">
        <link href="/css/datemain.css" rel="stylesheet">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
            <script src="/js/jquery-3.5.1.js" charset="utf-8"></script>



  </head>
    <body>

      <div class="links mjTogglenav" id="links">
    <!-- class="imgposition" -->

        <i id="mjTogglenav" class="fa fa-3 fa-bars" aria-hidden="true"></i>

          <a type="button" class="btn mj-btn-danger" href="/" title="INVENTORY">&nbsp;Home</a>
          <a type="button" class="btn mj-btn-danger" href="/df/user" title="CHECK IN ITEMS">&nbsp;Check in</a>
          <a type="button" class="btn mj-btn-danger" href="/df/admin" title="CHECK OUT ITEMS"></i>&nbsp;Check out</a>
          <a type="button" class="btn mj-btn-danger" href="/chart/chart" title="PROJECT LIST">&nbsp;Calendar</a>
          <input class="form-control-sm mr-3" type="text"  id="bookSearch" placeholder="لټون" aria-label="Search">
          <a class="imgposition d-flex justify-content-start" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">{{ Auth::user()->name }}&nbsp;<i class="fa fa-caret-square-o-down" aria-hidden="true"></i></a>

          <div class="collapse text-center" id="collapseExample">
          <ul class="list-group mj-list-side" style="color:#000 !important;">
            <li class="list-group-item"><a class="btn mj-btn-links" href="#">Dashboard</a></li>
            <?php if (Auth::user()->user_auth === 'admin'): ?>
                <li class="list-group-item"><a class="btn mj-btn-links" href="{{ route('register') }}">Register New Member</a></li>
            <?php endif; ?>

            <li class="list-group-item"><a class="btn mj-btn-links" href="{{ route('logout') }}" title="Logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a><form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form></li>
          </ul>
          </div>
      </div>
            <div class="container-fluid" >

            @yield('content')



        </div>


        <footer class="d-flex justify-content-between">
          <img src="/img/DubaiFilm_Logo.png" alt="" class="imgpositionfooter">
          <p>© 2020 Dubai Film. All rights reserved.</p>
        </footer>
        <script src="/js/main.js" charset="utf-8"></script>
        <script src="/js/jquery.dataTables.min.js" charset="utf-8"></script>
        <script src="/js/dataTables.bootstrap4.min.js" charset="utf-8"></script>
        <script src="/js/dataTables.responsive.min.js" charset="utf-8"></script>
        <script src="/js/responsive.bootstrap4.min.js" charset="utf-8"></script>
        <script src="/js/bootstrap.min.js" charset="utf-8"></script>
        <script src="/js/datemain.js" charset="utf-8"></script>
        <script src="/js/bootstrap-tagsinput.js"></script>
        <script>
        $(document).ready(function() {
        $('#example').DataTable();
    } );
        </script>
  </body>
</html>
