<?php
require('pdf.php');
?>
<?php ob_start(); ?>
<?php
require '../admin/date.php';
if (isset($_GET['main_id']) && !empty($_GET['main_id'])) {
    $main_id = $_GET['main_id'];

    $sql = "SELECT * FROM main_tb a JOIN sub_main b ON a.main_id = b.main_id WHERE a.main_id='$main_id'";
    $query = sqlsrv_query($conn, $sql);
    $result = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC);

    $sql3 = "SELECT TOP(1) * ,a.status_id,b.status_id,b.status_name AS name_status FROM dimen_status a JOIN status_tb b ON a.status_id = b.status_id WHERE main_id=" . $result['main_id'] . "ORDER BY id_dimension_status desc";
    $query3 = sqlsrv_query($conn, $sql3);
    $data2 = sqlsrv_fetch_array($query3, SQLSRV_FETCH_ASSOC);
}


$sql2 = "SELECT * FROM status_tb";
$query2 = sqlsrv_query($conn, $sql2);
$sql3 = "SELECT * FROM type_tb";
$query3 = sqlsrv_query($conn, $sql3);

?>

<?php
if (isset($_GET['main_id']) && !empty($_GET['main_id'])) {
    $main_id = $_GET['main_id'];
    $sql2 = "SELECT * FROM main_tb  WHERE main_id=$main_id";
    $query2 = sqlsrv_query($conn, $sql2);
    $row = sqlsrv_fetch_array($query2, SQLSRV_FETCH_ASSOC);
}
?>

