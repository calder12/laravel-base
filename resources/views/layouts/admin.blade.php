@include('layouts/_html_head')
<body>
  <div id="app">
    @include('layouts/_admin-nav')

    <div class="container-full">
      <div class="row mt-3">
        @include('layouts/_admin-sidebar')
        @yield('content')
      </div>
    </div>
  </div>

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
