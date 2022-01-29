<?php 
require './connection.php' ;
require './date.php' ;
$date = date("Y-m-d");
if(isset($_POST) && !empty($_POST)){
    $main_meet = $_POST['main_meet'] ;
    $main_source = $_POST['main_source'] ;
    if($_POST['main_pick'] != ''){
        $main_pick = $_POST['main_pick'] ;
    }else{
        $main_pick = '';
    }
    $main_day = $_POST['main_day'] ;
    $main_num = $_POST['main_num'] ;
    $sql = "INSERT INTO main_tb (main_meet , main_source , main_create , main_pick , main_day) VALUES ( '$main_meet' ,'$main_source' , '$date' , '$main_pick' ,'$main_day') ";
    $query = sqlsrv_query($conn , $sql);
if($query){
    $sql0 = "SELECT * FROM main_tb a INNER JOIN sub_main b ON a.main_id = b.main_id";
    $query0 = sqlsrv_query($conn , $sql0);

    $sql1 = "INSERT INTO sub_main (main_num) VALUES ('$main_num')";
    $query1 = sqlsrv_query($conn , $sql1);
}
}
?>
<div class="container">
    <div class="col-md-8">
<form action="" method="POST" enctype="multipart/form-data">
<p>วันที่เพิ่มเอกสาร<?php echo datethai($date) ;?></p>
    <div class="input-group">
        <input type="radio" name="main_source" onclick="document.getElementById('text').disabled=true" value="1">
<p>วาระจากการประชุม</p>
<input type="radio" name="main_source" value="2" onclick="document.getElementById('text').disabled=false">
<p>จดหมาย สมอ.</p>
<lable>จดหมายสอบถามสมอ.</lable>
<input type="text" id="text" class="form-control" name="main_pick">
</div>
<p>วาระการประชุม</p>
<input type="text" name="main_meet" class="form-control">
<p>วันที่ประชุม</p>
<input type="date"  name="main_day" class="form-control">
<button class="btn btn-primary" type="submit">ตกลง
</form>
</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://รับเขียนโปรแกรม.net/picker_date/picker_date.js"></script>
<script>
    picker_date(document.getElementById("date1"), {
        year_range: "-12:+10"
    });
</script>