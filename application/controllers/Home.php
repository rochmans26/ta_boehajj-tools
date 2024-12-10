<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('AprioriModel');
    }
    private function check_login()
    {
        if (!$this->session->userdata('id_user')) {
            return False;
        } else {
            return True;
        }
    }
    private function render_view($title, $page_view, $page_data = [])
    {
        $login = $this->check_login(); // Call the check_login function
        $navbar = $this->load->view('templates/navbar', ['login' => $login], TRUE);

        $data = [
            'lower' => $this->load->view('templates/lower', ['login' => $login], TRUE), // Return as string
            'header' => $this->load->view('templates/header', ['title' => $title, 'login' => $login], TRUE), // Return as string
            'page' => $this->load->view($page_view, array_merge(['login' => $login, 'navbar' => $navbar], $page_data), TRUE) // Merge additional data
        ];

        // Pass the data array to the main view
        $this->load->view('templates/main', $data);
    }
    public function index()
    {
        $riwayatApriori = $this->AprioriModel->getAllByUser($this->session->userdata('id_user')); // Get
        $this->render_view('Home', 'pages/home', ['r_apriori' => $riwayatApriori]); // call function render_view
    }

}
