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
    

        <link rel="stylesheet" href="{{ asset('bootstrap513/css/bootstrap.css') }}">
        <script src="{{ asset('bootstrap513/js/bootstrap.min.js') }}" defer></script>



       <!--  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> -->



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
         <script src="https://cdn.jsdelivr.net/gh/livewire/sortable@v0.x.x/dist/livewire-sortable.js"></script>
           <script src="{{ asset('js/mySort.js') }}"></script>
    </body>
</html>