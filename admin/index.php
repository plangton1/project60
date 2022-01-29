<!DOCTYPE html>
<html lang="en">
<body>
<?php require './connection/connection.php' ;
        require './include/head.php' ;
        require './include/header.php' ;
        require './include/banner.php' ; ?>
  <main id="main">
  <?php
                if (!isset($_GET['page']) && empty($_GET['page'])) {
                    include('dashboard/index.php');
                } elseif (isset($_GET['page']) && $_GET['page'] == 'insert') {
                    include('main/insert.php');
                } elseif (isset($_GET['page']) && $_GET['page'] == 'status') {
                    include('main/index.php');
                } elseif (isset($_GET['page']) && $_GET['page'] == 'detail') {
                    if (isset($_GET['function']) && $_GET['function'] == 'update') {
                    include('main/update.php');
                }else{
                    include('main/detail.php');
                    }
                }
                ?>
  </main>
<?php  require './include/script.php' ;?>
</body>

</html>