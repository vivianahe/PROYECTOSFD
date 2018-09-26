<?php


/**
 * Clase conexión base de datos
 *
 * @author USUARIO
 */
class Conexion extends PDO{
    
    private static $instancia = null;
		private $host = "localhost";
		private $userName = "root";
		private $password = "";
		private $database = "proyectosfd";

		public function __construct()
		{
			try{
				parent::__construct("mysql:host={$this->host};dbname={$this->database}",
					$this->userName,$this->password);

				$this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$this->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
			}catch(PDOException $ex){
				echo $ex->getMessage();
			}
		}

		public static function singleton(){
			if (!isset(self::$instancia)) {
				$miclase=__CLASS__;
				self::$instancia= new $miclase;
			}
			return self::$instancia;
		}
    
}
