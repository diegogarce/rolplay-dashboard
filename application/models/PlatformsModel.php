<?php
class PlatformsModel extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function getPlatformsList()
    {
        $qr_platforms = $this->db->query("SELECT prt_id, prt_project FROM rp_projects WHERE ptr_active = 1");

        $data = [];
        foreach ($qr_platforms->result() as $data_platforms) {
            array_push($data, [
                "platform_id" => $data_platforms->prt_id,
                "platform_name" => $data_platforms->prt_project
            ]);
        }

        return $data;
    }

    public function getPlatformUnique($idPlatform = 1)
    {
        $qr_platform = $this->db->query("SELECT prt_project FROM rp_projects WHERE prt_id = $idPlatform AND ptr_active = 1");

        $data = [];
        foreach ($qr_platform->result() as $data_platform) {
            array_push($data, [
                "platform_id" => $data_platform->prt_project,
                "platform_name" => $data_platform->prt_project,
                "platform_data" => $data_platform->prt_project
            ]);
        }

        return $data;
    }
}
