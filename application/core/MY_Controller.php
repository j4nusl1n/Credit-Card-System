<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Service\Interfaces\Restful;

class MY_Controller extends CI_Controller {

    protected $rest;

    public function __construct() {
        parent::__construct();

        $this->rest = new Restful($this);
    }
}

?>