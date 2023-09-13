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
        <div style="display: block; margin: auto; width: 50%; padding: 10px; border: 1px solid grey; margin-top: 100px;  black; text-align: center;">

          <h2>Edit to do</h2>

     <div>
        {!! Form::model($model,['route'=>'updatejob']) !!}

    <div class="">      
       
        {!! Form::textarea('task',null,['class'=>'form-control','style'=>'','placeholder'=>'task title']) !!}
    </div>

    <div style="flex:1;">
                <select name="priority">
                    <option value="">Select priority</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                </select>
            </div>

    <div class="">      
        {!! Form::hidden('id',null,['class'=>'form-control','style'=>'']) !!}
    </div>

    <div class="">
        {!! Form::submit('Save task', ['class'=>'btn-primary primary form-control','name'=>'go2', 'id'=>'go2','style'=>'']) !!}
    </div>
       </div>


    </body>
</html>
