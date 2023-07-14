<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <meta name="description" content="A well made and handcrafted Bootstrap 5 template">
    <link rel="apple-touch-icon" sizes="180x180" href="img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('/front/img/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('/front/img/favicon-16x16.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('/front/img/favicon.png') }}">
    <meta name="author" content="Holger Koenemann">
    <meta name="generator" content="Eleventy v2.0.0">
    <meta name="HandheldFriendly" content="true">
    <link rel="stylesheet" href="{{ asset('/front/css/theme.min.css') }}">
    <link rel="icon" type="image/png" href="{{ asset('/front/logo/favicon.png') }}">

    <style>
      /* inter-300 - latin */
      @font-face {
        font-family: 'Inter';
        font-style: normal;
        font-weight: 300;
        font-display: swap;
        src: local(''),
          url('fonts/inter-v12-latin-300.woff2') format('woff2'),
          /* Chrome 26+, Opera 23+, Firefox 39+ */
          url('fonts/inter-v12-latin-300.woff') format('woff');
        /* Chrome 6+, Firefox 3.6+, IE 9+, Safari 5.1+ */
      }
  
      /* inter-400 - latin */
      @font-face {
        font-family: 'Inter';
        font-style: normal;
        font-weight: 400;
        font-display: swap;
        src: local(''),
          url('fonts/inter-v12-latin-regular.woff2') format('woff2'),
          /* Chrome 26+, Opera 23+, Firefox 39+ */
          url('fonts/inter-v12-latin-regular.woff') format('woff');
        /* Chrome 6+, Firefox 3.6+, IE 9+, Safari 5.1+ */
      }
  
      @font-face {
        font-family: 'Inter';
        font-style: normal;
        font-weight: 500;
        font-display: swap;
        src: local(''),
          url('fonts/inter-v12-latin-500.woff2') format('woff2'),
          /* Chrome 26+, Opera 23+, Firefox 39+ */
          url('fonts/inter-v12-latin-500.woff') format('woff');
        /* Chrome 6+, Firefox 3.6+, IE 9+, Safari 5.1+ */
      }
  
      @font-face {
        font-family: 'Inter';
        font-style: normal;
        font-weight: 700;
        font-display: swap;
        src: local(''),
          url('fonts/inter-v12-latin-700.woff2') format('woff2'),
          /* Chrome 26+, Opera 23+, Firefox 39+ */
          url('fonts/inter-v12-latin-700.woff') format('woff');
        /* Chrome 6+, Firefox 3.6+, IE 9+, Safari 5.1+ */
      }
    </style>
  

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }} | @yield('pageTitle')</title>

    <!-- Fonts -->

    <!-- Styles -->
    @yield('style')

</head>

<body class="bg-black text-white mt-0" data-bs-spy="scroll" data-bs-target="#navScroll">

@include('front/inc/navbar')

@yield('content')

@include('front/inc/footer')


@yield('script')
<script src="{{ asset('/front/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('/front/js/aos.js') }}"></script>
<script>
  AOS.init({
    duration: 800, // values from 0 to 3000, with step 50ms
  });
</script>
<script>
  let scrollpos = window.scrollY
  const header = document.querySelector(".navbar")
  const header_height = header.offsetHeight

  const add_class_on_scroll = () => header.classList.add("scrolled", "shadow-sm")
  const remove_class_on_scroll = () => header.classList.remove("scrolled", "shadow-sm")

  window.addEventListener('scroll', function () {
    scrollpos = window.scrollY;

    if (scrollpos >= header_height) { add_class_on_scroll() }
    else { remove_class_on_scroll() }

    console.log(scrollpos)
  })
</script>

</body>
</html>