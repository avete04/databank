@extends('layout.mainlayout')
@section('content')

@php
    use App\Department;
    use App\Designation;

    $designations = Designation::all();
    $departments = Department::all();
@endphp

<script>
    let url = new URL(window.location);
    let emp_id = url.searchParams.get('id');

    let data = {
        user_id:emp_id
    }

    axios.post("{{route('employee.get')}}", data).then(res => {
        if(res.data.status == 1)
        {
            $('#profile_name').text(`${res.data.message.first_name} ${res.data.message.last_name}`)
            $('#profile_department_name').text(`${res.data.message.department_name}`)
            $('#profile_department_name').text(`${res.data.message.department_name}`)
            $('#profile_designation_name').text(`${res.data.message.designation_name}`)
            $('#profile_employee_id').text(`Employee ID: ${res.data.message.employee_id}`)
            $('#profile_join_date').text(`Date of Join: ${res.data.message.join_date}`)
            $('#profile_mobile_no').text(`${res.data.message.mobile_no}`)
            $('#profile_email').text(`${res.data.message.email}`)
            $('#profile_birth_day').text(`${res.data.message.birth_day}`)
            $('#profile_address').text(`${res.data.message.address}`)
            $('#profile_gender').text(`${res.data.message.gender}`)


            $('#edit_first_name').val(res.data.message.first_name)
            $('#edit_last_name').val(res.data.message.last_name)
            $('#edit_birth_day').val(res.data.message.birth_day)
            $('#edit_gender').val(res.data.message.gender)
            $('#edit_address').val(res.data.message.address)
            $('#edit_mobile_no').val(res.data.message.mobile_no)
            $('#edit_department_id').val(res.data.message.department_id)
            $('#edit_designation_id').val(res.data.message.designation_id)
        }
    });

    function update_employee()
    {
        let data = {
            user_id:emp_id,
            first_name: $('#edit_first_name').val(),
            last_name: $('#edit_last_name').val(),
            address:$('#edit_address').val(),
            birth_day:$('#edit_birth_day').val(),
            gender:$('#edit_gender').val(),
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

                setTimeout(() => {
                    location.reload();
                }, 500);
            }
        });
    }

    function add_personal_info()
    {
        let data = {
            user_id:emp_id,
            religion:religion.value,
            marital_status:marital_status.value,
            employment_of_spouse:employment_of_spouse.value,
            no_of_children:no_of_children.value
        }

        axios.post("{{route('personal_info.create')}}", data).then(res => {
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
        });
    }

    get_personal_info()
    function get_personal_info()
    {
        let data = {
            user_id:emp_id
        }

        axios.post("{{route('personal_info.get')}}", data).then(res => {
            if(res.data.status == 1)
            {
                $('#profile_religion').text(res.data.message.religion)
                $('#profile_marital_status').text(res.data.message.marital_status)
                $('#profile_employment_of_spouse').text(res.data.message.employment_of_spouse)
                $('#profile_no_of_children').text(res.data.message.no_of_children)

                $('#religion').val(res.data.message.religion)
                $('#marital_status').val(res.data.message.marital_status)
                $('#employment_of_spouse').val(res.data.message.employment_of_spouse)
                $('#no_of_children').val(res.data.message.no_of_children)
            }
        });
    }

    function add_emergency()
    {
        let data = {
            user_id:emp_id,
            name:emergency_name.value,
            relationship:relationship.value,
            contact_no:contact_no.value
        }

        axios.post(`{{route('emergency_contact.add')}}`, data).then(res => {
            if(res.data.status == 1)
            {
                Swal.fire(
                    'Success',
                    res.data.message,
                    'success'
                )

                setTimeout(() => {
                    location.reload();
                }, 500)
            }
        });
    }

    get_emergency()
    function get_emergency()
    {

        axios.get(`/get_emergency_contact/${emp_id}`).then(res => {
            $('#profile_emergency_name').text(res.data.name);
            $('#profile_relationship').text(res.data.relationship);
            $('#profile_contact_no').text(res.data.contact_no);

            $('#emergency_name').val(res.data.name);
            $('#relationship').val(res.data.relationship);
            $('#contact_no').val(res.data.contact_no);
        });
    }

    function add_family_info()
    {
        let data = {
            user_id:emp_id,
            name:add_family_name.value,
            relationship:add_family_relationship.value,
            birth_day:add_family_birthday.value,
            contact_no:add_family_contact_no.value
        }

        axios.post(`{{route('family_info.add')}}`,data).then(res => {
            if(res.data.status == 1)
            {
                Swal.fire(
                    'Success',
                    res.data.message,
                    'success'
                )

                setTimeout(() => {
                    location.reload();
                }, 500)
            }
        });
    }

    get_family_info()
    let FamilyInfo = [];
    function get_family_info()
    {
        axios.get(`{{route('family_info.get')}}`).then(res => {
            if(res.data.status == 1)
            {
                FamilyInfo  = res.data.message;
                FamilyInfo.forEach(e => {
                    if(e.user_id == emp_id)
                    {
                        $('#family_info_table').append(
                            `
                            <tr>
                                <td>${e.name}</td>
                                <td>${e.relationship}</td>
                                <td>${e.birth_day}</td>
                                <td>${e.contact_no}</td>
                                <td class="text-right">
                                    <div class="dropdown dropdown-action">
                                        <a style="cursor:pointer" aria-expanded="false" data-toggle="dropdown" class="action-icon dropdown-toggle"><i class="material-icons">more_vert</i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <button class="dropdown-item" onclick="edit_family_info(${e.id})" data-toggle="modal" data-target="#edit_family_info_modal"><i class="fa fa-pencil m-r-5"></i> Edit</button>
                                            <button class="dropdown-item"><i class="fa fa-trash-o m-r-5"></i> Delete</button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            `
                        )
                    }
                });
            }
        });
    }

    function edit_family_info(id)
    {
        FamilyInfo.forEach(e => {
            if(e.id == id)
            {
                $('#family_info_id').val(id);
                $('#edit_family_name').val(e.name);
                $('#edit_family_relationship').val(e.relationship);
                $('#edit_family_birthday').val(e.birth_day);
                $('#edit_family_contact_no').val(e.contact_no);
            }
        });
    }

    function update_family_info()
    {
        let data = {
            family_id:$('#family_info_id').val(),
            name:$('#edit_family_name').val(),
            relationship:$('#edit_family_relationship').val(),
            birth_day:$('#edit_family_birthday').val(),
            contact_no:$('#edit_family_contact_no').val()
        }

        axios.post(`{{route('family_info.update')}}`, data).then(res => {
            if(res.data.status == 1)
            {
                Swal.fire(
                    'Success',
                    res.data.message,
                    'success'
                )

                setTimeout(() => {
                    location.reload();
                }, 500)
            }
        });
    }
