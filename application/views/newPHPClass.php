<?php $this->load->view("newTemp/head.php") ?>
<div class="app-container">
    <div class="row content-container">
        <?php $this->load->view("newTemp/navhead.php") ?>

        <?php $this->load->view("newTemp/navside.php") ?>

        <!-- Main Content -->
        <div class="container-fluid">
            <div class="side-body padding-top">

                <div class="row no-margin-bottom">

                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                <h4>Detail of Company  <span class="pull-right"><i class="fa fa-navicon" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" ></i></span></h4>
                            </div>

                            <div class="panel panel-default">
                                <div id="collapseOne" class="panel-collapse collapse in" aria-expanded="true">
                                    <table class="table table-bordered "> 
                                        <tr>
                                            <td class="field-label col-lg-1 col-xs-1 active">
                                                <label>id:</label>
                                            </td>
                                            <td >
                                                CUS001
                                            </td>
                                            <td class="field-label col-lg-1  col-xs-1 active">
                                                <label>COMPANY:</label>
                                            </td>
                                            <td >
                                                บริษัท 2 เอส เมทัล จำกัด (มหาชน)
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="field-label col-lg-1  col-xs-1 active">
                                                <label>AREA MANAGER:</label>
                                            </td>
                                            <td >
                                                พิเชต ราชเวียง (ขผ.)
                                            </td>
                                            <td class="field-label col-lg-1  col-xs-1 active">
                                                <label>Dealer:</label>
                                            </td>
                                            <td >
                                                บริษัท NGV Power จำกัด
                                            </td>

                                        </tr>
                                        <tr>
                                            <td class="field-label col-lg-1  col-xs-1 active">
                                                <label>Business:</label>
                                            </td>
                                            <td >
                                                ประกอบธุรกิจประเภทผลิตและจำหน่ายเหล็กรูปพรรณ เช่น เหล็กตัวซี ท่อเหล็ก เหล็กแผ่น ลวดตะแกรงเหล็ก
                                            </td>
                                            <td class="field-label col-lg-1  col-xs-1 active">
                                                <label>Address:</label>
                                            </td>
                                            <td >
                                                8/5 หมู่ที่ 14 ตำบลท่าช้าง อำเภอบางกล่ำ จังหวัดสงขลา 90110
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="field-label col-lg-1  col-xs-1 active">
                                                <label>PROCESS:</label>
                                            </td>
                                            <td >
                                                <p>1.ซื้อเหล็กแผ่นม้วน (Roll) ที่มีหน้ากว้างมาตัดให้หน้าแคบลง</p>
                                                <p>2.รีดผ่านลูกรีด เพื่อให้ได้เป็นเหล็กตัว C และท่อเหล็กตามที่ต้องการ</p>
                                            </td>
                                            <td class="field-label col-lg-1  col-xs-1 active">
                                                <label>MACHINE:</label>
                                            </td>
                                            <td >
                                                ชุดลูกรีดเหล็ก 4 ชุด
                                                เครื่องตัดเหล็กจากเหล็กหน้ากว่างให้เป็นเหล็กหน้าแคบ
                                            </td>
                                        </tr>
                                        <tr>

                                            <td class="field-label col-lg-1  col-xs-1 active">
                                                <label>Contact:</label>
                                            </td>
                                            <td >
                                                วรากร อารมณ์รัตน์ (วอ)
                                            </td>
                                            <td class="field-label col-lg-1  col-xs-1 active">

                                            </td>
                                            <td >

                                            </td>
                                        </tr>
                                    </table>

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
                                </h4>
                            </div>

                            <div class="panel-body">
                                <!-- Button trigger modal -->
                                <button class="btn btn-primary btn-lg pull-right" data-toggle="modal" data-target="#myModal">
                                    เพิ่มข้อมูลตรวจเยี่ยม
                                </button>
                                <p></p>
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Date</th>
                                            <th>detail</th>
                                            <th>Tech Services</th>
                                            <th>บริการที่เสนอ</th>
                                            <th>รูปภาพ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="odd gradeX">
                                            <td>1</td>
                                            <td>1/11/2015</td>
                                            <td>
                                                <p>ลูกค้าใช้ผลิตภัณฑ์ของ Total ชนิดที่ผสมแล้วเป็นน้ำนม (Milky) มีปริมาณการใช้งาน 7-8 ถัง 200 ลิตรต่อเดือน ลูกค้าจะมีการผสมน้ำมันกับน้ำ เพื่อเติมพร่องแทบทุกวัน </p>
                                                <p> จากการสังเกต พบว่ามีขี้โคลน สิ่งสกปรกสะสมในปริมาณมาก ซึ่งลูกค้าจะมีการหยุดการผลิตเพื่อทำความสะอาดทุกๆ วันอาทิตย์ </p>
                                                <p> tramp oil พบได้บ่อย ลค.มีการใช้กระชอนตักทิ้งอย่างสม่ำเสมอ</p>
                                            </td>
                                            <td>ชัยวัฒน์ ผลลูกอินทร์</td>

                                            <td >1.ทดสอบ used oil analysis หรือ onsite analysis ทุกๆ 6 เดือน</td>
                                            <td>
                                                <button class="btn btn-primary btn-default" data-toggle="modal" data-target="#slideShow">
                                                    รูปภาพ
                                                </button>
                                            </td>
                                        </tr>
                                        <tr class="odd gradeX">
                                            <td>2</td>
                                            <td>3/11/2015</td>
                                            <td>
                                                <b>เข้าพบเพื่อสำรวจลักษณะและความต้องการใช้งานเพื่อออกผลิตภัณฑ์ใหม่</b>
                                                <p>ขนาดบรรจุ 200 ลิตร ไม่พบการใช้งาน 18 ลิตร เนื่องจากลูกค้าซื้อเป็นขนาด 200 ลิตรไปเก็บไว้ แล้วจะทำการแบ่งเป็นถังย่อยๆ ถังละ 20 ลิตรเพื่อให้ลูกค้าแต่ละรายไปใช้งาน</p>
                                                <p> ปริมาณการใช้งาน 20 ถัง 200 ลิตรต่อเดือน ส่งให้ลูกค้าเอกชน / ส่งให้ลูกค้าราชการ</p>
                                                <p> มาตรฐานที่ต้องการ ไม่ได้ระบุชัดเจน จากการสังเกต ลูกค้าไม่ได้ต้องการมาตรฐานอะไรเป็นสำคัญ เพียงต้องการคุณภาพของน้ำมันที่เทียบเท่า CALTEX ARIES 320 ถ้าเป็นไปได้ ขอมาตรฐานเทียบเท่ากัน</p>
                                                <p> เกณฑ์ในการพิจารณาผลิตภัณฑ์ ROCK DRILL OIL ของ ปตท. คุณสมบัติต้องเทียบเท่า CALTEX ARIES 320 พิจารณาจากความหนืด และคุณภาพด้านอื่นๆ ถ้าน้ำมันที่ดี ใช้งานแล้วหัวเจาะจะทำงานได้อย่างสมดุล </p>
                                                <p> คู่มือ ไม่ได้รับ ลูกค้าไม่สะดวกให้คู่มือเครื่องจักรและอุปกรณ์</p>
                                                <p> ลักษณะของอุปกรณ์ หัวเจาะบ่อบาดาล ขนาดเส้นผ่าศูนย์กลาง 8 นิ้ว และ 10 นิ้ว</p>
                                                <p> น้ำมันตัวอย่างที่ต้องการสำหรับกระบวนการทดสอบ 20-40 ลิตร ลูกค้าจะดำเนินการทดสอบกับเครื่องเจาะบ่อน้ำบาดาลให้เอง</p>
                                                <p> ระยะเวลาที่ใช้ในการทดสอบ 1 สัปดาห์ขึ้นไป</p>

                                            </td>
                                            <td>ชัยวัฒน์ ผลลูกอินทร์</td>
                                            <td>
                                                <p>1.CALTEX ARIES 320 = PTT AIR TOOL EP 320 อยู่ระหว่างเตรียมตัวอย่างเพื่อส่งให้ลูกค้าทดสอบ</p>
                                                <p>2.CHEVRON MOLYTEX EP2 = PTT MOLY EP GREASE</p>
                                                <p>3.PTT HLP 68 ลูกค้าใช้งานผลิตภัณฑ์ของ ปตท. อยู่แล้ว</p>
                                            </td>

                                            <td> <button class="btn btn-primary btn-default" data-toggle="modal" data-target="#slideShow">
                                                    รูปภาพ
                                                </button></td>
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




