<?php
defined('BASEPATH') or exit('No direct script access allowed');

// Include library PhpSpreadsheet
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Csv;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

class NewAprioriController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(['url', 'file']);
        $this->load->library('session');
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
        $this->render_view('Tambah Data', 'pages/form_apriori');
    }
    public function history_apriori()
    {
        $riwayatApriori = $this->AprioriModel->getAllByUser($this->session->userdata('id_user'));
        $this->render_view('Riwayat Apriori', 'pages/history_apriori', ['r_apriori' => $riwayatApriori]);
    }

    public function processApriori()
    {
        $min_support = $this->input->post('min_support');
        $min_confidence = $this->input->post('min_confidence');
        $id_user = $this->input->post('id_user');
        $file = $_FILES['transaction_file'];

        // Validasi file upload
        if (!$file || !in_array($file['type'], ['application/vnd.ms-excel', 'text/csv', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'])) {
            show_error("Invalid file format. Please upload a .csv or .xlsx file.");
            return;
        }

        // Ambil nama file dan ekstensi
        $nama_file = pathinfo($file['name'], PATHINFO_FILENAME);
        $ekstensi_file = pathinfo($file['name'], PATHINFO_EXTENSION);

        // Sanitasi nama file untuk mencegah masalah keamanan
        $nama_file = preg_replace('/[^a-zA-Z0-9_-]/', '_', $nama_file);
        $nama_file_sanitized = $nama_file . '.' . $ekstensi_file;

        // Memproses file menjadi array transaksi
        $transactions = $this->readTransactionFile($file['tmp_name'], $file['type']);
        $save_data = [
            'min_support' => $min_support,
            'min_confidence' => $min_confidence,
            'transaction' => json_encode($transactions),
            'nama_file' => $nama_file_sanitized,
            'id_user' => $id_user
        ];

        $s_saveData = $this->AprioriModel->insertLog($save_data);

        if ($s_saveData) {
            // Panggil fungsi untuk mengirim data ke API
            $result = $this->sendToAprioriApi($transactions, $min_support, $min_confidence);

            if ($result) {
                // Tampilkan hasil pada view atau olah lebih lanjut
                $d_apriori['association_rules'] = $result['association_rules'];
                $d_apriori['itemset_by_size'] = $result['itemset_by_size'];
                $d_apriori['item_occurrences'] = $result['item_occurrences'];
                $d_apriori['title'] = 'Apriori Result Page';

                $this->load->view('pages/apriori_result', $d_apriori);
            } else {
                $this->session->set_flashdata('msg', 'Proses API Apriori gagal!');
                redirect('home');
            }
        } else {
            $this->session->set_flashdata('msg', 'Penyimpanan Data Tidak Berhasil!');
            redirect('home');
        }
    }

    /**
     * Fungsi untuk mengirim data ke API Apriori
     *
     * @param array $transactions
     * @param float $min_support
     * @param float $min_confidence
     * @return array|null
     */
    private function sendToAprioriApi($transactions, $min_support, $min_confidence)
    {
        // Persiapkan data untuk dikirim ke API
        $data = [
            "transactions" => $transactions,
            "min_support" => floatval($min_support),
            "min_confidence" => floatval($min_confidence)
        ];

        // Kirim data ke API Flask menggunakan cURL
        $url = 'http://localhost:5000/apriori';
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

        $response = curl_exec($ch);
        $error = curl_error($ch);
        curl_close($ch);

        if ($error) {
            log_message('error', 'Error in sendToAprioriApi: ' . $error);
            return null;
        }

        return json_decode($response, true);
    }

    public function view_apriori($id_history)
    {
        $getData = $this->AprioriModel->getLogById($id_history);
        $result = $this->sendToAprioriApi(json_decode($getData->transaction), $getData->min_support, $getData->min_confidence);
        $d_apriori['association_rules'] = $result['association_rules'];
        $d_apriori['itemset_by_size'] = $result['itemset_by_size'];
        $d_apriori['item_occurrences'] = $result['item_occurrences'];
        $d_apriori['title'] = 'Apriori Result Page';
        // echo json_encode($result['item_occurrences']);
        $this->load->view('pages/apriori_result', $d_apriori);

    }

    public function hapus($id_history)
    {
        $delete = $this->AprioriModel->delete($id_history);
        if ($delete) {
            $this->session->set_flashdata('msg', 'Data berhasil dihapus!');
        } else {
            $this->session->set_flashdata('err_msg', 'Data gagal dihapus!');
        }

        redirect('home');
    }


    // Fungsi untuk membaca file CSV dan mengonversinya menjadi array transaksi berdasarkan Order ID dan Product Name
    private function readTransactionFile($filePath, $fileType)
    {
        $transactions = [];
        $orderItems = [];

        // Menggunakan reader CSV karena ini adalah file .csv
        $reader = new Csv();
        $spreadsheet = $reader->load($filePath);
        $sheetData = $spreadsheet->getActiveSheet()->toArray();

        // Mendapatkan indeks kolom Order ID, Product Name, dan Variation dari header
        $header = $sheetData[0];
        $orderIdIndex = array_search("Order ID", $header);
        $productNameIndex = array_search("Product Name", $header);
        $variationIndex = array_search("Variation", $header);

        if ($orderIdIndex === false || $productNameIndex === false || $variationIndex === false) {
            show_error("File CSV tidak memiliki kolom 'Order ID', 'Product Name', atau 'Variation'.");
            return [];
        }

        // Mengelompokkan produk berdasarkan Order ID, termasuk variasi
        for ($i = 1; $i < count($sheetData); $i++) {
            $row = $sheetData[$i];
            $orderId = $row[$orderIdIndex];
            $productName = $row[$productNameIndex];
            $variation = $row[$variationIndex];

            // Menggabungkan Product Name dengan Variation (jika ada)
            $item = $productName;
            if (!empty($variation)) {
                $item .= " ($variation)"; // Format: "Product Name (Variation)"
            }

            // Tambahkan item ke dalam transaksi yang sesuai
            if (!empty($orderId) && !empty($item)) {
                if (!isset($orderItems[$orderId])) {
                    $orderItems[$orderId] = [];
                }
                $orderItems[$orderId][] = $item;
            }
        }

        // Memformat orderItems sebagai array transaksi
        foreach ($orderItems as $orderId => $items) {
            $transactions[] = array_unique($items); // Menghilangkan item duplikat dalam satu transaksi
        }

        return $transactions;
    }

    public function result_page()
    {

        $title = 'Apriori Result Page';
        $login = $this->check_login(); // Call the check_login function
        $data = [
            'lower' => $this->load->view('templates/lower', ['login' => $login], TRUE), // Return as string
            'header' => $this->load->view('templates/header', ['title' => $title, 'login' => $login], TRUE), // Return as string
            'page' => $this->load->view('pages/apriori_result', ['login' => $login], TRUE) // Return as string
        ];
        $this->load->view('templates/main', $data);
    }

}
