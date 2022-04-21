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
                                        <h3>Add Project</h3>
                                        <div style="display: flex; " class="w-12/12">
                                            <div class="mb-3 mr-2">
                                                <label class="form-label" for="project-start" style="font-weight: bold">From</label>
                                                <input wire:model="projectStart" type="date" class="form-control" id="project-start">
                                            </div>
                                            <div class="mb-3 mr-2">
                                                <label class="form-label" for="project-end" style="font-weight: bold">To</label>
                                                <input wire:model="projectEnd" type="date" class="form-control" id="project-end">
                                            </div>
                                        </div>
                                        <div style="display: flex; align-items: end; ">
                                            <div class="mb-3 mr-2 col-9">
                                                <label class="form-label" for="project-name" style="font-weight: bold">Add Task</label>
                                                <input wire:model.debounce.500ms="projectName" type="text" class="form-control" id="project-name" placeholder="Project name ...">
                                            </div>
                                            <div class="mb-3 col-3">
                                                <button wire:click="addProject()" type="button" class="btn btn-success waves-light waves-effect">Add</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                {{-- Add Projects End --}}

                                {{-- <div class="row justify-content-center mt-5">
                                    <img src="assets/images/coming-soon-img.png" alt="" class="img-fluid d-block">
                                </div> --}}

                                <div id="external-events" class="mt-2">
                                    <?php 
                                        $colors = ['primary', 'secondary', 'success', 'danger', 'warning', 'info'];
                                    ?>
                                    @for($i = 0; $i<count($projects); $i++)
                                    <?php 
                                        if($i >= count($colors)){
                                            array_push($colors, current(array_slice($colors, $i-6, $i-5)));
                                        }
                                        
                                    ?>
                                    <br>
                                    <div wire:click="goToTasks({{$projects[$i]->id}})" style="cursor: pointer; ">
                                        <div class="project external-event  bg-{{$colors[$i]}} text-white" data-class="bg-danger" style="{{$activeProject == $projects[$i]->id ? 'background-color: rgb(187 247 208); box-shadow: 0 2px 8px 0 rgba(10, 10, 10, 10), 0 1px 2px 0 rgba(0, 0, 0, 0.06); ' : ''}};" >
                                            <i class="mdi mdi-checkbox-blank-circle font-size-11 me-2 text-white"></i>{{$projects[$i]->name}}<span class="deadline"><i class="bx bx-coffee"></i>{{$projects[$i]->date_end}}<input class="form-check-input fix" type="checkbox" id="autoSizingCheck2"></span>
                                        </div>
                                    </div>
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
                                        <div class="mb-3 mr-2">
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
                                        <div class="mb-3 mr-2">
                                            <label class="form-label" for="" style="font-weight: bold">Select User</label>
                                            <select wire:model="taskDoer" name="taskDoer" id="taskDoer" name="taskDoer" class="form-control select2">
                                                <option value="0">Select</option>
                                                @foreach($users as $user)
                                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
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
                                                            <?php 

                                                            ?>
                                                            <div style="display: flex; justify-content: space-between; margin-bottom: 5px; align-items: center;">
                                                                <div style="display: flex; align-items: center;"><h3>{{$activeProjectData->name}} | </h3><span class="ml-2">{{ (strtotime($activeProjectData->date_end)-strtotime($activeProjectData->date_start))/86400 }} days left</span></div>
                                                                <div style="width: 150px;">
                                                                    <span wire:click="completeProject({{$activeProjectData->id}})" class="mr-1"><button class="btn btn-success"><i class="bx bx-check"></i></button></span>
                                                                    <span wire:click="editProject({{$activeProjectData->id}})" class="mr-1"><button class="btn btn-warning"><i class="uil-pen"></i></button></span>
                                                                    <span wire:click="deleteProject({{$activeProjectData->id}})" class="mr-1"><button class="btn btn-danger"><i class="uil-trash"></i></button></span>
                                                                </div>
                                                            </div>
                                                            @else
                                                            <h3>All Tasks</h3>
                                                            @endif
                                                            <tbody>
                                                                @if($activeProject)
                                                                    @for($i = 0; $i <count($activeProjectData->tasks); $i++)
                                                                        <tr>
                                                                            <td style="width: 60px;">
                                                                                <button class="btn btn-outline btn-outline-primary @if($i == 0 || $i == 1) active @endif"><i class="bx bx-pin"></i></button>
                                                                            </td>
                                                                            <td>
                                                                                <a href="" class="fw-bold text-dark">{{ $activeProjectData->tasks[$i]->name }} <span class="badge bg-soft-secondary font-size-12">Waiting</span></a>
                                                                            </td>
                                                                            <td>{{$activeProjectData->tasks[$i]->date_start}} - {{$activeProjectData->tasks[$i]->date_end}}</td>
                                                                            <td>{{$tasks[$i]->date_start}} - {{$tasks[$i]->date_end}}</td>
                                                                            <td style="color: #0be07d">@if($activeProjectData->tasks[$i]->status == 1) Completed <i class="bx bx-check"></i>@endif</td>
                                                                            <td style="width: 160px;">
                                                                                <span wire:click="completeTask({{$activeProjectData->tasks[$i]->id}})" class="mr-1"><button class="btn btn-success"><i class="bx bx-check"></i></button></span>
                                                                                <span wire:click="editTask({{$activeProjectData->tasks[$i]->id}})" class="mr-1"><button class="btn btn-warning"><i class="uil-pen"></i></button></span>
                                                                                <span wire:click="deleteTask({{$activeProjectData->tasks[$i]->id}})" class="mr-1"><button class="btn btn-danger"><i class="uil-trash"></i></button></span>
                                                                            </td>
                                                                        </tr>
                                                                        
                                                                        
                                                                        <div class="modal fade bs-example-modal-center{{ $i }}delete" tabindex="-1" aria-labelledby="mySmallModalLabel" aria-modal="true" role="dialog">
                                                                            <div class="modal-dialog modal-dialog-centered">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <h3 class="modal-title" style="font-weight: bold; text-align: center"> Delete {{ $i+1 }} task ?</h3>
                                                                                    </div>
                                                                                    <div class="modal-body text-center">
                                                                                            <button class="btn btn-danger"><i class="uil-trash"></i>yes</button>
                                                                                            <button class="btn btn-primary" data-bs-dismiss="modal" aria-label="Close">cancel</button>
                                                                                    </div>
                                                                                </div><!-- /.modal-content -->
                                                                            </div><!-- /.modal-dialog -->
                                                                        </div>
                                                                    @endfor
                                                                @else
                                                                    @for($i = 0; $i <count($tasks); $i++)
                                                                        <tr>
                                                                            <td style="width: 60px;">
                                                                                <button class="btn btn-outline btn-outline-primary @if($i == 0 || $i == 1) active @endif"><i class="bx bx-pin"></i></button>
                                                                            </td>
                                                                            <td>
                                                                                <a href="" class="fw-bold text-dark">{{ $tasks[$i]->name }} <span class="badge bg-soft-secondary font-size-12">Waiting</span></a>
                                                                            </td>
                                                                            <td>{{$tasks[$i]->date_start}} - {{$tasks[$i]->date_end}}</td>
                                                                            <td style="color: #0be07d">@if($tasks[$i]->status == 1) Completed <i class="bx bx-check"></i>@endif</td>
                                                                            <td style="width: 160px;">
                                                                                <span wire:click="completeTask({{$tasks[$i]->id}})" class="mr-1"><button class="btn btn-success"><i class="bx bx-check"></i></button></span>
                                                                                <span wire:click="editTask({{$tasks[$i]->id}})" class="mr-1"><button class="btn btn-warning"><i class="uil-pen"></i></button></span>
                                                                                <span wire:click="deleteTask({{$tasks[$i]->id}})" class="mr-1"><button class="btn btn-danger"><i class="uil-trash"></i></button></span>
                                                                            </td>
                                                                        </tr>
                                                                        
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
