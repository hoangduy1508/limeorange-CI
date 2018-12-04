<?php
if (!defined('BASEPATH'))
exit('No direct script access allowed');
class Admin extends CI_Controller
{
   public function __construct(){
        parent::__construct();
        $this->load->helper("url");
        $this->load->library("session");
        $this->load->database();
        $this->load->helper(array("form", "url"));
    }

    // Hàm load form login
    public function index()
    {
         $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '100000';
        $config['max_width']  = '10000';
        $config['max_height']  = '10000';
        $config['file_name']  = strtotime(date("Y/m/d h:i:sa"));
         // $config['file_name']  = strtotime(date("Y/m/d"));
         $this->load->library("upload", $config);
         if($this->input->post("submit")){
            
            if($this->input->post("func")=="edit"){
                $id = $this->input->post("id");
                $this->upload->do_upload('file');
                
                $img = "./uploads/".strtotime(date("Y/m/d h:i:sa"))."".$this->upload->data('file_ext');
                $data=array(
                    "img" => $img
                );
                $this->db->where("id", $id);
                $this->db->update("banner", $data);
               
            }
            else
            {
                $this->upload->do_upload('file');
                $img = "./uploads/".strtotime(date("Y/m/d h:i:sa"))."".$this->upload->data('file_ext');
                $type = $this->input->post("type");
                $link = $this->input->post("link");
                $query = $this->db->query('INSERT INTO `banner` (`id`, `type`, `link`,`img`) VALUES (NULL, "'.$type.'", "'.$link.'", "'.$img.'")');
                    
            }
        }          
        // Load view và truyền data qua view
          $this->load->view('admin/index');
    //    echo '<pre>';
    //    print_r($data);
    //    echo '</pre>';
        
    }

    public function product()
    {
         $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '1000';
        $config['max_width']  = '10000';
        $config['max_height']  = '10000';
        $config['file_name']  = strtotime(date("Y/m/d h:i:sa"));
         // $config['file_name']  = strtotime(date("Y/m/d"));
         $this->load->library("upload", $config);
         if($this->input->post("submit")){
          
            if($this->input->post("func")=="edit"){
                $id = $this->input->post("id");
             
                if($this->upload->do_upload('img_main')){
                    $img = "./uploads/".strtotime(date("Y/m/d h:i:sa"))."".$this->upload->data('file_ext');
                    $data=array(
                        "img_main" => $img
                    );

                    $this->db->where("id", $id);
                    $this->db->update("product", $data);
                }
                else if($this->upload->do_upload('img_sub'))
                {
                     $img = "./uploads/".strtotime(date("Y/m/d h:i:sa"))."".$this->upload->data('file_ext');
                    $data=array(
                        "img_sub" => $img
                    );
                    $this->db->where("id", $id);
                    $this->db->update("product", $data);
                }
                
               
            }
           else if($this->input->post("func")=="add")
            {

                if($this->upload->do_upload('img_main')){

                        $img_main = "./uploads/".strtotime(date("Y/m/d h:i:sa"))."".$this->upload->data('file_ext');
                    }
                if($this->upload->do_upload('img_sub'))
                {
                     $img_sub = "./uploads/".strtotime(date("Y/m/d h:i:sa"))."".$this->upload->data('file_ext');
                    
                }

                $data = [
                    "name"=>$this->input->post("name"),
                    "catid"=>$this->input->post("catid"),
                    "cost"=>$this->input->post("cost"),
                    "img_main"=>$img_main,
                    "img_sub"=>$img_sub
                ];
                $this->db->insert("product", $data);
                
                
            }
       
        }

     
            $this->load->view('admin/product'); 
        
      
        // Load view và truyền data qua view
         
    //    echo '<pre>';
    //    print_r($data);
    //    echo '</pre>';
        
    }
}