<?php
defined('BASEPATH') or exit('No se permite acceso directo');
/**
 * Home Model
 */
class UserModel extends Model
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
  public function getUser($id)
  {
    return $this->db->query("SELECT * FROM `sanmarcos_usuarios` WHERE usu_int_id = $id")->fetch_array(MYSQLI_ASSOC);
  }
  public function actualizarJugador($request_params){
    $id = $request_params['id_jugador'];
    $saldo=$request_params['saldo'];
    return $this->db->query("UPDATE `sanmarcos_usuarios` SET saldo='$saldo' WHERE `usu_int_id` = '$id'");
  }

}