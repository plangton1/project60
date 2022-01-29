<?php
if(isset($_GET['main_id']) && !empty($_GET['main_id'])){
$main_id = $_GET['main_id'];
$sql = "SELECT * FROM main_tb WHERE main_id = '$main_id'" ; 
$query = sqlsrv_query($conn , $sql);
$result = sqlsrv_fetch_array($query , SQLSRV_FETCH_ASSOC);
}
?>
<form action method="post" enctype="multiple/formm-data">
    <div align="right">
<a href="?page=<?= $_GET['page'] ?>&function=update&main_id=<?= $result['main_id'] ?>" class="btn btn-warning">แก้ไขข้อมูลสถานะ</a>
    </div>


<div class="container">
    <div class="row">
<div class="col-md-6">
<lable>เลขที่ มอก.</lable>
<?php echo $result['main_source']  .'วันที่'. $result['main_day'] ?><br>
<lable>ชื่อมาตรฐาน</lable>
<?php echo $result['main_source']  .'วันที่'. $result['main_day'] ?><br>
<lable>ประเภทมาตรฐาน</lable>
<?php echo $result['main_source']  .'วันที่'. $result['main_day'] ?><br>
<lable>กลุ่มผลิตภัณฑ์</lable>
<?php echo $result['main_source']  .'วันที่'. $result['main_day'] ?><br>
<lable>ไฟล์แนบ</lable>
<?php echo $result['main_source']  .'วันที่'. $result['main_day'] ?><br>
</div>


<div class="col-md-6">
<lable>ที่มาของเอกสาร</lable>
<?php echo $result['main_source']  .'วันที่'. $result['main_day'] ?><br>
<lable>หน่วยงานที่ขอ</lable>
<?php echo $result['main_source']  .'วันที่'. $result['main_day'] ?><br>
<lable>สถานะล่าสุด</lable>
<?php echo $result['main_source']  .'วันที่'. $result['main_day'] ?><br>
<lable>หน่วยงานคู่แข่ง</lable>
<?php echo $result['main_source']  .'วันที่'. $result['main_day'] ?><br>
<lable>หมายเหตุ</lable>
<?php echo $result['main_source']  .'วันที่'. $result['main_day'] ?><br>   
</div>
</div>
</div>
</form>