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
    </style>
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">

                <div class="row">
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-grid">
                                    <button class="btn font-16 btn-primary" data-bs-toggle="modal" data-bs-target=".bs-example-modal-center"><i class="mdi mdi-plus-circle-outline"></i> Create New Projects</button>
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
                                                <div class="mb-3">
                                                    <label class="form-label" for="formrow-firstname-input" style="font-weight: bold">Add project</label>
                                                    <input type="text" class="form-control" id="formrow-firstname-input" name="name">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label" for="formrow-firstname-input" style="font-weight: bold">Select deadline</label>
                                                    <input type="date" class="form-control" id="formrow-firstname-input" name="name">
                                                </div>
                                            </div>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div>

                                <div class="row justify-content-center mt-5">
                                    <img src="assets/images/coming-soon-img.png" alt="" class="img-fluid d-block">
                                </div>

                                <div id="external-events" class="mt-2">
                                    <br>
                                    <a href="/">
                                        <div class="external-event fc-event bg-danger" data-class="bg-danger">
                                            <i class="mdi mdi-checkbox-blank-circle font-size-11 me-2"></i>Projects 1<span class="deadline"><i class="uil-bolt-alt"></i>today<input class="form-check-input fix" type="checkbox" id="autoSizingCheck2"></span>
                                        </div>
                                    </a>
                                    <a href="/">
                                        <div class="external-event fc-event bg-danger" data-class="bg-danger">
                                            <i class="mdi mdi-checkbox-blank-circle font-size-11 me-2"></i>Projects 2<span class="deadline"><i class="uil-bolt-alt"></i>2 days<input class="form-check-input fix" type="checkbox" id="autoSizingCheck2"></span>
                                        </div>
                                    </a>
                                    <a href="/">
                                        <div class="external-event fc-event bg-danger" data-class="bg-danger">
                                            <i class="mdi mdi-checkbox-blank-circle font-size-11 me-2"></i>Projects 3<span class="deadline"><i class="uil-bolt-alt"></i>5 days<input class="form-check-input fix" type="checkbox" id="autoSizingCheck2"></span>
                                        </div>
                                    </a>
                                    <a href="/">
                                        <div class="external-event fc-event bg-warning" data-class="bg-warning">
                                            <i class="mdi mdi-checkbox-blank-circle font-size-11 me-2"></i>Projects 4<span class="deadline"<i class="bx bx-error"></i><i class="bx bx-error"></i></i>7 days<input class="form-check-input fix" type="checkbox" id="autoSizingCheck2"></span>
                                        </div>
                                    </a>
                                    <a href="/">
                                        <div class="external-event fc-event bg-warning" data-class="bg-warning">
                                            <i class="mdi mdi-checkbox-blank-circle font-size-11 me-2"></i>Projects 5<span class="deadline"><i class="bx bx-error"></i>14 days<input class="form-check-input fix" type="checkbox" id="autoSizingCheck2"></span>
                                        </div>
                                    </a>
                                    <a href="/">
                                        <div class="external-event fc-event bg-success" data-class="bg-success">
                                            <i class="mdi mdi-checkbox-blank-circle font-size-11 me-2"></i>Projects 6<span class="deadline"><i class="bx bx-coffee"></i>16 days<input class="form-check-input fix" type="checkbox" id="autoSizingCheck2"></span>
                                        </div>
                                    </a>
                                    <a href="/">
                                        <div class="external-event fc-event bg-success" data-class="bg-success">
                                            <i class="mdi mdi-checkbox-blank-circle font-size-11 me-2"></i>Projects 7<span class="deadline"><i class="bx bx-coffee"></i>18 days<input class="form-check-input fix" type="checkbox" id="autoSizingCheck2"></span>
                                        </div>
                                    </a>
                                    <a href="/">
                                        <div class="external-event fc-event bg-success" data-class="bg-success">
                                            <i class="mdi mdi-checkbox-blank-circle font-size-11 me-2"></i>Projects 8<span class="deadline"><i class="bx bx-coffee"></i>21 days<input class="form-check-input fix" type="checkbox" id="autoSizingCheck2"></span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end col-->

                    <div class="col-lg-9">
                        <div class="card">
                            <div class="card-body">
                                <div class="btn-toolbar p-3" role="toolbar">
                                    <div class="btn-group me-2 mb-2 mb-sm-0">
                                        <button type="button" class="btn btn-success waves-light waves-effect">Add task</button>
                                        <button type="button" class="btn btn-warning waves-light waves-effect">Completed tasks</button>
                                        <button type="button" class="btn btn-danger waves-light waves-effect">Deleted tasks</button>
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
                                                                <button class="btn btn-warning"><i class="uil-pen"></i></button>
                                                                <button class="btn btn-danger"><i class="uil-trash"></i></button>
                                                            </td>
                                                        </tr>
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


            </div>
        </div>

    </div>
</x-app-layout>