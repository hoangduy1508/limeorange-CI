<?php
if (!defined('BASEPATH'))
exit('No direct script access allowed');
class Login extends CI_Controller
{
  public function __construct(){
        parent::__construct();
        $this->load->helper("url");
        $this->load->library("session");
    }
    // Hàm load form login
    public function index()
    {
       $this->load->database();
         // Data cần truyền qua view
       
       
       
        // // Load view và truyền data qua view
        $this->load->view('login');
      
    }
}