<div>
<div>
  
        <div>
            <input type="text" name="task" id="task" wire:model="task">
        </div>
         <div>
           <button wire:click="addTask">Add Task to Array</button>
        </div>
        
    
</div>

<div>
    Tasks from temporary array
</div>
<div>
    @foreach($tasks as $task)

    <div style="background-color: darkblue; color: white; padding: 10px; margin-bottom: 2px; border-top-right-radius: 5px; border-top-left-radius: 5px; width: 40%; text-transform: capitalize; font-family: 'Verdana';">
        {{ $task }}
    </div>
    
    @endforeach
    
</div>


</div>
