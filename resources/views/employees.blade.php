@extends('layout.mainlayout')
@section('content')

@php
    use App\Department;
    use App\Designation;

    $departments = Department::all();
    $designations = Designation::all();
@endphp

<script>
    const capitalize = (s) => {
        if (typeof s !== 'string') return ''
        return s.charAt(0).toUpperCase() + s.slice(1)
    }

    function add_employee()
    {
        let data = {
            first_name:first_name.value,
            last_name:last_name.value,
            email:email.value,
            password:password.value,
            password_confirmation:password_confirmation.value,
            join_date:join_date.value,
            mobile_no:mobile_no.value,
            department_id:department_id.value,
            designation_id:designation_id.value
        }

        axios.post("{{route('employee.create')}}", data).then(res => {
            if(res.data.status == 1)
            {
                Swal.fire(
                    'Success',
                    res.data.message,
                    'success'
                )

                setTimeout(() => {
                    location.reload();
                }, 500);
            }
            else
            {
                Swal.fire(
                    'Failed',
                    res.data.message,
                    'error'
                )
            }
        });
    }

    get_all_employee()
    function get_all_employee()
    {
        axios.get("{{route('employee.get_all')}}").then(res => {
             $('#user_container').html('');
            res.data.message.forEach(e => {
                $('#user_container').append(`
                    <div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
                        <div class="profile-widget">
                            <div class="profile-img">
                                <a href="/profile?id=${e.user_id}&unique_id=${e.employee_id}" class="avatar"><img src="${e.profile_image}" width="auto" height="auto" alt=""></a>
                            </div>
                            <div class="dropdown profile-action">
                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_employee" onclick="get_employee(${e.user_id}, '${e.employee_id}')"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                    <a class="dropdown-item" href="#" onclick="delete_employee('${e.user_id}')"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                </div>
                            </div>
                            <h4 class="user-name m-t-10 mb-0 text-ellipsis"><a href="profile">${capitalize(e.first_name)} ${capitalize(e.last_name)}</a></h4>
                            <div class="small text-muted">${e.designation_name.toUpperCase()}</div>
                        </div>
                    </div>
                `)
            });
        })
    }

    function get_employee(id, u_id)
    {
        let data = {
            user_id:id,
            unique_id:u_id
        }

        axios.post("{{route('employee.get')}}", data).then(res =>{
            if(res.data.status == 1)
            {
                $('#category').val(res.data.message.category);
                $('#edit_first_name').val(res.data.message.first_name);
                $('#edit_last_name').val(res.data.message.last_name);
                $('#edit_email').val(res.data.message.email);
                $('#edit_employee_id').val(res.data.message.employee_id);
                $('#edit_join_date').val(res.data.message.join_date);
                $('#edit_mobile_no').val(res.data.message.mobile_no);
                $('#edit_department_id').val(res.data.message.department_id);
                $('#edit_designation_id').val(res.data.message.designation_id);
                $('#user_id').val(id);
            }
        });
    }

    function update_employee()
    {
        let data = {
            user_id:user_id.value,
            first_name: $('#edit_first_name').val(),
            last_name: $('#edit_last_name').val(),
            email:$('#edit_email').val(),
            employee_id: $('#edit_employee_id').val(),
            join_date:$('#edit_join_date').val(),
            mobile_no:$('#edit_mobile_no').val(),
            department_id:$('#edit_department_id').val(),
            designation_id:$('#edit_designation_id').val()
        }

        axios.post("{{route('employee.update')}}", data).then(res => {
            if(res.data.status == 1)
            {
                Swal.fire(
                    'Success',
                    res.data.message,
                    'success'
                )

                get_all_employee();

            }
        });
    }

    function delete_employee(id)
    {
        let data = {
            user_id:id
        }

        Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                axios.post("{{route('employee.delete')}}", data).then(res => {
                    if(res.data.status == 1)
                    {
                        Swal.fire(
                            'Success',
                            res.data.message,
                            'success'
                        )

                        get_all_employee();

                    }
                });
            }
        })


    }
