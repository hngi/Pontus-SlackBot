<?php
class error_report 
{
    public $error;
    public $error1;

    function __construct($error,$error1,$error2)
    {
        $this->error=$error;
        $this->error1=$error1;
        $this->error2=$error2;
    }
    function error(){
        ini_set('display_errors', $this->error1);
        ini_set('display_startup_errors', $this->error2);
        error_reporting($this->error);
    }
}

?>