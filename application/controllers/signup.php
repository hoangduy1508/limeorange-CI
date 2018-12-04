<?php
if (!defined('BASEPATH'))
exit('No direct script access allowed');
class Signup extends CI_Controller
{
   public function __construct(){
        parent::__construct();
        $this->load->helper("url");
        $this->load->library("session");
          $this->load->database();
         $this->load->helper(array("form", "url"));
          $this->load->helper("url");
    }
    // Hàm load form login
    public function index()
    {
      
         // Data cần truyền qua view
    //   $query = $this->db->query('SELECT * FROM user');

    //     $data=$query->result_array();
    //     print_r($data) ;
   
       if($this->input->post("submit")){
      
        $user = $this->input->post("username");
        $password = $this->input->post("password");
        $query = $this->db->query('INSERT INTO `user` (`id`, `name`, `pass`) VALUES (NULL, "'.$user.'", "'.$password.'")');
        
        $data=array(
            "username" => $user,
        );
         $this->session->set_userdata($data);
         redirect(base_url()."login/");
        }
           else{
                $this->load->view('signup');
           }
        // Load view và truyền data qua view
    }
}