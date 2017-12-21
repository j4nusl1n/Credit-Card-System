<?php
namespace Service\Interfaces;
defined('BASEPATH') OR exit('No direct script access allowed');

trait ViewControl {

    private $_pageTitle;

    public function setView($page, $data = [], $layout = '') {
        if ($layout === '') {
            $layout = \DEFAULT_LAYOUT;
        }

        $viewContent = $this->view($page, $data, true);
        if (is_array($data)) {
            $data = array_merge($data, [
                'viewContent' => $viewContent,
            ]);
        } else {
            $data = [
                'viewContent' => $viewContent,
            ];
        }
        $this->load->view($layout, $data);
    }

    public function setPageTitle($title = '') {
        $this->_pageTitle = $title;
    }

    public function getPageTitle() {
        return isset($this->_pageTitle)? $this->_pageTitle:'';
    }
}


?>