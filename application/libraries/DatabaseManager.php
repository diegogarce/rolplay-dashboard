<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DatabaseManager
{

    public function cargarConexion($host, $usuario, $contrasena, $base_de_datos)
    {
        $config = array(
            'hostname' => $host,
            'username' => $usuario,
            'password' => $contrasena,
            'database' => $base_de_datos,
            'dbdriver' => 'mysqli',
            'dbprefix' => '',
            'pconnect' => FALSE,
            'db_debug' => (ENVIRONMENT !== 'production'),
            'cache_on' => FALSE,
            'cachedir' => '',
            'char_set' => 'utf8',
            'dbcollat' => 'utf8_general_ci',
            'swap_pre' => '',
            'encrypt' => FALSE,
            'compress' => FALSE,
            'stricton' => FALSE,
            'failover' => array(),
            'save_queries' => TRUE
        );

        // Cargar la conexión con la configuración dinámica
        $this->load->database($config);
    }

    public function obtenerDatos($tabla)
    {
        $query = $this->db->get($tabla);
        return $query->result();
    }
}
