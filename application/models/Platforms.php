<?php
class Platforms extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function getPlatform()
    {
        $qr_platform = $this->db->query("SELECT prt_project FROM rp_projects WHERE ptr_active = 1");

        $data = [];
        foreach ($qr_platform->result() as $data_platform) {
            array_push($data, $data_platform->prt_project);
        }

        return $data;
    }
}
