<div id="wrapper">
    <!-- Navigation -->
    <?php $this->load->view('template/login_nav'); ?>




    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Manage Area Manager</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->

        <!-- /.row -->
        <div class="row">


            <!-- /.col-lg-8 -->
            <div class="col-lg-offset-1 col-lg-10">
               
                <div class="panel panel-default">
                    <div class="panel-heading">

                        <i class="fa fa-bell fa-fw"></i>Area Manager<a href="#" data-toggle="modal" data-target="#myModal" ><i class="fa fa-plus-circle fa-2x pull-right"></i></a>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="dataTable_wrapper">
                            <table class="table table-striped table-bordered table-hover" id="company_table">
                                <thead>
                                    <tr>
                                        <th>Code Manager</th>
                                        <th>Manager Name</th>
                                        <th>edit/delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $allmanager;
                                    foreach ($allmanager as $key => $value) {
                                        ?>
                                        <tr class="odd gradeX">
                                            <td><a href=""><?= $value->id ?></a></td>
                                            <td><?= $value->name ?></td>
                                            <td><a>edit</a> <a>delete</a></td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </tbody>

                            </table>
                        </div>
                    </div>
                    <!-- /.panel-body -->
                </div>


            </div>
            <!-- /.col-lg-4 -->
        </div>
        <!-- /.row -->
    </div>


</div>
<!-- /#wrapper -->

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <form role="form" action="<?php echo base_url('index.php/AreaManager/addManager') ?>" method="post">
        <div class="modal-dialog modal-lg ">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myModalLabel">Add Manager</h4>
                </div>
                <div class="modal-body">
                    <div class="panel-group" id="accordion">
                        <div class="form-group">
                            <label>Manager Name</label>
                            <input class="form-control" name="name">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
    </form>

    <!-- /.modal-dialog -->
</div>

<!-- /.modal -->
<?php $this->load->view('template/script') ?>

<script src="<?php echo base_url('asserts') ?>/jquery-ui-1.11.4.custom/jquery-ui.js"></script>


<script>


    var table = $('#company_table').DataTable({
        "dom": '<"top"l>t<"bottom"ip><"clear">'
    });



</script>
