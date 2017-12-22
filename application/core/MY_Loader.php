<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Service\Interfaces\ViewControl;

class MY_Loader extends CI_Loader {

    use ViewControl;

    protected $ci;

    public function __construct() {
        parent::__construct();

        // inject ci object for throwing user exception
        $this->ci = &get_instance();
    }
}
