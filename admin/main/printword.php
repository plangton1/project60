<?php
header("Content-Type: application/msword");
header('Content-Disposition: attachment; filename="Report_Word.doc"');
?>
<?php
require '../date.php';
?>
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

<body>

    <?php
    require '../connection.php';
    if (isset($_GET['main_id']) && !empty($_GET['main_id'])) {
        $main_id = $_GET['main_id'];
        $sql = "SELECT *  FROM main_tb a JOIN sub_main b ON a.main_id = b.main_id WHERE a.main_id = '$main_id'";
        $query = sqlsrv_query($conn, $sql);
        $show = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC);
    }
    ?>
    <form action="" method="post" enctype=multipart/form-data>        
        <div style="text-align:right;">
            <h2>
                <p style="color:#0000ff ;">สถาบันวิจัยวิทยาศาสตร์และเทคโนโลยีแห่งประเทศไทย 35 เทคโนธานี <br>
                ถนนเลียบคลองห้า ตำบลคลองห้า อำเภอคลองหลวง จังหวัดปทุมธานี 12120</p>
            </h2>
        </div>
        <hr>
        <center>
            <h2 style="text-align:center;"><u>::ข้อมูลรายงานเอกสาร หมายเลขเอกสาร <?= $show['main_id']; ?>::</u></h2>
        </center>
        <h3 style="color: red;"><strong>ชื่อมาตรฐาน : </strong><?= $show['main_name'] ?></h3>
        <h4><strong>วาระจากในที่ประชุมสมอ :</strong> <?= $show['main_meet'] ?></h4>
        <h4><strong>เลขที่มอก :</strong> <?= $show['main_num'] ?></h4>
        <table class="table table-bordered " style="width: 100%;" border="">
                    <thead>
                        <tr>
                            <th style="background-color:#3cb371 ;" >หน่วยงานที่สามารถทดสอบได้</th>
                            <th style="background-color:#3cb371 ;">หน่วยงานที่ขอ</th>
                        </tr>
                        <tr>
                            <td style="text-align: center;">
                            <?php
                                                        $ii = 1;
                                                        $mainid = $_REQUEST['main_id'];
                                                        $sql2 = "SELECT * ,a.agency_id,b.agency_id,b.agency_name AS name_agency FROM dimen_agency a INNER JOIN agency_tb b ON a.agency_id= b.agency_id 
                                                        WHERE main_id  = '$mainid' ";
                                                        $query2 = sqlsrv_query($conn, $sql2);
                                                        while ($result2 = sqlsrv_fetch_array($query2, SQLSRV_FETCH_ASSOC)) { ?>
                                                        <?= $ii++ ?>. <?= $result2['name_agency']; ?><br>
                                                        <?php } ?>
                        </td>
                            <td style="text-align: center; ">
                         <?php
                                            $iii = 1;
                                            $mainid = $_REQUEST['main_id'];
                                            $sql3 = "SELECT * ,b.dep_id,c.dep_id,c.dep_name AS name_dep FROM dimen_dep b INNER JOIN dep_tb c ON b.dep_id = c.dep_id 
                                            WHERE main_id  = '$mainid' ";
                                            $query3 = sqlsrv_query($conn, $sql3);
                                            while ($result3 = sqlsrv_fetch_array($query3, SQLSRV_FETCH_ASSOC)) { ?>
                                            <?= $iii++ ?>. <?= $result3['name_dep']; ?><br>
                                            <?php } ?>
                        </td>
                       
                        </tr>
                    </thead>
                   
                </table>
    <hr>        
        <div class=" mb-3">
            <center>
                <table class="table table-bordered " style="width: 100%;" border="">
                    <thead>
                        <tr>
                            <th colspan="3" style="background-color: #ffd747">ความก้าวหน้าของการขอรับการแต่งตั้ง</th>
                        </tr>
                        <tr>
                            <td style="text-align: center; background-color: red">ระบุวันที่</td>
                            <td style="text-align: center; background-color: #ff5d7a; ">สถานะ</td>
                        </tr>
                    </thead>
                    <tbody>
                        <td>
                            <?php
                                $iii = 1;
                                $mainid = $_REQUEST['main_id'];
                                $sql4 = "SELECT * ,b.status_id,c.status_id,c.status_name AS name_status FROM dimen_status b INNER JOIN status_tb c ON b.status_id = c.status_id 
                                WHERE main_id  = '$mainid' ";
                                $query4 = sqlsrv_query($conn, $sql4);
                                while ($result4 = sqlsrv_fetch_array($query4, SQLSRV_FETCH_ASSOC)) { ?>
                                    <?= $iii++ ?>.<?= datethai($result4['status_update']); ?><br>
                                <?php } ?></td>
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
                        </tr>
                    </tbody>
                </table>
            </center>
        </div>
    </form>
</body>

</html>