</script>

<!-- Page Wrapper -->
<div class="page-wrapper">


            <!-- Page Content -->
            <div class="content container-fluid">

                <!-- Page Header -->
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="page-title">Profile</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index">Dashboard</a></li>
                                <li class="breadcrumb-item active">Profile</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->

                <div class="card mb-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="profile-view">
                                    <div class="profile-img-wrap">
                                        <div class="profile-img">
                                            <a href="#"><img alt="" src="img/profiles/avatar-02.jpg"></a>
                                        </div>
                                    </div>
                                    <div class="profile-basic">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <div class="profile-info-left">
                                                    <h3 class="user-name m-t-0 mb-0" id="profile_name"></h3>
                                                    <h6 class="text-muted" id="profile_department_name"></h6>
                                                    <small class="text-muted" id="profile_designation_name"></small>
                                                    <div class="staff-id" id="profile_employee_id"></div>
                                                    <div class="small doj text-muted" id="profile_join_date"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-7">
                                                <ul class="personal-info">
                                                    <li>
                                                        <div class="title">Phone:</div>
                                                        <div class="text"><a href="#" id="profile_mobile_no"></a></div>
                                                    </li>
                                                    <li>
                                                        <div class="title">Email:</div>
                                                        <div class="text"><a href="#" id="profile_email"></a></div>
                                                    </li>
                                                    <li>
                                                        <div class="title">Birthday:</div>
                                                        <div class="text" id="profile_birth_day"></div>
                                                    </li>
                                                    <li>
                                                        <div class="title">Address:</div>
                                                        <div class="text" id="profile_address"></div>
                                                    </li>
                                                    <li>
                                                        <div class="title">Gender:</div>
                                                        <div class="text" id="profile_gender"></div>
                                                    </li>

                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pro-edit"><a data-target="#profile_info" data-toggle="modal" class="edit-icon" href="#"><i class="fa fa-pencil"></i></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card tab-box">
                    <div class="row user-tabs">
                        <div class="col-lg-12 col-md-12 col-sm-12 line-tabs">
                            <ul class="nav nav-tabs nav-tabs-bottom">
                                <li class="nav-item"><a href="#emp_profile" data-toggle="tab" class="nav-link active">Profile</a></li>
                                <li class="nav-item"><a href="#emp_projects" data-toggle="tab" class="nav-link">Attachments</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="tab-content">

                    <!-- Profile Info Tab -->
                    <div id="emp_profile" class="pro-overview tab-pane fade show active">
                        <div class="row">
                            <div class="col-md-6 d-flex">
                                <div class="card profile-box flex-fill">
                                    <div class="card-body">
                                        <h3 class="card-title">Personal Informations <a href="#" class="edit-icon" data-toggle="modal" data-target="#personal_info_modal"><i class="fa fa-pencil"></i></a></h3>
                                        <ul class="personal-info">
                                            <li>
                                                <div class="title">Religion</div>
                                                <div class="text" id="profile_religion"></div>
                                            </li>
                                            <li>
                                                <div class="title">Marital status</div>
                                                <div class="text" id="profile_marital_status"></div>
                                            </li>
                                            <li>
                                                <div class="title">Employment of spouse</div>
                                                <div class="text" id="profile_employment_of_spouse"></div>
                                            </li>
                                            <li>
                                                <div class="title">No. of children</div>
                                                <div class="text" id="profile_no_of_children"></div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 d-flex">
                                <div class="card profile-box flex-fill">
                                    <div class="card-body">
                                        <h3 class="card-title">Emergency Contact <a href="#" class="edit-icon" data-toggle="modal" data-target="#emergency_contact_modal"><i class="fa fa-pencil"></i></a></h3>
                                        <ul class="personal-info">
                                            <li>
                                                <div class="title">Name</div>
                                                <div class="text" id="profile_emergency_name"></div>
                                            </li>
                                            <li>
                                                <div class="title">Relationship</div>
                                                <div class="text" id="profile_relationship"></div>
                                            </li>
                                            <li>
                                                <div class="title">Phone </div>
                                                <div class="text" id="profile_contact_no"></div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 d-flex">
                                <div class="card profile-box flex-fill">
                                    <div class="card-body">
                                        <h3 class="card-title">Family Informations <a href="#" class="edit-icon" data-toggle="modal" data-target="#family_info_modal"><i class="fa fa-pencil"></i></a></h3>
                                        <div class="table-responsive">
                                            <table class="table table-nowrap">
                                                <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Relationship</th>
                                                        <th>Date of Birth</th>
                                                        <th>Phone</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody id="family_info_table">
                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 d-flex">
                                <div class="card profile-box flex-fill">
                                    <div class="card-body">
                                        <h3 class="card-title">Education Informations <a href="#" class="edit-icon" data-toggle="modal" data-target="#education_info"><i class="fa fa-pencil"></i></a></h3>
                                        <div class="experience-box">
                                            <ul class="experience-list">
                                                <li>
                                                    <div class="experience-user">
                                                        <div class="before-circle"></div>
                                                    </div>
                                                    <div class="experience-content">
                                                        <div class="timeline-content">
                                                            <a href="#/" class="name">International College of Arts and Science (UG)</a>
                                                            <div>Bsc Computer Science</div>
                                                            <span class="time">2000 - 2003</span>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="experience-user">
                                                        <div class="before-circle"></div>
                                                    </div>
                                                    <div class="experience-content">
                                                        <div class="timeline-content">
                                                            <a href="#/" class="name">International College of Arts and Science (PG)</a>
                                                            <div>Msc Computer Science</div>
                                                            <span class="time">2000 - 2003</span>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 d-flex">
                                <div class="card profile-box flex-fill">
                                    <div class="card-body">
                                        <h3 class="card-title">Experience <a href="#" class="edit-icon" data-toggle="modal" data-target="#experience_info"><i class="fa fa-pencil"></i></a></h3>
                                        <div class="experience-box">
                                            <ul class="experience-list">
                                                <li>
                                                    <div class="experience-user">
                                                        <div class="before-circle"></div>
                                                    </div>
                                                    <div class="experience-content">
                                                        <div class="timeline-content">
                                                            <a href="#/" class="name">Web Designer at Zen Corporation</a>
                                                            <span class="time">Jan 2013 - Present (5 years 2 months)</span>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="experience-user">
                                                        <div class="before-circle"></div>
                                                    </div>
                                                    <div class="experience-content">
                                                        <div class="timeline-content">
                                                            <a href="#/" class="name">Web Designer at Ron-tech</a>
                                                            <span class="time">Jan 2013 - Present (5 years 2 months)</span>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="experience-user">
                                                        <div class="before-circle"></div>
                                                    </div>
                                                    <div class="experience-content">
                                                        <div class="timeline-content">
                                                            <a href="#/" class="name">Web Designer at Dalt Technology</a>
                                                            <span class="time">Jan 2013 - Present (5 years 2 months)</span>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Profile Info Tab -->

                    <!-- Projects Tab -->
                    <div class="tab-pane fade" id="emp_projects">
                        <div class="row">
                            <div class="col-lg-4 col-sm-6 col-md-4 col-xl-3">
                                <div class="card">
                                    <div class="card-body">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Projects Tab -->


                </div>
            </div>
            <!-- /Page Content -->

            <!-- Profile Modal -->
            <div id="profile_info" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Profile Information</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="javascript:void(0)">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="profile-img-wrap edit-img">
                                            <img class="inline-block" src="img/profiles/avatar-02.jpg" alt="user">
                                            <div class="fileupload btn">
                                                <span class="btn-text">edit</span>
                                                <input class="upload" type="file">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>First Name</label>
                                                    <input type="text" class="form-control" id="edit_first_name">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Last Name</label>
                                                    <input type="text" class="form-control" id="edit_last_name">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Birth Date</label>
                                                    <div class="cal-icon">
                                                        <input class="form-control" type="date" id="edit_birth_day">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Gender</label>
                                                    <select class="form-control" id="edit_gender">
                                                        <option value="">Select Gender</option>
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Address</label>
                                            <input type="text" class="form-control" id="edit_address">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Phone Number</label>
                                            <input type="text" class="form-control" id="edit_mobile_no">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Department <span class="text-danger">*</span></label>
                                            <select class="form-control" id="edit_department_id">
                                                @foreach($departments as $department)
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

                                </div>
                                <div class="submit-section">
                                    <button class="btn btn-primary submit-btn" onclick="update_employee()">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Profile Modal -->

            <!-- Personal Info Modal -->
            <div id="personal_info_modal" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Personal Information</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="javascript:void(0)">
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Religion</label>
                                            <div class="cal-icon">
                                                <input class="form-control" type="text" id="religion">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Marital status <span class="text-danger">*</span></label>
                                            <select class="form-control" id="marital_status">
                                                <option>-</option>
                                                <option value="Single">Single</option>
                                                <option value="Married">Married</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Employment of spouse</label>
                                            <input class="form-control" type="text" id="employment_of_spouse">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>No. of children </label>
                                            <input class="form-control" type="text" id="no_of_children">
                                        </div>
                                    </div>
                                </div>
                                <div class="submit-section">
                                    <button class="btn btn-primary submit-btn" onclick="add_personal_info()">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Personal Info Modal -->

            <!-- Family Info Modal -->
            <div id="family_info_modal" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title"> Family Informations</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="javascript:void(0)">
                                <div class="form-scroll">
                                    <div class="card">
                                        <div class="card-body">
                                            <h3 class="card-title">Family Member</h3>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                    <input type="hidden" id="family_info_id">
                                                        <label>Name <span class="text-danger">*</span></label>
                                                        <input class="form-control" type="text" id="add_family_name">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Relationship <span class="text-danger">*</span></label>
                                                        <input class="form-control" type="text" id="add_family_relationship">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Date of birth <span class="text-danger">*</span></label>
                                                        <input class="form-control" type="date" id="add_family_birthday">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Phone <span class="text-danger">*</span></label>
                                                        <input class="form-control" type="text" id="add_family_contact_no">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="submit-section">
                                    <button class="btn btn-primary submit-btn" onclick="add_family_info()">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Family Info Modal -->

            <!-- Edit Family Info Modal -->
            <div id="edit_family_info_modal" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Edit Family Informations</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="javascript:void(0)">
                                <div class="form-scroll">
                                    <div class="card">
                                        <div class="card-body">
                                            <h3 class="card-title">Family Member</h3>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Name <span class="text-danger">*</span></label>
                                                        <input class="form-control" type="text" id="edit_family_name">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Relationship <span class="text-danger">*</span></label>
                                                        <input class="form-control" type="text" id="edit_family_relationship">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Date of birth <span class="text-danger">*</span></label>
                                                        <input class="form-control" type="date" id="edit_family_birthday">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Phone <span class="text-danger">*</span></label>
                                                        <input class="form-control" type="text" id="edit_family_contact_no">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="submit-section">
                                    <button class="btn btn-primary submit-btn" onclick="update_family_info()">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Edit Family Info Modal -->

            <!-- Emergency Contact Modal -->
            <div id="emergency_contact_modal" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Personal Information</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="javascript:void(0)">
                                <div class="card">
                                    <div class="card-body">
                                        <h3 class="card-title">Primary Contact</h3>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Name <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="emergency_name">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Relationship <span class="text-danger">*</span></label>
                                                    <input class="form-control" type="text" id="relationship">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Phone <span class="text-danger">*</span></label>
                                                    <input class="form-control" type="text" id="contact_no">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="submit-section">
                                    <button class="btn btn-primary submit-btn" onclick="add_emergency()">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Emergency Contact Modal -->

            <!-- Education Modal -->
            <div id="education_info" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title"> Education Informations</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="form-scroll">
                                    <div class="card">
                                        <div class="card-body">
                                            <h3 class="card-title">Education Informations <a href="javascript:void(0);" class="delete-icon"><i class="fa fa-trash-o"></i></a></h3>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group form-focus focused">
                                                        <input type="text" value="Oxford University" class="form-control floating">
                                                        <label class="focus-label">Institution</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-focus focused">
                                                        <input type="text" value="Computer Science" class="form-control floating">
                                                        <label class="focus-label">Subject</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-focus focused">
                                                        <div class="cal-icon">
                                                            <input type="text" value="01/06/2002" class="form-control floating datetimepicker">
                                                        </div>
                                                        <label class="focus-label">Starting Date</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-focus focused">
                                                        <div class="cal-icon">
                                                            <input type="text" value="31/05/2006" class="form-control floating datetimepicker">
                                                        </div>
                                                        <label class="focus-label">Complete Date</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-focus focused">
                                                        <input type="text" value="BE Computer Science" class="form-control floating">
                                                        <label class="focus-label">Degree</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-focus focused">
                                                        <input type="text" value="Grade A" class="form-control floating">
                                                        <label class="focus-label">Grade</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-body">
                                            <h3 class="card-title">Education Informations <a href="javascript:void(0);" class="delete-icon"><i class="fa fa-trash-o"></i></a></h3>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group form-focus focused">
                                                        <input type="text" value="Oxford University" class="form-control floating">
                                                        <label class="focus-label">Institution</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-focus focused">
                                                        <input type="text" value="Computer Science" class="form-control floating">
                                                        <label class="focus-label">Subject</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-focus focused">
                                                        <div class="cal-icon">
                                                            <input type="text" value="01/06/2002" class="form-control floating datetimepicker">
                                                        </div>
                                                        <label class="focus-label">Starting Date</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-focus focused">
                                                        <div class="cal-icon">
                                                            <input type="text" value="31/05/2006" class="form-control floating datetimepicker">
                                                        </div>
                                                        <label class="focus-label">Complete Date</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-focus focused">
                                                        <input type="text" value="BE Computer Science" class="form-control floating">
                                                        <label class="focus-label">Degree</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-focus focused">
                                                        <input type="text" value="Grade A" class="form-control floating">
                                                        <label class="focus-label">Grade</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="add-more">
                                                <a href="javascript:void(0);"><i class="fa fa-plus-circle"></i> Add More</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="submit-section">
                                    <button class="btn btn-primary submit-btn">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Education Modal -->

            <!-- Experience Modal -->
            <div id="experience_info" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Experience Informations</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="form-scroll">
                                    <div class="card">
                                        <div class="card-body">
                                            <h3 class="card-title">Experience Informations <a href="javascript:void(0);" class="delete-icon"><i class="fa fa-trash-o"></i></a></h3>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group form-focus">
                                                        <input type="text" class="form-control floating" value="Digital Devlopment Inc">
                                                        <label class="focus-label">Company Name</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-focus">
                                                        <input type="text" class="form-control floating" value="United States">
                                                        <label class="focus-label">Location</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-focus">
                                                        <input type="text" class="form-control floating" value="Web Developer">
                                                        <label class="focus-label">Job Position</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-focus">
                                                        <div class="cal-icon">
                                                            <input type="text" class="form-control floating datetimepicker" value="01/07/2007">
                                                        </div>
                                                        <label class="focus-label">Period From</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-focus">
                                                        <div class="cal-icon">
                                                            <input type="text" class="form-control floating datetimepicker" value="08/06/2018">
                                                        </div>
                                                        <label class="focus-label">Period To</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-body">
                                            <h3 class="card-title">Experience Informations <a href="javascript:void(0);" class="delete-icon"><i class="fa fa-trash-o"></i></a></h3>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group form-focus">
                                                        <input type="text" class="form-control floating" value="Digital Devlopment Inc">
                                                        <label class="focus-label">Company Name</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-focus">
                                                        <input type="text" class="form-control floating" value="United States">
                                                        <label class="focus-label">Location</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-focus">
                                                        <input type="text" class="form-control floating" value="Web Developer">
                                                        <label class="focus-label">Job Position</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-focus">
                                                        <div class="cal-icon">
                                                            <input type="text" class="form-control floating datetimepicker" value="01/07/2007">
                                                        </div>
                                                        <label class="focus-label">Period From</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-focus">
                                                        <div class="cal-icon">
                                                            <input type="text" class="form-control floating datetimepicker" value="08/06/2018">
                                                        </div>
                                                        <label class="focus-label">Period To</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="add-more">
                                                <a href="javascript:void(0);"><i class="fa fa-plus-circle"></i> Add More</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="submit-section">
                                    <button class="btn btn-primary submit-btn">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Experience Modal -->

        </div>
        <!-- /Page Wrapper -->
@endsection
