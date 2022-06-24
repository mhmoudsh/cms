@extends('Course_system.layouts.app')
@section('title')
Course Managment
@stop
    @section('css')
    <link rel="stylesheet" href="{{ asset('assets/bundles/dataTables.min.css') }}">
    @stop

        @section('content')

        <!--  <div class="page-toolbar px-xl-4 px-sm-2 px-0 py-3">
      <div class="container-fluid">


      </div>
    </div> -->
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">



                <section class="app-user-list">

                    <div class="dt-buttons btn-group flex-wrap ">
                        <a href="{{ route('course.create') }}" class="btn add-new btn-primary mt-50"
                            style="margin: 20px;">Add New course</a>
                    </div>
                    <!-- list section start -->
                    <div class="card">

                        <div class="container">

                            <div class="card-datatable table-responsive pt-0">
                                <table class="course-list-table table">
                                    <thead class="thead-light">
                                        <tr>
                                            <!-- <th></th> -->
                                            <th>id</th>
                                            <th>course_name</th>
                                            <th>course_price</th>
                                            <!-- <th>Phone</th>-->
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>

                    </div>
                    <!-- list section end -->
                </section>


            </div>
        </div>


        <div class="dropdown-menu dropdown-menu-right show" style="position: absolute; transform: translate3d(-96px, -125px, 0px); top: 0px; left: 0px;
           will-change: transform;" x-placement="top-end">
            <a href="app-user-view.html" class="dropdown-item">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-file-text font-small-4 mr-50">
                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                    <polyline points="14 2 14 8 20 8"></polyline>
                    <line x1="16" y1="13" x2="8" y2="13"></line>
                    <line x1="16" y1="17" x2="8" y2="17"></line>
                    <polyline points="10 9 9 9 8 9"></polyline>
                </svg>Details</a>
            <a href="app-user-edit.html" class="dropdown-item">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-archive font-small-4 mr-50">
                    <polyline points="21 8 21 21 3 21 3 8">
                    </polyline>
                    <rect x="1" y="3" width="22" height="5"></rect>
                    <line x1="10" y1="12" x2="14" y2="12"></line>
                </svg>Edit</a>
            <a href="javascript:;" class="dropdown-item delete-record"><svg xmlns="http://www.w3.org/2000/svg"
                    width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 font-small-4 mr-50">
                    <polyline points="3 6 5 6 21 6"></polyline>
                    <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                    <line x1="10" y1="11" x2="10" y2="17"></line>
                    <line x1="14" y1="11" x2="14" y2="17"></line>
                </svg>Delete</a>
        </div>
        @stop
            @section('js')
            <script src="{{ asset('assets/bundles/dataTables.bundle.js') }}"></script>
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <!-- BEGIN: Theme JS-->

            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

            <!-- END: Theme JS-->
            <script type="text/javascript">
                $(function () {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    // ################## Index #################################

                    var table = $('.course-list-table').DataTable({
                        processing: true,
                        serverSide: true,
                        ajax: "{{ route('course.index') }}",
                        /*  "language": {
                             "url": "{{ asset('datatableLang/'.app()->getLocale() . '.json') }}"
                         }, */
                        columns: [
                            /* {data: 'DT_RowIndex', name: 'DT_RowIndex'}, */
                            {
                                data: 'id',
                                name: 'id'
                            },
                            {
                                data: 'course_name',
                                name: 'course_name'
                            },
                            {
                                data: 'course_price',
                                name: 'course_price'
                            },
                            {
                                data: 'action',
                                name: 'action',
                                orderable: false,
                                searchable: false
                            },
                        ],
                        buttons: [{
                            text: 'Add New course',
                            className: 'add-new btn btn-primary mt-50',
                            attr: {
                                'data-toggle': 'modal',
                                'data-target': '#modals-slide-in'
                            },
                            init: function (api, node, config) {
                                $(node).removeClass('btn-secondary');
                            }
                        }],
                        responsive: {
                            details: {
                                display: $.fn.dataTable.Responsive.display.modal({
                                    header: function (row) {
                                        var data = row.data();
                                        return 'Details of ' + data['full_name'];
                                    }
                                }),
                                type: 'column',
                                renderer: $.fn.dataTable.Responsive.renderer.tableAll({
                                    tableClass: 'table',
                                    columnDefs: [{
                                            targets: 2,
                                            visible: false
                                        },
                                        {
                                            targets: 3,
                                            visible: false
                                        }
                                    ]
                                })
                            }
                        },

                    });

                    // ################## Delete ####################################

                    $('body').on('click', '.deletecourse', function () {

                        var course_id = $(this).data("id");
                        Swal.fire({
                            title: '{{ __('messages.are you sure?') }}',
                            text: "{{ __('messages.you will not be able to revert this!') }}",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: '{{ __('messages.yes, delete it!') }}'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                $.ajax({
                                    type: "DELETE",
                                    url: "{{ route('course.store') }}" +
                                        '/' + course_id,
                                    success: function (data) {
                                        table.draw();
                                    },
                                    error: function (data) {
                                        console.log('Error:', data);
                                    }
                                });
                                Swal.fire(
                                    '{{ __('messages.deleted!') }}',
                                    '{{ __('messages.deleted successfully') }}',
                                    '{{ __('messages.success') }}'
                                )
                            }
                        });
                    });


                });

            </script>

            <script>
                $(window).on('load', function () {
                    if (feather) {
                        feather.replace({
                            width: 14,
                            height: 14
                        });
                    }
                })

            </script>
            @stop
