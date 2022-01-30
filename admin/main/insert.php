<?php require './date.php'; require 'insertsql.php';
$date = date("Y-m-d"); ?>
<form action="" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="mode" value="insert_data">
    <div class="container">
        <div class="col-md-8">
            <input type="text"  value="สถานะเริ่มต้น : รอดำเนินการ" class="form-control text-center" disabled>
            
            <p>วันที่เพิ่มเอกสาร<?php echo datethai($date); ?></p>  

            <div class="input-group">
                <input type="radio" name="main_source" onclick="document.getElementById('text').disabled=true" value="1">
                <p>วาระจากการประชุม</p>
                <input type="radio" name="main_source" value="2" onclick="document.getElementById('text').disabled=false">
                <p>จดหมาย สมอ.</p>
                <lable>จดหมายสอบถามสมอ.</lable>
                <input type="text" id="text" class="form-control" name="main_pick">
            </div>


            <div class="input-group">
                <p>วาระการประชุม</p>
                <input type="text" name="main_meet" class="form-control">
                <p>วันที่ประชุม</p>
                <input type="text" id="date1" name="main_day" class="form-control">
            </div>


            <!-- ตารางรอง(มีสถานะ) -->
            <section>
                <lable>เลขที่ มอก.</lable>
                <input type="text" name="main_num[]" id="main_num">
                <lable>ชื่อมาตรฐาน</lable>
                <input type="text" name="main_name[]" id="main_name">
            </section>
            <!-- ตารางรอง(มีสถานะ) -->


            <!-- หน่วยงานคู่แข่ง -->
            <section>
                <label>หน่วยงานคู่แข่ง</label>
                <a href="javascript:void(0)" onclick="add_element('m1','sub_m1');" class="btn btn-success">เพิ่ม</a>
                <div class="mt-3" id="m1">
                    <select class="form-control" name="agency_id[]" id="agency_id" style="height: unset !important;">
                        <option selected>หน่วยงานคู่แข่ง</option>
                        <?php $sql = "SELECT * FROM agency_tb";
                        $query = sqlsrv_query($conn, $sql);
                        while ($result = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC)) : ?>
                            <option value="<?php echo $result['agency_id']; ?>"><?php echo $result['agency_name']; ?></option>
                        <?php endwhile; ?>
                    </select>
                    <div style="display: none;">
                        <div class="row" id="sub_m1">
                            <div class="form-group mb-2 input-group mt-2">
                                <select class="form-control" name="agency_id[]" id="agency_id" style="height: unset !important;">
                                    <option selected>หน่วยงานคู่แข่ง</option>
                                    <?php $sql = "SELECT * FROM agency_tb";
                                    $query = sqlsrv_query($conn, $sql);
                                    while ($result = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC)) : ?>
                                        <option value="<?php echo $result['agency_id']; ?>"><?php echo $result['agency_name']; ?></option>
                                    <?php endwhile; ?>
                                </select>
                                <button type="button" onclick="$(this).parent().remove();" class="remove-btn btn btn-danger">ลบรายการ</button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- หน่วยงานคู่แข่ง -->


            <!-- หน่วยงานที่ขอ -->
            <section>
                <label>หน่วยงานที่ขอ</label>
                <a href="javascript:void(0)" onclick="add_element('m2','sub_m2');" class="btn btn-success">เพิ่ม</a>
                <div class="mt-3" id="m2">
                    <select class="form-control" name="dep_id[]" id="dep_id" style="height: unset !important;">
                        <option selected>หน่วยงานที่ขอ</option>
                        <?php $sql = "SELECT * FROM dep_tb";
                        $query = sqlsrv_query($conn, $sql);
                        while ($result = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC)) : ?>
                            <option value="<?php echo $result['dep_id']; ?>"><?php echo $result['dep_name']; ?></option>
                        <?php endwhile; ?>
                    </select>
                    <div style="display: none;">
                        <div class="row" id="sub_m2">
                            <div class="form-group mb-2 input-group mt-2">
                                <select class="form-control" name="dep_id[]" id="dep_id" style="height: unset !important;">
                                    <option selected>หน่วยงานที่ขอ</option>
                                    <?php $sql = "SELECT * FROM dep_tb";
                                    $query = sqlsrv_query($conn, $sql);
                                    while ($result = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC)) : ?>
                                        <option value="<?php echo $result['dep_id']; ?>"><?php echo $result['dep_name']; ?></option>
                                    <?php endwhile; ?>
                                </select>
                                <button type="button" onclick="$(this).parent().remove();" class="remove-btn btn btn-danger">ลบรายการ</button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- หน่วยงานที่ขอ -->


            <!-- ประเภทมาตรฐาน -->
            <section>
                <label>ประเภทมาตรฐาน</label>
                <a href="javascript:void(0)" onclick="add_element('m3','sub_m3');" class="btn btn-success">เพิ่ม</a>
                <div class="mt-3" id="m3">
                    <select class="form-control" name="type_id[]" id="type_id" style="height: unset !important;">
                        <option selected>ประเภทมาตรฐาน</option>
                        <?php $sql = "SELECT * FROM type_tb";
                        $query = sqlsrv_query($conn, $sql);
                        while ($result = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC)) : ?>
                            <option value="<?php echo $result['type_id']; ?>"><?php echo $result['type_name']; ?></option>
                        <?php endwhile; ?>
                    </select>
                    <div style="display: none;">
                        <div class="row" id="sub_m3">
                            <div class="form-group mb-2 input-group mt-2">
                                <select class="form-control" name="type_id[]" id="type_id" style="height: unset !important;">
                                    <option selected>ประเภทมาตรฐาน</option>
                                    <?php $sql = "SELECT * FROM type_tb";
                                    $query = sqlsrv_query($conn, $sql);
                                    while ($result = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC)) : ?>
                                        <option value="<?php echo $result['type_id']; ?>"><?php echo $result['type_name']; ?></option>
                                    <?php endwhile; ?>
                                </select>
                                <button type="button" onclick="$(this).parent().remove();" class="remove-btn btn btn-danger">ลบรายการ</button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- ประเภทมาตรฐาน -->


            <!-- กลุ่มผลิตภัณฑ์ -->
            <section>
                <label>กลุ่มผลิตภัณฑ์</label>
                <a href="javascript:void(0)" onclick="add_element('m4','sub_m4');" class="btn btn-success">เพิ่ม</a>
                <div class="mt-3" id="m4">
                    <select class="form-control" name="gg_id[]" id="gg_id" style="height: unset !important;">
                        <option selected>กลุ่มผลิตภัณฑ์</option>
                        <?php $sql = "SELECT * FROM gg_tb";
                        $query = sqlsrv_query($conn, $sql);
                        while ($result = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC)) : ?>
                            <option value="<?php echo $result['gg_id']; ?>"><?php echo $result['gg_name']; ?></option>
                        <?php endwhile; ?>
                    </select>
                    <div style="display: none;">
                        <div class="row" id="sub_m4">
                            <div class="form-group mb-2 input-group mt-2">
                                <select class="form-control" name="gg_id[]" id="gg_id" style="height: unset !important;">
                                    <option selected>กลุ่มผลิตภัณฑ์</option>
                                    <?php $sql = "SELECT * FROM gg_tb";
                                    $query = sqlsrv_query($conn, $sql);
                                    while ($result = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC)) : ?>
                                        <option value="<?php echo $result['gg_id']; ?>"><?php echo $result['gg_name']; ?></option>
                                    <?php endwhile; ?>
                                </select>
                                <button type="button" onclick="$(this).parent().remove();" class="remove-btn btn btn-danger">ลบรายการ</button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- กลุ่มผลิตภัณฑ์ -->


            <!-- ไฟล์ -->
            <section>
                <label>ไฟล์ที่ต้องการแนบ</label>
                <a href="javascript:void(0)" onclick="add_element('m5','sub_m5');" class="btn btn-success">เพิ่ม</a>
                <div class="mt-3" id="m5">
                    <input type="file" class="form-control" name="fileupload[]" id="fileupload" style="height: unset !important;">
                    <div style="display:none;">
                        <div class="row" id="sub_m5">
                            <div class="form-group mb-2 input-group mt-3">
                                <input type="file" class="form-control" name="fileupload[]" id="fileupload" style="height: unset !important;">
                                <button type="button" onclick="$(this).parent().remove();" class="remove-btn btn btn-danger ">ลบ</button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- ไฟล์ -->


            <button class="btn btn-primary" type="submit">ตกลง</button>


        </div>
    </div>
</form>
<?php require 'datepick.php'; ?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">