<?php
if (!defined('BASEPATH'))
exit('No direct script access allowed');
class Index2 extends CI_Controller
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
       
         $sqlbannerloai1 = "SELECT * FROM banner WHERE type = '1'";
         $sqlbannerloai2 = "SELECT * FROM banner WHERE type = '2'";
         $sqlbannerloai3 = "SELECT * FROM banner WHERE type = '3'";
         $sqlLime = "SELECT * FROM product WHERE catid = '3'";
         $sqlAW = "SELECT * FROM product WHERE catid = '4'";
         $sqlBW = "SELECT * FROM product WHERE catid = '5'";
         $sqlRHYME = "SELECT * FROM product WHERE catid = '6'";
    
        $query_sqlbannerloai1 = $this->db->query($sqlbannerloai1);
        $query_sqlbannerloai2 = $this->db->query($sqlbannerloai2);
        $query_sqlbannerloai3 = $this->db->query($sqlbannerloai3);
        $query_sqlLime = $this->db->query($sqlLime);
        $query_sqlAW = $this->db->query($sqlAW);
        $query_sqlBW = $this->db->query($sqlBW);
        $query_sqlRHYME = $this->db->query($sqlRHYME);
 
        $data= array(
            'bannerloai1' => $query_sqlbannerloai1->result_array(),
            'bannerloai2' => $query_sqlbannerloai2->result_array(),
            'bannerloai3' => $query_sqlbannerloai3->result_array(),
            'lime' => $query_sqlLime->result_array(),
            'aw' => $query_sqlAW->result_array(),
            'bw' => $query_sqlBW->result_array(),
            'rhyme' => $query_sqlRHYME->result_array()

        );
        // Load view và truyền data qua view
          $this->load->view('index',$data);
    //    echo '<pre>';
    //    print_r($data);
    //    echo '</pre>';
        
    }
}