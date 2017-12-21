<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {
    
    public function __construct() {
        parent::__construct();
    }

    public function index() {
        var_dump([$this->rest->method(), $this->rest->getInput()]);
        $this->load->setPageTitle('asdf');
        var_dump($this->load->getPageTitle());
        $this->load->setView('Home/index');
    }
}


?>