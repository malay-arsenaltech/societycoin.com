<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

// ------------------------------------------------------------------------

/**
 *
 * Helper            csv_helper
 * Author             Rahul Trivedi<rahul.trivedi@arsenaltech.com>
 * Date-Created       06th Oct, 2012
 * Date- Modified     06th Oct, 2012
 * 
 * Libaray-Purpose    This is generate csv,xls,doc etc
 * Modifications      06th Oct, 2012 :
 */
// ------------------------------------------------------------------------

/**
 * Array to CSV
 * download == "" -> return CSV string
 * download == "demo.csv" -> download file demo.csv
 */
if (!function_exists('array_to_csv')) {

    function array_to_csv($array, $download = "") {
        if ($download != "") {
            header('Content-Type: application/csv');
            header('Content-Disposition: attachement; filename="' . $download . '"');
        }

        ob_start();
        $f = fopen('php://output', 'w') or show_error("Can't open php://output");
        $n = 0;
        foreach ($array as $line) {
            $n++;
            if (!fputcsv($f, $line)) {
                show_error("Can't write line $n: $line");
            }
        }
        fclose($f) or show_error("Can't close php://output");
        $str = ob_get_contents();
        ob_end_clean();

        if ($download == "") {
            return $str;
        } else {
            echo $str;
        }
    }

}

// ------------------------------------------------------------------------

/**
 * Query to CSV
 * $headers = arrray(); Optional Pass Header value
 * download == "" -> return CSV string
 * download == "demo.csv" -> download file demo.csv
 */
if (!function_exists('query_to_csv')) {

    function query_to_csv($query, $headers = array(), $download = "") {
        ini_set("auto_detect_line_endings", true);

        if (!is_array($query) OR !count($query) > 0) {
            show_error('invalid query');
        }

        $array = array();

        if (is_array($headers) and count($headers) > 0) {
            $line = array();
            foreach ($headers as $name) {
                $line[] = $name;
            }
            $array[] = $line;
        }

        foreach ($query as $row) {
            $line = array();
            foreach ($row as $item) {
                $line[] = $item;
            }
            $array[] = $line;
        }
       echo array_to_csv($array, $download);
    }

}

/* End of file csv_helper.php */
/* Location: ./application/helpers/csv_helper.php */