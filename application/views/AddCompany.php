

<div id="wrapper">

    <!-- Navigation -->
    <?php $this->load->view('template/login_nav'); ?>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Add New Company</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->

        <!-- /.row -->
        <div class="row">
            <div class="col-lg-offset-1 col-lg-10">
                <div class="panel-group" id="accordion">

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                New Company
                            </h4>
                        </div>
                        <div >
                            <div class="panel-body">
                                <form role="form">
                                    <div class="form-group">
                                        <label>ID</label>
                                        <input class="form-control">
                                        <p class="help-block">ID Comnany</p>
                                    </div>
                                    <div class="form-group">
                                        <label>Company Name</label>
                                        <input class="form-control">
                                        <p class="help-block">Company Name</p>
                                    </div>
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input class="form-control">
                                        <p class="help-block">Address Company</p>
                                    </div>
                                    <div class="form-group">
                                        <label>Business</label>
                                        <input class="form-control">
                                        <p class="help-block">Business</p>
                                    </div>
                                    <div class="form-group">
                                        <label>Area Manager</label>
                                        <input class="form-control">
                                        <p class="help-block">Manager Name</p>
                                    </div>
                                    <div class="form-group">
                                        <label>Dealer</label>
                                        <input class="form-control">
                                        <p class="help-block">Dealer</p>
                                    </div>
                                    <div class="form-group">
                                        <label>Contact</label>
                                        <input class="form-control">
                                        <p class="help-block">Contact</p>
                                    </div>
                                    <div class="form-group">
                                        <label>Contact2</label>
                                        <input class="form-control">
                                        <p class="help-block">Contact2</p>
                                    </div>

                                    <div class="form-group">
                                        <label>BACKGROUND</label>
                                        <textarea class="form-control" rows="3">BACKGROUND</textarea>

                                    </div>
                                    <div class="form-group">
                                        <label>MACHINE</label>
                                        <textarea class="form-control" rows="3">MACHINE</textarea>

                                    </div>
                                    <div class="form-group">
                                        <label>PROCESS</label>
                                        <textarea class="form-control" rows="3">PROCESS</textarea>

                                    </div>
                                    <div class="form-group">
                                        <label>CURRENT PRODUCT</label>
                                        <textarea class="form-control" rows="3">CURRENT PRODUCT</textarea>

                                    </div>
                                    <button type="submit" class="btn btn-default">Submit Button</button>
                                    <button type="reset" class="btn btn-default">Reset Button</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.col-lg-4 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<script type="text/javascript" src="<?php echo base_url("assets/CKeditor/ckeditor.js"); ?>"></script>

