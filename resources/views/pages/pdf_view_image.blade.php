<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style>
        
    </style>

    <title>File To PDF - @yield('title')</title>
</head>

<body class="container-fluid">
    <div>
        <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('Temp/zzz.jpg'))) }}">
    </div>
</body>

</html>
