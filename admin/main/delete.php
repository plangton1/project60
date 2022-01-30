<?php
if (isset($_GET['main_id']) && !empty($_GET['main_id'])) {
    $main_id = $_GET['main_id'];
    $sql = "DELETE FROM main_tb WHERE main_id = ? ";
    $params = array($main_id);
    if (sqlsrv_query($conn, $sql, $params)) {
        // echo "ลบข้อมูลสำเร็จ";
        $alert = '<script type="text/javascript">';
        $alert .= 'alert("ลบสถานะสำเร็จ !!");';
        $alert .= 'window.location.href = "?page=status";';
        $alert .= '</script>';
        echo $alert;
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . sqlsrv_errors($conn);
    }
    sqlsrv_close($conn);
}