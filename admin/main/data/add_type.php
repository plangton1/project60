<?php
if (isset($_POST) && !empty($_POST)) {
    $status_id = $_POST['status_id'];
    $status_name = $_POST['status_name'];
}
$sql = "SELECT * FROM status_tb ";
$query = sqlsrv_query($conn, $sql);
?>
<section class="upcoming-meetings" id="meetings">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2 class="font-mirt">เพิ่มข้อมูลพื้นฐาน</h2>
                    <h3 class="font-mirt">เพิ่มสถานะ<h3>
                </div>
            </div>

        </div>
        <form method="post" action="">
            <div class="container  tab-content font">
                <div id="home" class="container-fluid tab-pane active m-2">
                    <table class="table table-bordered table-responsive-xl  pt-5" id="tableall" style="background-color: white;">
                        <thead>
                            <tr>
                                <th scope="col" class="text-center">หมายเลขสถานะ</th>
                                <th scope="col" class="text-center">ชือสถานะ</th>
                                <th scope="col" class="text-center">การจัดการ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($data = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC)) { ?>
                                <tr class="text-center">
                                    <td class="align-middle"><?= $data['status_id'] ?></td>
                                    <td class="align-middle"><?= $data['status_name'] ?></td>
                                    <td class="align-middle">
                                        <div class="mb-4">
                                            <a href="?page=<?= $_GET['page'] ?>&function=update&status_id=<?= $data['status_id'] ?>" class="btn btn-sm btn-warning">แก้ไข</a>

                                            <a href="?page=<?= $_GET['page'] ?>&function=delete&status_id=<?= $data['status_id'] ?>" onclick="return confirm('คุณต้องการลบประเภทนี้ : <?= $data['status_name'] ?> หรือไม่ ??')" class="btn btn-sm btn-danger">ลบ</a>
                                    </td>

                </div>
                </tr>
            <?php } ?>
            </tbody>
            </table>
            <a href="?page=add_insert_type" class="btn btn-success bt mg-t-bt b-add">เพิ่มข้อมูล</a>
            </div>
        </form>
    </div>
    </div>
</section>
<script type="text/javascript">
    $(document).ready(function() {
        $('#tableall').DataTable();
    });
</script>