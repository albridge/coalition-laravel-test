<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
        <title>{{ $title ?? 'Page Title' }}</title>
        @livewireStyles

        <style type="text/css">
           #taskdb, #taskdbEdit{
                width: 100%;
                padding: 10px;
                border-radius: 5px;
            }

            .blue_button{
                background-color:#2471A3; padding:10px; border-radius:5px; color:white; margin-bottom:20px; border:none;
            }

            .red_button{
                background-color:#DD4E2B; padding:10px; border-radius:5px; color:white; margin-bottom:20px; border:none;
            }

            .green_button{
                background-color:#167E19; padding:10px; border-radius:5px; color:white; margin-bottom:20px; border:none;
            }

/*  for food software          #D35400*/
        </style>
    </head>
    <body>
         <div>
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
    </div>
        {{ $slot }}
        @livewireScripts
    </body>
</html>