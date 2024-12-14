<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AprioriController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
    }

    public function index()
    {
        // Load form to upload CSV
        $this->load->view('upload_form');
    }

    public function process_apriori()
    {
        // Cek apakah file CSV diunggah
        if (!empty($_FILES['csv_file']['tmp_name'])) {

            // File path untuk CSV yang diunggah
            $file_path = $_FILES['csv_file']['tmp_name'];

            // Min support dan confidence yang bisa diambil dari form (atau gunakan default)
            $min_support = $this->input->post('min_support') ?: 0.5;
            $min_confidence = $this->input->post('min_confidence') ?: 0.7;

            // Menggunakan cURL untuk mengirim request ke API Python
            $url = 'http://localhost:5000/apriori'; // Ganti dengan URL API Python Anda

            // cURL untuk mengirim file dan parameter ke API
            $curl = curl_init();
            $cfile = new CURLFile($file_path, 'text/csv', $_FILES['csv_file']['name']);

            $postfields = array(
                'file' => $cfile,
                'min_support' => $min_support,
                'min_confidence' => $min_confidence
            );

            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $postfields);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

            // Kirim request dan dapatkan response dari API
            $response = curl_exec($curl);
            curl_close($curl);

            // Decode JSON response dari API
            $result = json_decode($response, true);

            // Kirimkan hasil ke view untuk ditampilkan
            $data['results'] = $result;
            $this->load->view('apriori_results', $data);
            // echo json_encode($result);
        } else {
            // Tampilkan pesan error jika file tidak diunggah
            echo "File CSV belum diunggah!";
        }
    }
}
