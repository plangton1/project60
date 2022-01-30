<?php
$page = (isset($_GET['page'])) ? $_GET['page'] : '';
$strKeyword = '';
if (isset($_POST) && !empty($_POST)) {
  $strKeyword = $_POST["txtKeyword"];
}
?>
<?php
require './date.php';
$sql = "SELECT  * , a.main_source,b.source_id,b.source_name AS source 
FROM main_tb a join source_tb b ON a.main_source = b.source_id JOIN sub_main c ON a.main_id = c.main_id 
 WHERE main_name  LIKE '%$strKeyword%' ";
$query = sqlsrv_query($conn, $sql);
?>
<div class="container">
  <form method="post" action="">
    <h3 class="heading mt-5 text-center">ค้นหาเอกสารที่นี่</h3>
    <div class="d-flex justify-content-center px-5">
      <div class="search"> <input type="text" class="search-input" placeholder="กรุณากรอกเลข มอก. ที่ต้องการค้นหา" name="txtKeyword" id="txtKeyword" value="<?php echo $strKeyword ?>">
        <button class="btn btn-danger" type="submit" value="ค้นหา">ค้นหา</button>
      </div>
    </div>
    <div align="right">
      <a href="?page=insert" class="btn btn-primary">
        <h5 class="font-mirt">เพิ่มเอกสาร</h5>
      </a>
    </div>
     
    <table class="table table-hover">
      <thread>
        <tr>
          <th>ลำดับ</th>
          <th>ที่มาของการประชุม</th>
          <th>วันที่เพิ่มเอกสาร</th>
          <th>วาระจากการประชุม</th>
          <th>วันที่ประชุม</th>
          <th>ชื่อมาตรฐาน</th>
          <th>เลขที่มอก.</th>
          <th>สถานะ</th>
          <th>วันที่เพิ่มสถานะ</th>
          <th>ไฟล์แนบ</th>
          <th>การจัดการ</th>
        </tr>
      </thread>

      <tbody>
        <?php $i = 1; ?>
        <?php while ($show = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC)) { ?>
          <?php $sql1 = "SELECT * ,a.status_id,b.status_id,b.status_name AS name_status1 FROM dimen_status a 
          JOIN status_tb b ON a.status_id = b.status_id WHERE a.main_id =" . $show['main_id'] . " ORDER BY a.id_dimension_status DESC";
          $query0 = sqlsrv_query($conn, $sql1); $show1 = sqlsrv_fetch_array($query0, SQLSRV_FETCH_ASSOC) ?>
          <tr>
            <td><?= $i++; ?></td>
            <td><?= $show['source'] ?></td>
            <td><?= datethai($show['main_create']) ?></td>
            <td><?= $show['main_meet'] ?></td>
            <td><?= datethai($show['main_day']) ?></td>
            <td><?= $show['main_name'] ?></td>
            <td><?= $show['main_num'] ?></td>
          
            <td><?= $show1['name_status1'] ?></td>

            <?php if($show1['status_id'] == '7') : ?>
            <td class="align-middle">ยังไม่ได้ระบุสถานะ</td>
            <?php endif ; ?>
            <?php if($show1['status_id'] != '7') : ?>
            <td class="align-middle"><?= datethai($show1['status_update']) ?></td>
            <?php endif ; ?>

            <td class="align-middle">
              <a href="main_id=<?= $show['main_id'] ?>" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop<?php echo $show['main_id']; ?>" tyle="background-color:#31f9cb;">เรียกดูไฟล์</a>
              <?php require('modalstatus.php'); ?>
            </td>
            <td><a href="?page=detail&main_id=<?= $show['main_id'] ?>" class="btn btn-warning">ดูรายละเอียด</a></td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </form>
</div>