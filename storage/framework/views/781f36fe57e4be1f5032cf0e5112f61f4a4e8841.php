<?php
    use App\Department;
    $departments = Department::all();
?>


<?php $__env->startSection('content'); ?>
<script>
    function get_department(e)
    {
        let data = {
            department_id:e
        }

        axios.post("<?php echo e(route('department.get')); ?>", data).then(res => {
            if(res.data.status == 1)
            {
                setTimeout(() => {
                    $('#edit_department_name').val(res.data.message.department_name);
                    $('#department_id').val(res.data.message.id);
                }, 100);
            }
        });
    }

    function update_department(id)
    {
        let data = {
            department_id:id,
            department_name:edit_department_name.value
        }

        axios.post("<?php echo e(route('department.update')); ?>", data).then(res => {
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
        });
    }

    function delete_department(id)
    {
        let data = {
            department_id:id
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

                axios.post("<?php echo e(route('department.delete')); ?>", data).then(res => {
                    if(res.data.status == 1)
                    {
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )

                        setTimeout(() => {
                            window.location.reload();
                        }, 500);
                    }
                });
            }
        });
    }
</script>
<!-- Page Wrapper -->
<div class="page-wrapper">

    <input type="hidden" id="department_id">

            <!-- Page Content -->
            <div class="content container-fluid">

                <!-- Page Header -->
                <div class="page-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="page-title">Department</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index">Dashboard</a></li>
                                <li class="breadcrumb-item active">Department</li>
                            </ul>
                        </div>
                        <div class="col-auto float-right ml-auto">
                            <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_department"><i class="fa fa-plus"></i> Add Department</a>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->

                <div class="row">
                    <div class="col-md-12">
                        <div>
                            <table class="table table-striped custom-table mb-0 datatable">
                                <thead>
                                    <tr>
                                        <th style="width: 30px;">#</th>
                                        <th>Department Name</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($department->id); ?></td>
                                            <td><?php echo e($department->department_name); ?></td>
                                            <td class="text-right">
                                            <div class="dropdown dropdown-action">
                                                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_department" onclick="get_department(<?php echo e($department->id); ?>)"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                    <a class="dropdown-item" href="#" onclick="delete_department(<?php echo e($department->id); ?>)"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
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

            <!-- Add Department Modal -->
            <div id="add_department" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Add Department</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="javascript:void(0)">
                                <div class="form-group">
                                    <label>Department Name <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" id="department_name">
                                </div>
                                <div class="submit-section">
                                    <button class="btn btn-primary submit-btn" onclick="add_department()">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Add Department Modal -->

            <!-- Edit Department Modal -->
            <div id="edit_department" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Edit Department</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="javascript:void(0)">
                                <div class="form-group">
                                    <label>Department Name <span class="text-danger">*</span></label>
                                    <input class="form-control" id="edit_department_name" type="text">
                                </div>
                                <div class="submit-section">
                                    <button class="btn btn-primary submit-btn" onclick="update_department(`${department_id.value}`)">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Edit Department Modal -->

            <!-- Delete Department Modal -->
            <div class="modal custom-modal fade" id="delete_department" role="dialog">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="form-header">
                                <h3>Delete Department</h3>
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
            <!-- /Delete Department Modal -->

        </div>
        <!-- /Page Wrapper -->
<?php $__env->stopSection(); ?>

<script>

function add_department()
{
    let data = {
        department_name:department_name.value
    }

    axios.post("<?php echo e(route('department.create')); ?>", data).then(res => {
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
    });
}
</script>


<?php echo $__env->make('layout.mainlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/databank/resources/views/departments.blade.php ENDPATH**/ ?>