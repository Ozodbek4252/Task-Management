<?php

namespace App\Http\Livewire;

use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Livewire\Component;

class ProjectComponent extends Component
{
    public  $users, $button = 'Add task', $projects = [], $tasks = [], $taskEnd, $taskStart, $taskName, 
            $taskNameEdit, $taskStartEdit, $taskEndEdit, $taskDoerEdit, $activeProject, $projectName, 
            $projectStart, $projectEnd, $taskDoer, $activeProjectData, $updateTaskId;

    public function press(){
        $this->a = 'changed';
    }
    public function mount(){
        $this->users = User::all();
        $this->tasks = Task::all();
        $this->projects = Project::all();
    }

    public function addTask(){
        $this->validate(['taskName' => 'required|max:25']);

        $task = Task::updateOrCreate(['id'=>$this->updateTaskId],[
            'user_id'=>1,
            'name'=>$this->taskName,
            'date_start'=>$this->taskStart,
            'date_end'=>$this->taskEnd,
            'project_id'=>$this->activeProject,
            // 'description' => 
        ]);

        $this->taskName = '';
        $this->button = 'Add task';
        
        session()->flash('tasks','Task added successfully.');
        $this->activeProjectData = Project::find($task->project_id);
    }

    public function deleteTask($id){}
    public function completeTask($id){}
    public function editTask($id){
        $this->taskName = Task::find($id)->name;
        $this->taskStart = Task::find($id)->date_start;
        $this->taskEnd = Task::find($id)->date_end;
        $this->taskDoer = Task::find($id)->user_id;
        $this->button = 'Update task';
        $this->updateTaskId = $id;
    }

    public function addProject(){
        $this->validate(['projectName' => 'required|max:25']);

        $createdComment = Project::create([
            'name'=>$this->projectName,
            'date_start'=>$this->projectStart,
            'date_end'=>$this->projectEnd,
        ]);

        $this->projectName = '';
        $this->mount();

        session()->flash('project','Project added successfully.');
    }

    public function goToTasks($projectId){
        $this->activeProject = $projectId;
        $this->activeProjectData = Project::find($projectId);

        // $this->tasks = Project::find($this->projects)->tasks;
    }

    public function render()
    {
        $this->users = User::all();
        $this->tasks = Task::all();
        $this->projects = Project::all();
        return view('livewire.project', [
            'projects' => $this->projects,
            'tasks' => $this->tasks,
            'users' => $this->users,
        ]);
    }
}
