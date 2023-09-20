<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\task as tasky;
use Livewire\WithPagination;
class Task extends Component
{
    use WithPagination;
    public $tasks=[]; // array of temporary tasks not from db
    public $task; // single task item not from db

    protected $dbTasks; // array of dbTasks fetched from elequent model query for initial view
    public $dbTask; // single dbtask item
    public $toDelete; // id of task to delete
    public $dbTaskEdit; // editable content in text field
    public $isBeingEditedId; // id of task thats being edited
    public $showDiv = false;
    public $showDiv2 = false;
    public $searchTerm=''; // search filter term typed in search form


    public function render()
    {
        $this->dbTasks = tasky::where('task','LIKE',"%{$this->searchTerm}%")->orderBy('priority','desc')->paginate(3);   
        return view('livewire.task',['posts'=>$this->dbTasks]);
    }  

    public function updatingSearch()
    {
        $this->resetPage();
    }

    // public function updatingPage($page)
    // {
    //     // Runs before the page is updated for this component...
    //      $this->resetPage();
    // }
 
    // public function updatedPage($page)
    // {
    //     // Runs after the page is updated for this component...
    // }

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
     if($record)
     {
        $record->delete();
    }
    $this->emit('refreshComponent');
}


public function updateDbTask()
{
 $record = tasky::find($this->isBeingEditedId);
 if($record)
 {
    if(!empty($this->dbTaskEdit))
    {
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
    if($record)
    {    
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

public function search()
{
    $this->resetPage();
    $this->render();
}

}
