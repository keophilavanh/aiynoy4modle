<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// $this->load->model('User');

class Login extends CI_Controller{

   
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('file');
        $this->load->helper('download');
        $this->load->library('zip');
        $this->load->library('session');
       
    }

    public function index(){
        $this->Backup_auto(); 
        $this->load->view('view_login');
    }

    public function user_login(){
        $Username = $_POST["Username"];
        $Password  = $_POST["Password"];
        $this->load->model('Users_model');
        $data = $this->Users_model->user_login($Username, base64_encode($Password));
        if($data){
            $this->load->library('session');
            $this->session->token = base64_encode(json_encode($data));
            echo 'true';
        }else{
            echo 'false';
        }

        
    }

    public function user_logout(){
     
        $this->session->token = '';
        echo("<script>window.location = '".base_url('login')."';</script>");   
 
    }

    public function Backup_auto(){
      
        $this->load->dbutil();
        $db_format=array('format'=>'zip','filename'=>'my_db_backup.sql');
        $backup= $this->dbutil->backup($db_format);
        $dbname='backup-on-'.date('Y-m-d').'.zip';
        $save='assets/db_backup/'.$dbname;
        write_file($save,$backup);
       // force_download($dbname,$backup);

       

        
    }



  
   


   
}

?>