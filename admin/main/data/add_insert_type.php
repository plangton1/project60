<?php
$status_id = (isset($_GET['status_id'])) ? $_GET['status_id'] : '';
$status_name = (isset($_GET['status_name'])) ? $_GET['status_name'] : '';
if (isset($_POST) && !empty($_POST)) {
    $status_id = $_POST['status_id'];
    $status_name = $_POST['status_name'];
    $sql = "INSERT INTO status_tb VALUES (?,?) ";
    $params = array($status_id , $status_name);
    $sss = sqlsrv_query($conn, $sql, $params);
    if ($sss = true) {
        $alert = '<script type="text/javascript">';
        $alert .= 'alert("เพิ่มข้อมูลสถานะสำเร็จ !!");';
        $alert .= 'window.location.href = "?page=add_type";';
    
        $alert .= '</script>';
        echo $alert;
        exit();;
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
                    <h2 class="font-mirt">เพิ่มข้อมูลสถานะ</h2>
                </div>
            </div>
        <div class="container card-regis font">


            <hr>
            <br>
            <div class="">
                <div>
                    <label>หมายเลขสถานะ</label>
                    <input  type="text" name="status_id" class="form-control" autocomplete="off">
                    <label >ชื่อสถานะ</label>
                    <input type="text" name="status_name" class="form-control" autocomplete="off">
                </div>
            </div>
            <hr>
            <center>
                <div class="bt">
                    <button type="submit" class="btn btn-info bt">เพิ่มข้อมูล</button>
                </div>
            </center>
</form>
</div>



</section>