<?php
class login extends CI_CONTROLLER{
    function __construct(){
        parent::__construct();
        $this->load->model('loginModel');
    }
    function index(){
        $this->load->view('loginView.php');
    }
    function cek_login(){
        $user=$this->input->post('username');
        $pass=md5($this->input->post('password'));
        $data=$this->loginModel->cek_login($user, $pass);
        if($data->num_rows() > 0){
            $q= $data->row();//mengambil data di table login
            $isi=array('user'=> $user,
                'statusku' => $q->status, 
                'status'=> "login");
            $this->session->set_userdata($isi);
            redirect('home');
        }
        else{
            $this->session->set_flashdata('Username atau Password Salah');
            redirect('login');
        }
    }
}
?>