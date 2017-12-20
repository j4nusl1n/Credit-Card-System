<?php
/*
 * 為了維護程式碼class 越來越多的問題
 * 採用auoload PSR-0 defination
 */
function CIAutoload($className)
{
    // 提供ci core用
    if (substr($className,0,3) !== 'CI_') {
        if (file_exists($file = APPPATH . 'core/' . $className . EXT)) {
            include $file;
        }
    }

    if( strpos($className,'\\') !== false &&
        (   strpos($className, "CRM") !==false ||
            strpos($className, "ICS") !==false  ||
            strpos($className, "Service") !==false  ||
            strpos($className, "Vendor") !== false)){
        // Namespaced Classes
        $classFile = str_replace('\\','/',$className);

        if($className[0] !== '/'){
            $classFile = APPPATH.'libraries'.DIRECTORY_SEPARATOR.ucfirst($classFile).'.php';
            //$classfile = APPPATH.'models/'.$classfile.'.php';
        }
        require($classFile);
    }
}

/**
 * 相符舊版本
 */
if (version_compare(PHP_VERSION, '5.1.2', '>=')) {
    //SPL autoloading was introduced in PHP 5.1.2
    if (version_compare(PHP_VERSION, '5.3.0', '>=')) {
        spl_autoload_register('CIAutoload', true, true);
    } else {
        spl_autoload_register('CIAutoload');
    }
} else {
    /**
     * Fall back to traditional autoload for old PHP versions
     * @param string $classname The name of the class to load
     */
    function __autoload($classname)
    {
        CIAutoload($classname);
    }
}
