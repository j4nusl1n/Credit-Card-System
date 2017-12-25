<?php
namespace Service\Interfaces;
defined('BASEPATH') OR exit('No direct script access allowed');

trait ViewControl {

    private $_pageTitle;
    private $_jsVars = [];
    private $_resource = [
        'js' => [
            [], []
        ], 
        'css' => [
            [], []
        ],
    ];

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
        $this->view($layout, $data);
    }

    public function setPageTitle($title = '') {
        $this->_pageTitle = $title;
    }

    public function getPageTitle() {
        return isset($this->_pageTitle)? $this->_pageTitle:'';
    }

    public function setHtml($filename) {
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        $html = '';

        switch ($ext) {
            case 'css':
                break;
            case 'less':
                break;
            case 'js':
                break;
        }
    }

    public function jsLoader($file, $option = false) {
        $this->_resLoader('js', $file, $option);
    }

    public function cssLoader($file, $option = false) {
        $this->_resLoader('css', $file, $option);
    }

    private function _resLoader($resType, $file, $option) {
        $res = [];
        if (is_string($file)) {
            $res[] = $file;
        } else if (is_array($file)) {
            $res = $file;
        } else {
            $this->ci->userException('Resource: Incorrect file type', E_ERROR);
        }

        $resPriority = 1;
        if ($option) {
            $resPriority = 0;
        }

        $res = array_merge($this->_resource[$resType][$resPriority], $res);
        $this->_resource[$resType][$resPriority] = $res;
    }

    public function setJs($priority = false) {
        return $this->_setRes('js', $priority);
    }

    public function setCss($priority = false) {
        return $this->_setRes('css', $priority);
    }

    private function _setRes($resType, $priority) {
        $position = $priority? 0: 1;

        $ret = [];
        foreach ($this->_resource[$resType][$position] as $file) {
            $htmlOption = '';
            if (is_string($file)) {
                $src = $file;
            } else {
                if (empty($file['url'])) {
                    $this->ci->userException('Resource: missing file path', E_ERROR);
                }
                $src = $file['url'];
                if (isset($file['htmlOption'])) {
                    if (is_string($file['htmlOption'])) {
                        $htmlOption = $file['htmlOption'];
                    } else if (is_array($file['htmlOption'])) {
                        $htmlOption = [];
                        foreach ($file['htmlOption'] as $option => $val) {
                            $htmlOption[] = "{$option}='{$val}'";
                        }
                        $htmlOption = implode(' ', $htmlOption);
                    } else {
                        $htmlOption = '';
                    }
                }
            }

            if (preg_match('/^(http\:\/\/|https\:\/\/|\:\/\/)/', $src)) {
                $src = $src;
            } else {
                $src = '//'.$this->ci->resPath[$resType].$src.'?'.$this->ci->version;
            }
            switch ($resType) {
                case 'js':
                    $html = '<script type="text/javascript" src="%s" %s></script>';
                    $html = sprintf($html, $src, $htmlOption);
                    break;
                case 'css':
                    $html = '<link rel="stylesheet" type="text/css" href="%s"/>';
                    $html = sprintf($html, $src);
                    break;
                default:
                    $this->ci->userException('Resource: Incorrect resource type', E_ERROR);
                    break;
            }

            $ret[] = $html;
        }

        return implode('', $ret);
    }

    public function setJsVars($vars = []) {
        if (!is_array($vars)) {
            $this->ci->userException('ViewControl: Incorrect js vars type');
        }
        $this->_jsVars = array_merge($this->_jsVars, $vars);
        $this->vars([
            'jsVars' => json_encode($this->_jsVars),
        ]);
    }
}


?>