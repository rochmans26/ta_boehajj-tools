<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Csvimport {
    
    public function get_array($file_path) {
        $csv_array = array_map('str_getcsv', file($file_path));
        $header = array_shift($csv_array);
        $csv_data = array();
        foreach ($csv_array as $row) {
            $csv_data[] = array_combine($header, $row);
        }
        return $csv_data;
    }
}
