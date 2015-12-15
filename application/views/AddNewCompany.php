
<div class="app-container">
    <div class="row content-container">
        <?php $this->load->view("newTemp/navhead.php") ?>

        <?php $this->load->view("newTemp/navside.php") ?>

        <!-- Main Content -->
        <div class="container-fluid">
            <div class="side-body padding-top">
                <div class="row">
                    <div class="col-lg-offset-1 col-lg-10">
                        <div class="panel panel-danger">
                            <div class="panel-heading">

                                <div class="title"><i class="fa fa-bell fa-fw"></i>Add New Company <span class="pull-right"><a href="<?php echo base_url('index.php/CompanyManage/showCompany') ?>" >ย้อนกลับ</a> </span></div>

                                <div class="clear-both"></div>
                            </div>
                            <div class="panel-body ">
                                <form role="form" id="newCom" action="<?php echo base_url('index.php/CompanyManage/addNewCompany') ?>" method="post">
                                    <div>
                                        <div class="modal-content">
                                            <div class="modal-header">

                                                <h4 class="modal-title" id="myModalLabel">New Company Form</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="panel-group" id="accordion">
                                                    <div class="row no-margin-bottom " >
                                                        <div class="col-lg-6 ">
                                                            <div class="form-group">
                                                                <label>Company code</label>
                                                                <input class="form-control" id = "company_code" name="company_code">
                                                            </div>

                                                        </div>

                                                        <div class="col-lg-6 ">
                                                            <div class="form-group">
                                                                <label>Area Manager</label>
                                                                <input class="form-control ui-autocomplete-input" id="f_area_manager" >
                                                            </div>
                                                        </div>


                                                    </div>
                                                    <div class="row no-margin-bottom">

                                                        <div class="col-lg-6 ">
                                                            <div class="form-group">
                                                                <label>Company Name</label>
                                                                <input class="form-control " id = "name" name="name">
                                                            </div>

                                                        </div>

                                                        <div class="col-lg-6 ">
                                                            <div class="form-group ">
                                                                <label>Dealer</label>
                                                                <input class="form-control ui-autocomplete-input" id="f_dealers">
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="row no-margin-bottom">
                                                        <div class="col-lg-6 ">

                                                            <div class="form-group">
                                                                <label>Address</label>
                                                                <input class="form-control" id="address" name="address">
                                                            </div> 
                                                        </div>
                                                        <div class="col-lg-6 ">
                                                            <div class="form-group">
                                                                <label>Dealer Contact</label>
                                                                <input class="form-control" name="d_contact">
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="row no-margin-bottom">
                                                        <div class="col-lg-6 ">
                                                            <div class="form-group">
                                                                <label>Business</label>
                                                                <input class="form-control" name="business" id="business">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 ">
                                                            <div class="form-group">
                                                                <label>Custormer Contact</label>
                                                                <input class="form-control" name="c_contact" id="c_contact">
                                                            </div>
                                                        </div>


                                                    </div>


                                                    <div class="row no-margin-bottom">
                                                        <div class="col-lg-12">
                                                            <div class="ckeditor form-group">
                                                                <label>Background</label>
                                                                <textarea class="ckeditor form-control" rows="1" name="background">
                                                                </textarea>

                                                            </div>
                                                            <div class="ckeditor form-group">
                                                                <label>Machine</label>
                                                                <textarea class="ckeditor form-control" rows="1" name="machine">
                                                                </textarea>

                                                            </div>
                                                            <div class="ckeditor form-group">
                                                                <label>Process</label>
                                                                <textarea class="ckeditor form-control" rows="1" name="process">
                                                                </textarea>

                                                            </div>
                                                            <div class="ckeditor form-group">
                                                                <label>Current Product</label>
                                                                <textarea class="ckeditor form-control" rows="1" name="current_product">
                                                                </textarea>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <input class="form-control " type="hidden" name="area_manager" id="area_manager" value="">
                                                <input class="form-control " type="hidden" name="dealer" id="dealer" value="">
                                                <button type="button" onclick="sendData()" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <?php $this->load->view("newTemp/script"); ?>
        <?php $this->load->view("newTemp/footer"); ?>
        <script src="<?php echo base_url('asserts') ?>/jquery-ui-1.11.4.custom/jquery-ui.js"></script>

        <script>

                                                    jQuery.validator.setDefaults({
                                                        rules: {
                                                            company_code: {
                                                                required: true
                                                            },
                                                            name: {required: true,
                                                            },
                                                            address: {
                                                                required: true
                                                            }
                                                        },
                                                        messages: {
                                                            company_code: {
                                                                required: "<p class='text-danger'>กรุณาระบุ รหัส บริษัท</p>"
                                                            },
                                                            name: {
                                                                required: "<p class='text-danger'>กรุณาระบุ ชื่อ บริษัท</p>"
                                                            }, address: {
                                                                required: "<p class='text-danger'>กรุณาระบุ ที่ตั้ง บริษัท</p>"
                                                            }
                                                        }
                                                    });

                                                    var form = $("#newCom");
                                                    form.validate();
                                                    console.log(form);
                                                    function sendData() {
                                                        if (form.valid()) {
                                                            if ($("#area_manager").val() == "") {
                                                                $.alert({
                                                                    title: 'ระบุข้อมูล!',
                                                                    content: 'กรุณาเลือกข้อมูล Area Manager จากข้อมูลที่ปรากฏ',
                                                                });
                                                                return false;
                                                            }
                                                            if ($("#dealer").val() == "") {
                                                                $.alert({
                                                                    title: 'ระบุข้อมูล!',
                                                                    content: 'กรุณาเลือกข้อมูล Dealer จากข้อมูลที่ปรากฏ',
                                                                });
                                                                return false;
                                                            }
                                                            form.submit();
                                                        }
                                                    }



                                                    var table = $('#company_table').DataTable({
                                                        "dom": '<"top"l>t<"bottom"ip><"clear">'
                                                    });


                                                    $("#f_dealers").autocomplete({
                                                        source: function (request, response) {
                                                            $.ajax({
                                                                url: "<?php echo base_url('index.php/CompanyManage/getDealer') ?>",
                                                                dataType: "json",
                                                                data: {term: request.term},
                                                                success: function (data) {
                                                                    console.log(data);
                                                                    var array = $.map(data, function (item) {
                                                                        return {
                                                                            label: item.label,
                                                                            id: item.value
                                                                        };
                                                                    });
                                                                    response($.ui.autocomplete.filter(array, request.term));
                                                                },
                                                                minLength: 0,
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

                                                                },
                                                                minLength: 0,
                                                            });
                                                        },
                                                        select: function (event, ui) {
                                                            $('#area_manager').val(ui.item.id);
                                                        }
                                                    });




        </script>




