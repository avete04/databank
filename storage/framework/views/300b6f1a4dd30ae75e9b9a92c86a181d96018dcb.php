<?php $__env->startSection('content'); ?>

<?php
    use App\Designation;
    $designations = DB::table('designations')
    ->join('departments', 'departments.id', '=', 'designations.department_id')
    ->select('designations.id as designation_id', 'departments.id as department_id', 'designations.*', 'departments.*')
    ->get();
?>

<script>
get_all_department()
function get_all_department()
{
    axios.get("<?php echo e(route('department.get_all')); ?>").then(res => {
        if(res.data.lenght != 0)
        {
            res.data.forEach(e => {
                $('#department_id').append(`
                    <option value="${e.id}">${e.department_name}</option>
                `)
                $('#edit_department_id').append(`
                    <option value="${e.id}">${e.department_name}</option>
                `)
            });

        }
    });
}

function add_designtion()
{
    let data = {
        designation_name:designation_name.value,
        department_id:department_id.value
    }

    axios.post("<?php echo e(route('designation.create')); ?>", data).then(res => {
        if(res.data.status == 1)
        {
            Swal.fire(
                'Success',
                res.data.message,
                'success'
            )

            setTimeout(() => {
                window.location.reload();
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

function get_designation(id)
{
    let data = {
        designation_id:id
    }

    axios.post("<?php echo e(route('designation.get')); ?>", data).then(res => {
        if(res.data.status == 1)
        {
            res.data.message.forEach(e => {
                if(id == e.designation_id)
                {
                    $('#edit_designation_name').val(e.designation_name)
                    $('#edit_department_id').val(e.department_id)
                    $('#designation_id').val(e.designation_id)
                }
            })
        }
    });
}

function update_designation(id)
{
    let data = {
        designation_id:designation_id.value,
        designation_name:edit_designation_name.value,
        department_id:edit_department_id.value
    }

    axios.post("<?php echo e(route('designation.update')); ?>", data).then(res => {
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

function delete_designation(id)
{
    let data = {
        designation_id:id
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
            axios.post("<?php echo e(route('designation.delete')); ?>", data).then(res => {
                if(res.data.status == 1)
                {
                    Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    )

                    setTimeout(() => {
                        location.reload();
                    }, 500);
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
<input type="hidden" id="designation_id">
                <!-- Page Header -->
                <div class="page-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="page-title">Designations</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index">Dashboard</a></li>
                                <li class="breadcrumb-item active">Designations</li>
                            </ul>
                        </div>
                        <div class="col-auto float-right ml-auto">
                            <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_designation"><i class="fa fa-plus"></i> Add Designation</a>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-striped custom-table mb-0 datatable">
                                <thead>
                                    <tr>
                                        <th style="width: 30px;">#</th>
                                        <th>Designation </th>
                                        <th>Department </th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $designations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $designation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($designation->designation_id); ?></td>
                                            <td><?php echo e($designation->designation_name); ?></td>
                                            <td><?php echo e($designation->department_name); ?></td>
                                            <td class="text-right">
                                            <div class="dropdown dropdown-action">
                                                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_designation" onclick="get_designation(<?php echo e($designation->designation_id); ?>)"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                    <a class="dropdown-item" href="#" onclick="delete_designation(<?php echo e($designation->designation_id); ?>)"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                                </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Page Content -->

            <!-- Add Designation Modal -->
            <div id="add_designation" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Add Designation</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="javascript:void(0)">
                                <div class="form-group">
                                    <label>Designation Name <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" id="designation_name">
                                </div>
                                <div class="form-group">
                                    <label>Department <span class="text-danger">*</span></label>
                                    <select class="select" id="department_id">
                                        <option value="">Select Department</option>
                                    </select>
                                </div>
                                <div class="submit-section">
                                    <button class="btn btn-primary submit-btn" onclick="add_designtion()">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Add Designation Modal -->

            <!-- Edit Designation Modal -->
            <div id="edit_designation" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Edit Designation</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="javascript:void(0)">
                                <div class="form-group">
                                    <label>Designation Name <span class="text-danger">*</span></label>
                                    <input class="form-control" id="edit_designation_name" type="text">
                                </div>
                                <div class="form-group">
                                    <label>Department <span class="text-danger">*</span></label>
                                    <select class="form-control" id="edit_department_id">

                                    </select>
                                </div>
                                <div class="submit-section">
                                    <button class="btn btn-primary submit-btn" onclick="update_designation(designation_id.value)">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Edit Designation Modal -->

            <!-- Delete Designation Modal -->
            <div class="modal custom-modal fade" id="delete_designation" role="dialog">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="form-header">
                                <h3>Delete Designation</h3>
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
            <!-- /Delete Designation Modal -->

        </div>
        <!-- /Page Wrapper -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.mainlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\avenson\Desktop\databank\resources\views/designations.blade.php ENDPATH**/ ?>