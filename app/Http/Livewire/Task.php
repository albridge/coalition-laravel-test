<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\task as tasky;
class Task extends Component
{
    public $tasks=[]; // array of temporary tasks not from db
    public $task; // single task item not from db

    public $dbTasks; // array of dbTasks fetched from elequent model query for initial view
    public $dbTask; // single dbtask item
    public $toDelete; // id of task to delete
    public $dbTaskEdit; // editable content in text field
    public $isBeingEditedId; // id of task thats being edited
    public $showDiv = false;
    public $showDiv2 = false;
    public function render()
    {
        $this->dbTasks = tasky::orderBy('priority','desc')->get();   
        return view('livewire.task');
    }

    public function addTask()
    {
        array_push($this->tasks, $this->task);
        $this->task = '';

        $this->emit('refreshComponent');

    }

    public function addDbTask()
    {       


        $this->dbTasks = tasky::orderBy('priority','desc')->get();
        if(!empty($this->dbTask)){
            tasky::create(['task'=>$this->dbTask,'priority'=>1]);
            $this->dbTask = '';
            $this->cancelTask();

            $this->emit('refreshComponent');
        }

    }

    public function deleteTask($id)
    {
     $record = tasky::find($id);
     if($record){
        $record->delete();
    }
    $this->emit('refreshComponent');
}


public function updateDbTask()
{
 $record = tasky::find($this->isBeingEditedId);
 if($record){
    if(!empty($this->dbTaskEdit)){
        $record->task = $this->dbTaskEdit;             
        $record->save();
        $this->dbTaskEdit='';
        $this->cancelDbTask();
        $this->emit('refreshComponent');
    }
}
}


public function edit2Task($id)
{
    $record = tasky::find($id);
    if($record){    
       $this->openDiv();  
       $this->isBeingEditedId = $id;
       $this->dbTaskEdit = $record->task;
       $this->emit('refreshComponent');
   }
}


public function openDiv()
{
    $this->showDiv = true;
    $this->showDiv2 = false;
}


public function cancelDbTask()
{
    $this->showDiv = false;
}

public function addDiv()
{
    $this->showDiv2 = !$this->showDiv2;
    $this->showDiv = false;
}


public function cancelTask()
{
    $this->showDiv2 = false;
}

}
