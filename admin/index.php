<!DOCTYPE html>
<html lang="en">
<body>
    <?php require 'connection.php';
    require './include/head.php';
    require './include/header.php';
    require './include/banner.php'; ?>
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
            } else {
                include('main/detail.php');
            }
        } elseif (isset($_GET['page']) && $_GET['page'] == 'a_a') {
        if (isset($_GET['function']) && $_GET['function'] == 'update') {
            include('main/data/add_update_agency.php');
        }
        if (isset($_GET['function']) && $_GET['function'] == 'delete') {
            include('main/data/add_delete_agency.php');
        } else {
            include('main/data/add_agency.php');
        }
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