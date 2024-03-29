<?php



/* *******************************************************************************************
 
 * CLASE Caracteristica

 * ***************************************************************************************** */
class Falla {

	// parámetros de conexión
	private $dbname = "fallas_valencia";
	private $host = "localhost"; 
		
	// creamos las credenciales del usuario
	private $usuario = "byron";
	private $clave = "12345678";

	// Otros atributos
	public $conn; // conexión a la base de datos
	protected $N;
	protected $limitar = true; // si está a true se limitarán los resultados del listado a N. 



	/* *******************************************************************************************
	 * CONSTRUCTOR
	 * ***************************************************************************************** */
	function __construct() {
		$this->crearConexion();
		$this->N = 10;
	}


	/* *******************************************************************************************
	 * METODOS PRIVADOS
	 * ***************************************************************************************** */	
	private function crearConexion() {

		// Conexión a la base de datos
		$strConexion = "mysql:dbname=$this->dbname;host=$this->host";

	    // creamos un objeto de la clase PDO
	    $this->conn = new PDO($strConexion, $this->usuario, $this->clave);
	}



	/* *******************************************************************************************
	 * METODOS PRIVADOS
	 * ***************************************************************************************** */	
	public function limitar($booLimitar) {
		$this->limitar = $booLimitar;
	}

	

	public function getFallas() {

		// creo el array de fallas
		$arrFallas = [];
	
		// creamos la consulta
		$sql = "select id_falla, nombre, fecha_fundacion, presupuesto  from fallas";
	
		// ejecutamos la consulta
		$consulta = $this->conn->query($sql);
	
		while($registro = $consulta->fetch()){
			$arrFallas[] = $registro;
		}
	
		return $arrFallas;
	}
		
}

?>