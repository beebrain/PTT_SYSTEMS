<?php $this->load->view("newTemp/head.php") ?>
<link href="<?php echo base_url('asserts') ?>/css/jquery.tagit.css" rel="stylesheet" type="text/css">
<div class="app-container">
    <div class="row content-container">
        <?php $this->load->view("newTemp/navhead.php") ?>

        <?php $this->load->view("newTemp/navside.php") ?>

        <!-- Main Content -->
        <div class="container-fluid">
            <div class="side-body padding-top">
                <div class="row no-padding">

                    <div class="col-lg-offset-1 col-md-offset-1 col-lg-10 col-md-10 col-sm-8">
                        <div class="panel panel-info">

                            <div class="panel-heading">




                                <h4 class="panel-title">
                                    Edit Inspection Form
                                    <span class="pull-right">
                                        <a href="#" onclick="window.history.back()"  ><i class="fa fa-close fa-fw" style="color: black"></i></a> 
                                    </span>
                                </h4>
                            </div>
                            <form role="form" action="<?php echo base_url('index.php/CompanyManage/updateHistoryWithFile') ?>" method="post" enctype="multipart/form-data" >
                                <div class="panel-body">

                                    <div class="form-group">
                                        <input type="hidden" name="vis_id" value="<?= $visit->vis_id ?>">
                                        <span style=""><b>Objective </b>
                                            <span class="pull-right">
                                                <a href="#" id="open-popover-link"><i class="fa fa-info-circle fa-fw" style="color: blue;font-size: 16px" 
                                                                                      class="btn btn-default" 
                                                                                      data-toggle="popover"
                                                                                      data-original-title="" title="">

                                                    </i>

                                                </a>
                                            </span>
                                        </span>
                                        <div id="my-popover-container" style="display: none">
                                            <div>
                                                <ol style="padding-left: 15px">
                                                    <li>Customer Solution</li>
                                                    <ul style="padding-left: 15px">
                                                        <li>1.1 Product and Application Advisor</li>
                                                    </ul>
                                                    <li>Product Solution</li>
                                                    <ul style="padding-left: 15px">
                                                        <li>2.1 Specialty Product Monitoring</li>
                                                        <li>2.2 Trend Prediction Analysis</li>
                                                        <li>2.3 Product Optimization & Customization</li>
                                                    </ul>
                                                    <li>Service Solution</li>
                                                    <ul style="padding-left: 15px">
                                                        <li>3.1 On-site Inspection</li>
                                                        <li>3.2 Machinery & System Optimization</li>
                                                        <li>3.3 Lube Maintenance Program</li>
                                                        <li>3.4 Problem Solving</li>
                                                        <li>3.5 Lube Technical Survey</li>
                                                    </ul>
                                                    <li>Academic Solution</li>
                                                    <ul style="padding-left: 15px">
                                                        <li>4.1 Training</li>
                                                    </ul>
                                                </ol>
                                            </div>
                                        </div>  
 <!-- <select name="Objective" id="Objective" class="form-control">
     <optgroup label="Customer Solution">
         <option value="1-1">Product and Application Advisor</option>
     </optgroup>

     <optgroup label="Product Solution">

         <option value="2-1">Specialty Product Monitoring</option>
         <option value="2-2">Trend Prediction Analysis</option>
         <option value="2-3">Product Optimization & Customization</option>
     </optgroup>

     <optgroup label="Service Solution">
         <option value="3-1">On-site Inspection</option>
         <option value="3-2">Machinery & System Optimization</option>
         <option value="3-3">Lube Maintenance Program</option>
         <option value="3-4">Problem Solving</option>
         <option value="3-5">Lube Technical Survey</option>
     </optgroup>

     <optgroup label="Academic Solution">
         <option value="4-1">Training</option>
     </optgroup>

 </select> -->


                                        <input class="form-control" id="objective"  name="objective" value="<?= $visit->objective ?>">

                                    </div>
                                    <div class="row no-margin-bottom">
                                        <div class="form-group col-xs-6 ">
                                            <label>Visit Date</label>
                                            <input type="text" class="form-control" name="vis_date" id="vis_date" value="<?= date('d-m-Y', strtotime($visit->vis_date)); ?>"/>
                                        </div>

                                        <div class="form-group col-xs-6 ">
                                            <label>Appointment Date</label>
                                            <input type="text" class="form-control " name="app_date" id="app_date" 
                                            <?php
                                            if ($visit->tentative == '1') {
                                                echo " disabled ";
                                                echo " value=''";
                                            } else {
                                                echo "value='" . date('d-m-Y', strtotime($visit->app_date)) . "'";
                                            }
                                            ?>
                                                   />
                                            <input type="checkbox" name="tentative" id="tentative" <?php if ($visit->tentative == '1') echo "checked" ?> /> 
                                            <label>Tentative</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Tech Services</label>
                                        <input class="form-control" id="team" name="team" value="<?= $visit->team ?>">
                                    </div>
                                    <div class="ckeditor form-group">
                                        <label>Detail</label>
                                        <textarea class="ckeditor form-control" rows="1" name="detail" >
                                            <?= $visit->detail ?>
                                        </textarea>
                                    </div>
                                    <div class="ckeditor form-group">
                                        <label>Problem Solutions</label>
                                        <textarea class="ckeditor form-control" rows="1" name="pro_sol">
                                            <?= $visit->pro_sol ?>
                                        </textarea>
                                    </div>
                                    <div class="ckeditor form-group">
                                        <label>Service</label>
                                        <textarea class="ckeditor form-control" rows="1" name="service">
                                            <?= $visit->service ?>
                                        </textarea>
                                    </div>
                                    <div class="ckeditor form-group">
                                        <label>Recommend Product</label>
                                        <textarea class="ckeditor form-control" rows="1" name="rec_pro">
                                            <?= $visit->rec_pro ?>
                                        </textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>รูปภาพที่เกี่ยวข้อง</label>
                                        <span id = "filemul">

                                            <?php
                                            foreach ($image as $key => $value) {

                                                echo "<div class=\"alert alert-info alert-dismissable no-margin-bottom\" style='margin-bottom:5px'>
                                                <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>
                                                " . $value->file_name . " <a href=\"#\" onclick=showpic('" . $value->link_img . "') class=\"alert-link\">showImage</a>."
                                                . "<input type='hidden' name='currentImage[]' value='$value->img_id'></div>";
                                                //echo "<p>$value->file_name</p>";
                                            }
                                            ?>
                                            <div class="hello form-group input-group no-margin-bottom"> 
                                                <input  class="form-control" type='file' name='uploadedimages[]' multiple='true'  placeholder="Username"><span class="input-group-addon"> <i class = "fa fa-minus-circle" ></i></span>
                                            </div>
                                        </span>
                                        <i class = "fa fa-2x fa-plus-square-o" onclick = "addFile()"></i>
                                    </div>

                                </div>
                                <div style="padding-top: 5px;padding-bottom: 5px" class="modal-footer no-margin " >
                                    <button type="submit" class="btn btn-success">Save</button>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal img-->
