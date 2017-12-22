<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Service\Interfaces\Restful;
use Service\Exception\UserException;

class MY_Controller extends CI_Controller {

    public $resPath;
    public $version;

    protected $rest;

    public function __construct() {
        parent::__construct();

        $this->rest = new Restful($this);
        $this->resPath = [
            'css' => base_url('resource/css/'), 'js' => base_url('resource/js/')
        ];
        
        switch (ENVIRONMENT) {
            case 'development':
                $this->version = time();
                break;
            
            case 'production':
                break;
        }

        $this->load->setJsVars([
            'version' => $this->version,
            'baseUrl' => base_url(),
            'baseResUrl' => $this->resPath,
        ]);
    }

    public function userException($message, $code = 0, Exception $prev = null) {
        throw new UserException($message, $code, $prev);
    }
}

?>