<?php 
/**
* 
*/
class RegisterModel extends Model
{
  
  public function __construct()
  {
    parent::__construct();
  }

  public function add($request_params){
      $nombres=$request_params['realname'];
      $apellidos=$request_params['apellidos'];
      $email=$request_params['email'];
      $dni=$request_params['dni'];
      $direccion=$request_params['direccion'];
      $sexo=$request_params['sexo'];
      $edad=$request_params['edad'];
      $telefono=$request_params['telefono'];
      $password=$request_params['pass'];
      $passwordcifrada=password_hash($password, PASSWORD_DEFAULT);
      

      $sql="INSERT INTO `sanmarcos_usuarios`(`usu_txt_nombre`, `usu_txt_apellido`, `usu_txt_email`, `usu_txt_dni`, `usu_txt_password`, `usu_txt_rol`, `last_level`, `usu_txt_direccion`, `usu_txt_sexo`, `usu_txt_edad`, `usu_txt_telefono`, saldo, usu_txt_ganancia, usu_txt_estadojuego) VALUES ('$nombres','$apellidos','$email','$dni','$passwordcifrada', '1', '0','$direccion', '$sexo', '$edad', '$telefono', '10', '0', '0')";
      return $this->db->query($sql);
  }

}