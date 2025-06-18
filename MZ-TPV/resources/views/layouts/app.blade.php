<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>TPV System</title>
    <link rel="icon" type="image/png" href="https://res.cloudinary.com/dandumvvy/image/upload/v1750285793/logo_negro_hggkgw.png">
</head>
<body>
   
    <div id="loader-bg" style="
        position:fixed;z-index:9999;inset:0;background:#fff;display:flex;align-items:center;justify-content:center;
        transition:opacity .4s;
    ">
        <img src="https://res.cloudinary.com/dandumvvy/image/upload/v1750285793/logo_para_loop_aadtyw.png"
             alt="Cargando..." style="width:90px;animation:spin 1.6s linear infinite;">
    </div>


 
    {{-- @include('admin.partials.sidebar') --}}

    <main>
        @yield('content')
    </main>

   
    <script>
    window.addEventListener('load', function(){
        setTimeout(function(){
            document.getElementById('loader-bg').style.opacity = 0;
            setTimeout(function(){
                document.getElementById('loader-bg').style.display = 'none';
            }, 400);
        }, 350); // medio segundo extra para que el fade no sea brusco
    });
    </script>
    <style>
    @keyframes spin { 100% { transform: rotate(360deg);} }
    </style>

    @stack('scripts')
</body>
</html>
