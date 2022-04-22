<div>
    <style>
        .deadline{
            float: right;
        }
        #external-events a {
            color: black;
        }
        #external-events a:hover{
            color: white;
        }
        .fix{
            margin-left: 5px;
        }
        .project{
            border-radius: 5px;
        }
    </style>
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">

                <div class="row">
                    
                    <div class="col-lg-3">
                        <div class="card" class="pb-3">

                            @error('projectName')<span style="color: red;">{{$message}}</span>@enderror

                        <div style="margin-bottom: 1rem;">
                            @if(session()->has('project'))
                                <div style="padding: .75rem; background: #9ae6b4; color: #276749; border-radius: 0.25rem; box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);" class="alert alert-success">
                                    {{session('project')}}
                                </div>
                            {{-- @elseif(session()->has('deleteMessage'))
                                <div style="padding: .75rem; background: #feb2b2; color: #9b2c2c; border-radius: 0.25rem; box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);" class="alert alert-success">
                                    {{session('deleteMessage')}}
                                </div> --}}
                            @endif
                        </div>
                            <div class="card-body">
                                {{-- Add Projects --}}
                                <div class="d-grid">
                                    <form  wire:submit.prevent="addProject">
                                        <h3 style="text-align: center">Create new project</h3>
                                        <div style="display: flex; align-items: end; ">
                                            <div class="mb-3 mr-2 col-12">
                                                <label class="form-label" for="project-name" style="font-weight: bold">Project name</label>
                                                <input wire:model.debounce.500ms="projectName" type="text" class="form-control" id="project-name" placeholder="Project name ...">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label class="form-label" for="project-start" style="font-weight: bold">From</label>
                                                <input wire:model="projectStart" type="date" class="form-control" id="project-start">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label" for="project-end" style="font-weight: bold">To</label>
                                                <input wire:model="projectEnd" type="date" class="form-control" id="project-end">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="mt-3 col-12" style="text-align: center">
                                                <button wire:click="addProject()" type="button" class="btn btn-success waves-light waves-effect">{{$buttonProject}}</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                {{-- Add Projects End --}}

                                {{-- <div class="row justify-content-center mt-5">
                                    <img src="assets/images/coming-soon-img.png" alt="" class="img-fluid d-block">
                                </div> --}}

                                <div id="external-events" class="mt-2">
                                    @for($i = 0; $i<count($projects); $i++)
                                        @if($projects[$i]->importance == 1)
                                            <br>
                                                <?php
                                                        $day = (strtotime($projects[$i]->date_end) - strtotime($projects[$i]->date_start))/86400;
                                                        $day_left = round(((strtotime($projects[$i]->date_end) - time()))/86400);
                                                ?>
                                                <div wire:click="goToTasks({{ $projects[$i]->id }})" style="cursor: pointer; ">
                                                    <div class="project external-event @if($day_left <= 3)  bg-danger  @elseif($day_left > 3 && $day_left < 7) bg-warning @else bg-success @endif text-white" data-class="bg-danger" style="{{$activeProject == $projects[$i]->id ? 'background-color: rgb(187 247 208); box-shadow: 0 2px 8px 0 rgba(10, 10, 10, 10), 0 1px 2px 0 rgba(0, 0, 0, 0.06); ' : ''}};" >
                                                        <i class="mdi mdi-checkbox-blank-circle font-size-11 me-2 text-white"></i>
                                                        {{$projects[$i]->name}}
                                                        <span class="deadline">
                                                            @if($day_left <= 3)
                                                                <i class="uil-bolt-alt"></i>
                                                            @elseif($day_left > 3 && $day_left < 7)
                                                                <i class="uil-exclamation-triangle"></i>
                                                            @else
                                                                <i class="bx bx-coffee"></i>
                                                            @endif
                                                            @if($day_left>0) {{ $day_left }} days left @elseif($day_left==0) today @else {{ -$day_left }} days passed @endif
                                                                <button wire:click = "importanceProject({{ $projects[$i]->id }})" @if($projects[$i]->importance == 1) style="color: black;" @endif><i class="bx bx-pin"></i></button>
                                                        </span>
                                                    </div>
                                                </div>
                                        @endif
                                    @endfor
                                        @for($i = 0; $i<count($projects); $i++)
                                            @if($projects[$i]->importance == 0)
                                                <br>
                                                <?php
                                                $day = (strtotime($projects[$i]->date_end) - strtotime($projects[$i]->date_start))/86400;
                                                $day_left = round(((strtotime($projects[$i]->date_end) - time()))/86400);
                                                ?>
                                                <div wire:click="goToTasks({{ $projects[$i]->id }})" style="cursor: pointer; ">
                                                    <div class="project external-event @if($day_left <= 3)  bg-danger  @elseif($day_left > 3 && $day_left < 7) bg-warning @else bg-success @endif text-white" data-class="bg-danger" style="{{$activeProject == $projects[$i]->id ? 'background-color: rgb(187 247 208); box-shadow: 0 2px 8px 0 rgba(10, 10, 10, 10), 0 1px 2px 0 rgba(0, 0, 0, 0.06); ' : ''}};" >
                                                        <i class="mdi mdi-checkbox-blank-circle font-size-11 me-2 text-white"></i>
                                                        {{$projects[$i]->name}}
                                                        <span class="deadline">
                                                            @if($day_left <= 3)
                                                                <i class="uil-bolt-alt"></i>
                                                            @elseif($day_left > 3 && $day_left < 7)
                                                                <i class="uil-exclamation-triangle"></i>
                                                            @else
                                                                <i class="bx bx-coffee"></i>
                                                            @endif
                                                            @if($day_left>0) {{ $day_left }} days left @elseif($day_left==0) today @else {{ -$day_left }} days passed @endif
                                                                <button wire:click = "importanceProject({{ $projects[$i]->id }})" @if($projects[$i]->importance == 1) style="color: black;" @endif><i class="bx bx-pin"></i></button>
                                                        </span>
                                                    </div>
                                                </div>
                                            @endif
                                        @endfor
                                </div>
                            </div>
                        </div>
                    </div> <!-- end col-->

                    <div class="col-lg-9">
                        @error('taskName')<span style="color: red;">{{$message}}</span>@enderror
                        <div style="margin-bottom: 1rem;">
                            @if(session()->has('tasks'))
                                <div style="padding: .75rem; background: #9ae6b4; color: #276749; border-radius: 0.25rem; box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);" class="alert alert-success">
                                    {{session('tasks')}}
                                </div>
                            {{-- @elseif(session()->has('deleteMessage'))
                                <div style="padding: .75rem; background: #feb2b2; color: #9b2c2c; border-radius: 0.25rem; box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);" class="alert alert-success">
                                    {{session('deleteMessage')}}
                                </div> --}}
                            @endif
                        </div>

                        <div class="card">
                            <div class="card-body">
                                {{-- Add Task --}}
                                @if($activeProject)
                                <div class="btn-toolbar p-3" role="toolbar">
                                    <form style=" display: flex;  align-items: end;" wire:submit.prevent="addTask">
                                        @csrf
                                        <div class="mb-3 mr-2 col-md-3">
                                            <label class="form-label" for="task-name" style="font-weight: bold">Task Name</label>
                                            <input wire:model.debounce.500ms="taskName" type="text" class="form-control" id="task-name" placeholder="Task name ...">
                                        </div>
                                        <div class="mb-3 mr-2">
                                            <label class="form-label" for="task-start" style="font-weight: bold">From</label>
                                            <input wire:model="taskStart" type="date" class="form-control" id="task-start">
                                        </div>
                                        <div class="mb-3 mr-2">
                                            <label class="form-label" for="task-end" style="font-weight: bold">To</label>
                                            <input wire:model="taskEnd" type="date" class="form-control" id="task-end">
                                        </div>
                                        <div class="mb-3 mr-2 col-md-2">
                                            <label class="form-label" for="" style="font-weight: bold">Select User</label>
                                            <select wire:model="taskDoer" name="taskDoer" id="taskDoer" name="taskDoer" class="form-control select2">
                                                <option value="0">Select</option>
                                                @foreach($users as $user)
                                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3 col-md-2">
                                            <button wire:click="addTask()" type="button" class="btn btn-success waves-light waves-effect">{{ $button }}</button>
                                        </div>
                                    </form>
                                </div>
                                @endif
                                {{-- Add Task End --}}
                                <h4 style="text-align: center"></h4>
                                    <ul class="message-list">
                                            <div class="tab-pane active" id="tasks" role="tabpanel">
                                                <div>
                                                    <div class="table-responsive">
                                                        <table class="table table-nowrap table-centered">
                                                            @if($activeProject)
                                                            <div style="display: flex; justify-content: space-between; margin-bottom: 5px; align-items: center;">
                                                                <div style="display: flex; align-items: center;">
                                                                    <h3>{{$activeProjectData->name}} | </h3>
                                                                    <span class="ml-2">
                                                                        <?php 
                                                                            $days_left = round((strtotime($activeProjectData->date_end) - time())/86400);
                                                                            ?>
                                                                        @if($days_left>0) {{ $days_left }} days left @elseif($days_left==0) today @else {{ -$days_left }} days passed @endif
                                                                    </span>
                                                                </div>
                                                                <div style="width: 150px;">
                                                                    <span wire:click="completeProject({{$activeProjectData->id}})" class="mr-1">
                                                                        <button class="btn btn-rounded btn-success">
                                                                            @if($activeProjectData->status == 1)
                                                                                <i class="bx bx-check-double"></i>
                                                                            @else
                                                                                <i class="bx bx-check"></i>
                                                                            @endif
                                                                        </button>
                                                                    </span>
                                                                    <span wire:click="editProject({{$activeProjectData->id}})" class="mr-1"><button class="btn btn-rounded btn-warning"><i class="uil-pen"></i></button></span>
                                                                    <span wire:click="deleteProject({{$activeProjectData->id}})" class="mr-1"><button class="btn btn-rounded btn-danger"><i class="uil-trash"></i></button></span>
                                                                </div>
                                                            </div>
                                                            @else
                                                            <h3>All Tasks</h3>
                                                            @endif
                                                            <tbody>
                                                                @if($activeProject)
                                                                    @for($i = 0; $i <count($activeProjectData->tasks); $i++)
                                                                        @if($tasks[$i]->importance == 1)
                                                                            <tr>
                                                                                <td style="width: 60px;">
                                                                                    <button wire:click = "importanceTask({{ $tasks[$i]->id }})" class="btn btn-outline btn-outline-primary @if($tasks[$i]->importance == 1) active @endif"><i class="bx bx-pin"></i></button>
                                                                                </td>
                                                                                <td>
                                                                                    <a href="" class="fw-bold text-dark">{{ $activeProjectData->tasks[$i]->name }}
                                                                                        @if($activeProjectData->tasks[$i]->status == 1)
                                                                                            <span class="badge bg-soft-success font-size-12">Completed</span>
                                                                                        @else
                                                                                            <span class="badge bg-soft-secondary font-size-12">Progressing </span>
                                                                                        @endif
                                                                                    </a>
                                                                                </td>

                                                                                <td><i class="fas fa-user-clock"></i>{{ \App\Models\User::find($activeProjectData->tasks[$i]->user_id)->name }}</td>
                                                                                <td>{{$activeProjectData->tasks[$i]->date_start}} - {{ $activeProjectData->tasks[$i]->date_end }}</td>
                                                                                <td style="width: 160px;">
                                                                                    <span wire:click="completeTask({{$activeProjectData->tasks[$i]->id}})" class="mr-1">
                                                                                        <button class="btn btn-success">
                                                                                            @if($activeProjectData->tasks[$i]->status == 1)
                                                                                                <i class="bx bx-check-double"></i>
                                                                                            @else
                                                                                                <i class="bx bx-check"></i>
                                                                                            @endif
                                                                                        </button>
                                                                                    </span>
                                                                                    <span wire:click="editTask({{$activeProjectData->tasks[$i]->id}})" class="mr-1"><button class="btn btn-warning"><i class="uil-pen"></i></button></span>
                                                                                    <span wire:click="deleteTask({{$activeProjectData->tasks[$i]->id}})" class="mr-1"><button class="btn btn-danger"><i class="uil-trash"></i></button></span>
                                                                                </td>
                                                                            </tr>
                                                                        @endif
                                                                    @endfor
                                                                    @for($i = 0; $i <count($activeProjectData->tasks); $i++)
                                                                        @if($tasks[$i]->importance == 0)
                                                                            <tr>
                                                                                <td style="width: 60px;">
                                                                                    <button wire:click = "importanceTask({{ $tasks[$i]->id }})" class="btn btn-outline btn-outline-primary @if($tasks[$i]->importance == 1) active @endif"><i class="bx bx-pin"></i></button>
                                                                                </td>
                                                                                <td>
                                                                                    <a href="" class="fw-bold text-dark">{{ $activeProjectData->tasks[$i]->name }}
                                                                                        @if($activeProjectData->tasks[$i]->status == 1)
                                                                                            <span class="badge bg-soft-success font-size-12">Completed</span>
                                                                                        @else
                                                                                            <span class="badge bg-soft-secondary font-size-12">Progressing </span>
                                                                                        @endif
                                                                                    </a>
                                                                                </td>

                                                                                <td><i class="fas fa-user-clock"></i>{{ \App\Models\User::find($activeProjectData->tasks[$i]->user_id)->name }}</td>
                                                                                <td>{{$activeProjectData->tasks[$i]->date_start}} - {{ $activeProjectData->tasks[$i]->date_end }}</td>
                                                                                <td style="width: 160px;">
                                                                                    <span wire:click="completeTask({{$activeProjectData->tasks[$i]->id}})" class="mr-1">
                                                                                        <button class="btn btn-success">
                                                                                            @if($activeProjectData->tasks[$i]->status == 1)
                                                                                                <i class="bx bx-check-double"></i>
                                                                                            @else
                                                                                                <i class="bx bx-check"></i>
                                                                                            @endif
                                                                                        </button></span>
                                                                                    <span wire:click="editTask({{$activeProjectData->tasks[$i]->id}})" class="mr-1"><button class="btn btn-warning"><i class="uil-pen"></i></button></span>
                                                                                    <span wire:click="deleteTask({{$activeProjectData->tasks[$i]->id}})" class="mr-1"><button class="btn btn-danger"><i class="uil-trash"></i></button></span>
                                                                                </td>
                                                                            </tr>
                                                                        @endif
                                                                    @endfor
                                                                @else
                                                                    @for($i = 0; $i <count($tasks); $i++)
                                                                        @if($tasks[$i]->importance == 1)
                                                                            <tr>
                                                                                <td style="width: 60px;">
                                                                                    <button wire:click = "importanceTask({{ $tasks[$i]->id }})" class="btn btn-outline btn-outline-primary @if($tasks[$i]->importance == 1) active @endif"><i class="bx bx-pin"></i></button>
                                                                                </td>
                                                                                <td>
                                                                                    <a href="" class="fw-bold text-dark">{{ $tasks[$i]->name }}
                                                                                        @if($tasks[$i]->status == 1)
                                                                                            <span class="badge bg-soft-success font-size-12">Completed</span>
                                                                                        @else
                                                                                            <span class="badge bg-soft-secondary font-size-12">Progressing </span>
                                                                                        @endif
                                                                                    </a>
                                                                                </td>
                                                                                <td><i class="fas fa-user-clock"></i>{{ \App\Models\User::find($tasks[$i]->user_id)->name }}</td>
                                                                                <td>{{$tasks[$i]->date_start}} - {{$tasks[$i]->date_end}}</td>
                                                                                <td style="width: 160px;">
                                                                                    <span wire:click="completeTask({{$tasks[$i]->id}})" class="mr-1">
                                                                                        <button class="btn btn-success">
                                                                                            @if($tasks[$i]->status == 1)
                                                                                                <i class="bx bx-check-double"></i>
                                                                                            @else
                                                                                                <i class="bx bx-check"></i>
                                                                                            @endif
                                                                                        </button>
                                                                                    </span>
                                                                                    <span wire:click="editTask({{$tasks[$i]->id}})" class="mr-1"><button class="btn btn-warning"><i class="uil-pen"></i></button></span>
                                                                                    <span wire:click="deleteTask({{$tasks[$i]->id}})" class="mr-1"><button class="btn btn-danger"><i class="uil-trash"></i></button></span>
                                                                                </td>
                                                                            </tr>
                                                                        @endif
                                                                    @endfor
                                                                    @for($i = 0; $i <count($tasks); $i++)
                                                                        @if($tasks[$i]->importance == 0)
                                                                            <tr>
                                                                                <td style="width: 60px;">
                                                                                    <button wire:click = "importanceTask({{ $tasks[$i]->id }})" class="btn btn-outline btn-outline-primary @if($tasks[$i]->importance == 1) active @endif"><i class="bx bx-pin"></i></button>
                                                                                </td>
                                                                                <td>
                                                                                    <a href="" class="fw-bold text-dark">{{ $tasks[$i]->name }}
                                                                                        @if($tasks[$i]->status == 1)
                                                                                            <span class="badge bg-soft-success font-size-12">Completed</span>
                                                                                        @else
                                                                                            <span class="badge bg-soft-secondary font-size-12">Progressing </span>
                                                                                        @endif
                                                                                    </a>
                                                                                </td>
                                                                                <td><i class="fas fa-user-clock"></i>{{ \App\Models\User::find($tasks[$i]->user_id)->name }}</td>
                                                                                <td>{{$tasks[$i]->date_start}} - {{$tasks[$i]->date_end}}</td>
                                                                                <td style="width: 160px;">
                                                                                    <span wire:click="completeTask({{$tasks[$i]->id}})" class="mr-1">
                                                                                        <button class="btn btn-success">
                                                                                            @if($tasks[$i]->status == 1)
                                                                                                <i class="bx bx-check-double"></i>
                                                                                            @else
                                                                                                <i class="bx bx-check"></i>
                                                                                            @endif
                                                                                        </button>
                                                                                    </span>
                                                                                    <span wire:click="editTask({{$tasks[$i]->id}})" class="mr-1"><button class="btn btn-warning"><i class="uil-pen"></i></button></span>
                                                                                    <span wire:click="deleteTask({{$tasks[$i]->id}})" class="mr-1"><button class="btn btn-danger"><i class="uil-trash"></i></button></span>
                                                                                </td>
                                                                            </tr>
                                                                        @endif
                                                                    @endfor
                                                                @endif
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                    </ul>
                            </div>
                        </div>
                    </div> <!-- end col -->

                </div>

                <div style="clear:both"></div>

            </div>
        </div>

    </div>
    
</div>
