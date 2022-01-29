<?php 
if(isset($_GET['main_id']) && !empty($_GET['main_id'])){
$main_id = $_GET['main_id'];
$sql = "SELECT * FROM main_tb WHERE main_id = '$main_id'";
$query = sqlsrv_query($conn , $sql);
$result = sqlsrv_fetch_array($query , SQLSRV_FETCH_ASSOC);
}
if(isset($_POST) && !empty($_POST)){
    $main_name = $_POST['main_name'];
    $sql1 = "UPDATE sub_main SET main_name = '$main_name' WHERE main_id = '$main_id'" ; 
    $query1 = sqlsrv_query($conn , $sql1);
    $result1 = sqlsrv_fetch_array($query1 , SQLSRV_FETCH_ASSOC);
}
?>
<form action="" method="POST" enctype="multipart/form-data">
    <div class="container">
        <div class="col-md-6">
<lable>ชื่อมาตรฐาน</lable>
<input type="text" class="form-control" name="main_name">
<button class="btn btn-primary" type="submit">บันทึกการแก้ไข</button>
</div>
</div>
</form>
