<?php 
require './date.php' ;
$sql = "SELECT * , a.main_source,b.source_id,b.source_name AS source
FROM main_tb a join source_tb b ON a.main_source = b.source_id ";
$query = sqlsrv_query($conn , $sql);
?>
<div class="container">
<form method="post" action="">
<div align="right">
    <a href="?page=insert" class="btn btn-primary">
    <h5 class="font-mirt">เพิ่มเอกสาร</h5></a>
</div>
<table class="table table-hover">
  <thread>
    <tr>
    <th>ลำดับ</th>
    <th>ที่มาของการประชุม</th>
    <th>วันที่เพิ่มเอกสาร</th>
    <th>วาระจากการประชุม</th>
    <th>วันที่ประชุม</th>
    <th>การจัดการ</th>
</tr>
  </thread>
<tbody>
  <?php $i=1 ; ?>
  <?php while( $show = sqlsrv_fetch_array( $query , SQLSRV_FETCH_ASSOC) ) { ?>
  <tr>
    <td><?= $i++ ; ?></td>
    <td><?= $show['source']?></td>
    <td><?= datethai($show['main_create'])?></td>
    <td><?= $show['main_meet']?></td>
    <td><?= datethai($show['main_day'])?></td>
    <td><a href="?page=detail&main_id=<?= $show['main_id']?>" class="btn btn-warning">ดูรายละเอียด</a></td>
  </tr>
  <?php } ?>
  </tbody>
</table>
    </form>
  </div>