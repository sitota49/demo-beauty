<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Beauty Cosmetics') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link href="{{ asset('fontawesome/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <style>
         @font-face {
            font-family: 'Asap-Bold';
            src: url('/fonts/Asap-Bold.ttf') format('truetype');
            }

        @font-face {
        font-family: 'Asap-Medium';
        src: url('/fonts/Asap-Medium.ttf') format('truetype');
        }


        @font-face {
        font-family: 'Asap-Regular';
        src: url('/fonts/Asap-Regular.ttf') format('truetype');
        }

        @font-face {
        font-family: 'Asap-SemiBold';
        src: url('/fonts/Asap-SemiBold.ttf') format('truetype');
        }

        @font-face {
        font-family: 'SecularOne-Regular';
        src: url('/fonts/SecularOne-Regular.ttf') format('truetype');
        }

    </style>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/ruang-admin.css') }}">

    <link href="{{ asset('select2/dist/css/select2.css') }}" rel="stylesheet" />
    <script src="{{ asset('jquery/jquery3.3.1.min.js') }}"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> --}}
    <script src="{{ asset('select2/dist/js/select2.min.js') }}"></script>


{{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet"/> --}}
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script> --}}


    <livewireStyles/>
</head>
<body id="page-top">
    <div id="wrapper">
        @include('inc.sidebar')
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                @include('inc.navbar')
                <div class="container-fluid" id="container-wrapper">
                    @include('inc.messages')
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    <script>
        $('.select2').select2({
          width: '100%',
        //   placeholder: "Select an Option",
          allowClear: true
        });
      </script>

    <script src="{{ asset('jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('js/ruang-admin.min.js') }}"></script>
    <livewireScripts/>

</body>
</html>
