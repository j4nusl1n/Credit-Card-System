<?php
namespace Service\Exception;
class UserException extends \Exception {
    
    public function __construct($msg, $code = 0, Exception $previous = null) {
        parent::__construct($msg, $code, $previous);
    }

    public function __toString() {
        return __CLASS__.": [{$this->code}] {$this->messsage}\n";
    }
}
