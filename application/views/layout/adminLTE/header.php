<?php 
$this->load->cssLoader([
        'bootstrap/v3/bootstrap.min.css',
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css',
        'https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css',
        'adminLTE/AdminLTE.css',
        'adminLTE/skins/_all-skins.min.css'
], true);

$this->load->jsLoader([
    'lib/cdnList.js',
], true);
?>
<head>
    <title><?php echo $this->load->getPageTitle(); ?></title>
    <?php echo $this->load->setCss(true); ?>
    <?php echo $this->load->setJs(true); ?>

    <script type="text/javascript">
        var jsVars = <?php echo $jsVars; ?>;
    </script>
</head>