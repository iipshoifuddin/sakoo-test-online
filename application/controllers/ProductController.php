<?php 

class ProductController extends CI_Controller{

	function __construct(){
		parent::__construct();		
		$this->load->model('Product');
        $this->load->helper('url');
	}

	function index(){
        $data = $this->Product->tampil_data()->result();
        
        $this->output
        ->set_status_header(200)
        ->set_content_type('application/json', 'utf-8')
        ->set_output(json_encode($data, JSON_PRETTY_PRINT))
        ->_display();
        exit;
    }
    function product_detail($id){
        if($this->Product->help_checkid($id)===false)
        {
            $response = array(
                'Failed' => true,
                'Info' => 'Id Product Not Found !');
        }
        else
        {
            $response = $this->Product->product_detail($id)->result();
        }

        $this->output
        ->set_status_header(200)
        ->set_content_type('application/json', 'utf-8')
        ->set_output(json_encode($response, JSON_PRETTY_PRINT))
        ->_display();
        exit;
        //$this->load->view('v_tampil',$data);
    }
    public function productSave()
    {
        $check=true;
        $data = json_decode(file_get_contents('php://input'),true);
        if(strlen($data['name']) < 5 || strlen($data['name']) > 100 )
        {
            $response = array(
                'Failed' => true,
                'Info' => 'Input (name) between 5-100');
            $check=false;
        }
        if(strlen($data['description']) < 5 || strlen($data['name']) > 255 )
        {
            $response = array(
                'Failed' => true,
                'Info' => 'Input (description) between 5-255');
            $check=false;
        }
        if(!is_numeric($data['price']) || $data['price'] < 0)
        {
            $response = array(
                'Failed' => true,
                'Info' => 'Input (price) Must be real number and not negative number');
            $check=false;
        }
        if($this->Product->insertProduct($data) && $check===true)
        {
            $response = array(
            'Success' => true,
            'Info' => 'Data Has Been Save');
        }

        $this->output
            ->set_status_header(201)
            ->set_content_type('application/json', 'utf-8')
            ->set_output(json_encode($response, JSON_PRETTY_PRINT))
            ->_display();
        exit;
    }
    public function productUpdate($id)
    {
        $check=true;
        $data = json_decode(file_get_contents('php://input'),true);
        if($this->Product->help_checkid($id)===false)
        {
            $response = array(
                'Failed' => true,
                'Info' => 'Id Product Not Found !');
            $check=false;
        }
        if(strlen($data['name']) < 5 || strlen($data['name']) > 100 )
        {
            $response = array(
                'Failed' => true,
                'Info' => 'Input (name) between 5-100');
            $check=false;
        }
        if(strlen($data['description']) < 5 || strlen($data['name']) > 255 )
        {
            $response = array(
                'Failed' => true,
                'Info' => 'Input (description) between 5-255');
            $check=false;
        }
        if(!is_numeric($data['price']) || $data['price'] < 0)
        {
            $response = array(
                'Failed' => true,
                'Info' => 'Input (price) Must be real number and not negative number');
            $check=false;
        }
        if($this->Product->updateProduct($data,$id) && $check===true)
        {
            $response = array(
            'Success' => true,
            'Info' => 'Data Has Been Update');
        }

        $this->output
            ->set_status_header(200)
            ->set_content_type('application/json', 'utf-8')
            ->set_output(json_encode($response, JSON_PRETTY_PRINT))
            ->_display();
        exit;
    }
    
    public function productDelete($id)
    {
        $check=true;
        if($this->Product->help_checkid($id)===false)
        {
            $response = array(
                'Failed' => true,
                'Info' => 'Id Product Not Found !');
            $check=false;
        }
        if($this->Product->deleteProduct($id) && $check===true)
        {
            $response = array(
            'Success' => true,
            'Info' => 'Data Has Been Deleted !');
        }
        $this->output
            ->set_status_header(200)
            ->set_content_type('application/json', 'utf-8')
            ->set_output(json_encode($response, JSON_PRETTY_PRINT))
            ->_display();
        exit;
    }
}