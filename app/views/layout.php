<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <base href="<?= BASE_URL ?>">
    <title>Trang đọc tin tức</title>
    <!-- css -->
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/login/overlay_model.css">
    <!-- img -->
    <link rel="shortcut icon" href="./assets/img/core-img/favicon.ico">
    <!-- font -->
    <link rel="stylesheet" href="./assets/css/font-awesome.min.css" type="text/css" media="all">
</head>

<body>
    <!-- Header -->
    <?php require_once "./app/views/pages/include/home/header.php"; ?>
    <!-- Main -->
    <?php
    if (isset($data))
        require_once "./app/views/pages/{$data['page']}.php";
    ?>
    <!-- Footer -->
    <?php require_once "./app/views/pages/include/home/footer.php"; ?>
    <!-- Login -->
    <?php require_once "./app/views/pages/include/home/login.php"; ?>
</body>

<!-- JS -->
<!-- jQuery-2.2.4 js -->
<script src="./assets/js/jquery/jquery-2.2.4.min.js"></script>
<!-- Popper js -->
<script src="./assets/js/bootstrap/popper.min.js"></script>
<!-- Bootstrap js -->
<script src="./assets/js/bootstrap/bootstrap.min.js"></script>
<!-- All Plugins js -->
<script src="./assets/js/plugins/plugins.js"></script>
<!-- Active js -->
<script src="./assets/js/active.js"></script>
<!-- Login js -->
<script src="./assets/js/login.js"></script>
</body>

</html>