<?php
if (isset($_POST) && !empty($_POST)) {
    $department_id = $_POST['department_id'];
    $department_name = $_POST['department_name'];
}
$sql = "SELECT * FROM department_tb ";
$query = sqlsrv_query($conn, $sql);
?>
<form method="post" action="">
<section  class="about section-bg">
    <div class="container">
        <div class="row">
        <div class="col-lg-12">
            <div class="section-title">
          <h2 class="font-mirt">เพิ่มข้อมูลพื้นฐาน</h2>
          <h3 class="font-mirt">เพิ่มหน่วยงานที่ขอ</h3>
        </div>
            </div>

        <div class="container  tab-content font">
            <div id="home" class="container-fluid tab-pane active m-2">
                <table class="table table-bordered table-responsive-xl  pt-5" style="background-color: white;" id="tableall">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center">หมายเลขหน่วยงานนี่ขอ</th>
                            <th scope="col" class="text-center">ชือหน่วยงานที่ขอ</th>
                            <th scope="col" class="text-center">การจัดการ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($data = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC)) { ?>
                            <tr class="text-center">
                                <td class="align-middle"><?= $data['department_id'] ?></td>
                                <td class="align-middle"><?= $data['department_name'] ?></td>
                                <td class="align-middle">
                                    <div class="mb-4">
                                        <a href="?page=<?= $_GET['page'] ?>&function=update&department_id=<?= $data['department_id'] ?>" class="btn btn-sm btn-warning">แก้ไข</a>

                                        <a href="?page=<?= $_GET['page'] ?>&function=delete&department_id=<?= $data['department_id'] ?>" onclick="return confirm('คุณต้องการลบประเภทนี้ : <?= $data['department_name'] ?> หรือไม่ ??')" class="btn btn-sm btn-danger">ลบ</a>
                                </td>

            </div>
            </tr>
        <?php } ?>
        </tbody>
        </table>
        <a href="?page=add_insert_department" class="btn btn-success bt mg-t-bt b-add">เพิ่มข้อมูล</a>
        </div>
        </div>
        </div>
</form>
</section>