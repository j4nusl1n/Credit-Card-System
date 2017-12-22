<!DOCTYPE html>
<html lang="zh_tw">
<!-- header -->
<?php
$this->load->view('layout/adminLTE/header');
?>
<body>
<div class="wrapper" style="min-height:183px">
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