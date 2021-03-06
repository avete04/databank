<?php $__env->startSection('content'); ?>
<!-- Page Wrapper -->

<script>
let User = [];
    get_user()
    function get_user()
    {
        axios.get(`<?php echo e(route('user.get')); ?>`).then(res => {
            User = res.data
            User.forEach(e => {
                $('#user_select').append(`
                    <option value="${e.id}">${e.first_name} ${e.last_name}</option>
                `)
            })
        })
    }

    function add_appraisal()
    {
        let data = {
            user_id:user_select.value,
            integrity:integrity.value,
            professionalism:professionalism.value,
            teamwork:teamwork.value,
            critical_thinking:critical_thinking.value,
            conflict_management:conflict_management.value,
            attendance:attendance.value,
            ability_to_make_deadline:ability_to_meet_deadline.value,
            management:management.value,
            administration:administration.value,
            presentation_skill:presentation_skill.value,
            quality_of_work:quality_of_work.value,
            efficiency:efficiency.value
        }

        axios.post(`<?php echo e(route('appraisal.add')); ?>`, data).then(res => {
            if(res.data.status == 1)
            {
                Swal.fire(
                    'Success',
                    res.data.message,
                    'success'
                )
            }
            else 
            {
                Swal.fire(
                    'Failed',
                    res.data.message,
                    'error'
                )
            }
        }).catch(err => {
            Swal.fire(
                'Failed',
                'Please Select Employee',
                'error'
            )
        });
    }

    get_all_appraisal()
    function get_all_appraisal()
    {
        axios.get(`<?php echo e(route('appraisal.get_all')); ?>`).then(res => {
            res.data.forEach(e => {
                console.log(e)
                $('#appraisal_container').append(`
                    <tr>
                        <td>${e[0].id}</td>
                        <td>
                            <h2 class="table-avatar">
                                <a href="profile" class="avatar"><img alt="" src="${e[0].profile_image}"></a>
                                <a href="profile">${e[0].first_name} ${e[0].last_name}</a>
                            </h2>
                        </td>
                        <td>${e[0].designation_name}</td>
                        <td>${e[0].department_name}</td>
                        <td>
                            ${e.length}
                        </td>
                        <td class="text-right">
                            
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_appraisal" onclick="view_appraisal(${e[0].user_id})"><i class="fa fa-pencil m-r-5"></i> Edit</a>

                        </td>
                    </tr>
                `)
            })
        })
    }

    function view_appraisal(e) 
    {
        console.log(e)
    }

</script>



