<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Departamento de sistemas</title>

    {!! Html::style('css/css.css') !!}

    <style>
        .header { position: fixed; left: 0px; top: -100px; right: 0px; height: 100px; text-align: center; }
        .footer { position: fixed; left: 0px; bottom: -50px; right: 0px; height: 50px;text-align: center;}
        .footer2 { position: fixed; left: 0px; bottom: -30px; right: 0px; height: 50px;text-align: left;}
        .footer .pagenum:before { content: counter(page); }
    </style>

</head>
<body>

    @yield('content')

</body>
</html>
