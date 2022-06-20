<html>

<head>
    {{-- <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> --}}
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        
    </style>

    <title>File To PDF - @yield('title')</title>
</head>

<body class="container-fluid">
    {{-- <div>
        <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('Temp/zzz.jpg'))) }}">
    </div> --}}
    <center><div width="100%"><img style="max-width:100%; max-height:100%;" 
        src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('Temp/zzz.jpg'))) }}"> </div></center>
</body>

</html>
