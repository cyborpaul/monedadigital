<?php
defined('BASEPATH') or exit('No se permite acceso directo');
require_once ROOT .'/monedadigital/app/models/Register/RegisterModel.php';
require_once ROOT .'/monedadigital/app/models/Login/LoginModel.php';
require_once LIBS_ROUTE .'Session.php';

class RegisterController extends Controller
{
    public $nombre;

    /**
     * object 
     */
    public $model;
  
    public $modeltwo;
    /**
     * Inicializa valores 
     */
    public function __construct()
    {
      $this->model = new RegisterModel();
      $this->modeltwo = new LoginModel();
      $this->session = new Session();
      $this->nombre = 'Mundo';
    }

    public function exec()
    {
      $this->render(__CLASS__);
    }


    public function addUser($request_params){
        $result = $this->model->add($request_params);
        if($result==1){
            $this->iniciar($request_params);
        }
    }
    public function iniciar($request_params){
        if($this->verify($request_params))
        return $this->renderErrorMessage('El email y password son obligatorios');
  
      $resulttwo = $this->modeltwo->signIn($request_params['email']);
  
      if(!$resulttwo->num_rows)
        return $this->renderErrorMessage("El email {$request_params['email']} no fue encontrado");
  
      $resulttwo = $resulttwo->fetch_object();
  
      if(!password_verify($request_params['pass'], $resulttwo->usu_txt_password))
        return $this->renderErrorMessage('La contraseña es incorrecta');
  
      $this->session->init();
      $this->session->add('email', $resulttwo->usu_txt_email);
      $this->session->add('nombre', $resulttwo->usu_txt_nombre);
      $this->session->add('usuario',$resulttwo->usu_int_id);
      $this->session->add('level',$resulttwo->last_level);
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