<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">เพิ่มข้อมูลการตรวจเยี่ยม</h4>
            </div>
            <div class="modal-body">
                <form role="form" action="<?php echo base_url('index.php/DealerManager/updateDealer') ?>" method="post" enctype="multipart/form-data" >
                    <div class="form-group">
                        <label>Objective</label>
                        <input class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Date</label>
                        <input class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Next Date</label>
                        <input class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Detail</label>
                        <textarea class="form-control" rows="3">CURRENT PRODUCT</textarea>
                    </div>
                    <div class="form-group">
                        <label>Tech Services</label>
                        <input class="form-control">
                    </div>
                    <div class="form-group">
                        <label>บริการที่เสนอ</label>
                        <textarea class="form-control" rows="3">บริการที่เสนอ</textarea>
                    </div>
                    <div class="form-group">
                        <label>รูปภาพที่เกี่ยวข้อง</label>
                        <input type="file" name="uploadedimages[]" multiple="" class="form-control">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<!-- Modal img-->
<div class="modal fade" id="slideShow" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">รายละเอียดการตรวจเยี่ยม</h4>
            </div>
            <div class="modal-body">

                <div class="bs-example">
                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                        <!-- Carousel indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                            <li data-target="#myCarousel" data-slide-to="1"></li>
                            <li data-target="#myCarousel" data-slide-to="2"></li>
                        </ol>   
                        <!-- Wrapper for carousel items -->
                        <div class="carousel-inner">
                            <div class="item active">
                                <img src="http://www.tutorialrepublic.com/examples/images/slide1.png" alt="First Slide">
                            </div>
                            <div class="item">
                                <img src="http://www.tutorialrepublic.com/examples/images/slide2.png" alt="Second Slide">
                            </div>
                            <div class="item">
                                <img src="http://www.tutorialrepublic.com/examples/images/slide3.png" alt="Third Slide">
                            </div>
                        </div>
                        <!-- Carousel controls -->
                        <a class="carousel-control left" href="#myCarousel" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                        </a>
                        <a class="carousel-control right" href="#myCarousel" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right"></span>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>
