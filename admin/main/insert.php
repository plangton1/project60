<?php require './date.php';
$date = date("Y-m-d"); ?>
<form action="./main/insertsql.php" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="mode" value="insert_data">
    <div class="container">
        <div class="col-md-8">
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



            <button class="btn btn-primary" type="submit">ตกลง</button>

        </div>
    </div>
</form>
<?php require 'datepick.php'; ?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">