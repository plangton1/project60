<?php
if (isset($_GET['status_id']) && !empty($_GET['status_id'])) {
    $status_id = $_GET['status_id'];
    $sql = "DELETE FROM status_tb WHERE status_id = ? ";
    $params = array($status_id);
    if (sqlsrv_query($conn, $sql, $params)) {
        // echo "ลบข้อมูลสำเร็จ";
        $alert = '<script type="text/javascript">';
        $alert .= 'alert("ลบสถานะสำเร็จ !!");';
        $alert .= 'window.location.href = "?page=add_type";';
        $alert .= '</script>';
        echo $alert;
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . sqlsrv_errors($conn);
    }
    sqlsrv_close($conn);
}