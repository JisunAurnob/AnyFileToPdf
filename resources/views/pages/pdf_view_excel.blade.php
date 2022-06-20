<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style>
        .page-break {
            page-break-after: always;
        }

        #pdf {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #pdf td,
        #pdf th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #pdf tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #pdf th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #010109;
            color: white;
        }
    </style>

    <title>File To PDF - @yield('title')</title>
</head>

<body class="container-fluid">
    <div>
        <table id="pdf">

            @foreach ($excelData as $edata)
                <tr>
                    @for ($x = 0; $x < count($edata[0]); $x++)
                        <th>{{ $edata[0][$x] }}</th>
                    @endfor
                </tr>
                @for ($j = 1; $j < count($edata); $j++)
                    <tr>
                        @for ($k = 0; $k < count($edata[$j]); $k++)
                            @if (!is_null($edata[$j][$k]))
                                <td>{{ $edata[$j][$k] }}</td>
                            @endif
                        @endfor
                    </tr>
                @endfor
            @endforeach
        </table>
    </div>
</body>

</html>
