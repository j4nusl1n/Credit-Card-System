<!DOCTYPE html>
<html lang="zh_tw">
<!-- header (loading js & css before) -->
<?php
$this->load->view('layout/adminLTE/header');
?>
<body class="skin-blue sidebar-mini sidebar-collapse">
    <div class="wrapper" style="min-height:183px">
        <!-- head bar -->
        <?php $this->load->view('layout/adminLTE/headBar') ?>

        <!-- side menu -->
        <?php $this->load->view('layout/adminLTE/sideBarLeft') ?>

        <!-- main content -->
        <div class="content-wrapper row">
            <?php echo $viewContent; ?>
        </div>
        <!-- footer (loading js & css afterward) -->
        <?php $this->load->view('layout/adminLTE/footer'); ?>
    </div>
</body>
</html>