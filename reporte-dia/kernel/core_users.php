<?php 
	
	//Registro de usuario
	if(isset($_POST['user_register']))
	{
		//Limpiamos variables
		$user = SLS3($_POST['user']);
		$name = SLS3($_POST['name']);
		$pass = SLS3($_POST['pass']);
		$pas2 = SLS3($_POST['pas2']);
		$email = SLS3($_POST['email']);
		/*$habo = SLS3($_POST['habo']);*/

		//Establecemos datos privados
		$usip = iP();
		$dreg = timeD();

		//Verificamos que no se dejen campos vacios
		if($user == NULL || $name == NULL || $pass == NULL || $pas2 == NULL || $email == NULL /*|| $habo == NULL*/)
		{
			Alertas('dangers','Lo sentimos pero no puedes dejar campos vacios');
		}
		else
		{
			//No existen campos vacios & verificamos que no exista otro nombre de usuario igual
			$userComp = MYSQL_::Bits("SELECT * FROM users_news");
			$userC 	  = mysqli_fetch_assoc($userComp);
			if($user == $userC['user'])
			{
				Alertas('dangers','Lo sentimos pero este nombre de usuario no esta disponible');
			}
			else
			{
				//No existe otro usuario con ese mismo nombre & verificamos que las contraseñas coincidan
				if($pass != $pas2)
				{
					Alertas('dangers','Lo sentimos pero las contraseñas no coinciden');
				}
				else
				{
					//si las contraseñas son las mismas & encriptamos la contraseña & procedemos a grabar datos
					
					//Encriptamos la contraseña en SLS4
					$pas4 = SLS4($pass);
					//Encriptamos nombre de usuario
					$use4 = SLS4($user);
					//Grabamos los datos en la base
					//$userAdd = MYSQL_::Bits("INSERT INTO users_news (user,name,pass,email,habbo,ip,day_reg) VALUES ('$user','$name','$pas4','$email','$habo','$usip','$dreg') ");
					$userAdd = MYSQL_::Bits("INSERT INTO users_news (user,name,pass,email,ip,day_reg) VALUES ('$user','$name','$pas4','$email','$usip','$dreg') ");
					Alertas('succes','Tu cuenta ha sido creada con éxito en '.BN('title').' como '.$user.'');
					//Reedireccionamos al usuario
					gO(''.Site.'/index.php?registed='.$use4.'','1');

				}
			}
		}
	}

	//Acceso de usuario
	if(isset($_POST['user_acceder']))
	{
		//Limpiamos variables
		$user 	=	SLS3($_POST['user']);
		$pass 	=	SLS3($_POST['pass']);

		//Verificamos que no se dejen campos vacios
		if($user == NULL || $pass == NULL)
		{
			Alertas('dangers','Lo sentimos pero no puedes dejar campos vacios');
		}
		else
		{
			//Encriptamos contraseña
			$pas4 	=	SLS4($pass);

			//Realizamos consulta a los usuarios registrados
			$userAcc 	=	MYSQL_::Bits("SELECT * FROM users_news WHERE user = '$user' ");
			$userA 		=	mysqli_fetch_assoc($userAcc);
			$userS 		=   mysqli_num_rows($userAcc);

			//Verificamos existencia de usuario
			if($userS >= 1)
			{
				//Verificamos contraseña && usuario
				if($user == $userA['user'] AND $pas4 == $userA['pass'])
				{
					//Encriptamos usuario
					$use4 	=	SLS4($user);
					//Iniciamos sesión
					session_start();
					//Almacenamos sesiones de ID & RANK
					$_SESSION['ID'] = $userA['id'];
					$_SESSION['RK'] = $userA['rank'];
					//Alertamos de que ha iniciado sesión
					Alertas('succes','Haz iniciado sesión en '.BN('title').' como '.$userA['user'].' ');
					//gO(''.Site.'/index.php?loged='.$use4.'','1');
					gO(''.Site.'/index.php','1');
				}
				else
				{
					Alertas('dangers','Lo sentimos pero la contraseña no es correcta');
				}
			}
			else
			{
				Alertas('dangers','Lo sentimos pero este nombre de usuario no existe');
			}

		}

	}

	//Cerrar sesión
	if(isset($_POST['user_logout']))
	{
		//Verificamos que exista una sesion
		if($_SESSION == TRUE)
		{
			//Encriptamos logout
			$logout 	=	'Logout';
			$logout 	=	SLS4($logout);
			//Cerramos sesión
			session_destroy();
			//Alertamos al usuario
			Alertas('succes','Haz cerrado sesión en '.BN('title').' correctamente ');
			//Botamos usuario a inicio
			gO(''.Site.'/index.php?out='.$logout.'','1');
		}
		else
		{
			Alertas('dangers','Lo sentimos pero no existe una sesión');
			gO(''.Site.'/index.php?out','1');
		}
	}

	//Actualizando datos básicos
	if(isset($_POST['user_profile']))
	{
		//Limpiamos variables
		$user = SLS3($_POST['user']);
		$name = SLS3($_POST['name']);
		$email = SLS3($_POST['email']);
		/*$habo = SLS3($_POST['habo']);*/

		//Preparamos busqueda de variables por ID
		$Ruser = userD($USERID,'user');
		$Rname = userD($USERID,'name');
		$Remail = userD($USERID,'email');
		/*$Rhabo = userD($USERID,'habbo');*/

		//Verificamos que no existan campos vacios
		if($user == NULL || $name == NULL || $email == NULL /*|| $habo == NULL*/)
		{
			Alertas('dangers','Lo sentimos pero no puedes dejar campos vacios');
		}
		else
		{
			//Verificamos que no existra nombre de usuario repetido
			$userPro 	=	MYSQL_::Bits("SELECT * FROM users_news WHERE user = '$user'");
			$userPS 	=	mysqli_num_rows($userPro);

			if($Ruser == $user)
			{
					//Verificamos si se realizaron cambios
					if($user == $Ruser AND $name == $Rname AND $email == $Remail /*AND $habo == $Rhabo*/)
					{
						
	Alertas('succes','No se han realizado cambios ha tus datos');
	
					}else{
	//Actualizamos datos

//$userACT 	=	MYSQL_::Bits("UPDATE users_news SET name = '$name', email = '$emal', habbo = '$habo' WHERE id = '$USERID' ");
$userACT 	=	MYSQL_::Bits("UPDATE users_news SET name = '$name', email = '$email' WHERE id = '$USERID' ");
	
	Alertas('succes','Tus datos se han actualizado correctamente');
	Refresh();
	}
	}else{
				
	if($userPS >= 1){
		
	//Nombre de usuario existente
	Alertas('dangers','Lo sentimos pero este nombre de usuario no esta disponible');
	}else{

	//Actualizamos datos

//$userACT 	=	MYSQL_::Bits("UPDATE users_news SET user = '$user', name = '$name', email = '$emal', habbo = '$habo' WHERE id = '$USERID' ");
$userACT 	=	MYSQL_::Bits("UPDATE users_news SET user = '$user', name = '$name', email = '$email' WHERE id = '$USERID' ");

	Alertas('succes','Tus datos se han actualizado correctamente');
	Refresh();
				}
			}

		}
	}

	//Actualizando datos de acceso
	if(isset($_POST['user_pass']))
	{
		//Limpiamos variables
		$pass 	=	SLS3($_POST['pass']);
		$pasn 	=	SLS3($_POST['pasn']);
		$pas2 	=	SLS3($_POST['pas2']);
		
		//Encriptamos password actual
		$pas4 	=	SLS4($pass);
		//Verificamos coincidencia de contraseñas nuevas
		if($pasn != $pas2)
		{
			Alertas('dangers','Lo sentimos pero las contraseñas deben coincidir');
		}
		else
		{
			//Verificamos que la contraseña actual sea la correcta
			$userPS = MYSQL_::Bits("SELECT * FROM users_news WHERE id = '$USERID' ");
			$userP 	= mysqli_fetch_assoc($userPS);

			if($userP['pass'] == $pas4)
			{
				//Encriptamos contraseña nueva
				$pas6 		=	SLS4($pasn);
				//Actualizamos contraseña
				$userPAS 	=	MYSQL_::Bits("UPDATE users_news SET pass = '$pas6' WHERE id = '$USERID' ");
				Alertas('succes','Tu contraseña ha sido cambiada correctamente, por seguridad seras desconectado');
				//session_destroy();
				Refresh();
				//gO(''.Site.'/index.php','1');
			}
			else
			{
				Alertas('dangers','Lo sentimos pero la contraseña actual no es correcta');
			}
		}
	}

?>