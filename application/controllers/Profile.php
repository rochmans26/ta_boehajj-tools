<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{
    public function index()
    {
        $title = 'Profil';
        $data = [
            'lower' => $this->load->view('templates/lower', [], TRUE), // Return as string
            'header' => $this->load->view('templates/header', ['title' => $title], TRUE), // Return as string
            'page' => $this->load->view('pages/profile', [], TRUE) // Return as string
        ];

        // Pass the data array to the main view
        $this->load->view('templates/main', $data);
    }
}
