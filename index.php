<?php
include('./connection.php');
if (isset($_POST) && !empty($_POST)) {
     $username = $_POST['username'];
     $password = $_POST['password'];
     $sql = "SELECT * FROM user_tb WHERE username = '".$username."' AND password = '".$password."'";
     $query = sqlsrv_query($conn, $sql);
    //  $row = sqlsrv_num_rows($query);
    $result = sqlsrv_fetch_array($query , SQLSRV_FETCH_ASSOC);
     if (!$result ) {
        $alert = '<script type="text/javascript">';
        $alert .= 'alert("Username and Password ไม่ถูกต้อง !!");';
        $alert .= 'window.location.href = "";';
        $alert .= '</script>';
        echo $alert;
        exit();
     }
     else {
        $_SESSION['user_login'] = $result['username'];
        $_SESSION['role_login'] = $result['role'];
        if($result["role"] == "admin"){
         $alert = '<script type="text/javascript">';
         $alert .= 'alert("WELCOME ADMIN");';
         $alert .= 'window.location.href = "./admin/";';
         $alert .= '</script>';
         echo $alert;
         exit();
         print_r($result);
         exit;
} else  $_SESSION['user_login'] = $result['username'];
        $_SESSION['role_login'] = $result['role'];
        if($result["role"] == "head"){
        $alert = '<script type="text/javascript">';
        $alert .= 'alert("WELCOME EXECUTIVE");';
        $alert .= 'window.location.href = "";';
        $alert .= '</script>';
        echo $alert;
        exit();
} 
     }
// } else {
//     $alert = '<script type="text/javascript">';
//     $alert .= 'alert("Username and Password ไม่ถูกต้อง !!");';
//     $alert .= 'window.location.href = "";';
//     $alert .= '</script>';
//     echo $alert;
//     exit();
// }
     
}
?>
<?php
require 'head.php' ;
?>
<?php include 'style.php' ; ?>

<div class="container  text-center mt">
    <p class="mb-1 font2 font mt">ระบบติดตามเอกสารมาตรา 5</p>
</div>

<div class="wrapper fadeInDown">
    <div id="formContent">

        <div class="fadeIn first ">
            <img src="https://www.tistr.or.th/images/tistr-logo-s.png" id="icon" alt="User Icon" />
        </div>

        <form method="POST" action="" >
            <input type="text" id="username" class="fadeIn second" name="username" placeholder="Login">
            <input type="password" id="password" class="fadeIn third" name="password" placeholder="Password">
            <input type="submit" class="fadeIn fourth" value="Log In">
        </form>
    </div>
</div>