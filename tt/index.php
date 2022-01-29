<?php
require '../admin/connection.php' ;
    if (isset($_POST) && !empty($_POST)) {
$main_meet = $_POST['main_meet'];
$main_num = $_POST['main_num'];
$s = "UPDATE main_tb  SET main_meet = '$main_meet' WHERE main_id = '74'";
$a = sqlsrv_query($conn , $s);

$s = "UPDATE sub_main  SET main_num = '$main_num' WHERE main_id = '74'";
$a = sqlsrv_query($conn , $s);
$r = sqlsrv_fetch_array($a , SQLSRV_FETCH_ASSOC);
}
?>
<form method="post">
<input type="text" name="main_meet" value="<?php echo $r['main_meet']?>">
<input type="text" name="main_num" value="<?php echo $r['main_num']?>">
<button type="submit">okk</button>
</form>