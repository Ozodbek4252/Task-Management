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