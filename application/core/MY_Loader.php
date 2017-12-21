<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Service\Interfaces\ViewControl;

class MY_Loader extends CI_Loader {

    use ViewControl;

    public function __construct() {
        parent::__construct();
    }
}
