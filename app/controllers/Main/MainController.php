<?php
defined('BASEPATH') or exit('No se permite acceso directo');

require_once ROOT . FOLDER_PATH .'/app/models/Login/LoginModel.php';
require_once ROOT . FOLDER_PATH .'/app/models/Home/HomeModel.php';
require_once LIBS_ROUTE .'Session.php';

/**
* Main controller
*/
class MainController extends Controller
{
  private $session;

  public function __construct()
  {
    $this->model = new HomeModel();
    $this->session = new Session(); 
    $this->session->init();
    if($this->session->getStatus() === 1| empty($this->session->get('email')))
      exit('Acceso denegado');
  }

  public function exec()
  {
    $params = array(
      'email' => $this->session->get('email'),
      'nombre'=> $this->session->get('nombre'),
      'usuario'=>$this->session->get('usuario'),
      'level'=>$this->session->get('level')
    );
    $this->render(__CLASS__, $params);
  }

  public function logout()
  {
    $this->session->close();
    header('location: /monedadigital/Login');
  }

  public function users(){
    $res=$this->model->getUsers();
    $response=array();
    while($rows=$res->fetch_array()) {
		
      $response []= array(  
                      'usu_int_id' => $rows['usu_int_id'],
                      'usu_txt_nombre' => $rows['usu_txt_nombre'],
                      'usu_txt_apellido' => $rows['usu_txt_apellido'],
                      'usu_txt_email' => $rows['usu_txt_email'],
                      'usu_txt_dni' => $rows['usu_txt_dni'],
                      'usu_txt_password' => $rows['usu_txt_password'],
                      'usu_txt_rol' => $rows['usu_txt_rol'],
                      'saldo'=>$rows['saldo']
            );
    }
    
    
    header('Content-Type: application/json');
    echo json_encode($response);
  }

}
