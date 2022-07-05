<?php
defined('BASEPATH') or exit('No se permite acceso directo');
require_once ROOT . '/monedadigital/app/models/User/UserModel.php';
/**
 * Home controller
 */
class UserController extends Controller
{
  /**
   * string 
   */
  public $nombre;

  /**
   * object 
   */
  public $model;

  /**
   * Inicializa valores 
   */
  public function __construct()
  {
    $this->model = new UserModel();
    $this->nombre = 'Mundo';
  }

  /**
  * Método estándar
  */
  public function exec()
  {
    $this->show();
 
  }

  /**
  * Método de ejemplo
  */
  public function show()
  {
    $params = array(
      'nombre' => $this->nombre,
      'saldo'=>$this->saldo
    );
    $this->render(__CLASS__, $params); 

  }

  /**
  * Método de ejemplo con model. Obtiene un usuario segun ID
  */
  public function usuario($param)
  {
    $res = $this->model->getUser($param);
    $this->nombre = $res['usu_int_id'];
    $this->saldo=$res['saldo'];
    $this->show();
  }

  public function subirarchivo(){
    $dir = "uploads/";
    $fileName = basename($_FILES['file']['name']);
    move_uploaded_file($_FILES['file']['tmp_name'], $dir . $fileName);

  }

  public function level($request_params){
    $id = $request_params['id_jugador'];
    $saldo=$request_params['saldo'];
    $actualizar=$this->model->actualizarJugador($request_params);
    echo json_encode("Hola");
  }




}