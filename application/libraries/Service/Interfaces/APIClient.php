<?php
namespace Service\Interfaces;
defined('BASEPATH') OR exit('No direct script access allowed');

use GuzzleHttp\Client;
use GuzzleHttp\Psr7;
use Guzzle\Http\Exception\ClientErrorResponseException;

class APIClient {
    protected $_rootUrl;
    protected $_endpoint;
    
    public function __construct($config = []) {
        if (!empty($config['apiUrl'])) {
            $this->_rootUrl = $config['apiUrl'];
        } else {
            $this->_rootUrl = base_url();
        }

        $this->_endpoint = [
            'test/hello' => 'test/world',
            'auth/token' => 'auth/token',
        ];
    }

    public function setRootUrl($rootUrl = '') {
        if ($rootUrl === '') {
            return false;
        }
        $this->_rootUrl = $rootUrl;
        return $this->getUrl();
    }

    public function getUrl($endpoint = '') {
        if (isset($this->_endpoint[$endpoint])) {
            return $this->_rootUrl.$this->_endpoint[$endpoint];
        }
        return $this->_rootUrl;
    }

    public function request($method, $url, $opt) {
        $client = new Client();

        try {
            $resp = $client->{$method}($url, $opt);
            $status = $resp->getStatusCode();
            $body = $resp->getBody()->getContents();
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            $resp = $e->getResponse();
            $request = $e->getRequest();

            $status = $resp->getStatusCode();
            $body = [
                'request' => Psr7\str($request),
                'response' => Psr7\str($resp),
            ];
        } catch (\Exception $e) {
            $status = \HTTP_INTERNAL_SERVER_ERROR;
            $body = '';
        }

        return [
            'status' => $status,
            'body' => $body,
        ];
    }
}
