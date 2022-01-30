<?php
if (isset($_GET['gg_id']) && !empty($_GET['gg_id'])) {
    $gg_id = $_GET['gg_id'];
    $sql = "DELETE FROM gg_tb WHERE gg_id = ? ";
    $params = array($gg_id);
    if (sqlsrv_query($conn, $sql, $params)) {
        // echo "ลบข้อมูลสำเร็จ";
        $alert = '<script type="text/javascript">';
        $alert .= 'alert("ลบกลุ่มสำเร็จ !!");';
        $alert .= 'window.location.href = "?page=add_group";';
        $alert .= '</script>';
        echo $alert;
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . sqlsrv_errors($conn);
    }
    sqlsrv_close($conn);
}
