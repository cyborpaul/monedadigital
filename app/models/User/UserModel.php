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

  public function registrarhistorial($request_params){
    $id = $request_params['id_jugador'];
    $saldo=$request_params['saldo'];
    $recarga=$request_params['monto'];
    $dni=$request_params['dni'];
    $zonahoraria="-5";
    $formato="Y-m-d H:i:s a";
    $time=gmdate($formato, time()+($zonahoraria*3600));
    return $this->db->query("INSERT INTO `inventalogame_historial`(`usu_int_id`, `usu_varchar_dni`, `his_varchar_monto`, `his_varchar_fecha`) VALUES ('$id','$dni','$recarga','$time')");

  }

}