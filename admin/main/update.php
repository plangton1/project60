<?php
require './date.php';
function datetodb($date)
{
    $day = substr($date, 0, 2);
    $month = substr($date, 3, 2);
    $year = substr($date, 6) - 543;
    $dateme = $year . '-' . $month . '-' . $day;
    return $dateme;
}
function datetodb3($date)
{
    $day = substr($date, 0, 2);
    $month = substr($date, 3, 2);
    $year = substr($date, 6) - 543;
    $dateme = $year . '-' . $month . '-' . $day;
    return $dateme;
}
if (isset($_GET['main_id']) && !empty($_GET['main_id'])) {
    $main_id = $_GET['main_id'];
    $sql = "SELECT * ,c.status_id,d.status_id,d.status_name AS name_status  FROM main_tb a JOIN sub_main b ON a.main_id = b.main_id JOIN dimen_status c ON b.main_id = c.main_id JOIN status_tb d ON c.status_id = d.status_id WHERE a.main_id =  " . $_REQUEST["main_id"];
    $query = sqlsrv_query($conn, $sql);
    $result = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC);
}

if (isset($_POST) && !empty($_POST)) {
    $main_meet = $_POST['main_meet'];
    $main_num = $_POST['main_num'];
    $main_note = $_POST['main_note'];
    $main_name = $_POST['main_name'];
    $old_status_id = $_POST['old_status_id'];
    $status_id = $_POST['status_id'];
    $status_update = datetodb3($_POST['status_update']);
    $date = date('Y-m-d');

    $sql = "UPDATE main_tb   SET main_meet = '$main_meet' WHERE main_id = '$main_id'";
    if ($query = sqlsrv_query($conn, $sql)) {
        $sql1 = "UPDATE sub_main   SET main_num = '$main_num' , main_note = '$main_note' , main_name = '$main_name' WHERE main_id =" . $result['main_id'] . "ORDER BY id_dimension_status desc";
        $query1 = sqlsrv_query($conn, $sql1);
        if ($old_status_id != $status_id) {
            $old_status_id = $_REQUEST['old_status_id'];
            $status_id = $_REQUEST['status_id'];
            $status_update = $_REQUEST['status_update'];
            $sql_status = "INSERT INTO dimen_status ( status_id , status_update , main_id)  VALUES ('$status_id', ' $status_update', '$main_id')";
            $stmt_status = sqlsrv_query($conn, $sql_status);
        }
    }
    // หน่วยงานที่ขอ
    $count_agency = count($_REQUEST['id_dimension_agency']);
    for ($i = 0; $i < $count_agency; $i++) {
        $id_dimension_agency = $_REQUEST['id_dimension_agency'][$i];
        $agency_id = $_REQUEST['agency_id'][$i];
        if ($id_dimension_agency != '' && $agency_id != '') {
            $sql4 = " UPDATE dimen_agency SET agency_id = '$agency_id' WHERE id_dimension_agency = '$id_dimension_agency'";
            $query4 = sqlsrv_query($conn, $sql4);
        } elseif ($id_dimension_agency == '' && $agency_id != '') {
            $sql44 = "INSERT INTO dimen_agency (main_id,agency_id) VALUES (?,?);";
            $query44 = array($main_id, $agency_id);
            $stmt4 = sqlsrv_query($conn, $sql44, $query44);
        }
    }
    // หน่วยงานที่ขอ


    // หน่วยงานคู่แข่ง
    $count_dep = count($_REQUEST['id_dimension_dep']);
    for ($i = 0; $i < $count_dep; $i++) {
        $id_dimension_dep = $_REQUEST['id_dimension_dep'][$i];
        $dep_id = $_REQUEST['dep_id'][$i];
        if ($id_dimension_dep != '' && $dep_id != '') {
            $sql5 = " UPDATE dimen_dep SET dep_id = '$dep_id' WHERE id_dimension_dep = '$id_dimension_dep'";
            $query5 = sqlsrv_query($conn, $sql5);
        } elseif ($id_dimension_dep == '' && $dep_id != '') {
            $sql55 = "INSERT INTO dimen_dep (main_id,dep_id) VALUES (?,?);";
            $query55 = array($main_id, $dep_id);
            $stmt5 = sqlsrv_query($conn, $sql55, $query55);
        }
    }
    // หน่วยงานคู่แข่ง

    // ประเภทมาตรฐาน
    $count_type = count($_REQUEST['id_dimension_type']);
    for ($i = 0; $i < $count_type; $i++) {
        $id_dimension_type = $_REQUEST['id_dimension_type'][$i];
        $type_id = $_REQUEST['type_id'][$i];
        if ($id_dimension_type != '' && $type_id != '') {
            $sql5 = " UPDATE dimen_type SET type_id = '$type_id' WHERE id_dimension_type = '$id_dimension_type'";
            $query5 = sqlsrv_query($conn, $sql5);
        } elseif ($id_dimension_type == '' && $type_id != '') {
            $sql55 = "INSERT INTO dimen_type (main_id,type_id) VALUES (?,?);";
            $query55 = array($main_id, $type_id);
            $stmt5 = sqlsrv_query($conn, $sql55, $query55);
        }
    }
    // ประเภทมาตรฐาน

    // กลุ่ม
    $count_gg = count($_REQUEST['id_dimension_gg']);
    for ($i = 0; $i < $count_gg; $i++) {
        $id_dimension_gg = $_REQUEST['id_dimension_gg'][$i];
        $gg_id = $_REQUEST['gg_id'][$i];
        if ($id_dimension_gg != '' && $gg_id != '') {
            $sql6 = " UPDATE dimen_gg SET gg_id = '$gg_id' WHERE id_dimension_gg = '$id_dimension_gg'";
            $query6 = sqlsrv_query($conn, $sql6);
        } elseif ($id_dimension_gg == '' && $gg_id != '') {
            $sql66 = "INSERT INTO dimen_gg (main_id,gg_id) VALUES (?,?);";
            $query66 = array($main_id, $gg_id);
            $stmt6 = sqlsrv_query($conn, $sql66, $query66);
        }
    }
    // กลุ่ม

    //ไฟล์
    $count_file = count($_REQUEST['id_dimension_file']);
    // print_r($_FILES['fileupload']);
    // print_r($_REQUEST['id_dimension_file']);
    for ($i = 0; $i < $count_file; $i++) {
        $id_dimension_file = $_REQUEST['id_dimension_file'][$i];
        $fileupload = $_FILES['fileupload']['name'][$i];
        if ($id_dimension_file != '' && $fileupload != '') {
            date_default_timezone_set("Asia/Bangkok");
            $date = date("Y-m-d");
            //เพิ่มไฟล์
            $upload = $_FILES['fileupload'];
            // print_r($upload);
            $count_upload = count($upload['name']);

            for ($i = 0; $i < $count_upload; $i++) {
                $file_name = $upload['name'][$i];
                $file_type = $upload['type'][$i];
                $file_tmp_name = $upload['tmp_name'][$i];
                $file_error = $upload['error'][$i];
                $file_size = $upload['size'][$i];

                // echo "<br> $i . $file_name ";

                if ($file_name != "") {   //not select file
                    //โฟลเดอร์ที่จะ upload file เข้าไป 
                    $path = "./main/fileupload/";

                    $numrand        = (mt_rand()); //สุ่มตัวเลข
                    //$path           = "userfile/"; //กำหนดpath ใหม่
                    $type           = strrchr($file_name, "."); //ดึงเฉพาะนามสกุลไฟล์
                    $newname        = $date .  $numrand . $type; //ตั้งชื่อใหม่เรียงวันที่ ตัวเลขที่สุม และนามสกุลไฟล์
                    $path_copy      = $path . $newname; //กำหนดpath
                    //$path_link      = "/fileupload/" . $newname; //กำหนดlink
                    echo $file_name;
                    // copy($fltem, $path_copy
                    copy($file_tmp_name, $path_copy); //คัดลอกไwล์

                    $sql_update_file = "UPDATE dimen_file SET fileupload = '$newname' WHERE id_dimension_file = '$id_dimension_file'";
                    $show_file = sqlsrv_query($conn, $sql_update_file);
                }
            }
        } elseif ($id_dimension_file == '' && $fileupload != '') {
            date_default_timezone_set("Asia/Bangkok");
            $date = date("Y-m-d");
            //เพิ่มไฟล์
            $upload = $_FILES['fileupload'];
            // print_r($upload);
            $count_upload = count($upload['name']);

            for ($i = 0; $i < $count_upload; $i++) {
                $file_name = $upload['name'][$i];
                $file_type = $upload['type'][$i];
                $file_tmp_name = $upload['tmp_name'][$i];
                $file_error = $upload['error'][$i];
                $file_size = $upload['size'][$i];

                // echo "<br> $i . $file_name ";

                if ($file_name != "") {   //not select file
                    //โฟลเดอร์ที่จะ upload file เข้าไป 
                    $path = "./main/fileupload/";

                    $numrand        = (mt_rand()); //สุ่มตัวเลข
                    //$path           = "userfile/"; //กำหนดpath ใหม่
                    $type           = strrchr($file_name, "."); //ดึงเฉพาะนามสกุลไฟล์
                    $newname        = $date .  $numrand . $type; //ตั้งชื่อใหม่เรียงวันที่ ตัวเลขที่สุม และนามสกุลไฟล์
                    $path_copy      = $path . $newname; //กำหนดpath
                    //$path_link      = "/fileupload/" . $newname; //กำหนดlink
                    echo $file_name;
                    // copy($fltem, $path_copy
                    copy($file_tmp_name, $path_copy); //คัดลอกไwล์

                    $sql_insert_file = "INSERT INTO dimension_file (fileupload , main_id , date_upload) 
                  VALUES ( '$newname' , '$main_id' , '$date')";
                    $insert_file = sqlsrv_query($conn, $sql_insert_file);
                }
            }
        }
    }
    //  ไฟล์
    if (sqlsrv_query($conn, $sql_insert_file)) {
        $alert = '<script type="text/javascript">';
        $alert .= 'alert("แก้ไขข้อมูลสำเร็จ !!");';
        $alert .= 'window.location.href = "?page=status";';
        $alert .= '</script>';
        echo $alert;
        exit();
    } else {
        echo "Error: " . $sql_insert_file . "<br>" . sqlsrv_errors($conn);
    }

    sqlsrv_close($conn);
}
?>


