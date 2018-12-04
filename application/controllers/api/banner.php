
<?php
use Restserver\Libraries\REST_Controller;
if (!defined('BASEPATH'))
exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Banner extends REST_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
		$this->load->helper("url");
        $this->load->library("session");
        $this->load->database();
        $this->load->helper(array("form", "url"));
        $this->load->helper("url");
        // Configure limits on our controller methods
        // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
        $this->methods['users_get']['limit'] = 500; // 500 requests per hour per user/key
        $this->methods['users_post']['limit'] = 100; // 100 requests per hour per user/key
        $this->methods['users_delete']['limit'] = 50; // 50 requests per hour per user/key
    }
    public function index()
    {
    	$data = array('duy' => "dsadsadsa" );
       $this->set_response($data, REST_Controller::HTTP_OK); 
    }
    public function allbanner_get()
	{
		$id = $this->get('id');
		if($id) $where ="id =".$id;
		else $where ="1=1";
		$sql = "SELECT * FROM banner WHERE ".$where;
	    $query = $this->db->query($sql);
	    $data = $query->result_array();
	    // $data=json_encode($data);
        $this->set_response($data, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
	}
    

    public function edit_put()
    {
    	$id = $this->put("id");
    	$type = $this->put("type");
        $link = $this->put("link");
       	$data=array(
            "type" => $type,
            "link" => $link,
        );
        $this->db->where("id", $id);
        if($this->db->update("banner", $data)){
            echo "Update Thanh cong";
        }else{
            echo "Update That bai";
        }
       
    }
    public function delete_post()
    {
    	$id = $this->post("id");
        $this->db->where("id", $id);
        if($this->db->delete("banner")){
            $sql = "SELECT * FROM banner ";
		    $query = $this->db->query($sql);
		    $data = $query->result_array();
		    // $data=json_encode($data);
	       $this->set_response($data, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
        }else{
            echo "delete That bai";
        }
       
    }

    public function users_delete()
    {
        $id = (int) $this->get('id');

        // Validate the id.
        if ($id <= 0)
        {
            // Set the response and exit
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
        }

        // $this->some_model->delete_something($id);
        $message = [
            'id' => $id,
            'message' => 'Deleted the resource'
        ];

        $this->set_response($message, REST_Controller::HTTP_NO_CONTENT); // NO_CONTENT (204) being the HTTP response code
    }

}
