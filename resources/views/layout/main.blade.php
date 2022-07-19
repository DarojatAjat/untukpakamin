<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }} @yield('title')</title>
    
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,800" rel="stylesheet" /> <!-- https://fonts.google.com/specimen/Open+Sans?selection.family=Open+Sans -->
    <link href="{{asset('tokoku/css/all.min.css') }}" rel="stylesheet" /> <!-- https://fontawesome.com/ -->
    <link href="{{ asset('tokoku/slick/slick.css') }}" rel="stylesheet" /> <!-- https://kenwheeler.github.io/slick/ -->
    <link href="{{ asset('tokoku/slick/slick-theme.css') }}" rel="stylesheet" />
	<link href="{{ asset('tokoku/css/bootstrap.min.css') }}" rel="stylesheet" /> <!-- https://getbootstrap.com -->
	<link href="{{ asset('tokoku/css/templatemo-new-vision.css') }}" rel="stylesheet" />
<!--New Vision Templatehttps://templatemo.com/tm-542-new-vision-->
@stack('cssdatatable')
</head>
<body>
    <div class="container-fluid">
        <div class="tm-site-header">
            <div class="row">
                <div class="col-12 tm-site-header-col">
                    <div class="tm-site-header-left">
                        <i class="far fa-2x fa-eye tm-site-icon"></i>
                        <h1 class="tm-site-name">{{ config('app.name') }}</h1>
                    </div>
                    <div class="tm-site-header-right tm-menu-container-outer">
                        
                        <!--Navbar-->
                       @includeIf('layout.navbar')
                        <!--/.Navbar-->
                    </div>
                </div>
            </div>
        </div>
        
       
        <!-- Main -->
        <main>
            {{-- isi --}}
           @yield('isi')
           {{-- isi --}}
           
            {{-- <footer> --}}
               @includeIf('layout/footer')
            {{-- </footer> --}}
            
        </main>
    </div>
    <script src="{{ asset('tokoku/js/sweetalert2.all.min.js')}}"></script>
    {{-- <script src="{{ asset('tokoku/js/jquery/jquery.min.js')}}"></script> --}}
    <script src="{{asset('tokoku/js/jquery-3.4.1.min.js')}}"></script>
    <script src="{{asset('tokoku/slick/slick.min.js')}}"></script>
    <script src="{{asset('tokoku/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('tokoku/js/templatemo-script.js')}}"></script>
    @stack('jsdatatable')
    <script>
    $('.custom-file-input').on('change',function(){
        let filename=$(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass('selected').html(filename);
     });
     $.ajaxSetup({
        headers:{
       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
     }
     });
    function preview(target,image){
        $(target)
        .attr('src',window.URL.createObjectURL(image))
        .show();
    }
    </script>
    <x-toast/>
    @stack('scripts')
</body>
</html>