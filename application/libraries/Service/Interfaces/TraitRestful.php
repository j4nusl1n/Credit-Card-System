<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Restful methods
 */
trait Restful
{
    protected $_response;
    protected $_httpStatus;

    protected function setResponse($resp = '', $http = HTTP_BAD_REQUEST) {
        $this->_response = $resp;
        $this->_httpStatus = $http;
    }

    protected function sendResponse($resp = null, $http = null) {
        if (!is_null($resp)) {
            $this->_response = $resp;
        }

        if (!is_null($http)) {
            $this->_httpStatus = $http;
        }

        http_response_code($this->_httpStatus);
        echo $this->_response;
    }
}

?>