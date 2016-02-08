<?php $this->load->view("newTemp/head.php") ?>
<div class="app-container">
    <div class="row content-container">
        <?php $this->load->view("newTemp/navhead.php") ?>

        <?php $this->load->view("newTemp/navside.php") ?>

        <link rel="stylesheet" type="text/css" href="<?php echo base_url('asserts') ?>/css/slick.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('asserts') ?>/css/slick-theme.css">
        <!-- Main Content -->
        <div class="container-fluid">
            <div class="side-body padding-top">

                <div class="row no-margin-bottom">

                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                <h4>Detail of Company  
                                    <span class="pull-right">
                                        <i class="fa fa-navicon" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" ></i>
                                        <a href="<?php echo base_url('index.php/CompanyManage/Visitor') ?>" ><i class="fa fa-close fa-fw" style="color: black"></i></a> 
                                    </span></h4>
                            </div>

                            <div class="panel panel-default">
                                <div id="collapseOne" class="row panel-collapse collapse in" aria-expanded="true">

                                    <div class="col-lg-12 " style="padding-right: 15px;margin-bottom: 0px">
                                        <table class="table table-bordered "> 
                                            <tr>
                                                <td class="field-label  active" style="width: 7%">
                                                    <label>Com_code:</label>
                                                </td>
                                                <td  class="field-label " style="width: 38%">
                                                    <?= $company->company_code ?>
                                                </td>

                                                <td class="field-label  active" style="width: 10%">
                                                    <label>Area Manager:</label>
                                                </td>
                                                <td class="field-label  " style="width: 38%" >
                                                    <?= $area_ma->name ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="field-label  active">
                                                    <label>Company:</label>
                                                </td>
                                                <td >
                                                    <?= $company->name ?>
                                                </td>

                                                <td class="field-label  active">
                                                    <label>Dealer:</label>
                                                </td>
                                                <td >
                                                    <?= $dealer->name ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="field-label  active">
                                                    <label>Address:</label>
                                                </td>
                                                <td >
                                                    <?= $company->address ?>
                                                </td>

                                                <td class="field-label  active">
                                                    <label>Dealer Contact:</label>
                                                </td>
                                                <td >
                                                    <?= $company->d_contact ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="field-label  active">
                                                    <label>Business:</label>
                                                </td>
                                                <td >
                                                    <?= $company->business ?>
                                                </td>
                                                <td class="field-label active">
                                                    <label>Customer Contact:</label>
                                                </td>
                                                <td >
                                                    <?php
                                                    $text = str_replace(',', "<br>", $company->c_contact);
                                                    echo $text;
                                                    ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="field-label  active">
                                                    <label>Map:</label>
                                                </td>
                                                <td >
                                                    <a href=" <?= $company->map ?>" target="_blank" >Map Link</a>

                                                </td>
                                                <td class="field-label active">
                                                    <label>Type:</label>
                                                </td>
                                                <td >
                                                 
                                                     <?php
                                                    $text = str_replace(',', "<br>", $company->type);
                                                    $text = str_replace('A', "Automotive (A)", $text);
                                                    $text = str_replace('I', "Industrial (I)", $text);
                                                     $text = str_replace('S', "Specialty (S)", $text);

                                                    echo $text;
                                                    ?>
                                                </td>
                                            </tr>
                                            <tr>


                                                <td class="field-label  active">
                                                    <label>Process:</label>
                                                </td>
                                                <td >
                                                    <?= $company->process ?>
                                                </td>


                                                <td class="field-label  active">
                                                    <label>Machine:</label>
                                                </td>
                                                <td >
                                                    <?= $company->machine ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="field-label  active">
                                                    <label>Background:</label>
                                                </td>
                                                <td >
                                                    <?= $company->background ?>
                                                </td>

                                                <td class="field-label  active">
                                                    <label>Current Product:</label>
                                                </td>
                                                <td >
                                                    <?= $company->current_product ?>
                                                </td>
                                            </tr>
                                        </table>

                                    </div>

                                    <div class="col-lg-6 no-margin-bottom" style="padding-left: 0px;margin-bottom: 0px">


                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row no-padding">

                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="panel panel-info">

                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    Show History

                                    <span class="pull-right">


                                        <a style="color: black" href="<?php echo base_url() . "index.php/CompanyManage/addHistoryform" . "/" . $company->company_id ?>">
                                            <i class="fa fa-plus-circle"></i> New Inspection
                                        </a>
                                    </span>
                                </h4>
                            </div>

                            <div class="panel-body">
                                <!-- Button trigger modal -->


                                <div class="col-lg-12 col-md-12 pull-right form-inline">
                                    <span class="pull-right">
                                        <div class="btn-group btn-group-sm pull-right" role="group" >
                                            <button type="button" class="btn btn-info" onclick="showExcel()">Excel</button>


                                        </div>
                                    </span>
                                </div>

                                <table class="table table-striped table-bordered table-hover" id="company_table">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px"></th>
                                            <th>Visit Date</th>
                                            <th>Tech Services</th>
                                            <th>Detail</th>
                                            <th>Problem Solutions</th>
                                            <th>Offer Service</th>
                                            <th>Objective</th>
                                            <th >control</th>
                                            <th >rec_pro</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        foreach ($visit as $key => $value) {
                                            ?>
                                            <tr class="odd gradeX">
                                                <td class="text-center"><input type="checkbox" value="<?= $value->vis_id ?>"></td>

                                                <td><?= date('d-m-Y', strtotime($value->vis_date)); ?></td>

                                                <td>
                                                    <?php
                                                    foreach (explode(",", $value->team) as $key1 => $value1) {
                                                        echo "<p>$value1</p>";
                                                    }
                                                    ?>

                                                </td>

                                                <td> <?= $value->detail ?></td>
                                                <td > <?= $value->pro_sol ?></td>
                                                <td > <?= $value->service ?></td>
                                                <td > <?= $value->objective ?></td>
                                                <td >
                                                    <div class="btn-group">
                                                        <button type="button" class="btn-xs btn btn-info dropdown-toggle" data-toggle="dropdown" aria-expanded="false">more <span class="caret"></span></button>
                                                        <ul class="pull-right dropdown-menu" role="menu">
                                                            <li><a href="#" onclick="showInfo('<?= $value->vis_id ?>')">information</a></li>
                                                            <li><a href="#" onclick="showpic('<?= $value->vis_id ?>')">Image</a></li>
                                                            <li><a href="#" onclick="showrec_pro('<?= $value->vis_id ?>')"> Recommended Product</a></li>
                                                        </ul>
                                                    </div>
                                                </td>
                                                <td>
                                                    <?= $value->rec_pro ?>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
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

                        <div id="slide_stick" >
                            <div>your content1</div>
                            <div>your content2</div>
                            <div>your content3</div>
                        </div>

                    </div>
                </div>
            </div>

        </div>

        <!-- Modal Recomemnt-->
        <div class="modal fade modal-info" id="Reccommend" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <h4 class="modal-title">Recommend Product</h4>
                    </div>
                    <div class="modal-body" id="content_rec">

                    </div>

                </div>
            </div>
        </div>




        <?php $this->load->view("newTemp/script"); ?>
        <?php $this->load->view("newTemp/footer"); ?>
        <script src="<?php echo base_url('asserts') ?>/jquery-ui-1.11.4.custom/jquery-ui.js"></script>
        <script src="<?php echo base_url('asserts') ?>/js/date-uk.js"></script>
        <script src="<?php echo base_url('asserts/js/bootstrap-datepicker.js') ?>"></script>
        <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url('asserts') ?>/js/slick.js"></script>

        <script>

                                                            $(document).ready(function () {
                                                                $('#slide_stick').slick({
                                                                    dots: true,
                                                                    infinite: true,
                                                                    speed: 500,
                                                                    fade: true,
                                                                    cssEase: 'linear'
                                                                });

                                                                $('[data-toggle="popover"]').popover({
                                                                    html: true,
                                                                    content: function () {
                                                                        return $('#popoverExampleTwoHiddenContent').html();
                                                                    },
                                                                    title: function () {
                                                                        return $('#popoverExampleTwoHiddenTitle').html();
                                                                    }
                                                                });
                                                            });

                                                            $("#team").autocomplete({
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

                                                            var table = $('#company_table').DataTable({
                                                                "dom": '<"top"l<"clear">>rt<"bottom"ip<"clear">>',
                                                                // "dom": '<"top"l>t<"bottom"ip><"clear">',
                                                                //dom: 'Bfrtip',

                                                                "aaSorting": [],
                                                                "aoColumnDefs": // Sort Date
                                                                        [
                                                                            {
                                                                                "sType": "date-uk",
                                                                                "aTargets": [1],
                                                                                "sWidth": "8%"
                                                                            },
                                                                            {
                                                                                "aTargets": [3, 4, 5],
                                                                                "width": "23%"
                                                                            },
                                                                            {
                                                                                bSortable: false,
                                                                                "aTargets": [0],
                                                                                "width": "1%"
                                                                            },
                                                                            {
                                                                                bSortable: false,
                                                                                "aTargets": [7],
                                                                                "width": "5%"
                                                                            },
                                                                            {
                                                                                "bVisible": false,
                                                                                bSortable: false,
                                                                                "aTargets": [8],
                                                                            },
                                                                        ]
                                                            });
                                                            $('#vis_date').datepicker({
                                                                format: "dd/mm/yyyy",
                                                                endDate: "-",
                                                                autoclose: true,
                                                                todayHighlight: true
                                                            });
                                                            $('#app_date').datepicker({
                                                                format: "dd/mm/yyyy",
                                                                startDate: "-",
                                                                autoclose: true,
                                                                todayHighlight: true
                                                            });

                                                            function showExcel() {
                                                                var searchIDs = $(':checkbox:checked').map(function () {
                                                                    return $(this).val();
                                                                }).get();
                                                                console.log(searchIDs);
                                                                var stringValue = "";
                                                                searchIDs.forEach(function (entry) {
                                                                    stringValue += "-" + entry;
                                                                });
                                                                stringValue = stringValue.substring(1, stringValue.length);

                                                                // console.log("<?php echo base_url('index.php/ReportController/testSendArray/') . "/" ?>" + stringValue);

                                                                window.location.href = "<?php echo base_url('index.php/ReportController/reportToExcel/') . "/" ?>" + stringValue;
                                                            }

                                                            function showInfo(id) {
                                                                window.location.href = "<?php echo base_url('index.php/CompanyManage/showVisitDetail/') . "/" ?>" + id;
                                                            }


                                                            function showpic(id) {
                                                                var URL = "<?php echo base_url() . 'index.php/CompanyManage/getimage' ?>";
                                                                var formData = {"vis_id": id}
                                                                $.post(URL, formData, function (data) {
                                                                    var data_json = jQuery.parseJSON(data);
                                                                    $('#slide_stick').slick('unslick');

                                                                    $('#slide_stick').html('');
                                                                    for (index = 0, len = data_json.length; index < len; ++index) {
                                                                        data = data_json[index].link_img;
                                                                        //$('#slide_stick').slick('slickAdd', '<img src=' + data + '>');

                                                                        $('#slide_stick').append("<div><img src='<?php echo base_url() ?>/upload/" + data + "' class='center-block'> </div>");
                                                                        // console.log("<div class='item'><img src='" + data + "'> </div>");

                                                                    }
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
                                                                    }).fail(function (jqXHR, textStatus, errorThrown) {

                                                                 });


                                                            }

                                                            function showrec_pro(id) {
                                                                var URL = "<?php echo base_url() . 'index.php/VisitController/getRecPro' ?>";
                                                                var formData = {"vis_id": id}
                                                                $.post(URL, formData, function (data) {
                                                                    var data_json = jQuery.parseJSON(data);
                                                                    //console.log(data);
                                                                    console.log(data_json[0].rec_pro);
                                                                    $('#content_rec').html(data_json[0].rec_pro);
                                                                    $('#Reccommend').modal('show');
                                                                    }).fail(function (jqXHR, textStatus, errorThrown) {

                                                                 });

                                                            }
                                                            $('.modal').on('shown.bs.modal', function (e) {
                                                                $('#slide_stick').resize();
                                                            });



        </script>




