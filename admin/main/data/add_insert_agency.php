<?php
$agency_id = (isset($_GET['agency_id'])) ? $_GET['agency_id'] : '';
$agency_name = (isset($_GET['agency_name'])) ? $_GET['agency_name'] : '';
if (isset($_POST) && !empty($_POST)) {
    $agency_id = $_POST['agency_id'];
    $agency_name = $_POST['agency_name'];
    $sql = "INSERT INTO agency_tb VALUES ('$agency_id','$agency_name') ";
    if (sqlsrv_query($conn, $sql)) {
        $alert = '<script type="text/javascript">';
        $alert .= 'alert("เพิ่มข้อมูลหน่วยงานสำเร็จ !!");';
        $alert .= 'window.location.href = "?page=add_agency";';
        $alert .= '</script>';
        echo $alert;
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . sqlsrv_errors($conn);
    }
    sqlsrv_close($conn);
}
?>
<form method="post" action="">
<section class="upcoming-meetings" id="meetings">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-heading">
                    <h2 class="font-mirt">เพิ่มข้อมูลกลุ่มผลิตภัณฑ์</h2>
                </div>
            </div>
        <div class="container card-regis font">


        <div class="container card-regis font">
            <form method="post" action="" >
                <hr>
                <br>
                <div class="">
                    <div>
                        <label> หมายเลขกลุ่ม </label>
                        <input type="text" name="agency_id" class="form-control" autocomplete="off">
                        <label> ชื่อกลุ่มผลิตภัณฑ์ </label>
                        <input type="text" name="agency_name" class="form-control" autocomplete="off">
                    </div>
                </div>
                <hr>
                <center>
                    <div class="bt">
                        <!-- <input type="checkbox" name="chkColor1" value="Red">กรุณายอมรับและเงื่อนไขสำหรับการสมัครสมาชิก -->
                        <!-- <button type="submit" class="btn btn-danger">รับรหัส otp</button> -->
                        <button type="submit" class="btn btn-info bt">เพิ่มข้อมูล</button>
                    </div>
                </center>
            </form>
        </div>

    </section>
</form>