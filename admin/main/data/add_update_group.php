<?php
if (isset($_GET['gg_id']) && !empty($_GET['gg_id'])) {
    $gg_id = $_GET['gg_id'];
    $sql = "SELECT * FROM gg_tb WHERE gg_id = ?";
    $params = array($gg_id);
    $query = sqlsrv_query($conn, $sql, $params);
    $result = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC);
}
if (isset($_POST) && !empty($_POST)) {
    $gg_name = $_POST['gg_name'];
    $sql = "UPDATE gg_tb SET gg_name= ?  WHERE gg_id = ? ";
    $params = array($gg_name, $gg_id);

    if (sqlsrv_query($conn, $sql, $params)) {
        $alert = '<script type="text/javascript">';
        $alert .= 'alert("แก้ไขข้อมูลกลุ่มสำเร็จ !!");';
        $alert .= 'window.location.href = "?page=add_group";';
        $alert .= '</script>';
        echo $alert;
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . sqlsrv_errors($conn);
    }
    sqlsrv_close($conn);
}
?>
<section class="upcoming-meetings" id="meetings">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-heading">
                    <h2 class="font-mirt">แก้ไขกลุ่มผลิตภัณฑ์</h2>
                </div>
            </div>

    </div>
    <form action="" method="post" enctype=multipart/form-data>
        <div class="container  tab-content font">
            <div id="home" class="container-fluid tab-pane active m-2">
                <div class="mb-3">
                    <label class="form-label">ชื่อกลุ่ม</label>
                    <input type="text" class="form-control" value="<?= $result['gg_name'] ?>" name="gg_name" placeholder="ชื่อกลุ่ม :" required autocomplete="off">
                </div>
                <button type="submit" class="btn btn-primary">บันทึก</button>
    </form>
    </div>
    </div>