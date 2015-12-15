<?php $this->load->view("newTemp/head.php") ?>
<div class="app-container">
    <div class="row content-container">
        <?php $this->load->view("newTemp/navhead.php") ?>

        <?php $this->load->view("newTemp/navside.php") ?>

        <!-- Main Content -->
        <p>Date: <input type="text" id="datepicker"></p>
        <div class="container">
            <form role="form" action="<?php echo base_url('index.php/CompanyManage/fileupload') ?>" method="post" enctype="multipart/form-data" >
                <div class="form-group">
                    <label>รูปภาพที่เกี่ยวข้อง</label>
                    <span id = "follower">
                        <input type="file" name="uploadedimages[]" multiple="true" class="form-control">
                    </span>
                    <i class = "fa fa-2x fa-plus-square-o" onclick = "addfollower()"></i>
                </div>
                <div class="form-group">
                    <button type="submit">sub</button>
                </div>
            </form>
        </div>




        <?php $this->load->view("newTemp/script"); ?>
        <?php $this->load->view("newTemp/footer"); ?>
        <script src="<?php echo base_url('asserts') ?>/jquery-ui-1.11.4.custom/jquery-ui.js"></script>

        <script>

                        function addfollower() {
                            $('#follower').append("<input type='file' name='uploadedimages[]' multiple='true' class='form-control'>");
                        }




        </script>




