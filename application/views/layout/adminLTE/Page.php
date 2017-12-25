<!DOCTYPE html>
<html lang="zh_tw">
<!-- header -->
<?php
$this->load->view('layout/adminLTE/header');
?>
<body class="skin-blue-light sidebar-mini sidebar-collapse">
    <div class="wrapper" style="min-height:183px">
        <!-- head bar -->
        <?php $this->load->view('layout/adminLTE/headBar') ?>

        <!-- side menu -->
        <?php ?>

        <!-- main content -->
        <div class="content-wrapper row">
            <?php echo $viewContent; ?>
        </div>
    </div>
    <!-- footer -->
    <?php
    $this->load->view('layout/adminLTE/footer');
    ?>
</body>
</html>