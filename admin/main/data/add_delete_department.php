<?php
if (isset($_GET['dep_id']) && !empty($_GET['dep_id'])) {
    $dep_id = $_GET['dep_id'];
    $sql = "DELETE FROM dep_tb WHERE dep_id = ? ";
    $params = array($dep_id);
    if (sqlsrv_query($conn, $sql, $params)) {
        // echo "ลบข้อมูลสำเร็จ";
        $alert = '<script type="text/javascript">';
        $alert .= 'alert("ลบหน่วยงานที่ขอสำเร็จ !!");';
        $alert .= 'window.location.href = "?page=add_department";';
        $alert .= '</script>';
        echo $alert;
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . sqlsrv_errors($conn);
    }
    sqlsrv_close($conn);
}
