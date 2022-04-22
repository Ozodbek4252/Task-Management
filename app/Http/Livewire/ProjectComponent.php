<?php

namespace App\Http\Livewire;

use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Livewire\Component;

class ProjectComponent extends Component
{

    protected $listeners = ['refresh'];

    public  $users, $button = 'Add task', $buttonProject = 'Add Project', $projects = [], $tasks = [], $taskEnd, $taskStart, $taskName, 
            $taskNameEdit, $taskStartEdit, $taskEndEdit, $taskDoerEdit, $activeProject, $projectName, 
            $projectStart, $projectEnd, $taskDoer, $activeProjectData, $updateTaskId, $projectId,
            $updateProjectId = 0;

    public function mount(){
        $this->users = User::all();
        $this->tasks = Task::all();
        $this->projects = Project::all();
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


    public function addTask(){
        $this->validate(['taskName' => 'required|max:25']);
        if($this->activeProject){
            $task = Task::updateOrCreate(['id'=>$this->updateTaskId],[
                'user_id'=>$this->taskDoer,
                'name'=>$this->taskName,
                'date_start'=>$this->taskStart,
                'date_end'=>$this->taskEnd,
                'project_id'=>$this->activeProject,
                // 'description' => 
            ]);
            $this->taskName ='';
            $this->taskStart = '';
            $this->taskEnd = '';
            $this->taskDoer = '';
            $this->button = 'Add task';
            $this->updateTaskId = null;
        }else{
            $task = Task::updateOrCreate(['id'=>$this->updateTaskId],[
                'user_id'=>$this->taskDoer,
                'name'=>$this->taskName,
                'date_start'=>$this->taskStart,
                'date_end'=>$this->taskEnd,
                'project_id'=>$this->projectId,
                // 'description' => 
            ]);
            $this->taskName ='';
            $this->taskStart = '';
            $this->taskEnd = '';
            $this->taskDoer = '';
            $this->button = 'Add task';
            $this->updateTaskId = null;
        }
        session()->flash('tasks','Task added successfully.');

        $this->taskName = '';
        $this->button = 'Add task';
        
        $this->activeProjectData = Project::find($task->project_id);
    }

    public function editTask($id){
        $this->taskName = Task::find($id)->name;
        $this->taskStart = Task::find($id)->date_start;
        $this->taskEnd = Task::find($id)->date_end;
        $this->taskDoer = Task::find($id)->user_id;
        $this->button = 'Update task';
        $this->updateTaskId = $id;
        $this->projectId = Task::find($id)->project_id;
    }

    public function deleteTask($id){
        $task = Task::find($id);
        $task->delete();
        $this->activeProjectData = Project::find($task->project_id);
//        session()->flash('tasks','Task deleted successfully.');
        
    }
    
    public function completeTask($id){
        $task = Task::find($id);
        if($task->status == 0){
            Task::find($id)->update([
                'status'=>1
            ]);
            session()->flash('tasks','Task completed successfully.');
        }else{
            Task::find($id)->update([
                'status'=>0
            ]);
        }
        $this->activeProjectData = Project::find($task->project_id);
    }

    public function addProject(){
        $this->validate(['projectName' => 'required|max:25']);

        $createdComment = Project::updateOrCreate(['id'=>$this->updateProjectId],[
            'name'=>$this->projectName,
            'date_start'=>$this->projectStart,
            'date_end'=>$this->projectEnd,
        ]);

        $this->projectName = '';
        $this->projectStart = '';
        $this->projectEnd = '';
        $this->mount();
        $this->buttonProject = 'Add Project';
        if($this->updateProjectId==0){
            session()->flash('project','Project added successfully.');
        }else{
            session()->flash('project','Project updated successfully.');
        }
    }

    public function completeProject($id){
        if(Project::find($id)->status == 1){
            Project::find($id)->update([
                'status'=>0
            ]);
        }else{
            Project::find($id)->update([
                'status'=>1
            ]);
            session()->flash('project','Project completed successfully.');
        }
        $this->activeProjectData = Project::find($id);
    }

    public function editProject($id){
        $this->projectName = Project::find($id)->name;
        $this->projectStart = Project::find($id)->date_start;
        $this->projectEnd = Project::find($id)->date_end;
        $this->updateProjectId = $id;
        $this->buttonProject = 'Update Project';
    }

    public function deleteProject($id){
        Project::find($id)->delete();
        $this->activeProject = false;
        $this->activeProjectData = [];
        $this->taskName = '';
        $this->taskStart = '';
        $this->taskEnd = '';
        $this->taskDoer = '';
        $this->button = 'Add task';
        $this->updateTaskId = null;
        session()->flash('project','Project deleted successfully.');
    }
    public function importanceTask($id){
        $task = Task::find($id);
        if(Task::find($id)->importance == 1){
            Task::find($id)->update([
                'importance' => 0
            ]);
        }else{
            Task::find($id)->update([
                'importance' => 1
            ]);
        }
        $this->activeProjectData = Project::find($task->project_id);
    }
    public function importanceProject($id){
        if(Project::find($id)->importance == 1){
            Project::find($id)->update([
                'importance' => 0
            ]);
        }else{
            Project::find($id)->update([
                'importance' => 1
            ]);
        }
        $this->mount();
    }

    public function goToTasks($projectId){
        $this->activeProject = $projectId;
        $this->activeProjectData = Project::find($projectId);
        $this->projectName = '';
        $this->projectStart = '';
        $this->projectEnd = '';
        $this->buttonProject = 'Add Project';
        
        $this->taskName = '';
        $this->taskStart = '';
        $this->taskEnd = '';
        $this->taskDoer = '';
        $this->button = 'Add task';
        $this->updateTaskId = null;
    }


}
