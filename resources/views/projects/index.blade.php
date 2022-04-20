<x-app-layout>
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
                        <div class="card">
                            <div class="card-body">
                                {{-- Add Projects --}}
                                <div class="d-grid">
                                    <button class="btn font-16 btn-primary" data-bs-toggle="modal" data-bs-target=".bs-example-modal-center">
                                        <i class="mdi mdi-plus-circle-outline"></i>
                                        Create New Projects
                                    </button>
                                </div>
                                <div class="modal fade bs-example-modal-center" tabindex="-1" aria-labelledby="mySmallModalLabel" aria-modal="true" role="dialog">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title"> Create New Projects</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('projects.store') }}" method="post">
                                                    @csrf
                                                    <div class="mb-3">
                                                        <label class="form-label" for="formrow-firstname-input" style="font-weight: bold">Add project</label>
                                                        <input type="text" class="form-control" id="formrow-firstname-input" name="project_name">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label" for="formrow-firstname-input" style="font-weight: bold">Select deadline</label>
                                                        <input type="date" class="form-control" id="formrow-firstname-input" name="project_deadline">
                                                    </div>
                                                    <button style="submit" class="btn btn-success">Add</button>
                                                </form>
                                            </div>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div>
                                {{-- Add Projects End --}}

                                <div class="row justify-content-center mt-5">
                                    <img src="assets/images/coming-soon-img.png" alt="" class="img-fluid d-block">
                                </div>

                                <div id="external-events" class="mt-2">
                                    <?php 
                                        $colors = ['primary', 'secondary', 'success', 'danger', 'warning', 'info', 'dark'];
                                    ?>
                                    @for($i = 0; $i<count($projects); $i++)
                                    <?php 
                                        if($i >= count($colors)){
                                            array_push($colors, current(array_slice($colors, $i-7, $i-6)));
                                        }
                                        
                                    ?>
                                    <br>
                                    <a href="{{ route('projects.showw') }}">
                                        <div class="project external-event  bg-{{$colors[$i]}}" data-class="bg-danger">
                                            <i class="mdi mdi-checkbox-blank-circle font-size-11 me-2 text-white"></i>{{$projects[$i]->name}}<span class="deadline"><i class="bx bx-coffee"></i>{{$projects[$i]->date_end}}<input class="form-check-input fix" type="checkbox" id="autoSizingCheck2"></span>
                                        </div>
                                    </a>
                                    @endfor
                                </div>
                            </div>
                        </div>
                    </div> <!-- end col-->

                    <div class="col-lg-9">
                        <div class="card">
                            <div class="card-body">
                                    <div class="btn-toolbar p-3" role="toolbar">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-success waves-light waves-effect" data-bs-toggle="modal" data-bs-target=".bs-example-modal-centertask"><i class="mdi mdi-plus-circle-outline"></i>Add task</button>
                                            {{--<button type="button" class="btn btn-warning waves-light waves-effect">Completed tasks</button>--}}
                                            <button type="button" class="btn btn-warning waves-light waves-effect"><i class="uil-check-circle"></i>Completed tasks</button>
                                        </div>
                                        <div class="modal fade bs-example-modal-centertask" tabindex="-1" aria-labelledby="mySmallModalLabel" aria-modal="true" role="dialog">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title"> Add task</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="formrow-firstname-input" style="font-weight: bold">Task</label>
                                                            <input type="text" class="form-control" id="formrow-firstname-input" name="name">
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label class="form-label" for="formrow-firstname-input" style="font-weight: bold">From</label>
                                                                <input type="date" class="form-control" id="formrow-firstname-input" name="name">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label class="form-label" for="formrow-firstname-input" style="font-weight: bold">to</label>
                                                                <input type="date" class="form-control" id="formrow-firstname-input" name="name">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div>
                                    </div>
                                <h4 style="text-align: center">Project 1</h4>
                                    <ul class="message-list">
                                            <div class="tab-pane active" id="tasks" role="tabpanel">
                                                <div>
                                                    <div class="table-responsive">
                                                        <table class="table table-nowrap table-centered">
                                                            <tbody>
                                                            @for($i = 0; $i <=7; $i++)
                                                                <tr>
                                                                    <td style="width: 60px;">
                                                                        <button class="btn btn-outline btn-outline-primary @if($i == 0 || $i == 1) active @endif"><i class="bx bx-pin"></i></button>
                                                                    </td>
                                                                    <td>
                                                                        <a href="contacts-profile.html#" class="fw-bold text-dark">Task {{ $i+1 }} <span class="badge bg-soft-secondary font-size-12">Waiting</span></a>
                                                                    </td>
                                                                    <td>26 May, 2020 - 27 May, 2020</td>
                                                                    <td style="width: 160px;">
                                                                        <button class="btn btn-success"><i class="bx bx-check"></i></button>
                                                                        <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target=".bs-example-modal-center{{ $i }}create"><i class="uil-pen"></i></button>
                                                                        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target=".bs-example-modal-center{{ $i }}delete"><i class="uil-trash"></i></button>
                                                                    </td>
                                                                </tr>
                                                                <div class="modal fade bs-example-modal-center{{ $i }}create" tabindex="-1" aria-labelledby="mySmallModalLabel" aria-modal="true" role="dialog">
                                                                    <div class="modal-dialog modal-dialog-centered">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title" style="font-weight: bold"> Update {{ $i+1 }} task</h5>
                                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <div class="mb-3">
                                                                                    <label class="form-label" for="formrow-firstname-input" style="font-weight: bold">Task</label>
                                                                                    <input type="text" class="form-control" id="formrow-firstname-input" name="name">
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-md-6">
                                                                                        <label class="form-label" for="formrow-firstname-input" style="font-weight: bold">From</label>
                                                                                        <input type="date" class="form-control" id="formrow-firstname-input" name="name">
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <label class="form-label" for="formrow-firstname-input" style="font-weight: bold">to</label>
                                                                                        <input type="date" class="form-control" id="formrow-firstname-input" name="name">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div><!-- /.modal-content -->
                                                                    </div><!-- /.modal-dialog -->
                                                                </div>
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


                <!-- Add New Event MODAL -->

                <!-- end modal-->

            </div>
        </div>

    </div>
</x-app-layout>