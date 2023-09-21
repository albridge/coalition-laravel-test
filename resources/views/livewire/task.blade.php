<div>

<div style="margin:auto; width: 40%;">
    <div>
        <input type="text" name="search" id="search" style="width: 100%; margin: 20px 0px; padding:10px; border-radius:5px;" placeholder="Search" wire:model="searchTerm" wire:keydown="search" >        
    </div>
<button class="blue_button" wire:click="addDiv">Add Task / Cancel</button>
</div>
@if($showDiv)
<div style="margin:auto; width: 40%;">
        <div style="">           

            <textarea name="taskEdit" rows="4" cols="50" wire:model="dbTaskEdit" id="taskdbEdit">

            </textarea>
        </div>
         <div style="  display:inline-block;">
           <button class="blue_button"  wire:click="updateDbTask">Update Task</button>
        </div>
        <div style="  display: inline-block;">
           <button class="red_button"  wire:click="cancelDbTask">Cancel Update</button>
        </div>
    </div>
@endif

 @if($showDiv2)
    <div style=" margin:auto; width: 40%;">
        <div style="">           

            <textarea name="task" rows="4" cols="50" wire:model="dbTask" id="taskdb">

            </textarea>
        </div>
         <div style="display: block;">
           <button class="green_button" id="but1"  wire:click="addDbTask">Save Task</button>
        </div>
    </div>
    @endif
<div sort-root wire:sortable="updateTaskOrder" wire:sortable.options="{ animation: 100 }">
<!-- #2471A3 -->
    @foreach($posts as $dbTask)
<div sort-items style="display: block; margin:auto; margin-bottom: 5px; width: 550px; cursor: pointer;  background-color: #34495E; border-radius:5px" wire:sortable.item="{{ $dbTask->id }}" wire:key="task-{{ $dbTask->id }}">
    <div style="color: white; padding: 10px; margin-bottom: 2px; border-top-right-radius: 5px; border-top-left-radius: 5px; width: 80%; text-transform: capitalize; font-family: 'Verdana';  margin-right: 3px; display:inline-block;">
        {{ $dbTask->task }}
    </div>

    
    <div style="color: white; padding: 10px; margin-bottom: 2px; border-top-right-radius: 5px; border-top-left-radius: 5px; width: auto; text-transform: capitalize; font-family: 'Verdana';  margin-right: 3px; text-align:center; cursor: pointer; display:inline-block;" wire:click="edit2Task({{$dbTask->id}})">
       Edit
    </div>
    <div style="color: white; padding: 10px; margin-bottom: 2px; border-top-right-radius: 5px; border-top-left-radius: 5px; width: auto; text-transform: capitalize; font-family: 'Verdana'; text-align:center; cursor: pointer; display:inline-block;" wire:click="deleteTask({{$dbTask->id}})">
       x
    </div>
     
  </div>  
    @endforeach

   
    
</div>


<div style="display: flex; margin:auto; width: 40%; margin-top: 20px;">
    {{ $posts->links() }}
</div>

</div>