<div class="page-wrapper">
			
            <!-- Page Content -->
            <div class="content container-fluid">
            
                <!-- Page Header -->
                <div class="page-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="page-title">Performance Appraisal</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index">Dashboard</a></li>
                                <li class="breadcrumb-item active">Performance</li>
                            </ul>
                        </div>
                        <div class="col-auto float-right ml-auto">
                            <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_appraisal"><i class="fa fa-plus"></i> Add New</a>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-striped custom-table mb-0">
                                <thead>
                                    <tr>
                                        <th style="width: 30px;">#</th>
                                        <th>Employee</th>
                                        <th>Designation</th>
                                        <th>Department</th>
                                        <th>No. of Appraisal</th>
                                     
                                        <th class="text-right">View</th>
                                    </tr>
                                </thead>
                                <tbody id="appraisal_container">
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Page Content -->

            <!-- Add Performance Appraisal Modal -->
            <div id="add_appraisal" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Give Performance Appraisal</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="javascript:void(0)">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="col-form-label">Employee</label>
                                            <select class="select" id="user_select">
                                                <option value="">Select Employee</option>
                                                
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Date <span class="text-danger">*</span></label>
                                            <div class="cal-icon"><input class="form-control" value="<?php echo e(now()->format('Y-m-d')); ?>" readonly type="text"></div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="tab-box">
                                                    <div class="row user-tabs">
                                                        <div class="col-lg-12 col-md-12 col-sm-12 line-tabs">
                                                            <ul class="nav nav-tabs nav-tabs-solid">
                                                                <li class="nav-item"><a href="#appr_technical" data-toggle="tab" class="nav-link active">Performance</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-content">
                                                    <div id="appr_technical" class="pro-overview tab-pane fade show active">
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <div class="bg-white">
                                                                    <table class="table">
                                                                        <thead>
                                                                          <tr>
                                                                            <th colspan="5">Technical Competencies</th>
                                                                          </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                          <tr>
                                                                            <th colspan="2">Indicator</th>
                                                                            <th colspan="2">Expected Value</th>
                                                                            <th>Set Value</th>
                                                                          </tr>
                                                                          
                                                                         
                                                                          <tr>
                                                                            <td scope="row" colspan="2">Management</td>
                                                                            <td colspan="2">Advanced</td>
                                                                            <td><select id="management" class="form-control">
                                                                                <option value="1">None</option>
                                                                                <option value="1"> Beginner</option>
                                                                                <option value="2"> Intermediate</option>
                                                                                <option value="3"> Advanced</option>
                                                                                <option value="4"> Expert / Leader</option>
                                                                              </select></td>
                                                                          </tr>
                                                                          <tr>
                                                                            <td scope="row" colspan="2">Administration</td>
                                                                            <td colspan="2">Advanced</td>
                                                                            <td><select id="administration" class="form-control">
                                                                                <option value="1">None</option>
                                                                                <option value="1"> Beginner</option>
                                                                                <option value="2"> Intermediate</option>
                                                                                <option value="3"> Advanced</option>
                                                                                <option value="4"> Expert / Leader</option>
                                                                              </select></td>
                                                                          </tr>
                                                                          <tr>
                                                                            <td scope="row" colspan="2">Presentation Skill</td>
                                                                            <td colspan="2">Expert / Leader</td>
                                                                            <td><select id="presentation_skill" class="form-control">
                                                                                <option value="1">None</option>
                                                                                <option value="1"> Beginner</option>
                                                                                <option value="2"> Intermediate</option>
                                                                                <option value="3"> Advanced</option>
                                                                                <option value="4"> Expert / Leader</option>
                                                                              </select></td>
                                                                          </tr>
                                                                          <tr>
                                                                            <td scope="row" colspan="2">Quality Of Work</td>
                                                                            <td colspan="2">Expert / Leader</td>
                                                                            <td><select id="quality_of_work" class="form-control">
                                                                                <option value="1">None</option>
                                                                                <option value="1"> Beginner</option>
                                                                                <option value="2"> Intermediate</option>
                                                                                <option value="3"> Advanced</option>
                                                                                <option value="4"> Expert / Leader</option>
                                                                              </select></td>
                                                                          </tr>
                                                                          <tr>
                                                                            <td scope="row" colspan="2">Efficiency</td>
                                                                            <td colspan="2">Expert / Leader</td>
                                                                            <td><select id="efficiency" class="form-control">
                                                                                <option value="1">None</option>
                                                                                <option value="1"> Beginner</option>
                                                                                <option value="2"> Intermediate</option>
                                                                                <option value="3"> Advanced</option>
                                                                                <option value="4"> Expert / Leader</option>
                                                                              </select></td>
                                                                            </tr>

                                                                            <tr>
                                                                                <td scope="row" colspan="2">Integrity</td>
                                                                                <td colspan="2">Beginner</td>
                                                                                <td>
                                                                                    <select id="integrity" class="form-control">
                                                                                        <option value="1">None</option>
                                                                                        <option value="1"> Beginner</option>
                                                                                        <option value="2"> Intermediate</option>
                                                                                        <option value="3"> Advanced</option>
                                                                                    </select>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td scope="row" colspan="2">Professionalism</td>
                                                                                <td colspan="2">Beginner</td>
                                                                                <td>
                                                                                    <select id="professionalism" class="form-control">
                                                                                        <option value="1">None</option>
                                                                                        <option value="1"> Beginner</option>
                                                                                        <option value="2"> Intermediate</option>
                                                                                        <option value="3"> Advanced</option>
                                                                                    </select>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td scope="row" colspan="2">Team Work</td>
                                                                                <td colspan="2">Intermediate</td>
                                                                                <td>
                                                                                    <select id="teamwork" class="form-control">
                                                                                        <option value="1">None</option>
                                                                                        <option value="1"> Beginner</option>
                                                                                        <option value="2"> Intermediate</option>
                                                                                        <option value="3"> Advanced</option>
                                                                                    </select>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td scope="row" colspan="2">Critical Thinking</td>
                                                                                <td colspan="2">Advanced</td>
                                                                                <td>
                                                                                    <select id="critical_thinking" class="form-control">
                                                                                        <option value="1">None</option>
                                                                                        <option value="1"> Beginner</option>
                                                                                        <option value="2"> Intermediate</option>
                                                                                        <option value="3"> Advanced</option>
                                                                                    </select>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td scope="row" colspan="2">Conflict Management</td>
                                                                                <td colspan="2">Intermediate</td>
                                                                                <td>
                                                                                    <select id="conflict_management" class="form-control">
                                                                                        <option value="1">None</option>
                                                                                        <option value="1"> Beginner</option>
                                                                                        <option value="2"> Intermediate</option>
                                                                                        <option value="3"> Advanced</option>
                                                                                    </select>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td scope="row" colspan="2">Attendance</td>
                                                                                <td colspan="2">Intermediate</td>
                                                                                <td>
                                                                                    <select id="attendance" class="form-control">
                                                                                        <option value="1">None</option>
                                                                                        <option value="1"> Beginner</option>
                                                                                        <option value="2"> Intermediate</option>
                                                                                        <option value="3"> Advanced</option>
                                                                                    </select>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td scope="row" colspan="2">Ability To Meet Deadline</td>
                                                                                <td colspan="2">Advanced</td>
                                                                                <td>
                                                                                    <select id="ability_to_meet_deadline" class="form-control">
                                                                                        <option value="1">None</option>
                                                                                        <option value="1"> Beginner</option>
                                                                                        <option value="2"> Intermediate</option>
                                                                                        <option value="3"> Advanced</option>
                                                                                    </select>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane fade" id="appr_organizational">
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <div class="bg-white">
                                                                    <table class="table">
                                                                        <thead>
                                                                            <tr>
                                                                                <th colspan="5">Organizational Competencies</th>
                                                                            </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                            
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="submit-section">
                                    <button class="btn btn-primary submit-btn" onclick="add_appraisal()">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Add Performance Appraisal Modal -->
            
            <!-- Edit Performance Appraisal Modal -->
            <div id="edit_appraisal" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Edit Performance Appraisal</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="col-form-label">Employee</label>
                                            <select class="select">
                                                <option>Select Employee</option>
                                                <option>John Doe</option>
                                                <option selected>Mike Litorus</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Select Date <span class="text-danger">*</span></label>
                                            <div class="cal-icon"><input class="form-control datetimepicker" value="7/08/2019" type="text"></div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="tab-box">
                                                    <div class="row user-tabs">
                                                        <div class="col-lg-12 col-md-12 col-sm-12 line-tabs">
                                                            <ul class="nav nav-tabs nav-tabs-solid">
                                                                <li class="nav-item"><a href="#appr_technical1" data-toggle="tab" class="nav-link active">Technical</a></li>
                                                                <li class="nav-item"><a href="#appr_organizational1" data-toggle="tab" class="nav-link">Organizational</a></li>
                                                                
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-content">
                                                    <div id="appr_technical1" class="pro-overview tab-pane fade show active">
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <div class="bg-white">
                                                                    <table class="table">
                                                                        <thead>
                                                                            <tr>
                                                                                <th colspan="5">Technical Competencies</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <th colspan="2">Indicator</th>
                                                                                <th colspan="2">Expected Value</th>
                                                                                <th>Set Value</th>
                                                                            </tr>
                                                                           
                                                                          
                                                                            <tr>
                                                                                <td scope="row" colspan="2">Management</td>
                                                                                <td colspan="2">Advanced</td>
                                                                                <td>
                                                                                    <select name="management" class="form-control">
                                                                                        <option value="">None</option>
                                                                                        <option value="1"> Beginner</option>
                                                                                        <option value="2"> Intermediate</option>
                                                                                        <option value="3"> Advanced</option>
                                                                                        <option value="4"> Expert / Leader</option>
                                                                                    </select>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td scope="row" colspan="2">Administration</td>
                                                                                <td colspan="2">Advanced</td>
                                                                                <td>
                                                                                    <select name="administration" class="form-control">
                                                                                        <option value="">None</option>
                                                                                        <option value="1"> Beginner</option>
                                                                                        <option value="2"> Intermediate</option>
                                                                                        <option value="3"> Advanced</option>
                                                                                        <option value="4"> Expert / Leader</option>
                                                                                    </select>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td scope="row" colspan="2">Presentation Skill</td>
                                                                                <td colspan="2">Expert / Leader</td>
                                                                                <td>
                                                                                    <select name="presentation_skill" class="form-control">
                                                                                        <option value="">None</option>
                                                                                        <option value="1"> Beginner</option>
                                                                                        <option value="2"> Intermediate</option>
                                                                                        <option value="3"> Advanced</option>
                                                                                        <option value="4"> Expert / Leader</option>
                                                                                    </select>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td scope="row" colspan="2">Quality Of Work</td>
                                                                                <td colspan="2">Expert / Leader</td>
                                                                                <td>
                                                                                    <select name="quality_of_work" class="form-control">
                                                                                        <option value="">None</option>
                                                                                        <option value="1"> Beginner</option>
                                                                                        <option value="2"> Intermediate</option>
                                                                                        <option value="3"> Advanced</option>
                                                                                        <option value="4"> Expert / Leader</option>
                                                                                    </select>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td scope="row" colspan="2">Efficiency</td>
                                                                                <td colspan="2">Expert / Leader</td>
                                                                                <td>
                                                                                    <select name="efficiency" class="form-control">
                                                                                        <option value="">None</option>
                                                                                        <option value="1"> Beginner</option>
                                                                                        <option value="2"> Intermediate</option>
                                                                                        <option value="3"> Advanced</option>
                                                                                        <option value="4"> Expert / Leader</option>
                                                                                    </select>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane fade" id="appr_organizational1">
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <div class="bg-white">
                                                                    <table class="table">
                                                                        <thead>
                                                                            <tr>
                                                                                <th colspan="5">Organizational Competencies</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <th colspan="2">Indicator</th>
                                                                                <th colspan="2">Expected Value</th>
                                                                                <th>Set Value</th>
                                                                            </tr>
                                                                            <tr>
                                                                                <td scope="row" colspan="2">Integrity</td>
                                                                                <td colspan="2">Beginner</td>
                                                                                <td>
                                                                                    <select name="integrity" class="form-control">
                                                                                        <option value="">None</option>
                                                                                        <option value="1"> Beginner</option>
                                                                                        <option value="2"> Intermediate</option>
                                                                                        <option value="3"> Advanced</option>
                                                                                    </select>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td scope="row" colspan="2">Professionalism</td>
                                                                                <td colspan="2">Beginner</td>
                                                                                <td>
                                                                                    <select name="professionalism" class="form-control">
                                                                                        <option value="">None</option>
                                                                                        <option value="1"> Beginner</option>
                                                                                        <option value="2"> Intermediate</option>
                                                                                        <option value="3"> Advanced</option>
                                                                                    </select>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td scope="row" colspan="2">Team Work</td>
                                                                                <td colspan="2">Intermediate</td>
                                                                                <td>
                                                                                    <select name="team_work" class="form-control">
                                                                                        <option value="">None</option>
                                                                                        <option value="1"> Beginner</option>
                                                                                        <option value="2"> Intermediate</option>
                                                                                        <option value="3"> Advanced</option>
                                                                                    </select>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td scope="row" colspan="2">Critical Thinking</td>
                                                                                <td colspan="2">Advanced</td>
                                                                                <td>
                                                                                    <select name="critical_thinking" class="form-control">
                                                                                        <option value="">None</option>
                                                                                        <option value="1"> Beginner</option>
                                                                                        <option value="2"> Intermediate</option>
                                                                                        <option value="3"> Advanced</option>
                                                                                    </select>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td scope="row" colspan="2">Conflict Management</td>
                                                                                <td colspan="2">Intermediate</td>
                                                                                <td>
                                                                                    <select name="conflict_management" class="form-control">
                                                                                        <option value="">None</option>
                                                                                        <option value="1"> Beginner</option>
                                                                                        <option value="2"> Intermediate</option>
                                                                                        <option value="3"> Advanced</option>
                                                                                    </select>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td scope="row" colspan="2">Attendance</td>
                                                                                <td colspan="2">Intermediate</td>
                                                                                <td>
                                                                                    <select name="attendance" class="form-control">
                                                                                        <option value="">None</option>
                                                                                        <option value="1"> Beginner</option>
                                                                                        <option value="2"> Intermediate</option>
                                                                                        <option value="3"> Advanced</option>
                                                                                    </select>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td scope="row" colspan="2">Ability To Meet Deadline</td>
                                                                                <td colspan="2">Advanced</td>
                                                                                <td>
                                                                                    <select name="ability_to_meet_deadline" class="form-control">
                                                                                        <option value="">None</option>
                                                                                        <option value="1"> Beginner</option>
                                                                                        <option value="2"> Intermediate</option>
                                                                                        <option value="3"> Advanced</option>
                                                                                    </select>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="col-form-label">Status</label>
                                            <select class="select">
                                                <option>Active</option>
                                                <option>Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="submit-section">
                                    <button class="btn btn-primary submit-btn">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Edit Performance Appraisal Modal -->
            
            <!-- Delete Performance Appraisal Modal -->
            <div class="modal custom-modal fade" id="delete_appraisal" role="dialog">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="form-header">
                                <h3>Delete Performance Appraisal List</h3>
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
            <!-- /Delete Performance Appraisal Modal -->
        
        </div>
        <!-- /Page Wrapper -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.mainlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/databank/resources/views/performance-appraisal.blade.php ENDPATH**/ ?>