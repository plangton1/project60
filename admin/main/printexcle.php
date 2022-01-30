<?php
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=report_Excle.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>
<?php require '../date.php' ; ?>
<!DOCTYPE html>
<html lang="en">

<head></head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>ระบบติดตามเอกสาร</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>
<style>
    .ii{
        display: none;
    }
</style>
<body>

    <?php
    require '../connection.php';
    if (isset($_GET['main_id']) && !empty($_GET['main_id'])) {
        $main_id = $_GET['main_id'];
        $sql = "SELECT *  FROM main_tb a JOIN sub_main b ON a.main_id =  b.main_id JOIN dimen_status c ON b.main_id = c.main_id WHERE a.main_id = '$main_id'";
        $query = sqlsrv_query($conn, $sql);
        $show = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC);
    }
    ?>
    <center>
        <form action="" method="post" enctype=multipart/form-data>
            <div class=" mb-3">
                <table border="1" class="table table-bordered">
                    <thead>
                        <tr>
                            <th rowspan="3" style="background-color: #3cb371;">ลำดับที่</th>
                            <th rowspan="3" style="background-color: #3cb371;">วาระจากในที่ประชุมสมอ.</th>
                            <th rowspan="3" style="background-color: #3cb371;">เลขที่มอก.</th>
                            <th rowspan="3" style="background-color: #3cb371;">ชื่อมาตรฐาน</th>
                            <th rowspan="3" style="background-color: #3cb371;">หน่วยงานที่สามารถทดสอบได้</th>
                            <th rowspan="3" style="background-color: #3cb371;">มาตรฐานบังคับ</th>
                            <th rowspan="3" style="background-color: #3cb371;">หน่วยงานที่ขอ</th>
                            <?php for ($ii = 0; $ii < 12; $ii++ ) : ?>
                            <th colspan="3" style="background-color: #ffd747;">ความก้าวหน้าของการขอรับการแต่งตั้ง<?php echo substr($ii, 28) ;?></th>
                            <?php endfor ; ?>
                        </tr>
                        <tr>
                            <?php 
                            $strMonthCut["month"] = ["มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม"] ;
                            for ($i = 0; $i < 12; $i++ ) : ?>
                            <td colspan="3" style="text-align: center; background-color: #ffd747;"> เดือน : <?php echo $strMonthCut["month"][$i]  ;?></td> 
                            <?php endfor; ?>
                        </tr>
                        <tr>
                            <?php for ($i = 0; $i < 12; $i++ ) { ?>
                            <td style="text-align: center; background-color: #ffd747;">ระบุวันที่</td>
                            <td style="text-align: center; background-color: #ffd747;">สถานะ</td>
                            <td style="text-align: center; background-color: #ffd747;">เลขเอกสารที่เกี่ยวข้อง</td>
                           <?php } ?>
                        </tr>
                    </thead>
                       
                    <tbody>
                        <?php $i = 1; ?>
                        <tr class="text-center">
                            <td class="align-middle"><?= $i++ ?></td>
                            <td class="align-middle"><?= $show['main_meet'] ?></td>
                            <td class="align-middle"><?= $show['main_num'] ?></td>
                            <td class="align-middle"><?= $show['main_name'] ?></td>
                            <td style="background-color:;">
                                <?php
                                $ii = 1;
                                $mainid = $_REQUEST['main_id'];
                                $sql2 = "SELECT * ,a.agency_id,b.agency_id,b.agency_name AS name_agency FROM dimen_agency a INNER JOIN agency_tb b ON a.agency_id= b.agency_id 
                                WHERE main_id  = '$mainid' ";
                                $query2 = sqlsrv_query($conn, $sql2);
                                while ($result2 = sqlsrv_fetch_array($query2, SQLSRV_FETCH_ASSOC)) { ?>
                                    <?= $ii++ ?>.<?= $result2['name_agency']; ?><br>
                                <?php } ?>
                            </td>
                            <td>
                                <?php
                                $iii = 1;
                                $mainid = $_REQUEST['main_id'];
                                $sql3 = "SELECT * ,b.type_id,c.type_id,c.type_name AS name_type FROM dimen_type b INNER JOIN type_tb c ON b.type_id = c.type_id 
                                WHERE main_id  = '$mainid' ";
                                $query3 = sqlsrv_query($conn, $sql3);
                                while ($result3 = sqlsrv_fetch_array($query3, SQLSRV_FETCH_ASSOC)) { ?>
                                    <?= $iii++ ?>.<?= $result3['name_type']; ?><br>
                                <?php } ?>
                            </td>
                            <td>
                                <?php
                                $iii = 1;
                                $mainid = $_REQUEST['main_id'];
                                $sql3 = "SELECT * ,b.dep_id,c.dep_id,c.dep_name AS name_dep FROM dimen_dep b INNER JOIN dep_tb c ON b.dep_id = c.dep_id 
                                WHERE main_id  = '$mainid' ";
                                $query3 = sqlsrv_query($conn, $sql3);
                                while ($result3 = sqlsrv_fetch_array($query3, SQLSRV_FETCH_ASSOC)) { ?>
                                    <?= $iii++ ?>.<?= $result3['name_dep']; ?><br>
                                <?php } ?>
                            </td>
                            <td>
                                <?php
                                $iii = 1;
                                $mainid = $_REQUEST['main_id'];
                                $sql4 = "SELECT * ,b.status_id,c.status_id,c.status_name AS name_status FROM dimen_status b INNER JOIN status_tb c ON b.status_id = c.status_id 
                                WHERE main_id  = '$mainid' ";
                                $query4 = sqlsrv_query($conn, $sql4);
                                while ($result4 = sqlsrv_fetch_array($query4, SQLSRV_FETCH_ASSOC)) { ?>
                                    <?= $iii++ ?>.<?= datethai($result4['status_update']); ?><br>
                                <?php } ?>
                            </td>
                            <td>
                                <?php
                                $iii = 1;
                                $mainid = $_REQUEST['main_id'];
                                $sql4 = "SELECT * ,b.status_id,c.status_id,c.status_name AS name_status FROM dimen_status b INNER JOIN status_tb c ON b.status_id = c.status_id 
                                WHERE main_id  = '$mainid' ";
                                $query4 = sqlsrv_query($conn, $sql4);
                                while ($result4 = sqlsrv_fetch_array($query4, SQLSRV_FETCH_ASSOC)) { ?>
                                    <?= $iii++ ?>.<?= $result4['name_status']; ?><br>
                                <?php } ?>
                            </td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </form>
    </center>
</body>

</html>