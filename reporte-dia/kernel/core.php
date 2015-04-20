<?php 
	$Config[]	=	'localhost';			# hosting de nuestra base de datos
	$Config[]	=	'wi271599_monodag';		# usuario de nuestra base de datos
	$Config[]	=	'Monog123';				# contraseña de nuestra base de datos
	$Config[]	=	'wi271599_prueba';				# nombre de la base de datos
	$dateglobal   =   $Config[3];
		
	error_reporting(0);						# no mostramos errores en la pagina
	
	


	class MYSQL_
	{
		private static $Host;
		private static $User;
		private static $Pass;
		private static $Base;

		public function __construct($Host_db,$User_db,$Pass_db,$Base_db)
		{
			self::$Host = $Host_db;
			self::$User = $User_db;
			self::$Pass = $Pass_db;
			self::$Base = $Base_db;
		}

		public static function Conect()
		{
			global $DB;
			$DB = new mysqli(self::$Host, self::$User, self::$Pass, self::$Base);
			if($DB->connect_errno > 0)
			{
    			die('Imposible conectar con la base de datos [' . $DB->connect_error . ']');
			}
		}

		public static function Bits($Query)
		{
			global $DB;
			$Consulta = mysqli_query($DB,"SET NAMES 'utf8'");
			$Consulta = mysqli_query($DB," ".$Query." ");
			return $Consulta;
		}
		
		public static function Adds($var)
		{
			if(!is_array($var))
				return addslashes($var);
		
			$new_var = array();
		
			foreach($var as $k => $v)
				$new_var[addslashes($k)] = self::Adds($v);
			
				return $new_var;
		}

	}

	//Comenzamos las conexiones  a base de datos
	$DB = New MYSQL_($Config[0], $Config[1], $Config[2], $Config[3]);
	MYSQL_::Conect();

	//Funcion completa de busqueda
	function BN($Busq)
	{
		$Busqueda 		= MYSQL_::Bits("SELECT * FROM config_site");
		$Bitsnews 		= mysqli_fetch_assoc($Busqueda);
		$BNs 			= $Bitsnews[$Busq];
		return $BNs;
	}

	$WWW 	=	BN('www');

	//Definimos el enlace de la web
	define('Site', ''.$WWW.'');

?>