<!-->


<?php $this->load->view("newTemp/script"); ?>
<?php $this->load->view("newTemp/footer"); ?>
<script src="<?php echo base_url('asserts') ?>/jquery-ui-1.11.4.custom/jquery-ui.js"></script>
<script src="<?php echo base_url('asserts') ?>/js/date-uk.js"></script>
<script src="<?php echo base_url('asserts/js/bootstrap-datepicker.js') ?>"></script>

<script>


    var table = $('#company_table').DataTable({
        "dom": '<"top"l<"clear">>rt<"bottom"ip<"clear">>',
        // "dom": '<"top"l>t<"bottom"ip><"clear">',
        "aaSorting": [],
        "aoColumnDefs": // Sort Date
                [
                    {"sType": "date-uk",
                        "aTargets": [4] // Taget column
                    }
                ]
    });

    $('.input-daterange').datepicker({
        format: "dd/mm/yyyy",
        endDate: "-",
        autoclose: true,
        todayHighlight: true
    });

    $('#dateSearch').on('click', function () {
        console.log($('#startDate').val());
        console.log($('#endDate').val());



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


    table.on('click', 'tr', function () {
        /* get data onclick */
        var tr = $(this).closest('tr');
        var row = table.row(tr);
        var data = row.data();
        console.log(data[0]);
        window.location.href = "<?php echo base_url('index.php/CompanyManage/showHistory/') . "/" ?>" + data[0]
    });


</script>




