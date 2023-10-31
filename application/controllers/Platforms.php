<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Platforms extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */

	public $idPlatform;
	public function index()
	{
		$idPlatform = $this->uri->segment(2);
        $this->load->helper('platform_connect_helper');

		$getConnection = getConnection($idPlatform);
		
		$this->load->library('DatabaseManager');

		$this->DatabaseManager->cargarConexion($getConnection["host"], $getConnection["user"], $getConnection["pass"], $getConnection["dbname"]);


		$this->load->model('PlatformsModel');
		$getProjectUnique = $this->PlatformsModel->getPlatformUnique($idPlatform);
		$getPlatformsList = $this->PlatformsModel->getPlatformsList();

		$homeData = [
			"title" => "Directorio Ofintel",
			"platformsList" => $getPlatformsList,
			"platformunique" => $getProjectUnique,
			"cry" => $getConnection["website"]
		];
		
		$this->load->view('platforms', $homeData);
	}
}
