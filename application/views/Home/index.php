<?php 
$this->load->jsLoader([
    [
        'url' => 'lib/vendor/requirejs/2.3.5/require.min.js',
        'htmlOption' => [
            'data-main' => $this->resPath['js'].'app/home/index.js'
        ]
    ]
]);
?>
test page