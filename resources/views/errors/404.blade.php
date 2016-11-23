<html>
<head>
    <title>Laravel</title>

    <link href='//fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>

    <style>
        body {
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
            color: #B0BEC5;
            display: table;
            font-weight: 100;
            font-family: 'Lato';
        }

        .container {
            text-align: center;
            display: table-cell;
            vertical-align: middle;
        }

        .content {
            text-align: center;
            display: inline-block;
        }

        .title {
            font-size: 120px;
            margin-bottom: 40px;
            font-family: 'Lato';
        }

        .quote {
            font-size: 44px;
            font-family: 'Lato';
        }

        .button {
            display: inline-block;
            border-radius: 4px;
            background-color: #B0BEC5;
            border: none;
            color: #202630;
            text-align: center;
            font-size: 28px;
            padding: 20px;
            width: 200px;
            transition: all 0.5s;
            cursor: pointer;
            margin: 5px;
        }

        .button span {
            cursor: pointer;
            display: inline-block;
            position: relative;
            transition: 0.5s;
        }

        .button span:after {
            content: '»';
            position: absolute;
            opacity: 0;
            top: 0;
            right: -20px;
            transition: 0.5s;
        }

        .button:hover span {
            padding-right: 25px;
        }

        .button:hover span:after {
            opacity: 1;
            right: 0;
        }

        .decoration {
            text-decoration: none;
            color: #202630;
            font-family: 'Lato';

        }
    </style>
</head>
<body>
<div class="container">
    <div class="content">
        <div class="title">Error <strong>404</strong> </div>
        <div class="quote">Página no encontrada</div>
        <br>
        <div>
        <button class="button" style="vertical-align:middle"><span><a href="{{ route('welcome') }}" class="decoration">Inicio</a></span></button>
        </div>
    </div>
</div>
</body>
</html>