<div class="modal fade" id="slideShow" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">ภาพการตรวจเยี่ยม</h4>
            </div>
            <div class="modal-body">

                <div id="slide_stick">
                    <div>your content1</div>
                    <div>your content2</div>
                    <div>your content3</div>
                </div>

            </div>
        </div>
    </div>

</div>

<?php $this->load->view("newTemp/script"); ?>
<?php $this->load->view("newTemp/footer"); ?>
<script src="<?php echo base_url('asserts') ?>/jquery-ui-1.11.4.custom/jquery-ui.js"></script>
<script src="<?php echo base_url('asserts') ?>/js/date-uk.js"></script>
<script src="<?php echo base_url('asserts/js/bootstrap-datepicker.js') ?>"></script>
<script src="<?php echo base_url('asserts') ?>/js/tag-it.js" ></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('asserts') ?>/js/slick.js"></script>

<script>

                                            var dataavaliable = [];
                                            var objective = [];
                                            var indeximg = 1;
                                            $(document).ready(function () {
                                                $.getJSON("<?php echo base_url('index.php/TeamManager/getTeam') ?>", function (data) {
                                                    // alert(data);
                                                }).done(function (data) {
                                                    $.each(data, function (index, value) {
                                                        dataavaliable[index] = value.label;
                                                        //console.log(value.label);
                                                    });
                                                });
                                                $.getJSON("<?php echo base_url('index.php/ObjectiveControl/getObjective') ?>", function (data) {
                                                    console.log(data);
                                                }).done(function (data) {
                                                    console.log(data);
                                                    $.each(data, function (index, value) {
                                                        objective[index] = value.value;
                                                        //console.log(value.label);
                                                    });
                                                });
                                                $("#team").tagit({
                                                    availableTags: dataavaliable,
                                                    autocomplete: {delay: 0, minLength: 0}
                                                });
                                                $("#objective").tagit({
                                                    availableTags: objective,
                                                    autocomplete: {delay: 0, minLength: 0}
                                                });
                                                $('[data-toggle="popover"]').popover();
                                                $("#open-popover-link").popover({
                                                    html: true,
                                                    placement: "bottom",
                                                    content: function () {
                                                        return $('#my-popover-container').html();
                                                    },
                                                    // We specify a template in order to set a class (an ID is overwritten) to the popover for styling purposes
                                                    title: "Objective Info",
                                                    trigger: "click",
                                                });

                                                $('#slide_stick').slick({
                                                    dots: true,
                                                    infinite: true,
                                                    speed: 500,
                                                    fade: true,
                                                    cssEase: 'linear'
                                                });
                                            });
                                            var table = $('#company_table').DataTable({
                                                "dom": '<"top"l<"clear">>rt<"bottom"ip<"clear">>',
                                                // "dom": '<"top"l>t<"bottom"ip><"clear">',
                                                "aaSorting": [],
                                                "aoColumnDefs": // Sort Date
                                                        [
                                                            {"sType": "date-uk",
                                                                "aTargets": [1] // Taget column
                                                            }]
                                            });
                                            $('#vis_date').datepicker({
                                                format: "dd-mm-yyyy",
                                                endDate: "-",
                                                autoclose: true,
                                                todayHighlight: true
                                            });
                                            $('#app_date').datepicker({
                                                format: "dd-mm-yyyy",
                                                startDate: "-",
                                                autoclose: true,
                                                todayHighlight: true
                                            });
                                            table.on('click', 'tr', function () {
                                                /* get data onclick */
                                                var tr = $(this).closest('tr');
                                                var row = table.row(tr);
                                                var data = row.data();
                                                console.log(data[0]);
                                                window.location.href = "<?php echo base_url('index.php/CompanyManage/showHistory/') . "/" ?>" + data[0]
                                            });
                                            function addFile() {
                                                $('#filemul').append("<div id=\"image" + indeximg + "\" class = \'form-group hello input-group no-margin-bottom\'> ");

                                                $("#image" + indeximg).append("<input  class=\"form-control\" type=\"file\" name=\"uploadedimages[]\" multiple=\"true\"  placeholder=\"Username\"><span class=\"input-group-addon\"> <i class = \"fa fa-minus-circle\" onclick=\" deleteimg(" + indeximg + ")\"></i></span>");
                                                ++indeximg;
                                            }

                                            function deleteimg(id) {
                                                $("#image" + id).empty();
                                            }


                                            function showpic(filename) {

                                                var URL = "<?php echo base_url() . 'upload/' ?>";
                                                var content = "<img src='" + URL + filename + "'/>";
                                                $('#slide_stick').slick('unslick');
                                                $('#slide_stick').html(content);
                                                $('#slide_stick').slick({
                                                    autoplay: true,
                                                    autoplaySpeed: 5000,
                                                    arrows: false,
                                                    dots: true,
                                                    infinite: true,
                                                    speed: 800,
                                                    fade: true

                                                });
                                                $('#slideShow').modal('show');
                                            }

                                            $('.modal').on('shown.bs.modal', function (e) {
                                                $('#slide_stick').resize();
                                            });

                                            $("#tentative").on('click', function () {
                                                $("#app_date").val("");
                                                $("#app_date").prop('disabled', $("#tentative").prop('checked'));
                                                console.log($("#tentative").prop("checked"));
                                            });


</script>




