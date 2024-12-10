<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('UserModel');
    }
    private function check_login()
    {
        if (!($this->session->userdata('id_user'))) {
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
        if ($this->session->userdata('role') != 'admin')
            redirect('home');

        $getAllUser = $this->UserModel->getAllUser(); // Get
        $this->render_view('Users', 'pages/user-management', ['data' => $getAllUser]); // call function render_view
    }

    public function blockUser($id)
    {
        if ($this->session->userdata('role') != 'admin')
            redirect('home');
        $this->UserModel->blockUser($id); // Call
        redirect('users'); // Redirect
    }

}
