<?php
defined('BASEPATH') or exit('No se permite acceso directo');
/**
 * Home Model
 */
class HomeModel extends Model
{
  /**
  * Inicia conexión DB
  */
  public function __construct()
  {
    parent::__construct();
  }

  /**
  * Obtiene el usuario de la DB por ID
  */
  public function getUsers()
  {
    $sql= $this->db->query("SELECT * FROM `sanmarcos_usuarios`");  
    return $sql;
  }




}