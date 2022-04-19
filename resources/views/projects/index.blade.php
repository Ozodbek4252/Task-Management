<x-app-layout>
    <style>
        .deadline{
            float: right;
        }
    </style>
    <div class="container-fluid">

        <!-- start page title -->
        {{--<div class="row">--}}
            {{--<div class="col-12">--}}
                {{--<div class="page-title-box d-flex align-items-center justify-content-between">--}}
                    {{--<h4 class="mb-0">Calendar</h4>--}}

                    {{--<div class="page-title-right">--}}
                        {{--<ol class="breadcrumb m-0">--}}
                            {{--<li class="breadcrumb-item"><a href="javascript: void(0);">Apps</a></li>--}}
                            {{--<li class="breadcrumb-item active">Calendar</li>--}}
                        {{--</ol>--}}
                    {{--</div>--}}

                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
        <!-- end page title -->

        <div class="row">
            <div class="col-12">

                <div class="row">
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-grid">
                                    <button class="btn font-16 btn-primary" id="btn-new-event"><i class="mdi mdi-plus-circle-outline"></i> Create New Projects</button>
                                </div>

                                <div class="row justify-content-center mt-5">
                                    <img src="assets/images/coming-soon-img.png" alt="" class="img-fluid d-block">
                                </div>

                                <div id="external-events" class="mt-2">
                                    <br>
                                    <div class="external-event fc-event bg-danger" data-class="bg-danger">
                                        <i class="mdi mdi-checkbox-blank-circle font-size-11 me-2"></i>Projects 1<span class="deadline">today</span>
                                    </div>
                                    <div class="external-event fc-event bg-danger" data-class="bg-danger">
                                        <i class="mdi mdi-checkbox-blank-circle font-size-11 me-2"></i>Projects 2<span class="deadline">2 days</span>
                                    </div>
                                    <div class="external-event fc-event bg-danger" data-class="bg-danger">
                                        <i class="mdi mdi-checkbox-blank-circle font-size-11 me-2"></i>Projects 3<span class="deadline">5 days</span>
                                    </div>
                                    <div class="external-event fc-event bg-warning" data-class="bg-warning">
                                        <i class="mdi mdi-checkbox-blank-circle font-size-11 me-2"></i>Projects 4<span class="deadline">7 days</span>
                                    </div>
                                    <div class="external-event fc-event bg-warning" data-class="bg-warning">
                                        <i class="mdi mdi-checkbox-blank-circle font-size-11 me-2"></i>Projects 5<span class="deadline">14 days</span>
                                    </div>
                                    <div class="external-event fc-event bg-success" data-class="bg-success">
                                        <i class="mdi mdi-checkbox-blank-circle font-size-11 me-2"></i>Projects 6<span class="deadline">16 days</span>
                                    </div>
                                    <div class="external-event fc-event bg-success" data-class="bg-success">
                                        <i class="mdi mdi-checkbox-blank-circle font-size-11 me-2"></i>Projects 7<span class="deadline">18 days</span>
                                    </div>
                                    <div class="external-event fc-event bg-success" data-class="bg-success">
                                        <i class="mdi mdi-checkbox-blank-circle font-size-11 me-2"></i>Projects 8<span class="deadline">21 days</span>
                                    </div>

                                </div>

                                {{--<ol class="activity-feed mb-0 ps-2 mt-4 ms-1">--}}
                                    {{--<li class="feed-item">--}}
                                        {{--<p class="mb-0">Andrei Coman magna sed porta finibus, risus--}}
                                            {{--posted a new article: Forget UX Rowland</p>--}}
                                    {{--</li>--}}
                                    {{--<li class="feed-item">--}}
                                        {{--<p class="mb-0">Zack Wetass, sed porta finibus, risus Chris Wallace Commented Developer Moreno</p>--}}
                                    {{--</li>--}}
                                    {{--<li class="feed-item">--}}
                                        {{--<p class="mb-0">Zack Wetass, Chris combined Commented UX Murphy</p>--}}
                                    {{--</li>--}}
                                {{--</ol>--}}
                            </div>
                        </div>
                    </div> <!-- end col-->

                    <div class="col-lg-9">
                        <div class="card">
                            <div class="card-body">

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