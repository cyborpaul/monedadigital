<?php
defined('BASEPATH') or exit('No se permite acceso directo');
/**
 * Home Model
 */
class HistorialModel extends Model
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
  public function totalHistorial($id){
    return $this->db->query("SELECT SUM(his_varchar_monto) as total FROM inventalogame_historial WHERE usu_int_id=$id")->fetch_array(MYSQLI_ASSOC);

  }


}