<form action="" method="POST" enctype="multipart/form-data">
    <div class="container">
        <div class="col-md-6">
            <!-- แยกตามที่มา -->
            <?php if ($result['main_source'] == 1) { ?>
                <lable>จากการประชุมวันที่ <?php echo DateThai($result['main_day']); ?></lable>
            <?php } ?>
            <?php if ($result['main_source'] == 2) { ?>
                <lable>จดหมายสอบถามสมอ</lable>
                <p><?php echo $result['main_pick']; ?>วันที่<?php echo $result['main_day']; ?></p>
            <?php } ?>
            <br>

            <?php $sql1 = "SELECT * ,a.status_id,b.status_id,b.status_name AS name_status FROM dimen_status a 
          JOIN status_tb b ON a.status_id = b.status_id WHERE a.main_id =" . $result['main_id'] . " ORDER BY a.id_dimension_status DESC";
            $query0 = sqlsrv_query($conn, $sql1);
            $result0 = sqlsrv_fetch_array($query0, SQLSRV_FETCH_ASSOC) ?>
            <lable>สถานะเดิมล่าสุด</lable>
            <p><?php echo $result0['name_status'] ?></p>
            <lable>วันที่เพิ่มสถานะเดิม</lable>
            <p><?php echo datethai($result0['status_update']) ?></p>


            <div class="form-group mb-2">
                <label for="">สถานะ</label>
                <select class="form-control" name="status_id" value="<?php echo $result['status_id'] ?>" style="height: unset !important;" required>
                    <?php $sqll = "SELECT * FROM status_tb";
                    $queryy = sqlsrv_query($conn, $sqll);
                    while ($result16 = sqlsrv_fetch_array($queryy, SQLSRV_FETCH_ASSOC)) { ?>
                        <?php if ($result['status_id'] == $result16['status_id']) {
                            $st_name = "selected";
                        } else {
                            $st_name = "";
                        } ?>
                        <option value="<?php echo $result16['status_id'];  ?>" <?php echo $st_name;  ?>>
                            <?php echo $result16['status_name'];  ?></option>
                    <?php } ?>
                </select>
                <input id="" type="hidden" name="old_status_id" class=" form-control" value="<?php echo $result['status_id'] ?>">
            </div>

            <lable>วันที่แต่งตั้งสถานะใหม่</lable>
            <input type="text" name="status_update" id="date3" class="form-control">
            <br>


            <label>หมายเหตุ</label>
            <input type="text" name="main_note" value="<?= $result['main_note']; ?>" class="form-control">
            <label>วาระจากการประชุม</label>
            <input type="text" name="main_meet" value="<?= $result['main_meet']; ?>" class="form-control">
            <label>ชื่อมาตรฐาน</label>
            <input type="text" name="main_name" value="<?= $result['main_name']; ?>" class="form-control">
            <label>เลขที่ มอก.</label>
            <input type="text" name="main_num" value="<?= $result['main_num']; ?>" class="form-control">
            <!-- เพิ่มหลายหน่วยงาน -->
            <?php require 'multiform/index.php'; ?>
            <!-- เพิ่มหลายหน่วยงาน -->
        </div>

        <button class="btn btn-primary" type="submit">บันทึกการแก้ไข</button>
    </div>
    </div>
</form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://รับเขียนโปรแกรม.net/picker_date/picker_date.js"></script>
<script src="https://use.fontawesome.com/releases/v5.7.2/js/all.js"></script>
<script>
    picker_date(document.getElementById("date1"), {
        year_range: "-12:+10"
    });
    picker_date(document.getElementById("date3"), {
        year_range: "-12:+10"
    });
</script>
<!-- date -->