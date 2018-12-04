<?php
if (!defined('BASEPATH'))
exit('No direct script access allowed');
  
class Hello extends CI_Controller {
  
    // Hàm khởi tạo
    function __construct() {
        // Gọi đến hàm khởi tạo của cha
        parent::__construct();
    }
    
    public function index($message = 'haha')
    {
        echo 'Freetuts.net ' . $message;
    }
  
    public function other(){
        echo 'Freetuts.net Other Controller';
    }
}
