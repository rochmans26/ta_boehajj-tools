<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $login = $this->check_login(); // Call the check_login function
        $this->load->model('AprioriModel');
    }
    public function index()
    {
        $title = 'Home';
        $login = $this->check_login(); // Call the check_login function
        $riwayatApriori = $this->AprioriModel->getAllByUser($this->session->userdata('id_user')); // Get
        // echo json_encode($riwayatApriori);
        $navbar = $this->load->view('templates/navbar', ['login' => $login], TRUE);
        $data = [
            'lower' => $this->load->view('templates/lower', ['login' => $login], TRUE), // Return as string
            'header' => $this->load->view('templates/header', ['title' => $title, 'login' => $login], TRUE), // Return as string
            'page' => $this->load->view('pages/home', ['login' => $login, 'r_apriori' => $riwayatApriori, 'navbar' => $navbar], TRUE) // Return as string
        ];

        // Pass the data array to the main view
        $this->load->view('templates/main', $data);
    }
    private function check_login()
    {
        if (!$this->session->userdata('id_user')) {
            return False;
        } else {
            return True;
        }
    }
}
