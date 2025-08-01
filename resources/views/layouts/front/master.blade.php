<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="{{ URL::asset('assets/img/logo.png') }}" type="image/x-icon" />

    <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!--Link Page Loader-->
  <script src="{{ asset('assets/front') }}/js/settings-loader.js"></script>
  <!--Link Font Bootstrap CDN-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!--Link Font Awesome CDN-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
  <!--Link Styles Sheet-->
  <link rel="stylesheet" href="{{ asset('assets/front') }}/css/styles.css" />
  @stack('scripts')


  <title> اﻹنجازات</title>
</head>

<body>
    {{-- <a href="https://api.whatsapp.com/send?phone=2001015791799" target="_blank"><svg viewBox="0 0 32 32" class="whatsapp-ico"><path d=" M19.11 17.205c-.372 0-1.088 1.39-1.518 1.39a.63.63 0 0 1-.315-.1c-.802-.402-1.504-.817-2.163-1.447-.545-.516-1.146-1.29-1.46-1.963a.426.426 0 0 1-.073-.215c0-.33.99-.945.99-1.49 0-.143-.73-2.09-.832-2.335-.143-.372-.214-.487-.6-.487-.187 0-.36-.043-.53-.043-.302 0-.53.115-.746.315-.688.645-1.032 1.318-1.06 2.264v.114c-.015.99.472 1.977 1.017 2.78 1.23 1.82 2.506 3.41 4.554 4.34.616.287 2.035.888 2.722.888.817 0 2.15-.515 2.478-1.318.13-.33.244-.73.244-1.088 0-.058 0-.144-.03-.215-.1-.172-2.434-1.39-2.678-1.39zm-2.908 7.593c-1.747 0-3.48-.53-4.942-1.49L7.793 24.41l1.132-3.337a8.955 8.955 0 0 1-1.72-5.272c0-4.955 4.04-8.995 8.997-8.995S25.2 10.845 25.2 15.8c0 4.958-4.04 8.998-8.998 8.998zm0-19.798c-5.96 0-10.8 4.842-10.8 10.8 0 1.964.53 3.898 1.546 5.574L5 27.176l5.974-1.92a10.807 10.807 0 0 0 16.03-9.455c0-5.958-4.842-10.8-10.802-10.8z" fill-rule="evenodd"></path></svg></a> --}}
<main>


    @include('includes.front.header')
    @yield('content')
    @include('includes.front.footer')
</main>

    @yield('scripts')

  <div class="scrollToTop"><i class="fa-solid fa-arrow-up"></i></div>

    <!-- JS Files -->
  <script src="{{ asset('assets/front') }}/js/main.js"></script>
  <script src="{{ asset('assets/front') }}/js/translations.js"></script>
  <script src="{{ asset('assets/front') }}/js/date-range-picker.js"></script>
  <script src="{{ asset('assets/front') }}/js/filter-dropdowns.js"></script>
  <script src="{{ asset('assets/front') }}/js/voice-search.js"></script>
  <script src="{{ asset('assets/front') }}/js/articles-filter.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>
