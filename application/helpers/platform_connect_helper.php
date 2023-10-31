<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('getConnection')) {
    function getConnection($projectId)
    {
        
        // Cargar helper2
        $CI = &get_instance();
        $CI->load->helper('crypter');
        
        $dbcnx = new mysqli('localhost', 'rpacumulados', '2n1mu0f83pkhwks', 'rolplay_acumulados');
        $dbcnx->set_charset("utf8");

        $qr_proyecto = $dbcnx->query("SELECT ptr_dbuser, ptr_dbpass, ptr_dbname, ptr_dbhost, prt_project, ptr_website
                                  FROM rp_projects
                                  WHERE prt_id = $projectId
                                  AND ptr_active = 1");
        $data_project = $qr_proyecto->fetch_assoc();

        return (array)$project = array(
            "user" => decrypter($data_project["ptr_dbuser"]),
            "pass" => decrypter($data_project["ptr_dbpass"]),
            "dbname" => decrypter($data_project["ptr_dbname"]),
            "host" => decrypter($data_project["ptr_dbhost"]),
            "proyecto" => $data_project["prt_project"],
            "website" => decrypter($data_project["ptr_website"])
        );
    }
}