</script>
<!-- Page Wrapper -->
<div class="page-wrapper">

            <!-- Page Content -->
            <div class="content container-fluid">
                <input type="hidden" id="user_id">
                <!-- Page Header -->
                <div class="page-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="page-title">Employee</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index">Dashboard</a></li>
                                <li class="breadcrumb-item active">Employee</li>
                            </ul>
                        </div>
                        <div class="col-auto float-right ml-auto">
                            <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_employee"><i class="fa fa-plus"></i> Add Employee</a>
                            <div class="view-icons">
                                {{-- <a href="employees" class="grid-view btn btn-link active"><i class="fa fa-th"></i></a> --}}
                                {{-- <a href="employees-list" class="list-view btn btn-link"><i class="fa fa-bars"></i></a> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->

                <!-- Search Filter -->
                <div class="row filter-row">
                    <div class="col-sm-6 col-md-3">
                        <div class="form-group form-focus">
                            <input type="text" class="form-control floating">
                            <label class="focus-label">Employee ID</label>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="form-group form-focus">
                            <input type="text" class="form-control floating">
                            <label class="focus-label">Employee Name</label>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="form-group form-focus select-focus">
                            <select class="select floating">
                                <option>Select Designation</option>
                                <option>Web Developer</option>
                                <option>Web Designer</option>
                                <option>Android Developer</option>
                                <option>Ios Developer</option>
                            </select>
                            <label class="focus-label">Designation</label>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <a href="#" class="btn btn-success btn-block"> Search </a>
                    </div>
                </div>
                <!-- Search Filter -->

                <div class="row staff-grid-row" id="user_container">

                </div>
            </div>
            <!-- /Page Content -->

            <!-- Add Employee Modal -->
            <div id="add_employee" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Add Employee</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="javascript:void(0)">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="col-form-label">First Name <span class="text-danger">*</span></label>
                                            <input class="form-control" type="text" id="first_name">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Last Name</label>
                                            <input class="form-control" type="text" id="last_name">
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Email <span class="text-danger">*</span></label>
                                            <input class="form-control" type="email" id="email">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Password</label>
                                            <input class="form-control" type="password" id="password">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Confirm Password</label>
                                            <input class="form-control" type="password" id="password_confirmation">
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Joining Date <span class="text-danger">*</span></label>
                                            <div class="cal-icon"><input class="form-control" type="date" id="join_date"></div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Phone </label>
                                            <input class="form-control" type="text" id="mobile_no">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Department <span class="text-danger">*</span></label>
                                            <select class="select" id="department_id">
                                                @foreach($departments as $department)
                                                    <option value="{{$department->id}}">{{$department->department_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Designation <span class="text-danger">*</span></label>
                                            <select class="select" id="designation_id">
                                                @foreach($designations as $designation)
                                                    <option value="{{$designation->id}}">{{$designation->designation_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="submit-section">
                                    <button class="btn btn-primary submit-btn" onclick="add_employee()">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Add Employee Modal -->

            <!-- Edit Employee Modal -->
            <div id="edit_employee" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Edit Employee</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="javascript:void(0)">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="col-form-label">First Name <span class="text-danger">*</span></label>
                                            <input class="form-control" id="edit_first_name" type="text">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Last Name</label>
                                            <input class="form-control" id="edit_last_name" type="text">
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Email <span class="text-danger">*</span></label>
                                            <input class="form-control" id="edit_email" type="email" readonly>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Employee ID <span class="text-danger">*</span></label>
                                            <input type="text" id="edit_employee_id" readonly class="form-control floating">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Joining Date <span class="text-danger">*</span></label>
                                            <div class="cal-icon"><input class="form-control" id="edit_join_date" type="text"></div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Phone </label>
                                            <input class="form-control" id="edit_mobile_no" type="text">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Department <span class="text-danger">*</span></label>
                                            <select class="form-control" id="edit_department_id">
                                                @foreach ($departments as $department)
                                                    <option value="{{$department->id}}">{{$department->department_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Designation <span class="text-danger">*</span></label>
                                            <select class="form-control" id="edit_designation_id">
                                                @foreach($designations as $designation)
                                                    <option value="{{$designation->id}}">{{$designation->designation_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Category <span class="text-danger">*</span></label>
                                            <input class="form-control" id="category" disabled>
                                        </div>
                                    </div>
                                </div>

                                <div class="submit-section">
                                    <button class="btn btn-primary submit-btn" onclick="update_employee()">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Edit Employee Modal -->

            <!-- Delete Employee Modal -->
            <div class="modal custom-modal fade" id="delete_employee" role="dialog">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="form-header">
                                <h3>Delete Employee</h3>
                                <p>Are you sure want to delete?</p>
                            </div>
                            <div class="modal-btn delete-action">
                                <div class="row">
                                    <div class="col-6">
                                        <a href="javascript:void(0);" class="btn btn-primary continue-btn">Delete</a>
                                    </div>
                                    <div class="col-6">
                                        <a href="javascript:void(0);" data-dismiss="modal" class="btn btn-primary cancel-btn">Cancel</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Delete Employee Modal -->

        </div>
        <!-- /Page Wrapper -->
@endsection
