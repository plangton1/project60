<?php
function datetodb($date)
//    23/04/2564
{
    $day = substr($date, 0, 2); // substrตัดข้อความที่เป็นสติง
    $month = substr($date, 3, 2); //ตัดตำแหน่ง
    $year = substr($date, 6) - 543;
    $dateme = $year . '-' . $month . '-' . $day;
    return $dateme; //return ส่งค่ากลับไป
}
?>
<?php
require './connection.php';
$date = date("Y-m-d");
$mode = @$_REQUEST["mode"];
if ($mode == "insert_data") {
    // main_tb
    $main_meet = $_REQUEST['main_meet'];
    $main_source = $_REQUEST['main_source'];
    $main_day = datetodb($_REQUEST['main_day']);
    if ($_REQUEST["main_pick"] != "") {
        $main_pick = ($_REQUEST["main_pick"]);
   } else {
       $main_pick = "";
   }

    // multiple form
    $agency_id = empty($_REQUEST["agency_id"]) ? [] : $_REQUEST['agency_id'];
    $dep_id = empty($_REQUEST["dep_id"]) ? [] : $_REQUEST['dep_id'];
    $type_id = empty($_REQUEST["type_id"]) ? [] : $_REQUEST['type_id'];
    $gg_id = empty($_REQUEST["gg_id"]) ? [] : $_REQUEST['gg_id'];
    
    // sub_main
    $main_name = $_REQUEST['main_name'];
    $main_num = $_REQUEST['main_num'];

    // dimenstatus
        $status_id = ($_REQUEST["status_id"]);

    $sql = "INSERT INTO main_tb (main_meet , main_source , main_create , main_pick , main_day) VALUES ( '$main_meet' ,'$main_source' , '$date' , '$main_pick' ,'$main_day') ";
    $query = sqlsrv_query($conn, $sql);

    $sqlmaxid = "SELECT @@IDENTITY AS 'Maxid'";
    $querymax = sqlsrv_query($conn, $sqlmaxid);
    $resultMaxid = sqlsrv_fetch_array($querymax, SQLSRV_FETCH_ASSOC);
    $main_id =  $resultMaxid['Maxid'];

    $sql0 = "INSERT INTO dimen_status (status_id , main_id , status_update) VALUES ('7' , '$main_id' , '$date')" ; 
    $query0 = sqlsrv_query($conn , $sql0);
    
    $countagency = count($agency_id);
    for($i = 0 ; $i < $countagency ; $i++){
        $agencyid = $agency_id[$i];
        if(trim($agencyid) <> "" ){
            $sql1 = "INSERT INTO dimen_agency (agency_id , main_id) VALUES ('$agencyid' , '$main_id')" ; 
            $query1 = sqlsrv_query($conn , $sql1);
        }
    }

    $countmain_name = count($main_name);
    for($i = 0 ; $i < $countmain_name ; $i++){
        $main_name = $main_name[$i];
        $main_num = $main_num[$i];
        if(trim($main_name) <> "" ){
            $sql2 = "INSERT INTO sub_main (main_name , main_id , main_num , main_status , main_update ) VALUES ('$main_name' , '$main_id' , '$main_num' , '7' , 'ยังไม่ได้ระบุสถานะ')" ; 
            $query2 = sqlsrv_query($conn , $sql2);
        }
    }

    $countdepid = count($dep_id);
    for($i = 0 ; $i < $countdepid ; $i++){
        $depid = $dep_id[$i];
        if(trim($depid) <> "" ){
            $sql3 = "INSERT INTO dimen_dep (dep_id , main_id ) VALUES ('$depid' , '$main_id')" ; 
            $query3 = sqlsrv_query($conn , $sql3);
        }
    }

    $counttype = count($type_id);
    for($i = 0 ; $i < $counttype ; $i++){
        $type = $type_id[$i];
        if(trim($type) <> "" ){
            $sql4 = "INSERT INTO dimen_type (type_id , main_id ) VALUES ('$type' , '$main_id')" ; 
            $query4 = sqlsrv_query($conn , $sql4);
        }
    }

    $countgg = count($gg_id);
    for($i = 0 ; $i < $countgg ; $i++){
        $gg = $gg_id[$i];
        if(trim($gg) <> "" ){
            $sql4 = "INSERT INTO dimen_gg (gg_id , main_id ) VALUES ('$gg' , '$main_id')" ; 
            $query4 = sqlsrv_query($conn , $sql4);
        }
    }

    date_default_timezone_set("Asia/Bangkok");
    $date = date("Y-m-d");
    $upload = $_FILES['fileupload'];
    $count_upload = count($upload['name']);
    for ($i = 0; $i < $count_upload; $i++) {
        $file_name = $upload['name'][$i];
        $file_type = $upload['type'][$i];
        $file_tmp_name = $upload['tmp_name'][$i];
        $file_error = $upload['error'][$i];
        $file_size = $upload['size'][$i];
        if ($file_name != "") {  
            $path = "./fileupload/";
            $numrand        = (mt_rand()); //สุ่มตัวเลข
            $type           = strrchr($file_name, "."); //ดึงเฉพาะนามสกุลไฟล์
            $newname        = $date .  $numrand . $type; //ตั้งชื่อใหม่เรียงวันที่ ตัวเลขที่สุม และนามสกุลไฟล์
            $path_copy      = $path . $newname; //กำหนดpath
            echo $file_name;
            copy($file_tmp_name, $path_copy); //คัดลอกไwล์
            $sql_insert_file = "INSERT INTO dimen_file (fileupload , main_id , date_upload) 
                    VALUES ( '$newname' , '$main_id' , '$date')";
        }
    }

    if (sqlsrv_query($conn, $sql_insert_file)) {
        $alert = '<script type="text/javascript">';
        $alert .= 'alert("เพิ่มข้อมูลเอกสารสำเร็จ !!");';
        $alert .= 'window.location.href = "?page=status";';
        $alert .= '</script>';
        echo $alert;
        exit();;
    } else {
        echo "Error: " . $sql_insert_file . "<br>" . sqlsrv_errors($conn);
    }   
    sqlsrv_close($conn);
}

