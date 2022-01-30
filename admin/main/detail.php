<?php
if (isset($_GET['main_id']) && !empty($_GET['main_id'])) {
    $main_id = $_GET['main_id'];
    $sql = ("SELECT * , a.main_source,c.source_id,c.source_name AS name_source 
    FROM main_tb a JOIN sub_main b ON a.main_id = b.main_id JOIN source_tb c ON a.main_source = c.source_id WHERE a.main_id = '$main_id'");
    $query = sqlsrv_query($conn, $sql);
    $result = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC);

    $sql1 = "SELECT *, b.status_id,c.status_id,c.status_name AS name_status 
     FROM sub_main a JOIN dimen_status b ON a.main_id = b.main_id JOIN status_tb c ON b.status_id = c.status_id WHERE a.main_id =" .$result['main_id']."ORDER BY id_dimension_status desc";
    $query1 = sqlsrv_query($conn, $sql1);
    $result1 = sqlsrv_fetch_array($query1, SQLSRV_FETCH_ASSOC);
}
?>
<form action method="post" enctype="multiple/formm-data">
    <div align="right">
        <a href="?page=<?= $_GET['page'] ?>&function=update&main_id=<?= $result['main_id'] ?>" class="btn btn-warning">แก้ไขข้อมูลสถานะ</a>

        <a href="?page=<?= $_GET['page'] ?>&function=print&main_id=<?= $result['main_id'] ?>"
        onclick="return confirm('คุณต้องการพิมพ์เอกสารนี้ : <?= $result['main_num'] ?> หรือไม่ ??')"
         class="btn btn-sm btn-success text-white" style="font-size:20px;">พิมพ์รายงาน</a>

        <a href="?page=<?= $_GET['page'] ?>&function=delete&main_id=<?= $result['main_id'] ?>"
        onclick="return confirm('คุณต้องการลบเอกสารนี้ : <?= $result['main_num'] ?> หรือไม่ ??')"
        class="btn btn-sm btn-danger"style="font-size:20px;">ลบเอกสาร</a>

        <a class="btn btn-sm text-white" style="background-color:black; font-size:20px;"
        onclick="window.history.go(-1); return false;">ย้อนกลับ</a>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-6">
            <lable>สถานะล่าสุด</lable>
                <?php echo $result1['name_status'] ?><br>
            <lable>ที่มาของเอกสาร</lable>
            <?php if($result['main_source'] == 2){ ?>
                <?php echo $result['name_source']  .'ชื่อ'. $result['main_pick']  .'วันที่'. $result['main_day'] ?><br>
            <?php } ?> 
            <?php if($result['main_source'] == 1){ ?>
                <?php echo $result['name_source']  .'วันที่'. $result['main_day'] ?><br>
            <?php } ?> 
                <lable>เลขที่ มอก.</lable>
                <?php echo $result['main_num'] ?><br>
                <lable>ชื่อมาตรฐาน</lable>
                <?php echo $result['main_name'] ?><br>
                <lable>ประเภทมาตรฐาน</lable>
                <?php
                $mainid = $_REQUEST['main_id'];
                $sql = "SELECT * FROM dimen_type WHERE main_id  = '$mainid' ";
                $query1 = sqlsrv_query($conn, $sql);
                while ($result = sqlsrv_fetch_array($query1, SQLSRV_FETCH_ASSOC)) { ?>
                    <?php $type =  $result['type_id']; ?>
                    <select class="form-control" name="type_id[]" id="type_id" style="height: unset !important;" disabled>
                        <option value="">กรุณาเลือกกลุ่มผลิตภัณฑ์</option>
                        <?php
                        $sql2 = "SELECT * FROM type_tb";
                        $query2 = sqlsrv_query($conn, $sql2);
                        while ($result2 = sqlsrv_fetch_array($query2, SQLSRV_FETCH_ASSOC)) {
                            $type2 =  $result2['type_id'];
                            if ($type == $type2) {
                                $c = "selected";
                            } else {
                                $c = "";
                            }
                        ?>

                            <option value="<?php echo $result2['type_id'];  ?>" <?php echo $c; ?>>
                                <?php echo $result2['type_name']; ?></option>
                        <?php } ?>
                    </select>
                <?php } ?>
                <lable>กลุ่มผลิตภัณฑ์</lable>
                <?php
                $mainid = $_REQUEST['main_id'];
                $sql = "SELECT * FROM dimen_gg WHERE main_id  = '$mainid' ";
                $query1 = sqlsrv_query($conn, $sql);
                while ($result = sqlsrv_fetch_array($query1, SQLSRV_FETCH_ASSOC)) { ?>
                    <?php $gg =  $result['gg_id']; ?>
                    <select class="form-control" name="gg_id[]" id="gg_id" style="height: unset !important;" disabled>
                        <option value="">กรุณาเลือกกลุ่มผลิตภัณฑ์</option>
                        <?php
                        $sql2 = "SELECT * FROM gg_tb";
                        $query2 = sqlsrv_query($conn, $sql2);
                        while ($result2 = sqlsrv_fetch_array($query2, SQLSRV_FETCH_ASSOC)) {
                            $gg2 =  $result2['gg_id'];
                            if ($gg == $gg2) {
                                $c = "selected";
                            } else {
                                $c = "";
                            }
                        ?>

                            <option value="<?php echo $result2['gg_id'];  ?>" <?php echo $c; ?>>
                                <?php echo $result2['gg_name']; ?></option>
                        <?php } ?>
                    </select>
                <?php } ?>
                <lable>ไฟล์แนบ</lable>
                <?php
                $i = 1;
                $mainid = $_REQUEST['main_id'];
                $sql5 = "SELECT * FROM dimen_file WHERE main_id  = '$mainid' ";
                $query5 = sqlsrv_query($conn, $sql5);
                while ($result5 = sqlsrv_fetch_array($query5, SQLSRV_FETCH_ASSOC)) { ?>
                    <a href='./main/fileupload/<?= $result5['fileupload']; ?>'>
                        <?php echo $i++ . ")" . $result5['fileupload']; ?>
                        <br>
                    </a>
                <?php } ?>

            
                <lable>หน่วยงานที่ขอ</lable>
                <?php
                $mainid = $_REQUEST['main_id'];
                $sql = "SELECT * FROM dimen_dep WHERE main_id  = '$mainid' ";
                $query1 = sqlsrv_query($conn, $sql);
                while ($result = sqlsrv_fetch_array($query1, SQLSRV_FETCH_ASSOC)) { ?>
                    <?php $dep =  $result['dep_id']; ?>
                    <select class="form-control" name="dep_id[]" id="dep_id" style="height: unset !important;" disabled>
                        <option value="">กรุณาเลือกกลุ่มผลิตภัณฑ์</option>
                        <?php
                        $sql2 = "SELECT * FROM dep_tb";
                        $query2 = sqlsrv_query($conn, $sql2);
                        while ($result2 = sqlsrv_fetch_array($query2, SQLSRV_FETCH_ASSOC)) {
                            $dep2 =  $result2['dep_id'];
                            if ($dep == $dep2) {
                                $c = "selected";
                            } else {
                                $c = "";
                            }
                        ?>

                            <option value="<?php echo $result2['dep_id'];  ?>" <?php echo $c; ?>>
                                <?php echo $result2['dep_name']; ?></option>
                        <?php } ?>
                    </select>
                <?php } ?>
                <lable>หน่วยงานคู่แข่ง</lable>
                <?php
                $mainid = $_REQUEST['main_id'];
                $sql = "SELECT * FROM dimen_agency WHERE main_id  = '$mainid' ";
                $query1 = sqlsrv_query($conn, $sql);
                while ($result = sqlsrv_fetch_array($query1, SQLSRV_FETCH_ASSOC)) { ?>
                    <?php $agency =  $result['agency_id']; ?>
                    <select class="form-control" name="agency_id[]" id="agency_id" style="height: unset !important;" disabled>
                        <option value="">กรุณาเลือกกลุ่มผลิตภัณฑ์</option>
                        <?php
                        $sql2 = "SELECT * FROM agency_tb";
                        $query2 = sqlsrv_query($conn, $sql2);
                        while ($result2 = sqlsrv_fetch_array($query2, SQLSRV_FETCH_ASSOC)) {
                            $agency2 =  $result2['agency_id'];
                            if ($agency == $agency2) {
                                $c = "selected";
                            } else {
                                $c = "";
                            }
                        ?>

                            <option value="<?php echo $result2['agency_id'];  ?>" <?php echo $c; ?>>
                                <?php echo $result2['agency_name']; ?></option>
                        <?php } ?>
                    </select>
                <?php } ?>
                <lable>หมายเหตุ</lable>
                <?php echo $result['main_source'] ?><br>
            </div>
        </div>
    </div>
</form>