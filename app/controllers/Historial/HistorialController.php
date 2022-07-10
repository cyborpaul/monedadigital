<?php
defined('BASEPATH') or exit('No se permite acceso directo');
require_once ROOT . '/monedadigital/app/models/Historial/HistorialModel.php';
require_once ROOT . '/monedadigital/app/models/User/UserModel.php';
/**
 * Home controller
 */
class HistorialController extends Controller
{
  /**
   * string 
   */
  public $nombre;

  /**
   * object 
   */
  public $model;
  public $user;

  /**
   * Inicializa valores 
   */
  public function __construct()
  {
    $this->model = new HistorialModel();
    $this->user= new UserModel();
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
      'apellido'=>$this->apellido,
      'saldo'=>$this->saldo,
      'dni'=>$this->dni,
      'total'=>$this->total
    );
    $this->render(__CLASS__, $params); 

  }

  /**
  * Método de ejemplo con model. Obtiene un usuario segun ID
  */
  public function usuario($param)
  {
    $res = $this->user->getUser($param);
    $resp=$this->model->totalHistorial($param);
    $this->nombre = $res['usu_int_id'];
    $this->saldo=$res['saldo'];
    $this->apellido=$res['usu_txt_apellido'];
    $this->dni=$res['usu_txt_dni'];
    $this->total=$resp['total'];
    $this->show();

  }
}