<?php
namespace Service\Interfaces;
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Restful methods
 */
class Restful {
    private $_response;
    private $_httpStatus;
    private $_method;
    private $_ci;

    public function __construct(&$ci) {
        if (!isset($ci)) {
            return false;
        }

        $this->_ci = $ci;
        $this->_method = $_SERVER['REQUEST_METHOD'];
    }

    /**
     * Get request method
     * @return  [string] 
     */
    public function method() {
        return $this->_method;
    }

    /**
     * Get the request parameters
     * @param   [string]    optional retrieve the specific data by key
     * @return  [mixed]     return false on failure, otherwise return the parameter(s)
     */
    public function getInput($key = '') {
        $params = [];
        switch ($this->_method) {
            case 'GET':
                $params = $this->_ci->input->get(null, true);
                break;
            case 'POST':
                if (empty($_POST)) {
                    $params = json_decode(file_get_contents('php://input'), true);
                } else {
                    $params = $this->_ci->input->post(null, true);
                }
                break;
            case 'PUT':
                $params = json_decode(file_get_contents('php://input'), true);
                break;
            case 'PATCH':
                parse_str(file_get_contents('php://input'), $_PUT);
                $params = $_PUT;
                break;
            default:
                return false;
        }

        if ($key !== '') {
            return isset($params[$key])? $params[$key]: false;
        } else {
            return $params;
        }
    }

    /**
     * Set the response content and http status code
     * @param   [mixed]     content
     * @param   [int]       http status code
     * @return null
     */
    public function setResp($resp = '', $http = HTTP_BAD_REQUEST) {
        $this->_response = $resp;
        $this->_httpStatus = $http;
    }

    /**
     * Send the response
     * @param [mixed]   content
     * @param [int]     http status code
     */
    public function send($resp = null, $http = null) {
        if (!is_null($resp)) {
            $this->_response = $resp;
        }

        if (!is_null($http)) {
            $this->_httpStatus = $http;
        }

        http_response_code($this->_httpStatus);
        if (!is_string($this->_response)) {
            $this->_response = print_r($this->_response, true);
        }
        echo $this->_response;
    }
}

?>