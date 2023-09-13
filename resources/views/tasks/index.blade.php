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

        <div style="display: block; margin: auto; margin-top: 100px; width: 50%; padding: 20px; border: 1px solid grey; border-radius: 10px; ">
             <h2>Create Task</h2>

           <form method="post" action="{{ route('posttodo') }}">
                <!-- <div style="flex: 1;">
                <input type="text" name="task">
            </div> -->

           <div style="flex: 1;">
                <label for="task"> Task Name:</label><br>

<textarea id="task" name="task" rows="4" cols="50">

</textarea>
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

            <input type="hidden" name="_token" value="{{ csrf_token() }}" />

            <div>
                <input type="submit" name="submit" value="Save Task">
            </div>
           </form>


           <div style="margin-top: 30px;">           
          <?php
            if($list != null){ 
                foreach($list as $li){
            ?>

            <div style="margin-bottom: 25px; border: 1px solid white;">
                <?= ucfirst($li->task) ?>
                <span style="display:block;">Priority: <?= $li->priority ?></span>
                <span style="display:block;"><a href="{{ route('edittodo',$li->id) }}"> Edit todo</a></span>
                 <span style="display:block;"><a href="{{ route('deletejob',$li) }}"> Delete</a></span>
            </div>

            <?php } }

          ?>
           
       </div>
            
        </div>


        
    </body>
</html>
