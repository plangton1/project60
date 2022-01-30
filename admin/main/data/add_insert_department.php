<?php
$dep_id = (isset($_GET['dep_id'])) ? $_GET['dep_id'] : '';
$dep_name = (isset($_GET['dep_name'])) ? $_GET['dep_name'] : '';
if (isset($_POST) && !empty($_POST)) {
    $dep_id = $_POST['dep_id'];
    $dep_name = $_POST['dep_name'];
    $sql = "INSERT INTO dep_tb VALUES (?,?) ";
    $params = array( $dep_id,$dep_name);
    if (sqlsrv_query($conn, $sql, $params)) {
        $alert = '<script type="text/javascript">';
        $alert .= 'alert("เพิ่มหน่วยงานสำเร็จ !!");';
        $alert .= 'window.location.href = "?page=add_department";';
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
                    <h2 class="font-mirt">เพิ่มหน่วยงานที่ขอ</h2>
                </div>
            </div>
        <div class="container card-regis font">


            <hr>
            <br>
            <div class="">
                <div>
                    <label>หมายเลขหน่วยงานที่ขอ</label>
                    <input  type="text" name="dep_id" class="form-control" autocomplete="off">
                    <label >ชื่อหน่วยงานที่ขอ</label>
                    <input type="text" name="dep_name" class="form-control" autocomplete="off">
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