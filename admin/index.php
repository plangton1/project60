<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<body>
    <?php require 'connection.php';
    require './include/head.php';
    require './include/header.php';
    require './include/banner.php'; ?>
    <?php if (isset($_SESSION['user_login']) && !empty($_SESSION['user_login'])) : ?>
        <main id="main">
            <?php
            if (!isset($_GET['page']) && empty($_GET['page'])) {
                include('index.php');
            } elseif (isset($_GET['page']) && $_GET['page'] == 'insert') {
                include('main/insert.php');
            } elseif (isset($_GET['page']) && $_GET['page'] == 'status') {
                include('main/index.php');
            } elseif (isset($_GET['page']) && $_GET['page'] == 'detail') {
                if (isset($_GET['function']) && $_GET['function'] == 'update') {
                    include('main/update.php');
                }
                if (isset($_GET['function']) && $_GET['function'] == 'delete') {
                    include('main/delete.php');
                }
                if (isset($_GET['function']) && $_GET['function'] == 'print') {
                    include('main/print.php');
                } else {
                    include('main/detail.php');
                }
            } elseif (isset($_GET['page']) && $_GET['page'] == 'add_agency') {
                if (isset($_GET['function']) && $_GET['function'] == 'update') {
                    include('main/data/add_update_agency.php');
                }
                if (isset($_GET['function']) && $_GET['function'] == 'delete') {
                    include('main/data/add_delete_agency.php');
                } else {
                    include('main/data/add_agency.php');
                }
            } elseif (isset($_GET['page']) && $_GET['page'] == 'add_type') {
                if (isset($_GET['function']) && $_GET['function'] == 'update') {
                    include('main/data/add_update_type.php');
                }
                if (isset($_GET['function']) && $_GET['function'] == 'delete') {
                    include('main/data/add_delete_type.php');
                } else {
                    include('main/data/add_type.php');
                }
            } elseif (isset($_GET['page']) && $_GET['page'] == 'add_department') {
                if (isset($_GET['function']) && $_GET['function'] == 'update') {
                    include('main/data/add_update_department.php');
                }
                if (isset($_GET['function']) && $_GET['function'] == 'delete') {
                    include('main/data/add_delete_department.php');
                } else {
                    include('main/data/add_department.php');
                }
            } elseif (isset($_GET['page']) && $_GET['page'] == 'add_group') {
                if (isset($_GET['function']) && $_GET['function'] == 'update') {
                    include('main/data/add_update_group.php');
                }
                if (isset($_GET['function']) && $_GET['function'] == 'delete') {
                    include('main/data/add_delete_group.php');
                } else {
                    include('main/data/add_group.php');
                }
            } elseif (isset($_GET['page']) && $_GET['page'] == 'printex') {
                include('main/printexcle.php');
            } elseif (isset($_GET['page']) && $_GET['page'] == 'printwo') {
                include('main/printword.php');
            } elseif (isset($_GET['page']) && $_GET['page'] == 'dash') {
                include('dash/index.php');
          
            } elseif (isset($_GET['page']) && $_GET['page'] == 'add_insert_type') {
                include('main/data/add_insert_type.php');
            } elseif (isset($_GET['page']) && $_GET['page'] == 'add_insert_group') {
                include('main/data/add_insert_group.php');
            } elseif (isset($_GET['page']) && $_GET['page'] == 'add_insert_agency') {
                include('main/data/add_insert_agency.php');
            } elseif (isset($_GET['page']) && $_GET['page'] == 'add_insert_department') {
                include('main/data/add_insert_department.php');
            } elseif (isset($_GET['page']) && $_GET['page'] == 'contact') {
                include('main/contact.php');
             } elseif (isset($_GET['page']) && $_GET['page'] == 'logout') {
                include('../logout/index.php');
             }
            ?>
        </main>
        <?php require './include/script.php'; ?>
        <?php require './include/footer.php'; ?>
</body>
<script src="extend\jquery-3.6.0.min.js"></script>
<script type="text/javascript">
    function add_element(mom, baby) {
        var cloning = $("#" + baby).clone(true);

        cloning.css("display", "");

        $("#" + mom).append(cloning);
    }
</script>

</html>
<?php else : ?>
    <?php include('../index.php') ?>
<?php endif; ?>