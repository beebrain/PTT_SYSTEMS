<div id="wrapper">
    <!-- Navigation -->
    <?php $this->load->view('template/login_nav'); ?>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Show Company</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->

        <!-- /.row -->
        <div class="row">


            <!-- /.col-lg-8 -->
            <div class=" col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="col-lg-3 col-md-12">
                            <label>Column</label>
                            <select class="form-control" id="topicfill">
                                <option value="0">id</option>
                                <option value="1">COMPANY</option>
                                <option value="2">AREA MANAGER</option>
                                <option value="3">Dealer</option>
                                <option value="4">Contact</option>
                                <option value="5">Business</option>
                            </select>
                        </div>
                        <div class="col-lg-3 col-md-12">
                            <label>Search</label>
                            <input type="text" class="form-control" id="search_text" value="">
                        </div>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">

                        <i class="fa fa-bell fa-fw"></i> Add New Company  <a href="#" data-toggle="modal" data-target="#myModal" ><i class="fa fa-plus-circle fa-2x pull-right"></i></a>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="dataTable_wrapper">
                            <table class="table table-striped table-bordered table-hover display" id="company_table">
                                <thead>
                                    <tr>
                                        <th style="width: 5%">com_code</th>
                                        <th style="width: 15%">COMPANY</th>
                                        <th style="width: 15%">AREA MANAGER</th>
                                        <th style="width: 15%">Dealer</th>
                                        <th style="width: 10%">Contact</th>
                                        <th style="width: 10%">Business</th>
                                        <th style="width: 10%">Date</th>
                                        <th style="width: 5%">edit</th>
                                        <th style="width: 5%">delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $allCompany;
                                    foreach ($allCompany as $key => $value) {
                                        ?>
                                        <tr class="odd gradeX">
                                            <td><a href=""><?= $value->company_code ?></a></td>
                                            <td><?= $value->name ?></td>
                                            <td><?= $value->area_manager ?></td>
                                            <td><?= $value->dealer ?></td>
                                            <td><?= $value->contact ?></td>
                                            <td><?= $value->business ?></td>
                                            <td>1234</td>
                                            <td><i class="fa fa-edit fa-fw"></i></td>
                                            <td><i class="fa fa-trash fa-fw"></i></td>
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
    <form role="form" action="<?php echo base_url('index.php/CompanyManage/addNewCompany') ?>" method="post">
        <div class="modal-dialog modal-lg ">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myModalLabel">Add New Company Form</h4>
                </div>
                <div class="modal-body">
                    <div class="panel-group" id="accordion">

                        <div class="form-group">
                            <label>Company code</label>
                            <input class="form-control" name="company_code">
                        </div>
                        <div class="form-group">
                            <label>Company Name</label>
                            <input class="form-control" name="name">
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <input class="form-control" name="address">
                        </div>
                        <div class="form-group">
                            <label>Business</label>
                            <input class="form-control" name="business" id="business">
                        </div>
                        <div class="form-group">
                            <label>Area Manager</label>
                            <div class="ui-widget">
                                <input class="form-control" id="f_area_manager">
                                <input class="form-control " name="area_manager" id="area_manager">
                            </div>
                        </div>
                        <div class="form-group ">
                            <label>Dealer</label>
                            <div class="ui-widget">
                                <input class="form-control " id="f_dealers">
                                <input class="form-control " name="dealer" id="dealer">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Contact</label>
                            <input class="form-control" name="contact">
                        </div>
                        <div class="ckeditor form-group">
                            <label>Background</label>
                            <textarea class="ckeditor form-control" rows="3" name="background">
                

                            </textarea>

                        </div>
                        <div class="ckeditor form-group">
                            <label>Machine</label>
                            <textarea class="ckeditor form-control" rows="3" name="machine">
                

                            </textarea>

                        </div>
                        <div class="ckeditor form-group">
                            <label>Process</label>
                            <textarea class="ckeditor form-control" rows="3" name="process">

                            </textarea>

                        </div>
                        <div class="ckeditor form-group">
                            <label>Current Product</label>
                            <textarea class="ckeditor form-control" rows="3" name="current_product">
            
                            </textarea>

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

    $('#search_text').on('keyup', function () {
        var index = $('#topicfill :selected').val();
        console.log(index);
        if (this.value == "") {
            table.search('').columns().search('').draw();
        } else {
            console.log(index);
            table.columns(index).search(this.value).draw();
        }
    });


    $("#f_dealers").autocomplete({
        source: function (request, response) {
            $.ajax({
                url: "<?php echo base_url('index.php/CompanyManage/getdealer') ?>",
                dataType: "json",
                data: {term: request.term},
                success: function (data) {
                    var array = $.map(data, function (item) {
                        return {
                            label: item.label,
                            id: item.value
                        };

                    });
                    response($.ui.autocomplete.filter(array, request.term));

                }
            });
        },
        select: function (event, ui) {
            $('#dealer').val(ui.item.id);
        }
    });

    $("#f_area_manager").autocomplete({
        source: function (request, response) {
            $.ajax({
                url: "<?php echo base_url('index.php/CompanyManage/getManager') ?>",
                dataType: "json",
                data: {term: request.term},
                success: function (data) {
                    var array = $.map(data, function (item) {
                        return {
                            label: item.label,
                            id: item.value
                        };

                    });
                    response($.ui.autocomplete.filter(array, request.term));

                }
            });
        },
        select: function (event, ui) {
            $('#area_manager').val(ui.item.id);
        }
    });




</script>
