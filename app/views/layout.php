<?php
    require_once "./app/views/pages/include/header.php";
?>

<!-- <div class="main"> Main Content Div -->
<?php
    if (isset($data)) {
        require_once "./app/views/pages/{$data['page']}.php";
    }
?>
<!-- </div> End Main Content Div -->

<?php require_once "./app/views/pages/include/footer.php"; ?>