<body>
    <form action="" method="post">
        <div class="container" style="text-align:center;">
            <h3>สถาบันวิจัยวิทยาศาสตร์และเทคโนโลยีแห่งประเทศไทย 35 เทคโนธานี </h3>
            <h3>ถนนเลียบคลองห้า ตำบลคลองห้า อำเภอคลองหลวง จังหวัดปทุมธานี 12120</h3>
            <h3 style="text-align:left;">รายงานเอกสาร หมายเลขเอกสาร : <u><?= $row['main_id']; ?></u></h3>
        </div>
        <div class="container">
            <hr>
            <p><strong>1. ชื่อมาตรฐาน : </strong> <strong style="color: red;"><?= $result['main_name']; ?></strong></p>
            <p><strong>2. สถานะ :</strong> <strong style="color: green;"><?= $data2['name_status']; ?></strong></p>
            <p><strong>3. รายละเอียดข้อมูลเอกสาร </strong> </p>
            <div class="row">
                <div class="col-sm-6">
                    <table style="border-collapse: collapse; width: 100%; text-align:center;margin-top:2%; " class="table table-bordered" border="1">
                        <thead>
                            <tr style="background-color: green;">
                                <th>วันที่ยื่นเอกสาร</th>
                                <th>เลขที่มอก</th>
                                <th>วาระจากในที่ประชุมสมอ.</th>
                            </tr>
                            <tr>
                                <td><?= DateThai($result['main_day']) ?></td>
                                <td><?= $result['main_num'] ?></td>
                                <td><?= $result['main_meet'] ?></td>
                            </tr>
                        </thead>
                    </table>
                </div>

                <div class="col-sm-6">
                    <table style="border-collapse: collapse; width: 100%; text-align:center;margin-top:2%; " class="table table-bordered" border="1">
                        <thead>
                            <tr style="background-color: green;">
                                <th>ชื่อมาตรฐาน</th>
                                <th>วันที่แต่งตั้งสถานะ</th>
                                <th style="background-color:red;">สถานะ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?= $result['main_name'] ?></td>
                                <?php
                                $sql4 = "SELECT * ,a.status_id,b.status_id,b.status_name AS name_status FROM dimen_status a JOIN status_tb b ON a.status_id = b.status_id
                                 WHERE a.main_id=" . $result['main_id'] . "ORDER BY a.id_dimension_status desc";
                                $query4 = sqlsrv_query($conn, $sql4);
                                ?>
                                <?php
                                $j = 1;
                                while ($data3 = sqlsrv_fetch_array($query4, SQLSRV_FETCH_ASSOC)) { ?>
                                    <?php if ($j != 1) {
                                        echo "<tr><td></td>";
                                    } ?>

                                    <?php if ($data3['status_id'] == '7') : ?>
                                        <td>ยังไม่ได้ระบุสถานะ</td>
                                    <?php endif; ?>

                                    <?php if ($data3['status_id'] != '7') : ?>
                                        <td><?= dateThai($data2['status_update']); ?></td>
                                    <?php endif; ?>

                                    <td class="align-middle"><?= $data3['name_status'] ?></td>
                                    <?php if ($j != 1) {
                                        echo "</tr>";
                                    } ?>
                                <?php
                                    $j++;
                                } ?>

                                <!-- <?php if ($data2['status_id'] == 1) : ?>
                                    <td><?= $result['name_status'] ?></td>
                                <?php endif; ?>
                                <?php if ($data2['status_id'] == 2) : ?>
                                    <td>
                                        <?= $result['name_status'] ?></td>
                                <?php endif; ?>
                                <?php if ($data2['status_id'] == 3) : ?>
                                    <td><?= $result['name_status'] ?></td>
                                <?php endif; ?>
                                <?php if ($data2['status_id'] == 4) : ?>
                                    <td>
                                        <?= $result['name_status'] ?></td>
                                <?php endif; ?>
                                <?php if ($data2['status_id'] == 5) : ?>
                                    <td>
                                        <?= $result['name_status'] ?></td>
                                <?php endif; ?>
                                <?php if ($data2['status_id'] == 6) : ?>
                                    <td>
                                        <?= $result['name_status'] ?></td>
                                <?php endif; ?>
                                <?php if ($data2['status_id'] == 7) : ?>
                                    <td>
                                        <p>ไม่ได้ระบุสถานะ</p>
                                    </td>
                                <?php endif; ?> -->
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <table style="border-collapse: collapse; width: 100%; text-align:center; margin-top:2%; " class="table table-bordered" border="1">
                <thead>
                    <tr style="background-color: green;">
                        <!-- <th>หมายเลข tacking </th>
                    <th>หมายเหตุ</th> -->
                        <th>หน่วยงานคู่แข่ง.</th>
                        <th>หน่วยงานที่ขอ.</th>
                        <!-- <th>ประเภทผลิตภัณฑ์</th> -->
                        <th>กลุ่มผลิตภัณฑ์</th>

                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <?php
                            $i = 1;
                            $standarsidtb = $_REQUEST['main_id'];
                            $sql2 = "SELECT * ,a.agency_id,b.agency_id,b.agency_name AS name_agency FROM dimen_agency a INNER JOIN agency_tb b ON a.agency_id= b.agency_id 
                        WHERE main_id  = '$standarsidtb' ";
                            $query2 = sqlsrv_query($conn, $sql2);
                            while ($result2 = sqlsrv_fetch_array($query2, SQLSRV_FETCH_ASSOC)) { ?>
                                <?= $i++ ?>. <?= $result2['name_agency']; ?><br>
                            <?php } ?>
                        </td>
                        <td>
                            <?php
                            $ii = 1;
                            $main_id = $_REQUEST['main_id'];
                            $sql3 = "SELECT * ,b.dep_id,c.dep_id,c.dep_name AS name_department FROM dimen_dep b INNER JOIN dep_tb c ON b.dep_id = c.dep_id 
                        WHERE main_id  = '$main_id' ";
                            $query3 = sqlsrv_query($conn, $sql3);
                            while ($result3 = sqlsrv_fetch_array($query3, SQLSRV_FETCH_ASSOC)) { ?>
                                <?= $ii++ ?>.<?= $result3['name_department']; ?><br>
                            <?php } ?>
                        </td>
                        <!-- <td>
                            <?php
                            $iii = 1;
                            $standarsidtb = $_REQUEST['main_id'];
                            $sql4 = "SELECT * ,a.type_id,b.type_id,b.type_name AS name_type FROM dimen_type a INNER JOIN type_tb b ON a.type_id = b.type_id 
                        WHERE main_id  = '$standarsidtb' ";
                            $query4 = sqlsrv_query($conn, $sql4);
                            while ($result4 = sqlsrv_fetch_array($query4, SQLSRV_FETCH_ASSOC)) { ?>
                                <?= $iii++ ?>. <?= $result4['name_type']; ?><br>
                            <?php } ?>
                        </td> -->
                        <td>
                            <?php
                            $iiii = 1;
                            $main_id = $_REQUEST['main_id'];
                            $sql5 = "SELECT * ,a.gg_id,b.gg_id,b.gg_name AS name_gg FROM dimen_gg a INNER JOIN gg_tb b ON a.gg_id = b.gg_id 
                        WHERE main_id  = '$main_id' ";
                            $query5 = sqlsrv_query($conn, $sql5);
                            while ($result4 = sqlsrv_fetch_array($query5, SQLSRV_FETCH_ASSOC)) { ?>
                                <?= $iiii++ ?>.<?= $result4['name_gg']; ?><br>
                            <?php } ?>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="row">
                <p><strong>4. หมายเหตุ</strong> </p>
                <table>
                    <tr>
                        <td>
                            <p style="width:100%; " rows="4"><?= $result['main_note']; ?></p>
                        </td>
                    </tr>
                </table>

            </div>
    </form>



</body>

<?php require('pdfend.php'); ?>
<br>
<a href="Report_PDF.pdf" class="btn btn-warning mt-3">พิมพ์รายงาน PDF</a>

<a href="./main/printexcle.php?main_id&main_id=<?= $result['main_id'] ?>" class="btn  btn-success mt-3">พิมพ์รายงาน Excel</a>

<a href="./main/printword.php?main_id&main_id=<?= $result['main_id'] ?>" class="btn btn-primary mt-3">พิมพ์รายงาน Word</a>