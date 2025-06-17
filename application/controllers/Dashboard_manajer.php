<?php
defined('BASEPATH')OR exit('No direct script access allowed');

class Dashboard_manajer extends CI_Controller{
    public function index(){
        $data['content']= '<h1> Welcome to Adminlte 3 in codeigniter 3</h1>';
        $this->load->view('templates/header');
        $this->load->view('templates/dashboard_manajer', $data);
        $this->load->view('templates/footer');
    }
}