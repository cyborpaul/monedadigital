<?php
defined('BASEPATH') or exit('No se permite acceso directo');

require_once ROOT.'/monedadigital/app/models/Login/LoginModel.php';
require_once LIBS_ROUTE .'Session.php';

/**
* Login controller
*/
class LoginController extends Controller
{
  private $model;

  private $session;

  public function __construct()
  {
    $this->model = new LoginModel();
    $this->session = new Session();
  }

  public function exec()
  {
    $this->render(__CLASS__);
  }

  public function signin($request_params)
  {
    if($this->verify($request_params))
      return $this->renderErrorMessage('El email y password son obligatorios');

    $result = $this->model->signIn($request_params['email']);

    if(!$result->num_rows)
      return $this->renderErrorMessage("El email {$request_params['email']} no fue encontrado");

    $result = $result->fetch_object();

    if(!password_verify($request_params['pass'], $result->usu_txt_password))
      return $this->renderErrorMessage('La contraseña es incorrecta');

    $this->session->init();
    $this->session->add('email', $result->usu_txt_email);
    $this->session->add('nombre', $result->usu_txt_nombre);
    $this->session->add('usuario',$result->usu_int_id);
    $this->session->add('level',$result->last_level);
    header('location: /monedadigital/Main');
  }

  private function verify($request_params)
  {
    return empty($request_params['email']) OR empty($request_params['pass']);
  }

  private function renderErrorMessage($message)
  {
    $params = array('error_message' => $message);
    $this->render(__CLASS__, $params);
  }

}