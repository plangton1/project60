<?php
if(isset($_GET['main_id']) && !empty($_GET['main_id'])){
$main_id = $_GET['main_id'];
$sql = ("SELECT * , a.main_source,c.source_id,c.source_name AS name_source FROM main_tb a JOIN sub_main b ON a.main_id = b.main_id JOIN source_tb c ON a.main_source = c.source_id WHERE a.main_id = '$main_id'") ; 
$query = sqlsrv_query($conn , $sql);
$result = sqlsrv_fetch_array($query , SQLSRV_FETCH_ASSOC);

$sql1 = "SELECT * , b.main_id,bb.type_id,bb.type_name AS name_type  , c.main_id,cc.gg_id,cc.gg_name AS name_gg 
FROM sub_main a JOIN dimen_type b ON a.main_id = b.main_id JOIN type_tb bb ON b.type_id = bb.type_id 
JOIN dimen_gg c ON a.main_id = c.main_id JOIN gg_tb cc ON c.gg_id = cc.gg_id JOIN dimen_file d ON a.main_id = d.main_id  ";
$query1 = sqlsrv_query($conn , $sql1);
$result1 = sqlsrv_fetch_array($query1 , SQLSRV_FETCH_ASSOC);
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
<?php echo $result['main_num']?><br>
<lable>ชื่อมาตรฐาน</lable>
<?php echo $result['main_name']?><br>
<lable>ประเภทมาตรฐาน</lable>
<?php echo $result1['name_type']?><br>
<lable>กลุ่มผลิตภัณฑ์</lable>
<?php echo $result1['name_gg']?><br>
<lable>ไฟล์แนบ</lable>
<?php echo $result1['fileupload']?><br>
</div>


<div class="col-md-6">
<lable>ที่มาของเอกสาร</lable>
<?php echo $result['name_source']  .'วันที่'. $result['main_day'] ?><br>
<lable>หน่วยงานที่ขอ</lable>
<?php echo $result['main_source'] ?><br>
<lable>สถานะล่าสุด</lable>
<?php echo $result['main_source'] ?><br>
<lable>หน่วยงานคู่แข่ง</lable>
<?php echo $result['main_source'] ?><br>
<lable>หมายเหตุ</lable>
<?php echo $result['main_source'] ?><br>   
</div>
</div>
</div>
</form>