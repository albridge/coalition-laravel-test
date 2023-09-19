<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        
        <style>

        </style>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">
        <div style="display: block; margin: auto; width: 50%; padding: 10px; border: 1px solid grey; margin-top: 100px; background-color: black; text-align: center;">

          <a style="color: white;" href="{{ url('/task') }}">Click here to create tasks</a>
    </body>
</html>
