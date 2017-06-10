<?php 
	//**Archivo encargado de contener todas las consultas ejecutadas a la base de datos.
	include_once('conexion.php');

	function nuevoRegistro($valor, $comentarios, $fecha_creacion, $conexion){

		$query = "INSERT INTO `encuesta` SET 
			`valor`='$valor',
			`comentarios`='$comentarios',
			`fecha_registro`='$fecha_creacion' ";

		$inserted = mysqli_query($conexion, $query);


		return $inserted;
	}

	function consultaUsuario($nombre, $contrasena, $conexion){
		$nombre = addslashes($nombre);
		$contrasena = addslashes($contrasena);
		$query = 'SELECT * FROM `usuarios` WHERE `usuario`="'.$nombre.'"  AND `contrasena` = "'.$contrasena.'";';
		var_dump($query);
		$resultado = mysqli_query( $conexion, $query);
		$resultado =  mysqli_fetch_row($resultado); 
		
		if ($resultado==null) {
			echo "0";
		}else{
			return $resultado;
		}
	}

	function marcasSistema($conexion){
		$query = "SELECT * FROM `marcas`Where `status` = 'Activa' ";
		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado;
		}
	}

	function consultaUsuarioNOMBRE($nombre, $conexion){
		$query = 'SELECT * FROM `usuarios` WHERE `usuario`="'.$nombre.'";';
		
		$resultado = mysqli_query( $conexion, $query);
		$resultado =  mysqli_fetch_row($resultado); 
		
		if ($resultado==null) {
			echo "0";
		}else{
			return $resultado;
		}
	}


	function consultaUsuarioID($id, $conexion){
		$query = 'SELECT * FROM `usuarios` WHERE `id_usuario`="'.$id.'";';
		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado;
		}
	}


	function consultaUsuarioEMAIL($email, $conexion){
		$query = 'SELECT * FROM `usuarios` WHERE `email`="'.$email.'";';
		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado;
		}
	}


	function consultaUsuarioEMAILActivo($email, $conexion){
		$query = 'SELECT * FROM `usuarios` WHERE `email`="'.$email.'" AND `status` = "Activo" ORDER BY `nombre` ASC;';
		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado;
		}
	}


	function consultaPaisesAuditorias($conexion){
		$query = "SELECT DISTINCT `clientePais` FROM `auditorias` WHERE `clientePais` != '' ORDER BY `auditorias`.`clientePais` ASC;";
		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado;
		}

	}

	function consultaPaisesAuditorias_v2($conexion){
		$query = "SELECT DISTINCT `clientePais` FROM `auditorias` WHERE `clientePais` != '' ORDER BY `auditorias`.`clientePais` ASC;";
		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado;
		}

	}

	function consultaPaisesAuditorias_Coord($pais, $conexion){
		$query = "SELECT DISTINCT `clientePais` FROM `auditorias` WHERE `clientePais` != '' AND `clientePais` IN (".$pais.") ORDER BY `auditorias`.`clientePais` ASC;";
		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado;
		}

	}

	function consultaPaisesAuditoriasC($paises, $conexion){
		$query = "SELECT DISTINCT `clientePais` FROM `auditorias` WHERE `clientePais` != '' AND `clientePais` IN($paises) ORDER BY `auditorias`.`clientePais` ASC;";
		//var_dump($query);

		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado;
		}

	}


	function consultaPaisesAuditoriasC_v2($paises, $conexion){
		$query = "SELECT DISTINCT `clientePais` FROM `auditorias` WHERE `clientePais` != '' AND `clientePais` IN($paises) ORDER BY `auditorias`.`clientePais` ASC;";
		//var_dump($query);

		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado;
		}

	}



	function consultaMarcasUsuarioID($id, $conexion){
		$query = 'SELECT `marcas` FROM `usuarios` WHERE `id_usuario`="'.$id.'";';
		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado[0];
		}
	}


	function consultaMarcasUsuarioEMAIL($email, $conexion){
		$query = 'SELECT `marcas` FROM `usuarios` WHERE `email`="'.$email.'";';

		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado[0];
		}
	}

	function consultaFotoUrlUsuarioEMAIL($email, $conexion){
		$query = 'SELECT `fotoUrl` FROM `usuarios` WHERE `email`="'.$email.'";';

		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado[0];
		}
	}


	function auditoriasSinPago($email, $conexion){
		$query = "SELECT COUNT(*) FROM `auditorias` WHERE `auditorEmail` = '".$email."' AND `statusPago` = 'Pendiente';";

		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado[0];
		}
	}

	function auditoriasNoFinalizadasMarcaEMAIL($email, $marca, $conexion){
		$query = "SELECT COUNT(*) FROM `auditorias` WHERE `auditorEmail` = '".$email."' AND `statusVisita` != 'Finalizada' AND `clienteMarca` = '".$marca."';";

		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado[0];
		}
	}

	function auditoriasMarcaTipoEMAIL($email, $marca, $tipo, $conexion){
		$query = "SELECT COUNT(*) FROM `auditorias` WHERE `auditorEmail` = '".$email."' AND `viajeTipo` = '".$tipo."' AND `clienteMarca` = '".$marca."';";

		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado[0];
		}
	}

	function auditoriasFinalizadasMarcaEMAIL($email, $marca, $conexion){
		$query = "SELECT COUNT(*) FROM `auditorias` WHERE `auditorEmail` = '".$email."' AND `statusVisita` = 'Finalizada' AND `clienteMarca` = '".$marca."';";

		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado[0];
		}
	}


	function auditoriasInfoMarcaEMAIL($email, $marca, $conexion){
		$query = "SELECT * FROM `auditorias` WHERE `auditorEmail` = '".$email."' AND `statusVisita` = 'Finalizada' AND `clienteMarca` = '".$marca."'  ORDER BY `encuestaID` ASC;";
		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado;
		}
	}

	function auditoriasNoInfoMarcaEMAIL($email, $marca, $conexion){
		$query = "SELECT * FROM `auditorias` WHERE `auditorEmail` = '".$email."' AND `statusVisita` != 'Finalizada' AND `clienteMarca` = '".$marca."'  ORDER BY `encuestaID` ASC;";
		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado;
		}
	}



	function consultaPaisesUsuarioID($id, $conexion){
		$query = 'SELECT `pais` FROM `usuarios` WHERE `id_usuario`="'.$id.'";';
		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado[0];
		}
	}

	function consultaPaisesUsuarioEMAIL($email, $conexion){
		$query = 'SELECT `pais` FROM `usuarios` WHERE `email`="'.$email.'" ORDER BY `level` DESC LIMIT 1;';
		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado[0];
		}
	}

	function consultaPaisesSBXUsuarioEMAIL($email, $conexion){
		$query = 'SELECT `paisSBX` FROM `usuarios` WHERE `email`="'.$email.'";';
		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado[0];
		}
	}


	function consultaNombreUsuarioID($id, $conexion){
		$query = 'SELECT `nombre`, `email` FROM `usuarios` WHERE `id_usuario`="'.$id.'";';
		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado;
		}
	}

	
	function consultaNombreUsuarioEMAIL($email, $conexion){
		$query = 'SELECT `nombre`, `email` FROM `usuarios` WHERE `email`="'.$email.'";';
		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado;
		}
	}

	
	function consultaNombreUsuarioEMAIL3($email, $conexion){
		$query = 'SELECT `nombre`, `email`, `lang` FROM `usuarios` WHERE `email`="'.$email.'";';
		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado;
		}
	}

	function consultaNombreUsuarioTelEMAIL($email, $conexion){
		$query = 'SELECT * FROM `usuarios` WHERE `email`="'.$email.'";';
		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado;
		}
	}
	
	function consultaDireccionUsuarioEMAIL($email, $conexion){
		$query = 'SELECT `direccion`, `email` FROM `usuarios` WHERE `email`="'.$email.'";';
		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado;
		}
	}
	

	//Query que inserta un usuario nuevo en la base de datos.
	//@param String, String, int
	//@return bool
	function insertarUsuario($nombre, $email, $nivel){
		$query = "INSERT INTO hola SET nombre='$fullname', correo='$email', nivel='$level'";
		
		$insert_row = mysqli_query( $GLOBALS['linkDB'], $query); 

		return $insert_row;
	}

	//Seleccionar los usuarios de la DB.
	//@param null
	//@return array
	function seleccionarUsuarios($conexion){
		$query = 'SELECT * FROM `usuarios` WHERE `status` = "Activo" ORDER BY `nombre` ASC';
		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado;
		}
	}


	
	//Seleccionar los usuarios de la DB.
	//@param null
	//@return array
	function seleccionarUsuariosMonerdas($conexion){
		//$query = "SELECT `nombre`, `email`, SUM(`monto`) Total FROM `usuarios` AS U LEFT JOIN `estrellas` AS E ON (U.`email`=E.`email_usuario`) WHERE `status`='Activo' AND `level` = '2' GROUP BY `email`  ORDER BY `nombre` ASC";
		$query = "SELECT `nombre`, `email`, SUM(`status_perfil`='Completo' AND `comprobante`!='' AND `fotoUrl` !='') Perfil, GROUP_CONCAT(DISTINCT(`clientePais`) SEPARATOR ',') Paises, SUM(`estrellas`) Total FROM `auditorias` LEFT JOIN `usuarios` ON (`auditorEmail`=`email`) WHERE `statusVisita` = 'Finalizada' AND `auditorEmail`!='' AND `fInicio` > '2016-06-30' GROUP BY `auditorEmail` ORDER BY `usuarios`.`status_perfil` ASC";
		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado;
		}
	}


	//Seleccionar los usuarios de la DB.
	//@param null
	//@return array
	function seleccionarUsuariosActivosEMAIL($conexion){
		global $usuar_arg_sin_pago;
		$query = "SELECT DISTINCT `email` FROM `usuarios` where `email`!= '' AND `status`='Activo' AND `level` = 2 ORDER BY `nombre` ASC";
		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado;
		}
	}



	//Seleccionar los usuarios de la DB.
	//@param null
	//@return array
	function seleccionarUsuariosEMAIL($conexion){
		global $usuar_arg_sin_pago;
		$query = "SELECT DISTINCT `email` FROM `usuarios` where `email`!= '' $usuar_arg_sin_pago ORDER BY `nombre` ASC";
		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado;
		}
	}

	//Seleccionar los usuarios de la DB.
	//@param null
	//@return array
	function seleccionarUsuariosEMAIL_v2($conexion){
		global $usuar_arg_sin_pago;
		$query = "SELECT DISTINCT `email` FROM `usuarios` where `email`!= '' $usuar_arg_sin_pago ORDER BY `nombre` ASC";
		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado;
		}
	}

	//Auditores Mexico.
	//@param null
	//@return array
	function documentosSeguro($conexion, $anio_mes){
		global $usuar_arg_sin_pago;
		if ($anio_mes!='') {
			$temp = explode('_', $anio_mes);
			$query_add = "  YEAR(`fInicio`)='".$temp[0]."' AND MONTH(`fInicio`)='".$temp[1]."' ";
		}else{
			$query_add = '';
		}

		$query = "
		SELECT `U`.`id_usuario`, `U`.`nombre`,  `U`.`email`, `RH`.`recurso` AS `link`, SUM( $query_add AND clientePais LIKE '%Mexico%' ) total, `rfc`, SUM(`R`.`descripcion`= 'rfc' AND `R`.`descripcion` IS NOT NULL) `rfc_url`, `curp`, SUM(`R`.`descripcion`= 'curp' AND `R`.`descripcion` IS NOT NULL) `curp_url`, SUM(`R`.`descripcion`= 'acta' AND `R`.`descripcion` IS NOT NULL) `acta_url`, `imss`, SUM(`R`.`descripcion`= 'imss' AND `R`.`descripcion` IS NOT NULL) `imss_url`,   SUM(`R`.`descripcion`= 'domicilio' AND `R`.`descripcion` IS NOT NULL) `domicilio_url`,  SUM(`R`.`descripcion`= 'ine' AND `R`.`descripcion` IS NOT NULL) `ine_url`, `infonavit`, `infonavit_numero`, `infonavit_tipo`, `fonacot`, `fonacot_numero`, `fonacot_importe`, `clinica_numero`  FROM `usuarios` AS `U`
			LEFT JOIN `auditorias` AS `A` ON ( `U`.`email` = `A`.`auditorEmail` )
	        LEFT JOIN `documentos` AS `R` ON (`U`.`id_usuario` = `R`.`id_referencia`)
	        LEFT JOIN `recursosRH` AS `RH` ON (`U`.`id_usuario` = `RH`.`id_referencia` AND `RH`.`sub_id`='".$anio_mes."')

			WHERE `pais` LIKE '%Mexico%' 
			AND `level`='2' 
			AND `status` = 'Activo' $usuar_arg_sin_pago 
			GROUP BY `U`.`email`";

		//echo $query;
		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado;
		}
	}
	//Auditores Mexico.
	//@param null
	//@return array
	function documentosSeguro_pre($conexion, $anio_mes){
		global $usuar_arg_sin_pago;
		if ($anio_mes!='') {
			$temp = explode('_', $anio_mes);
			$query_add = " AND YEAR(`fInicio`)='".$temp[0]."' AND MONTH(`fInicio`)='".$temp[1]."' ";
		}else{
			$query_add = '';
		}

		$query = "
		SELECT `id_usuario`, `nombre`,  COUNT(*) total, `rfc`, SUM(`descripcion`= 'rfc' AND `descripcion` IS NOT NULL) `rfc_url`, `curp`, SUM(`descripcion`= 'curp' AND `descripcion` IS NOT NULL) `curp_url`, SUM(`descripcion`= 'acta' AND `descripcion` IS NOT NULL) `acta_url`, `imss`, SUM(`descripcion`= 'imss' AND `descripcion` IS NOT NULL) `imss_url`,   SUM(`descripcion`= 'domicilio' AND `descripcion` IS NOT NULL) `domicilio_url`,  SUM(`descripcion`= 'ine' AND `descripcion` IS NOT NULL) `ine_url`, `infonavit`, `infonavit_numero`, `infonavit_tipo`, `fonacot`, `fonacot_numero`, `fonacot_importe`, `clinica_numero` 
		FROM `usuarios` AS `U` 
        LEFT JOIN `auditorias` AS `A` ON (`U`.`email`=`A`.`auditorEmail`)
        LEFT JOIN `documentos` AS `R` ON (`U`.`id_usuario` = `R`.`id_referencia`)
		WHERE `level`=2 AND `pais` LIKE '%Mexico%' AND `email`!= '' $usuar_arg_sin_pago $query_add AND `U`.`status`='Activo' AND clientePais LIKE '%Mexico%' AND `fInicio` > '2016-06-30' 
		GROUP BY `email`
		ORDER BY `nombre` ASC";

		echo $query;
		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado;
		}
	}


	//@param null
	//@return array
	function documentosSeguro_ALL($conexion){
		global $usuar_arg_sin_pago;
		
		$query = "
		SELECT `id_usuario`, `nombre`, `tabla`, `descripcion`, `recurso`
		FROM `usuarios` AS `U`         
        LEFT JOIN `documentos` AS `R` ON (`U`.`id_usuario` = `R`.`id_referencia`)
		WHERE `level`=2 AND `pais` LIKE '%Mexico%' AND `email`!= '' $usuar_arg_sin_pago $query_add AND `U`.`status`='Activo' 
		ORDER BY `nombre` ASC";

		//echo $query;
		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado;
		}
	}


	//@param null
	//@return array
	function documentosSeguro_Usuario($conexion, $id_usuario){
		global $usuar_arg_sin_pago;
		/*
		if ($anio_mes!='') {
			$temp = explode('_', $anio_mes);
			$query_add = " AND YEAR(`fInicio`)='".$temp[0]."' AND MONTH(`fInicio`)='".$temp[1]."' ";
		}else{
			$query_add = '';
		}*/

		$query = "
		SELECT `id_usuario`, `nombre`, `tabla`, `descripcion`, `recurso`
		FROM `usuarios` AS `U`         
        LEFT JOIN `documentos` AS `R` ON (`U`.`id_usuario` = `R`.`id_referencia`)
		WHERE `level`=2 AND `pais` LIKE '%Mexico%' AND `email`!= '' $usuar_arg_sin_pago $query_add AND `U`.`status`='Activo' 
		AND `U`.`id_usuario` = $id_usuario
		ORDER BY `nombre` ASC";

		//echo $query;
		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado;
		}
	}

	function auditoriasUltimosMeses($conexion, $numero){
		$query = "SELECT YEAR(`fInicio`) anio, MONTH(`fInicio`) mes, COUNT(*) total FROM `auditorias` 
			WHERE YEAR(`fInicio`)!='' AND MONTH(`fInicio`) != '' AND clientePais LIKE '%Mexico%'
			GROUP BY YEAR(`fInicio`), MONTH(`fInicio`)
			ORDER BY YEAR(`fInicio`) DESC, MONTH(`fInicio`) DESC
			LIMIT ".$numero;

		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado;
		}
	}





	//Seleccionar los usuarios de la DB.
	//@param null
	//@return array
	function seleccionarUsuariosEMAIL_Coord($pais, $conexion){
		global $usuar_arg_sin_pago;
		$query = "SELECT DISTINCT `email` FROM `usuarios` left join auditorias ON (usuarios.email = auditorias.auditorEmail) where `email`!= '' AND clientePais IN ($pais) $usuar_arg_sin_pago ORDER BY `nombre` ASC";
		//var_dump($query);
		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado;
		}
	}


	//Seleccionar los usuarios de la DB.
	//@param null
	//@return array
	function seleccionarUsuariosEMAIL_FILTROS($conexion){
		$query = "SELECT DISTINCT `email` FROM `usuarios` where `email`!= '' $filtros ORDER BY `nombre` ASC";
		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado;
		}
	}

	//Seleccionar los usuarios de la DB.
	//@param null
	//@return array
	function seleccionarUsuariosEMAILCoordinador($conexion){
		$query = "SELECT DISTINCT `email` FROM `usuarios` where `email`!= '' ORDER BY `nombre` ASC";
		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado;
		}
	}


	//Seleccionar los usuarios de la DB.
	//@param null
	//@return array
	function seleccionarUsuariosEMAILNombre($conexion){
		$query = "SELECT DISTINCT `email`, `nombre` FROM `usuarios` where `email`!= '' AND `status`='Activo' AND `acceso` = 'Auditor Arguilea' ORDER BY `nombre` ASC ";
		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado;
		}
	}

	//Seleccionar los usuarios de la DB.
	//@param null
	//@return array
	function seleccionarUsuariosEMAILNombre_Coord($pais, $conexion){
		$query = "SELECT DISTINCT `email`, `nombre` FROM `usuarios` left join auditorias ON (usuarios.email = auditorias.auditorEmail) where `email`!= '' AND `status`='Activo'  AND `level`=2 AND `acceso` = 'Auditor Arguilea' ORDER BY `nombre` ASC ";
		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado;
		}
	}

	//Seleccionar los usuarios de la DB.
	//@param null
	//@return array
	function seleccionarUsuariosEMAILNombreJ2($conexion, $data){
		global $usuar_arg_sin_pago;
		$filtros = ' AND ';
		if ($data['marca']!='Marca') {
			$filtros .= "`marcas` LIKE '%".$data['marca']."%' AND "; 
		}
		if ($data['pais']!='') {
			$filtros .= "`pais` LIKE '%".$data['pais']."%' AND "; 
		}

		$filtros .=" 1 AND `nombre`!='' AND `status`='Activo' ";

		$query = "SELECT DISTINCT `email`, `nombre` FROM `usuarios` where `email`!= '' AND `status`='Activo' AND `level`=2 AND `acceso` = 'Auditor Arguilea' $filtros $usuar_arg_sin_pago ORDER BY `nombre` ASC ";

		//var_dump($query);
		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado;
		}
	}

	//Seleccionar los usuarios de la DB.
	//@param null
	//@return array
	function seleccionarUsuariosEMAILNombreJ2_v2($conexion, $data){
		global $usuar_arg_sin_pago;
		$filtros = ' AND ';
		if ($data['marca']!='Marca') {
			$filtros .= "`marcas` LIKE '%".$data['marca']."%' AND "; 
		}
		if ($data['pais']!='') {
			$filtros .= "`pais` LIKE '%".$data['pais']."%' AND "; 
		}

		$filtros .=" 1 AND `nombre`!='' AND `status`='Activo' ";

		$query = "SELECT DISTINCT `email`, `nombre` FROM `usuarios` where `email`!= '' AND `status`='Activo' AND `level`=2 AND `acceso` = 'Auditor Arguilea' $filtros $usuar_arg_sin_pago ORDER BY `nombre` ASC ";

		//var_dump($query);
		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado;
		}
	}

	//Seleccionar los usuarios de la DB. Coordinador
	//@param null
	//@return array
	function seleccionarUsuariosEMAILNombreJ2C($paises, $conexion, $data){
		global $usuar_arg_sin_pago;
		$filtros = ' AND ';
		if ($data['marca']!='Marca') {
			$filtros .= "`marcas` LIKE '%".$data['marca']."%' AND"; 
		}
		$filtros .=" 1 AND `nombre`!='' AND `status`='Activo' ";

		$query = "SELECT DISTINCT `email`, `nombre` FROM `usuarios` RIGHT JOIN `auditorias` ON (`usuarios`.`email` = `auditorias`.`auditorEmail`) where `email`!= '' AND `clientePais` IN($paises) AND `acceso` = 'Auditor Arguilea'  AND `level`=2  $filtros $usuar_arg_sin_pago ORDER BY `nombre` ASC ";

		//var_dump($query);
		
		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado;
		}
	}


	//Seleccionar los usuarios de la DB. Coordinador
	//@param null
	//@return array
	function seleccionarUsuariosEMAILNombreJ2C_v2($paises, $conexion, $data){
		global $usuar_arg_sin_pago;
		$filtros = ' AND ';
		if ($data['marca']!='Marca') {
			$filtros .= "`marcas` LIKE '%".$data['marca']."%' AND"; 
		}
		$filtros .=" 1 AND `nombre`!='' AND `status`='Activo' ";

		$query = "SELECT DISTINCT `email`, `nombre` FROM `usuarios` RIGHT JOIN `auditorias` ON (`usuarios`.`email` = `auditorias`.`auditorEmail`) where `email`!= '' AND `clientePais` IN($paises) AND `acceso` = 'Auditor Arguilea'  AND `level`=2  $filtros $usuar_arg_sin_pago ORDER BY `nombre` ASC ";

		//var_dump($query);
		
		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado;
		}
	}


	//Seleccionar los usuarios de la DB.
	//@param null
	//@return array
	function seleccionarUsuariosConAuditoriasFinalizadasPagoPendiente($conexion){
		$query = "SELECT `id`, `encuestaID`, `auditorEmail`, `nombre`, `clienteMarca`, `clienteNombre`, `clienteNumero`, `clienteDireccionCompleta`, `fInicio`, `fTermino`, `viajeTipo`, `statusVisita`, `statusPago`, `i_fechaTermino` FROM `auditorias` LEFT JOIN `usuarios` ON (`usuarios`.`email` = `auditorias`.`auditorEmail`) WHERE `statusVisita`='Finalizada' AND `auditorEmail`!=''  AND `statusPago` != 'Pagada' ORDER BY `auditorEmail` ASC, `clienteMarca` ASC";
		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado;
		}
	}

	//Seleccionar los usuarios de la DB.
	//@param null
	//@return array
	function seleccionarUsuariosConAuditoriasPagoPendiente($conexion){
		global $usuar_arg_sin_pago;
		$query = "SELECT `id`, `encuestaID`, `auditorEmail`, `nombre`, `clienteMarca`, `clienteNombre`, `clienteNumero`, `clienteDireccionCompleta`, `fInicio`, `fTermino`, `viajeTipo`, `statusVisita`, `statusPago`, `clienteCiudadPais`, `clienteEstado`, `clientePais`, `i_fechaTermino`, `modificadorPago`, `tipo_cerrada`, `comentarios`, `visita`, `tipo_auditoria` FROM `auditorias` LEFT JOIN `usuarios` ON (`usuarios`.`email` = `auditorias`.`auditorEmail`) WHERE `statusPago` != 'Pagada' AND `auditorEmail`!=''  AND `status`='Activo' $usuar_arg_sin_pago ORDER BY `auditorEmail` ASC, `clienteMarca` ASC";

		//var_dump($query);
		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado;
		}
	}

	
	//Seleccionar los usuarios de la DB.
	//@param null
	//@return array
	function seleccionarUsuariosConAuditoriasPagoPendiente_v2($conexion){
		global $usuar_arg_sin_pago;
		$query = "SELECT `id`, `encuestaID`, `auditorEmail`, `nombre`, `clienteMarca`, `clienteNombre`, `clienteNumero`, `clienteDireccionCompleta`, `fInicio`, `fTermino`, `viajeTipo`, `statusVisita`, `statusPago`, `clienteCiudadPais`, `clienteEstado`, `clientePais`, `i_fechaVisita`, `i_fechaTermino`, `modificadorPago`, `tipo_cerrada`, `comentarios`, `visita`, `tipo_auditoria`, `i_fechaVisita` FROM `auditorias` LEFT JOIN `usuarios` ON (`usuarios`.`email` = `auditorias`.`auditorEmail`) WHERE `statusPago` != 'Pagada' AND `auditorEmail`!=''  AND `status`='Activo' $usuar_arg_sin_pago ORDER BY `auditorEmail` ASC, `clienteMarca` ASC";

		//var_dump($query);
		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado;
		}
	}

	
	//Seleccionar los usuarios de la DB por coordinador.
	//@param null
	//@return array
	function seleccionarUsuariosConAuditoriasPagoPendiente_Coord($paises, $conexion){
		global $usuar_arg_sin_pago;
		$query = "SELECT `id`, `encuestaID`, `auditorEmail`, `nombre`, `clienteMarca`, `clienteNombre`, `clienteNumero`, `clienteDireccionCompleta`, `fInicio`, `fTermino`, `viajeTipo`, `statusVisita`, `statusPago`, `clienteCiudadPais`, `clienteEstado`, `clientePais`, `i_fechaTermino`, `modificadorPago`, `tipo_cerrada`, `comentarios`, `visita`, `tipo_auditoria` FROM `auditorias` LEFT JOIN `usuarios` ON (`usuarios`.`email` = `auditorias`.`auditorEmail`) WHERE `statusPago` != 'Pagada' AND `auditorEmail`!=''  AND `status`='Activo' AND `clientePais` IN($paises)$usuar_arg_sin_pago ORDER BY `auditorEmail` ASC, `clienteMarca` ASC";
		$resultado = array();
		//var_dump($query);
		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado;
		}
	}

	
	//Seleccionar los usuarios de la DB por coordinador.
	//@param null
	//@return array
	function seleccionarUsuariosConAuditoriasPagoPendiente_Coord_v2($paises, $conexion){
		global $usuar_arg_sin_pago;
		$query = "SELECT `id`, `encuestaID`, `auditorEmail`, `nombre`, `clienteMarca`, `clienteNombre`, `clienteNumero`, `clienteDireccionCompleta`, `fInicio`, `fTermino`, `viajeTipo`, `statusVisita`, `statusPago`, `clienteCiudadPais`, `clienteEstado`, `clientePais`, `i_fechaVisita`, `i_fechaVisita`, `i_fechaTermino`, `modificadorPago`, `tipo_cerrada`, `comentarios`, `visita`, `tipo_auditoria` FROM `auditorias` LEFT JOIN `usuarios` ON (`usuarios`.`email` = `auditorias`.`auditorEmail`) WHERE `statusPago` != 'Pagada' AND `auditorEmail`!=''  AND `status`='Activo' AND `clientePais` IN($paises)$usuar_arg_sin_pago ORDER BY `auditorEmail` ASC, `clienteMarca` ASC";
		$resultado = array();
		//var_dump($query);
		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado;
		}
	}

	

	//Seleccionar los usuarios de la DB.
	//@param null
	//@return array
	function seleccionarUsuariosConAuditoriasFinalizadasPagoPendienteFiltros($conexion, $data){
		$filtros = "";
		if ($data['fechaI']!='' && $data['fechaF']=='') {
			$filtros .= "`i_fechaTermino` >= '".$data['fechaI']."' AND"; 
		}
		$fechaX=explode('-', $data['fechaF']);
		$temp = $fechaX[2]+1;
		if($temp>31){
			if($fechaX[1]!=12){
				$fechaX=$fechaX[0]."-".($fechaX[1]+1)."-01";
			}else{
				$fechaX=($fechaX[0]+1)."-01-01";
			}
		}else 
			$fechaX=$fechaX[0]."-".$fechaX[1]."-".$temp;

		if ($data['fechaI']=='' && $data['fechaF']!='') {
			$filtros .= "`i_fechaTermino` >= '".$data['fechaF']."' AND"; 
		}

		if ($data['fechaI']!='' && $data['fechaF']!='') {
			$filtros .= "( `i_fechaTermino` BETWEEN '".$data['fechaI']."' AND '".$data['fechaF']."') AND"; 
		}
		
		if ($data['marca']!='Marca') {
			$filtros .= "`clienteMarca` = '".$data['marca']."' AND"; 
		}

		
		if ($data['tipo']!='Tipo') {
			$filtros .= "`viajeTipo` = '".$data['tipo']."' AND"; 
		}

		
		if ($data['visitaEstado']!='Estado') {
			$filtros .= "`statusVisita` = '".$data['visitaEstado']."' AND"; 
		}

		if ($data['pagoEstado']!='Pago') {
			$filtros .= "`statusPago` = '".$data['pagoEstado']."' AND"; 
		}

		if($_POST['keyWord']!='') $filtros .= " (usuario LIKE '%$_POST[keyWord]%' OR nombre LIKE '%$_POST[keyWord]%' OR auditorEmail LIKE '%$_POST[keyWord]%' OR acceso LIKE '%$_POST[keyWord]%') AND";


		$filtros .=" 1 AND `nombre`!=''";



		$query = "SELECT `id`, `encuestaID`, `auditorEmail`, `nombre`, `clienteMarca`, `clienteNombre`, `clienteNumero`, `clienteDireccionCompleta`, `fInicio`, `fTermino`, `viajeTipo`, `statusVisita`, `statusPago`, `i_fechaTermino`, `clienteEstado`, `i_fechaTermino` FROM `auditorias` LEFT JOIN `usuarios` ON (`usuarios`.`email` = `auditorias`.`auditorEmail`) WHERE `statusVisita`='Finalizada' AND $filtros ORDER BY `auditorEmail` ASC, `clienteMarca` ASC";
		//var_dump($query);

		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado;
		}
	}


	//Seleccionar los usuarios de la DB.
	//@param null
	//@return array
	function seleccionarUsuariosConAuditoriasPagoPendienteFiltros($conexion, $data){
		global $usuar_arg_sin_pago;
		$filtros = "";
		if ($data['fechaI']!='' && $data['fechaF']=='') {
			$filtros .= "`fInicio` >= '".$data['fechaI']."' AND"; 
		}
		$fechaX=explode('-', $data['fechaF']);
		$temp = $fechaX[2]+1;
		if($temp>31){
			if($fechaX[1]!=12){
				$fechaX=$fechaX[0]."-".($fechaX[1]+1)."-01";
			}else{
				$fechaX=($fechaX[0]+1)."-01-01";
			}
		}else 
			$fechaX=$fechaX[0]."-".$fechaX[1]."-".$temp;

		if ($data['fechaI']=='' && $data['fechaF']!='') {
			$filtros .= "`fTermino` >= '".$data['fechaF']."' AND"; 
		}

		if ($data['fechaI']!='' && $data['fechaF']!='') {
			//$filtros .= "( `fInicio` BETWEEN '".$data['fechaI']."' AND '".$data['fechaF']."') AND"; 
			$filtros .= "( `fTermino` BETWEEN '".$data['fechaI']."' AND '".$data['fechaF']."') AND"; 
		}
		
		if ($data['marca']!='Marca') {
			$filtros .= "`clienteMarca` = '".$data['marca']."' AND"; 
		}
		if ($data['pais']!='') {
			$filtros .= "`clientePais` = '".$data['pais']."' AND"; 
		}

		if ($data['tipo']!='Tipo') {
			$filtros .= "`viajeTipo` = '".$data['tipo']."' AND"; 
		}

		if ($data['visitaEstado']!='Estado' && $data['visitaEstado']!='') {
			$filtros .= "`statusVisita` = '".$data['visitaEstado']."' AND "; 
		}

		if ($data['pagoEstado']!='Pago') {
			$filtros .= "`statusPago` = '".$data['pagoEstado']."' AND"; 
		}

		if($_POST['keyWord']!='') $filtros .= " (usuario LIKE '%$_POST[keyWord]%' OR nombre LIKE '%$_POST[keyWord]%' OR auditorEmail LIKE '%$_POST[keyWord]%' OR acceso LIKE '%$_POST[keyWord]%') AND";


		$filtros .=" 1 AND `level`=2 AND  `nombre`!='' AND `status`='Activo' ".$usuar_arg_sin_pago;



		$query = "SELECT `id`, `encuestaID`, `auditorEmail`, `nombre`, `clienteMarca`, `clienteNombre`, `clienteNumero`, `clienteDireccionCompleta`, `fInicio`, `fTermino`, `viajeTipo`, `statusVisita`, `statusPago`, `i_fechaTermino`, `clienteEstado`, `clienteCiudadPais`, `clientePais` ,`modificadorPago`, `tipo_cerrada`, `comentarios`, `visita`, `tipo_auditoria` FROM `auditorias` LEFT JOIN `usuarios` ON (`usuarios`.`email` = `auditorias`.`auditorEmail`) WHERE $filtros ORDER BY `usuarios`.`nombre` ASC, `clienteMarca` ASC";
		//var_dump($query);

		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado;
		}
	}


	//Seleccionar los usuarios de la DB.
	//@param null
	//@return array
	function seleccionarUsuariosConAuditoriasPagoPendienteFiltros_v2($conexion, $data){
		global $usuar_arg_sin_pago;
		$filtros = "";
		if ($data['fechaI']!='' && $data['fechaF']=='') {
			$filtros .= "`fInicio` >= '".$data['fechaI']."' AND"; 
		}
		$fechaX=explode('-', $data['fechaF']);
		$temp = $fechaX[2]+1;
		if($temp>31){
			if($fechaX[1]!=12){
				$fechaX=$fechaX[0]."-".($fechaX[1]+1)."-01";
			}else{
				$fechaX=($fechaX[0]+1)."-01-01";
			}
		}else 
			$fechaX=$fechaX[0]."-".$fechaX[1]."-".$temp;

		if ($data['fechaI']=='' && $data['fechaF']!='') {
			$filtros .= "`fTermino` >= '".$data['fechaF']."' AND"; 
		}

		if ($data['fechaI']!='' && $data['fechaF']!='') {
			//$filtros .= "( `fInicio` BETWEEN '".$data['fechaI']."' AND '".$data['fechaF']."') AND"; 
			$filtros .= "( `i_fechaVisita` BETWEEN '".$data['fechaI']."' AND '".$data['fechaF']."') AND"; 
		}
		
		if ($data['marca']!='Marca') {
			$filtros .= "`clienteMarca` = '".$data['marca']."' AND"; 
		}
		if ($data['pais']!='') {
			$filtros .= "`clientePais` = '".$data['pais']."' AND"; 
		}

		if ($data['tipo']!='Tipo') {
			$filtros .= "`viajeTipo` = '".$data['tipo']."' AND"; 
		}

		if ($data['visitaEstado']!='Estado' && $data['visitaEstado']!='') {
			$filtros .= "`statusVisita` = '".$data['visitaEstado']."' AND "; 
		}

		if ($data['pagoEstado']!='Pago') {
			$filtros .= "`statusPago` = '".$data['pagoEstado']."' AND"; 
		}

		if($_POST['keyWord']!='') $filtros .= " (usuario LIKE '%$_POST[keyWord]%' OR nombre LIKE '%$_POST[keyWord]%' OR auditorEmail LIKE '%$_POST[keyWord]%' OR acceso LIKE '%$_POST[keyWord]%') AND";


		$filtros .=" 1 AND `level`=2 AND  `nombre`!='' AND `status`='Activo' ".$usuar_arg_sin_pago;



		$query = "SELECT `id`, `encuestaID`, `auditorEmail`, `nombre`, `clienteMarca`, `clienteNombre`, `clienteNumero`, `clienteDireccionCompleta`, `fInicio`, `fTermino`, `viajeTipo`, `statusVisita`, `statusPago`, `i_fechaVisita`, `i_fechaTermino`, `clienteEstado`, `clienteCiudadPais`, `clientePais` ,`modificadorPago`, `tipo_cerrada`, `comentarios`, `visita`, `tipo_auditoria` FROM `auditorias` LEFT JOIN `usuarios` ON (`usuarios`.`email` = `auditorias`.`auditorEmail`) WHERE $filtros ORDER BY `usuarios`.`nombre` ASC, `clienteMarca` ASC";
		//var_dump($query);

		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado;
		}
	}


	//Seleccionar los usuarios de la DB.
	//@param null
	//@return array
	function seleccionarUsuariosConAuditoriasPagoPendienteFiltros_Coord($paises, $conexion, $data){
		global $usuar_arg_sin_pago;
		$filtros = "";
		if ($data['fechaI']!='' && $data['fechaF']=='') {
			$filtros .= "`fInicio` >= '".$data['fechaI']."' AND"; 
		}
		$fechaX=explode('-', $data['fechaF']);
		$temp = $fechaX[2]+1;
		if($temp>31){
			if($fechaX[1]!=12){
				$fechaX=$fechaX[0]."-".($fechaX[1]+1)."-01";
			}else{
				$fechaX=($fechaX[0]+1)."-01-01";
			}
		}else 
			$fechaX=$fechaX[0]."-".$fechaX[1]."-".$temp;

		if ($data['fechaI']=='' && $data['fechaF']!='') {
			$filtros .= "`fTermino` >= '".$data['fechaF']."' AND"; 
		}

		if ($data['fechaI']!='' && $data['fechaF']!='') {
			//$filtros .= "( `fInicio` BETWEEN '".$data['fechaI']."' AND '".$data['fechaF']."') AND"; 
			$filtros .= "( `fTermino` BETWEEN '".$data['fechaI']."' AND '".$data['fechaF']."') AND"; 
		}
		
		if ($data['marca']!='Marca') {
			$filtros .= "`clienteMarca` = '".$data['marca']."' AND"; 
		}
		if ($data['pais']!='') {
			$filtros .= "`clientePais` = '".$data['pais']."' AND"; 
		}

		if ($data['tipo']!='Tipo') {
			$filtros .= "`viajeTipo` = '".$data['tipo']."' AND"; 
		}

		if ($data['visitaEstado']!='Estado' && $data['visitaEstado']!='') {
			$filtros .= "`statusVisita` = '".$data['visitaEstado']."' AND "; 
		}

		if ($data['pagoEstado']!='Pago') {
			$filtros .= "`statusPago` = '".$data['pagoEstado']."' AND"; 
		}

		if($_POST['keyWord']!='') $filtros .= " (usuario LIKE '%$_POST[keyWord]%' OR nombre LIKE '%$_POST[keyWord]%' OR auditorEmail LIKE '%$_POST[keyWord]%' OR acceso LIKE '%$_POST[keyWord]%') AND";


		$filtros .=" 1 AND `level`=2 AND `nombre`!='' AND `status`='Activo' ".$usuar_arg_sin_pago;



		$query = "SELECT `id`, `encuestaID`, `auditorEmail`, `nombre`, `clienteMarca`, `clienteNombre`, `clienteNumero`, `clienteDireccionCompleta`, `fInicio`, `fTermino`, `viajeTipo`, `statusVisita`, `statusPago`, `i_fechaTermino`, `clienteEstado`, `clienteCiudadPais`, `clientePais`,`modificadorPago`, `tipo_cerrada`, `comentarios`, `visita`, `tipo_auditoria` FROM `auditorias` LEFT JOIN `usuarios` ON (`usuarios`.`email` = `auditorias`.`auditorEmail`) WHERE $filtros AND `clientePais` IN($paises) ORDER BY `usuarios`.`nombre` ASC, `clienteMarca` ASC";
		//var_dump($query);

		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado;
		}
	}


	//Seleccionar los usuarios de la DB.
	//@param null
	//@return array
	function seleccionarUsuariosConAuditoriasPagoPendienteFiltros_Coord_v2($paises, $conexion, $data){
		global $usuar_arg_sin_pago;
		$filtros = "";
		if ($data['fechaI']!='' && $data['fechaF']=='') {
			$filtros .= "`fInicio` >= '".$data['fechaI']."' AND"; 
		}
		$fechaX=explode('-', $data['fechaF']);
		$temp = $fechaX[2]+1;
		if($temp>31){
			if($fechaX[1]!=12){
				$fechaX=$fechaX[0]."-".($fechaX[1]+1)."-01";
			}else{
				$fechaX=($fechaX[0]+1)."-01-01";
			}
		}else 
			$fechaX=$fechaX[0]."-".$fechaX[1]."-".$temp;

		if ($data['fechaI']=='' && $data['fechaF']!='') {
			$filtros .= "`fTermino` >= '".$data['fechaF']."' AND"; 
		}

		if ($data['fechaI']!='' && $data['fechaF']!='') {
			//$filtros .= "( `fInicio` BETWEEN '".$data['fechaI']."' AND '".$data['fechaF']."') AND"; 
			$filtros .= "( `i_fechaVisita` BETWEEN '".$data['fechaI']."' AND '".$data['fechaF']."') AND"; 
		}
		
		if ($data['marca']!='Marca') {
			$filtros .= "`clienteMarca` = '".$data['marca']."' AND"; 
		}
		if ($data['pais']!='') {
			$filtros .= "`clientePais` = '".$data['pais']."' AND"; 
		}

		if ($data['tipo']!='Tipo') {
			$filtros .= "`viajeTipo` = '".$data['tipo']."' AND"; 
		}

		if ($data['visitaEstado']!='Estado' && $data['visitaEstado']!='') {
			$filtros .= "`statusVisita` = '".$data['visitaEstado']."' AND "; 
		}

		if ($data['pagoEstado']!='Pago') {
			$filtros .= "`statusPago` = '".$data['pagoEstado']."' AND"; 
		}

		if($_POST['keyWord']!='') $filtros .= " (usuario LIKE '%$_POST[keyWord]%' OR nombre LIKE '%$_POST[keyWord]%' OR auditorEmail LIKE '%$_POST[keyWord]%' OR acceso LIKE '%$_POST[keyWord]%') AND";


		$filtros .=" 1 AND `level`=2 AND `nombre`!='' AND `status`='Activo' ".$usuar_arg_sin_pago;



		$query = "SELECT `id`, `encuestaID`, `auditorEmail`, `nombre`, `clienteMarca`, `clienteNombre`, `clienteNumero`, `clienteDireccionCompleta`, `fInicio`, `fTermino`, `viajeTipo`, `statusVisita`, `statusPago`, `i_fechaVisita`, `i_fechaTermino`, `clienteEstado`, `clienteCiudadPais`, `clientePais`,`modificadorPago`, `tipo_cerrada`, `comentarios`, `visita`, `tipo_auditoria` FROM `auditorias` LEFT JOIN `usuarios` ON (`usuarios`.`email` = `auditorias`.`auditorEmail`) WHERE $filtros AND `clientePais` IN($paises) ORDER BY `usuarios`.`nombre` ASC, `clienteMarca` ASC";
		//var_dump($query);

		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado;
		}
	}


	function contarAuditoriasUsuarioMarcaFiltro($conexion, $marca, $email, $data){
		$filtros = "";
		if ($data['fechaI']!='' && $data['fechaF']=='') {
			$filtros .= "`fInicio` >= '".$data['fechaI']."' AND"; 
		}
		$fechaX=explode('-', $data['fechaF']);
		$temp = $fechaX[2]+1;
		if($temp>31){
			if($fechaX[1]!=12){
				$fechaX=$fechaX[0]."-".($fechaX[1]+1)."-01";
			}else{
				$fechaX=($fechaX[0]+1)."-01-01";
			}
		}else 
			$fechaX=$fechaX[0]."-".$fechaX[1]."-".$temp;

		if ($data['fechaI']=='' && $data['fechaF']!='') {
			$filtros .= "`fTermino` >= '".$data['fechaF']."' AND"; 
		}

		if ($data['fechaI']!='' && $data['fechaF']!='') {
			//$filtros .= "( `fInicio` BETWEEN '".$data['fechaI']."' AND '".$data['fechaF']."') AND"; 
			$filtros .= "( `fTermino` BETWEEN '".$data['fechaI']."' AND '".$data['fechaF']."') AND"; 
		}
		
		if ($data['marca']!='Marca' && $data['marca']!='') {
			$filtros .= "`clienteMarca` = '".$data['marca']."' AND"; 
			//$filtros .= "`clienteMarca` = '".$marca."' AND"; 
		}else{
			$filtros .= "`clienteMarca` = '".$marca."' AND"; 
		}
		if ($data['pais']!='Pais' && $data['pais']!='') {
			$filtros .= "`clientePais` = '".$data['pais']."' AND"; 
		}

		
		if ($data['tipo']!='Tipo' && $data['tipo']!='') {
			$filtros .= "`viajeTipo` = '".$data['tipo']."' AND"; 
		}

		if ($data['visitaEstado']!='Estado' && $data['visitaEstado']!='') {
			$filtros .= "`statusVisita` = '".$data['visitaEstado']."' AND "; 
		}

		if ($data['pagoEstado']!='Pago' && $data['pagoEstado']!='') {
			$filtros .= "`statusPago` = '".$data['pagoEstado']."' AND"; 
		}

		if($_POST['keyWord']!='') $filtros .= " (usuario LIKE '%$_POST[keyWord]%' OR nombre LIKE '%$_POST[keyWord]%' OR auditorEmail LIKE '%$_POST[keyWord]%' OR acceso LIKE '%$_POST[keyWord]%') AND";


		$filtros .=" 1 AND `nombre`!='' AND `status`='Activo' AND `email`= '$email' AND `level`=2 ";



		$query = "SELECT COUNT(*) FROM `auditorias` LEFT JOIN `usuarios` ON (`usuarios`.`email` = `auditorias`.`auditorEmail`) WHERE $filtros ORDER BY `auditorEmail` ASC, `clienteMarca` ASC";
		//var_dump($query);

		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado;
		}
	}


	function contarAuditoriasUsuarioMarcaFiltro_v2($conexion, $marca, $email, $data){
		$filtros = "";
		if ($data['fechaI']!='' && $data['fechaF']=='') {
			$filtros .= "`fInicio` >= '".$data['fechaI']."' AND"; 
		}
		$fechaX=explode('-', $data['fechaF']);
		$temp = $fechaX[2]+1;
		if($temp>31){
			if($fechaX[1]!=12){
				$fechaX=$fechaX[0]."-".($fechaX[1]+1)."-01";
			}else{
				$fechaX=($fechaX[0]+1)."-01-01";
			}
		}else 
			$fechaX=$fechaX[0]."-".$fechaX[1]."-".$temp;

		if ($data['fechaI']=='' && $data['fechaF']!='') {
			$filtros .= "`fTermino` >= '".$data['fechaF']."' AND"; 
		}

		if ($data['fechaI']!='' && $data['fechaF']!='') {
			//$filtros .= "( `fInicio` BETWEEN '".$data['fechaI']."' AND '".$data['fechaF']."') AND"; 
			$filtros .= "( `i_fechaVisita` BETWEEN '".$data['fechaI']."' AND '".$data['fechaF']."') AND"; 
		}
		
		if ($data['marca']!='Marca' && $data['marca']!='') {
			$filtros .= "`clienteMarca` = '".$data['marca']."' AND"; 
			//$filtros .= "`clienteMarca` = '".$marca."' AND"; 
		}else{
			$filtros .= "`clienteMarca` = '".$marca."' AND"; 
		}
		if ($data['pais']!='Pais' && $data['pais']!='') {
			$filtros .= "`clientePais` = '".$data['pais']."' AND"; 
		}

		
		if ($data['tipo']!='Tipo' && $data['tipo']!='') {
			$filtros .= "`viajeTipo` = '".$data['tipo']."' AND"; 
		}

		if ($data['visitaEstado']!='Estado' && $data['visitaEstado']!='') {
			$filtros .= "`statusVisita` = '".$data['visitaEstado']."' AND "; 
		}

		if ($data['pagoEstado']!='Pago' && $data['pagoEstado']!='') {
			$filtros .= "`statusPago` = '".$data['pagoEstado']."' AND"; 
		}

		if($_POST['keyWord']!='') $filtros .= " (usuario LIKE '%$_POST[keyWord]%' OR nombre LIKE '%$_POST[keyWord]%' OR auditorEmail LIKE '%$_POST[keyWord]%' OR acceso LIKE '%$_POST[keyWord]%') AND";


		$filtros .=" 1 AND `nombre`!='' AND `status`='Activo' AND `email`= '$email' AND `level`=2 ";



		$query = "SELECT COUNT(*) FROM `auditorias` LEFT JOIN `usuarios` ON (`usuarios`.`email` = `auditorias`.`auditorEmail`) WHERE $filtros ORDER BY `auditorEmail` ASC, `clienteMarca` ASC";
		//var_dump($query);

		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado;
		}
	}


	function contarAuditoriasUsuarioFiltro($conexion,  $email, $data){
		$filtros = "";
		if ($data['fechaI']!='' && $data['fechaF']=='') {
			$filtros .= "`fInicio` >= '".$data['fechaI']."' AND"; 
		}
		$fechaX=explode('-', $data['fechaF']);
		$temp = $fechaX[2]+1;
		if($temp>31){
			if($fechaX[1]!=12){
				$fechaX=$fechaX[0]."-".($fechaX[1]+1)."-01";
			}else{
				$fechaX=($fechaX[0]+1)."-01-01";
			}
		}else 
			$fechaX=$fechaX[0]."-".$fechaX[1]."-".$temp;

		if ($data['fechaI']=='' && $data['fechaF']!='') {
			$filtros .= "`fTermino` >= '".$data['fechaF']."' AND"; 
		}

		if ($data['fechaI']!='' && $data['fechaF']!='') {
			//$filtros .= "( `fInicio` BETWEEN '".$data['fechaI']."' AND '".$data['fechaF']."') AND"; 
			$filtros .= "( `fTermino` BETWEEN '".$data['fechaI']."' AND '".$data['fechaF']."') AND"; 
		}
		
		if ($data['marca']!='Marca' && $data['marca']!='') {
			$filtros .= "`clienteMarca` = '".$data['marca']."' AND"; 
		}
		if ($data['pais']!='Pais' && $data['pais']!='') {
			$filtros .= "`clientePais` = '".$data['pais']."' AND"; 
		}

		
		if ($data['tipo']!='Tipo' && $data['tipo']!='') {
			$filtros .= "`viajeTipo` = '".$data['tipo']."' AND"; 
		}

		if ($data['visitaEstado']!='Estado' && $data['visitaEstado']!='') {
			$filtros .= "`statusVisita` = '".$data['visitaEstado']."' AND "; 
		}

		if ($data['pagoEstado']!='Pago' && $data['pagoEstado']!='') {
			$filtros .= "`statusPago` = '".$data['pagoEstado']."' AND"; 
		}

		if($_POST['keyWord']!='') $filtros .= " (usuario LIKE '%$_POST[keyWord]%' OR nombre LIKE '%$_POST[keyWord]%' OR auditorEmail LIKE '%$_POST[keyWord]%' OR acceso LIKE '%$_POST[keyWord]%') AND";


		$filtros .=" 1 AND `nombre`!='' AND `status`='Activo' AND `email`= '$email' AND `level`=2 ";



		$query = "SELECT COUNT(*) FROM `auditorias` LEFT JOIN `usuarios` ON (`usuarios`.`email` = `auditorias`.`auditorEmail`) WHERE $filtros ORDER BY `auditorEmail` ASC, `clienteMarca` ASC";
		

		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado;
		}

		/*
		$query = "SELECT COUNT(*) FROM `auditorias` LEFT JOIN `usuarios` ON (`auditorias`.`auditorEmail`= `usuarios`.`email`) WHERE `status` = 'Activo' AND `email`= '$email'";
		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado[0];
		} */

	}


	function contarAuditoriasUsuarioFiltro_v2($conexion,  $email, $data){
		$filtros = "";
		if ($data['fechaI']!='' && $data['fechaF']=='') {
			$filtros .= "`fInicio` >= '".$data['fechaI']."' AND"; 
		}
		$fechaX=explode('-', $data['fechaF']);
		$temp = $fechaX[2]+1;
		if($temp>31){
			if($fechaX[1]!=12){
				$fechaX=$fechaX[0]."-".($fechaX[1]+1)."-01";
			}else{
				$fechaX=($fechaX[0]+1)."-01-01";
			}
		}else 
			$fechaX=$fechaX[0]."-".$fechaX[1]."-".$temp;

		if ($data['fechaI']=='' && $data['fechaF']!='') {
			$filtros .= "`fTermino` >= '".$data['fechaF']."' AND"; 
		}

		if ($data['fechaI']!='' && $data['fechaF']!='') {
			//$filtros .= "( `fInicio` BETWEEN '".$data['fechaI']."' AND '".$data['fechaF']."') AND"; 
			$filtros .= "( `i_fechaVisita` BETWEEN '".$data['fechaI']."' AND '".$data['fechaF']."') AND"; 
		}
		
		if ($data['marca']!='Marca' && $data['marca']!='') {
			$filtros .= "`clienteMarca` = '".$data['marca']."' AND"; 
		}
		if ($data['pais']!='Pais' && $data['pais']!='') {
			$filtros .= "`clientePais` = '".$data['pais']."' AND"; 
		}

		
		if ($data['tipo']!='Tipo' && $data['tipo']!='') {
			$filtros .= "`viajeTipo` = '".$data['tipo']."' AND"; 
		}

		if ($data['visitaEstado']!='Estado' && $data['visitaEstado']!='') {
			$filtros .= "`statusVisita` = '".$data['visitaEstado']."' AND "; 
		}

		if ($data['pagoEstado']!='Pago' && $data['pagoEstado']!='') {
			$filtros .= "`statusPago` = '".$data['pagoEstado']."' AND"; 
		}

		if($_POST['keyWord']!='') $filtros .= " (usuario LIKE '%$_POST[keyWord]%' OR nombre LIKE '%$_POST[keyWord]%' OR auditorEmail LIKE '%$_POST[keyWord]%' OR acceso LIKE '%$_POST[keyWord]%') AND";


		$filtros .=" 1 AND `nombre`!='' AND `status`='Activo' AND `email`= '$email' AND `level`=2 ";



		$query = "SELECT COUNT(*) FROM `auditorias` LEFT JOIN `usuarios` ON (`usuarios`.`email` = `auditorias`.`auditorEmail`) WHERE $filtros ORDER BY `auditorEmail` ASC, `clienteMarca` ASC";
		

		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado;
		}

		/*
		$query = "SELECT COUNT(*) FROM `auditorias` LEFT JOIN `usuarios` ON (`auditorias`.`auditorEmail`= `usuarios`.`email`) WHERE `status` = 'Activo' AND `email`= '$email'";
		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado[0];
		} */

	}




	//Seleccionar los usuarios de la DB.
	//@param array
	//@return array
	function keywordUser($conexion, $keyword){
		$filter = "WHERE 1 ";
		if($keyword!='') $filter = "WHERE ( nombre LIKE '%$keyword%' OR email LIKE '%$keyword%' ) AND email!='' ";

		$query = 'SELECT DISTINCT `email` FROM `usuarios` '.$filter;
		
		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado;
		}
	}

	//Seleccionar los usuarios de la DB.
	//@param array
	//@return array
	function seleccionarUsuariosFiltros($conexion, $data){
		$filter = "WHERE 1 ";
		if($_POST['acceso']!='-Any-') $filter .= "AND acceso='$_POST[acceso]' ";
		if($_POST['pais']!='-Any-') $filter .= "AND pais LIKE '%$_POST[pais]%' ";
		if($_POST['status']!='-Any-') $filter .= "AND status='$_POST[status]' ";
		if($_POST['pclave']!='') $filter = "WHERE (usuario LIKE '%$_POST[pclave]%' OR nombre LIKE '%$_POST[pclave]%' OR contrasena LIKE '%$_POST[pclave]%' OR email LIKE '%$_POST[pclave]%' OR acceso LIKE '%$_POST[pclave]%' )";

		$query = 'SELECT * FROM `usuarios` '.$filter;
		
		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado;
		}
	}

	//Seleccionar las noticias de la DB.
	//@param null
	//@return array
	function seleccionarNoticias($conexion){
		$query = 'SELECT * FROM `noticias` ORDER BY `noticias`.`id_noticia` DESC';
		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado;
		}
	}

	//Seleccionar las noticias de la DB.
	//@param null
	//@return array
	function seleccionarNoticiasType($type, $conexion){
		$query = "SELECT * FROM `noticias` WHERE `seccion`='".$type."' ORDER BY `noticias`.`id_noticia` DESC";
		$resultado = array();
		//var_dump($query);

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado;
		}
	}

	//Seleccionar id, título y fecha de las noticias de la DB.
	//@param null
	//@return array
	function seleccionarNoticiasIndex($conexion){
		$query = 'SELECT `id_noticia`, `titulo`, `fecha` FROM `noticias` ORDER BY `noticias`.`id_noticia` DESC';
		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado;
		}
	}

	//Seleccionar id, título y fecha de las noticias de la DB por marca.
	//@param null
	//@return array
	function seleccionarNoticiasIndex_Marca($marca, $conexion){

		$filtros = "WHERE `marcas` LIKE '%$marca%' AND `status` = 'Activo'";
		
		$query = 'SELECT `id_noticia`, `titulo`, `fecha`, `marcas` FROM `noticias`'.$filtros.'ORDER BY `noticias`.`id_noticia` DESC';
		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado;
		}
	}


	//Seleccionar id, título y fecha de las noticias de la DB por marca.
	//@param null
	//@return array
	function seleccionarNoticiasIndex_MarcaPais($marca, $pais, $conexion){

		$filtros = "WHERE `marcas` LIKE '%$marca%' AND `paises` LIKE '%$pais%' AND `status` = 'Activo'";
		
		$query = 'SELECT `id_noticia`, `titulo`, `fecha`, `marcas`,  `paises` FROM `noticias`'.$filtros.' ORDER BY `noticias`.`id_noticia` DESC';
		$resultado = array();

		//echo $query."<br/>";

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado;
		}
	}


	//
	//@param null
	//@return array
	function paisesAprobadosCoordinador($conexion){

		$query = "SELECT `clienteMarca`, `clientePais`, COUNT(*) FROM `auditorias` WHERE `statusPago` IN ('Aprobado C', 'Cerrada C', 'Sin Pago C') GROUP BY `clienteMarca`, `clientePais`";
		$resultado = array();

		//echo $query."<br/>";

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado;
		}
	}


	//Seleccionar id, título y fecha de las noticias de la DB por marca.
	//@param null
	//@return array
	function seleccionarNoticiasSliderIndex_MarcaPais($marca, $pais, $conexion){

		//$filtros = "WHERE `marcas` LIKE '%$marca%' AND `paises` LIKE '%$pais%' AND `status` = 'Activo'";
		
		if ($marca!='SBX') {
			$filtros = "WHERE `marcas` LIKE '%$marca%' AND `paises` LIKE '%$pais%' AND `status` = 'Activo' ";
		}else{
			$filtros = "WHERE `marcas` LIKE '%$marca%' AND `paisesSBX` LIKE '%$pais%' AND `status` = 'Activo' ";
		}

		$query = 'SELECT `id_noticia`, `titulo`, `fecha`, `marcas`,  `paises` FROM `noticias`'.$filtros.' AND toSlider ="SI"  ORDER BY `noticias`.`id_noticia` DESC';

		$resultado = array();

		//echo $query."<br/>";

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado;
		}
	}



	//Seleccionar id, título y fecha de las noticias de la DB por marca.
	//@param null
	//@return array
	function seleccionarTypeIndex_MarcaPais($marca, $pais, $type, $conexion){

		if ($marca!='SBX') {
			$filtros = "WHERE `marcas` LIKE '%$marca%' AND `paises` LIKE '%$pais%' AND `status` = 'Activo' AND `seccion` = '$type' ";
		}else{
			$filtros = "WHERE `marcas` LIKE '%$marca%' AND `paisesSBX` LIKE '%$pais%' AND `status` = 'Activo' AND `seccion` = '$type' ";
		}
		
		
		$query = 'SELECT `id_noticia`, `titulo`, `fecha`, `marcas`,  `paises`, `paisesSBX` FROM `noticias`'.$filtros.'ORDER BY `noticias`.`id_noticia` DESC';
		$resultado = array();

		//echo $query."<br/>";

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado;
		}
	}



	//Seleccionar una noticia de la DB por ID.
	//@param int
	//@return array
	function seleccionarNoticiaID($id, $conexion){
		$query = 'SELECT * FROM `noticias` WHERE `id_noticia`="'.$id.'";';
		
		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado;
		}
	}

	//Seleccionar las notificaciones de la DB.
	//@param null
	//@return array
	function seleccionarNotificaciones($conexion){
		$query = 'SELECT * FROM `notificaciones` ORDER BY `notificaciones`.`id_notificacion` DESC';
		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado;
		}
	}

	//Seleccionar las notificaciones de la DB.
	//@param null
	//@return array
	function seleccionarNotificacionesActivas($conexion){
		$query = 'SELECT * FROM `notificaciones` WHERE `activo` = 1 ORDER BY `notificaciones`.`id_notificacion` DESC';
		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado;
		}
	}

	//Seleccionar las notificaciones de la DB de un Usuario Específico.
	//@param null
	//@return array
	function seleccionarNotificacionesActivasID($id, $conexion){
		$query = 'SELECT * FROM `notificaciones` WHERE `activo` = "1" AND `id_empleado`= "'.$id.'" ORDER BY `notificaciones`.`id_notificacion` DESC';
		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado;
		}
	}

	//Seleccionar las notificaciones de la DB de un Usuario Específico.
	//@param null
	//@return array
	function seleccionarNotificacionesActivasEMAIL($email, $conexion){
		$query = 'SELECT * FROM `notificaciones` WHERE `activo` = "1" AND `email`= "'.$email.'" ORDER BY `notificaciones`.`id_notificacion` DESC LIMIT 3';
		//var_dump($query);
		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado;
		}
	}

	//Seleccionar las marcas de la DB.
	//@param null
	//@return array
	function seleccionarAuditoriasMarcas($conexion){
		$query = 'SELECT DISTINCT `clienteMarca` FROM `auditorias` ORDER BY `auditorias`.`clienteMarca` ASC';
		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado;
		}
	}

	//Seleccionar las marcas de la DB.
	//@param null
	//@return array
	function seleccionarAuditoriasMarcas_Coord($paises, $conexion){
		$query = 'SELECT DISTINCT `clienteMarca` FROM `auditorias` WHERE clientePais IN ('.$paises.') ORDER BY `auditorias`.`clienteMarca` ASC';
		//var_dump($query);
		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado;
		}
	}

	//Seleccionar las marcas de la DB.
	//@param null
	//@return array
	function seleccionarAuditoriasMarcasID($id, $conexion){
		$query = 'SELECT DISTINCT `clienteMarca` FROM `auditorias` WHERE `auditorID`="'.$id.'" ORDER BY `auditorias`.`clienteMarca` ASC';
		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado;
		}
	}

	//Seleccionar las marcas de la DB.
	//@param null
	//@return array
	function seleccionarAuditoriasMarcasEMAIL($email, $conexion){
		$query = 'SELECT DISTINCT `clienteMarca` FROM `auditorias` WHERE `auditorEmail`="'.$email.'" ORDER BY `auditorias`.`clienteMarca` ASC';
		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado;
		}
	}

	//Seleccionar las auditorias de la DB.
	//@param null
	//@return array
	function seleccionarAuditorias($conexion){
		$query = 'SELECT * FROM `auditorias` ORDER BY `auditorias`.`clienteMarca` ASC';
		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado;
		}
	}

	//Seleccionar las auditorias de la DB.
	//@param null
	//@return array
	function seleccionarAuditoriasUpdate($conexion){
		$query = "SELECT `encuestaID`, `auditorID`, `clienteMarca`, `statusVisita` FROM `auditorias`  WHERE `statusVisita` !='Finalizada' ORDER BY `auditorias`.`clienteMarca` ASC";
		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado;
		}
	}

	function seleccionarAuditoriasMARCA_UPDATE($marca, $conexion){
		$query = "SELECT `encuestaID`, `auditorID`, `clienteMarca`, `statusVisita` FROM `auditorias` WHERE `clienteMarca`= '".$marca."'  ORDER BY `clienteMarca` ASC";
		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado;
		}
	}


	function updateStatusExternal($conexion, $encuestaID, $auditorID, $status, $fechaRevision, $fechaVisita, $fechaTermino){
		$query = "UPDATE `auditorias` SET `statusVisita` = '".$status."', `fechaRevision2` = '".$fechaRevision."', `i_fechaVisita` = '".$fechaVisita."', `i_fechaTermino` = '".$fechaTermino."' WHERE `encuestaID` = '".$encuestaID."' AND `auditorID` = '".$auditorID."';";
		$updated = mysqli_query($conexion, $query);
		//var_dump($query);

		return $updated;
	}


	function updateStatusFVisita($conexion, $encuestaID, $auditorID, $status, $fechaRevision, $fechaVisita, $fechaTermino, $nombre){
		$query = "UPDATE `auditorias` SET `fecha_actualizada`=1, `clienteNombre`='".$nombre."', `fechaRevision2` = '".$fechaRevision."', `i_fechaVisita` = '".$fechaVisita."', `i_fechaTermino` = '".$fechaTermino."' WHERE `encuestaID` = '".$encuestaID."' AND `auditorID` = '".$auditorID."';";
		$updated = mysqli_query($conexion, $query);
		//var_dump($query);

		return $updated;
	}


	function update_status($id, $status, $conexion){
		if ($status=='Pendiente') {
			$statusX='Sin Programar';
		}else{
			$statusX='Finalizada';
		}
		$query = "UPDATE `auditorias` SET `statusVisita` = '".$statusX."', `statusPago` = '".$status."' WHERE `id` = '".$id."' ";
		$updated = mysqli_query($conexion, $query);
		//var_dump($query);

		return $updated;
	}

	function clone_audit($id, $marca, $razon, $conexion){
		$query = "SELECT * FROM `auditorias` WHERE `encuestaID` = '".$id."' AND `clienteMarca`='".$marca."' LIMIT 1";
		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    //return $resultado;
		}
		//$result = $result[0];


		if (sizeof($result)>0) {
			$clone_sql = 
			'INSERT INTO `auditorias` (`encuestaID`, `encuestaFProgramacion`, `auditorId`, `auditorEmail`, `auditorNombre`, `clienteMarca`, `clienteNumero`, `clienteNombre`, `clienteDireccionCompleta`, `clienteEstado`, `clienteCiudadPais`, `clientePais`, `fInicio`, `fTermino`, `viajeTipo`, `statusVisita`, `statusPago`, `fechaRevision2`, `i_fechaVisita`, `i_fechaTermino`, `fechaEnvio`, `fechaRevision`, `modificadorPago`, `tipo_cerrada`, `comentarios`, `visita`, `tipo_auditoria`)
			 SELECT -'.$id.', `encuestaFProgramacion`, `auditorId`, `auditorEmail`, `auditorNombre`, `clienteMarca`, `clienteNumero`, `clienteNombre`, `clienteDireccionCompleta`, `clienteEstado`, `clienteCiudadPais`, `clientePais`, `fInicio`, `fTermino`, `viajeTipo`, "Cancelada", `statusPago`, `fechaRevision2`, `i_fechaVisita`, `i_fechaTermino`, `fechaEnvio`, `fechaRevision`, `modificadorPago`, `tipo_cerrada`, "'.$razon.'", `visita`, `tipo_auditoria`
			 FROM `auditorias` '."
			 WHERE `encuestaID` = '".$id."' AND `clienteMarca`='".$marca."' LIMIT 1";
			
			$cloned = mysqli_query($conexion, $clone_sql);
		}


		return $cloned;
	}

	function crearAuditoria($data, $conexion){
		$sql = "INSERT INTO `auditorias`(`encuestaID`, `auditorEmail`, `auditorNombre`, `clienteMarca`, `clienteNumero`, `clienteNombre`, `clientePais`, `fInicio`, `fTermino`, `viajeTipo`, `statusVisita`, `comentarios`) VALUES ('$data[encuestaID]','$data[auditorEmail]','$data[auditorNombre]','$data[clienteMarca]','$data[clienteNumero]','$data[clienteNombre]','$data[clientePais]','$data[fInicio]','$data[fTermino]','$data[viajeTipo]','$data[statusVisita]','$data[comentarios]')";
		//var_dump($sql);
		//var_dump($data);

		$inserted = mysqli_query($conexion, $sql);

		return $inserted;
	}



	//Seleccionar las auditorias por marca.
	//@param null
	//@return array
	function seleccionarAuditoriasMARCA($marca, $conexion){
		$query = 'SELECT * FROM `auditorias` WHERE `clienteMarca`= "'.$marca.'" ORDER BY `auditorias`.`clienteMarca` ASC';
		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado;
		}
	}

	//Seleccionar las auditorias por marca.
	//@param null
	//@return array
	function seleccionarAuditoriasMARCA_ID($marca, $id, $conexion){
		$query = 'SELECT * FROM `auditorias` WHERE `clienteMarca`= "'.$marca.'" AND `auditorID`="'.$id.'"  ORDER BY `auditorias`.`clienteMarca` ASC';
		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado;
		}
	}

	//Seleccionar las auditorias por marca.
	//@param null
	//@return array
	function seleccionarAuditoriasMARCA_EMAIL($marca, $email, $conexion){
		$query = 'SELECT * FROM `auditorias` WHERE `clienteMarca`= "'.$marca.'" AND `auditorEmail`="'.$email.'"  ORDER BY `auditorias`.`clienteMarca` ASC';
		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado;
		}
	}

	//Seleccionar las auditorias por marca.
	//@param null
	//@return array
	function seleccionarAuditorias_EMAIL($email, $conexion){
		$query = 'SELECT * FROM `auditorias` WHERE `auditorEmail`="'.$email.'" AND `fInicio` > "2016-06-30" ORDER BY `auditorias`.`clienteMarca` ASC';
		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado;
		}
	}


	//Seleccionar las auditorias de la DB.
	//@param null
	//@return array
	function seleccionarNoticiasSlider($conexion){
		$query = "SELECT `id_noticia`, `titulo`, `descCorta`, `fechaPublicacion` FROM `noticias` WHERE `toSlider` ='SI' AND `status` = 'Activo' ORDER BY `noticias`.`id_noticia` DESC LIMIT 4";
		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado;
		}
	}


	//Seleccionar las auditorias de la DB.
	//@param null
	//@return array
	function seleccionarNoticiasSlider_MarcaPais($marca, $pais, $conexion){
		$filtros = "WHERE `marcas` LIKE '%$marca%' AND `paises` LIKE '%$pais%' AND `toSlider` ='SI' AND `status` = 'Activo'";
		
		$query = 'SELECT `id_noticia`, `titulo`, `descCorta`, `fecha` FROM `noticias`'.$filtros.' ORDER BY `noticias`.`id_noticia` DESC LIMIT 4';
		

		//$query = "SELECT `id_noticia`, `titulo`, `descCorta`, `fechaPublicacion` FROM `noticias` WHERE `toSlider` ='SI' AND `status` = 'Activo' ORDER BY `noticias`.`id_noticia` DESC LIMIT 4";
		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado;
		}
	}



	//Seleccionar las auditorias de la DB.
	//@param null
	//@return array
	function seleccionarNoticiasSlider_Marca($marca, $conexion){
		$filtros = "WHERE `marcas` LIKE '%$marca%' AND `toSlider` ='SI' AND `status` = 'Activo'";
		
		$query = 'SELECT `id_noticia`, `titulo`, `descCorta`, `fecha` FROM `noticias`'.$filtros.' ORDER BY `noticias`.`id_noticia` DESC LIMIT 4';
		

		//$query = "SELECT `id_noticia`, `titulo`, `descCorta`, `fechaPublicacion` FROM `noticias` WHERE `toSlider` ='SI' AND `status` = 'Activo' ORDER BY `noticias`.`id_noticia` DESC LIMIT 4";
		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado;
		}
	}

	//Seleccionar una noticia de la DB por ID.
	//@param int
	//@return array
	function seleccionarNoticiasSlider_URL($id, $conexion){
		$query = 'SELECT * FROM `slider` WHERE `id_referencia`="'.$id.'";';
		
		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado;
		}
	}


	//Actualizar datos del perfil
	//@param int, string, string, string, string, string
	//@return bool
	function updatePerfil($id, $fechaNac, $direccion, $telCasa, $telCel, $fotoUrl){
		
		//valores no required
		$tCasa = $tCel = $img = "";

		if ($telCasa!='') {
			$tCasa = ", `telCasa` = '".$telCasa."' ";
		} else{
			$tCasa = ", `telCasa` = ' ' ";
		}
		if ($telCel!='') {
			$tCel = ", `telCelular` = '".$telCel."' ";
		} else{
			$tCel = ", `telCelular` = ' ' ";
		}
		if ($fotoUrl!='') {
			$img = ", `fotoUrl` = '".$fotoUrl."' ";
		}


		$query = 'UPDATE `usuarios` SET `fechaNacimiento` = "'.$fechaNac.'", `direccion` = "'.$direccion.'" '.$tCasa.''.$tCel.''.$fotoUrl.'  WHERE `id_usuario` = "'.$id.'";';

		$updated = mysqli_query($GLOBALS['linkDB'], $query);

		return $updated;
	}
	//Actualizar datos del perfil
	//@param int, string, string, string, string, string
	//@return bool
	function updateName($id, $nombreCompleto, $conexion){

		$query = 'UPDATE `usuarios` SET `nombre` = "'.$nombreCompleto.'" WHERE `id_usuario` = "'.$id.'";';

		$updated = mysqli_query($conexion, $query);

		return $updated;
	}

	function updateStatusPerfil($email, $status, $conexion){
		$query = 'UPDATE `usuarios` SET `status_perfil` = "'.$status.'"  WHERE `email` = "'.$email.'";';
		//var_dump($query);
		$updated = mysqli_query($GLOBALS['linkDB'], $query);

		return $updated;
	}

	//Seleccionar todos los pedidos de la DB.
	//@param null
	//@return array
	function seleccionarMateriales($conexion){
		$query = 'SELECT * FROM `materiales` WHERE  `estado` != "Inicial" AND `estado` != "Entregado" AND `estado` != "Eliminado" AND  `estado` != "Rechazado" AND `estado` != "Aprobado" AND `estado` != "Enviado" ORDER BY `id_pedido` DESC';
		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado;
		}
	}

	//Seleccionar todas las aclaraciones de la DB.
	//@param null
	//@return array
	function seleccionarAclaraciones($conexion){
		$query = 'SELECT * FROM `aclaraciones` ORDER BY `id_aclaracion` DESC';
		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado;
		}
	}

	//Seleccionar los pedidos de la DB de un usuario.
	//@param int
	//@return array
	function seleccionarMaterialesID($email, $conexion){
		$query = 'SELECT * FROM `materiales` WHERE `email`="'.$email.'" AND `estado` != "Inicial"  AND `estado` != "Eliminado" ;';
		
		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado;
		}
	}

	//Seleccionar las aclaraciones de la DB de un usuario.
	//@param int
	//@return array
	function seleccionarAclaracionesEmail($email, $conexion){
		$query = 'SELECT * FROM `aclaraciones` WHERE `email`="'.$email.'" ';
		
		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado;
		}
	}


	//Seleccionar la informacion de un pedido buscado por ID.
	//@param int
	//@return array
	function informacionPedidoID($id_pedido, $conexion){
		$query = 'SELECT * FROM `materiales` WHERE `id_pedido`="'.$id_pedido.'" ;';
		
		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado;
		}
	}

	//Seleccionar los pedidos de la DB de un usuario con filtros.
	//@param int
	//@return array
	function seleccionarAclaracionesFILTROS($data, $conexion){
		$filtros = "WHERE ";
		
		if ($data['keyWord']!='') {
			$filtros .= "`email` = '".$data['keyWord']."' AND "; 
		}
		
		
		if ($data['marca']!='Todos') {
			$filtros .= "`marca` = '".$data['marca']."' AND "; 
		}
		
		if ($data['estado']!='Todos') {
			$filtros .= "`dictamen` = '".$data['estado']."' AND "; 
		}
		

		if ($data['tipo']!='Todos') {
			$filtros .= "`tipo` = '".$data['tipo']."' AND "; 
		}
		
		

		$filtros .=" 1";

		$query = 'SELECT * FROM `aclaraciones` '.$filtros.'  ORDER BY `id_aclaracion` DESC;';
		//var_dump($query);
		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado;
		}
	}

	//Seleccionar los pedidos de la DB de un usuario con filtros.
	//@param int
	//@return array
	function seleccionarMaterialesFILTROS($data, $conexion){
		$filtros = "WHERE ";
		if ($data['fechaI']!='' && $data['fechaF']=='') {
			$filtros .= "`fecha` >= '".$data['fechaI']."' AND"; 
		}
		$fechaX=explode('-', $data['fechaF']);
		$temp = $fechaX[2]+1;
		if($temp>31){
			if($fechaX[1]!=12){
				$fechaX=$fechaX[0]."-".($fechaX[1]+1)."-01";
			}else{
				$fechaX=($fechaX[0]+1)."-01-01";
			}
		}else 
			$fechaX=$fechaX[0]."-".$fechaX[1]."-".$temp;

		if ($data['fechaI']=='' && $data['fechaF']!='') {
			$filtros .= "`fecha` >= '".$data['fechaF']."' AND"; 
		}

		if ($data['fechaI']!='' && $data['fechaF']!='') {
			$filtros .= "( `fecha` BETWEEN '".$data['fechaI']."' AND '".$fechaX."') AND"; 
		}

		if ($data['usuario']!='') {
			$filtros .= "`id_usuario` = '".$data['usuario']."' AND"; 
		}
		
		if ($data['estado']!='Todos') {
			$filtros .= " `estado` = '".$data['estado']."' AND"; 
		}else{
			$filtros .= " `estado`!= 'Inicial' AND `estado`!= 'Entregado' AND `estado`!= 'Eliminado' AND "; 
			
		}

		$filtros .=" 1";

		$query = 'SELECT * FROM `materiales` '.$filtros.'  ORDER BY `id_pedido` DESC;';
		
		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado;
		}
	}

	//Insertar los datos en la base.
	//@param $_POST
	//@return bool
	function insertMateriales($id, $email, $pedido, $conexion){
		
		$playera = $camisa = '';
		if ($pedido['prendas']=='Playera') {
			$playera = $pedido['sexo'].' | '.$pedido['talla']; 
			$camisa = 'NO';
		} else if ($pedido['prendas']=='Camisa') {
			$camisa = $pedido['sexo'].' | '.$pedido['talla'];
			$playera = 'NO';
		} else {
			$camisa = 'NO';
			$playera = 'NO';
		}
		if ($pedido['Lampara']=='') { $pedido['Lampara']='NO'; }
		if ($pedido['Termometro']=='') { $pedido['Termometro']='NO'; }
		if ($pedido['TermometroL']=='') { $pedido['TermometroL']='NO'; }
		if ($pedido['Cronometro']=='') { $pedido['Cronometro']='NO'; }
		if ($pedido['Credencial']=='') { $pedido['Credencial']='NO'; }
		if ($pedido['Tiras']=='') { $pedido['Tiras']='NO'; }

		if ($pedido['direccionConfirm']=='Otra'){
			$direccion = $pedido['dirPais'].'|'.$pedido['dirCiudad'].'|'.$pedido['codP'].'|'.$pedido['colonia'].'|'.$pedido['calle'];
		}else{
			$direccion = $pedido['direccionEnvio'];
		}

		$query = "INSERT INTO `materiales` (`id_pedido`, `id_usuario`, `email`, `fecha`, `lampara`, `termometro`, `termometroL`, `cronometro`, `playera`, `camisa`, `credencial`, `tiras`, `manual`, `marca`, `formatosCantidad`, `estado`, `noGuia`, `fechaEnvio`, `motivo`, `otros`, `direccionEnvio`) VALUES (NULL, '".$id."', '".$email."', CURRENT_TIMESTAMP, '".$pedido['Lampara']."', '".$pedido['Termometro']."', '".$pedido['TermometroL']."', '".$pedido['Cronometro']."', '".$playera."', '".$camisa."', '".$pedido['Credencial']."', '".$pedido['Tiras']."', '".$pedido['marcaManuales']."', '".$pedido['marcaFormatos']."', '".$pedido['cantidad']."', 'En revision', '', '', '".$pedido['motivo']."', '".$pedido['otros']."', '".$direccion."')";
		
		$inserted = mysqli_query($GLOBALS['linkDB'], $query);
		//var_dump($query);
		return $inserted;
	}

	//Insertar los datos en la base.
	//@param $_POST
	//@return bool
	function updateMateriales($id, $email, $pedido, $conexion){
		
		$playera = $camisa = '';
		if ($pedido['prendas']=='Playera') {
			$playera = $pedido['sexo'].' | '.$pedido['talla']; 
			$camisa = 'NO';
		} else if ($pedido['prendas']=='Camisa') {
			$camisa = $pedido['sexo'].' | '.$pedido['talla'];
			$playera = 'NO';
		} else {
			$camisa = 'NO';
			$playera = 'NO';
		}
		if ($pedido['Lampara']=='') { $pedido['Lampara']='NO'; }
		if ($pedido['Termometro']=='') { $pedido['Termometro']='NO'; }
		if ($pedido['TermometroL']=='') { $pedido['TermometroL']='NO'; }
		if ($pedido['Cronometro']=='') { $pedido['Cronometro']='NO'; }
		if ($pedido['Credencial']=='') { $pedido['Credencial']='NO'; }
		if ($pedido['Tiras']=='') { $pedido['Tiras']='NO'; }

		if ($pedido['direccionConfirm']=='Otra'){
			$direccion = $pedido['dirPais'].'|'.$pedido['dirCiudad'].'|'.$pedido['codP'].'|'.$pedido['colonia'].'|'.$pedido['calle'];
		}else{
			$direccion = $pedido['direccionEnvio'];
		}

		$query = "UPDATE `materiales` SET
		`lampara` = '".$pedido['Lampara']."', 
		`termometro` = '".$pedido['Termometro']."',
		`termometroL` = '".$pedido['TermometroL']."',
		`cronometro` = '".$pedido['Cronometro']."',
		`playera` = '".$playera."',
		`camisa` = '".$camisa."', 
		`credencial` = '".$pedido['Credencial']."',
		`tiras` = '".$pedido['Tiras']."',
		`manual` = '".$pedido['marcaManuales']."',
		`marca` = '".$pedido['marcaFormatos']."',
		`formatosCantidad` = '".$pedido['cantidad']."',
		`motivo` = '".$pedido['motivo']."',
		`otros` = '".$pedido['otros']."',
		`direccionEnvio` = '".$direccion."' 
		WHERE id_pedido = ".$pedido['id_pedido'];
		
		$inserted = mysqli_query($GLOBALS['linkDB'], $query);
		//var_dump($query);
		return $inserted;
	}

	function cambioStatusMateriales($id, $status, $comentario, $user_id, $user_email, $conexion){
		$query = 'UPDATE `materiales` SET `estado` = "'.$status.'", `comentarios`= "'.$comentario.'"  WHERE `materiales`.`id_pedido` = "'.$id.'";';
		
		$updated = mysqli_query($conexion, $query);
		
		if ($updated) {
			$query2 = 'INSERT INTO `notificaciones` (`id_notificacion`, `marca`, `id_empleado`, `email`, `tipo_notificacion`, `descripcion`, `activo`) VALUES (NULL, "ARG", '.$user_id.', "'.$user_email.'", "Pedido '.$status.'.", "Da click <a href=\"?mainMenu=Materiales\" target=\"_blank\"> aqui </a> para conocer el estado de tu pedido.", "1");';
			$inserted = mysqli_query($conexion, $query2);
			//var_dump($query2);
		}

		return $inserted;
	}

	function eliminarMateriales($id, $status, $user_email, $conexion){

		$comentario = "Borrado por ".$user_email;
		$query = 'UPDATE `materiales` SET `estado` = "'.$status.'", `comentarios`= "'.$comentario.'"  WHERE `materiales`.`id_pedido` = "'.$id.'";';
		
		$updated = mysqli_query($conexion, $query);
		return $inserted;
	}

	function votarAclaracion($id, $comentariosAdmin, $user_email, $id_certti, $id_auditoria_encuesta, $dictamen, $conexion){

		
		$query = 'UPDATE `aclaraciones` SET `comentariosAdmin` = "'.$comentariosAdmin.'", `dictamen`= "'.$dictamen.'" , `fecha_dictamen`= "'.date('Y-m-d H:i:00').'"  WHERE `aclaraciones`.`id_aclaracion` = "'.$id.'";';
		//echo $query;
		$updated = mysqli_query($conexion, $query);
		return $inserted;
	}

	

	function cambioStatusMaterialesViaje($id, $status, $guia, $fecha, $user_id, $user_email, $conexion){
		$query = 'UPDATE `materiales` SET `estado` = "'.$status.'", `noGuia` = "'.$guia.'", `fechaEnvio` = "'.$fecha.'" WHERE `materiales`.`id_pedido` = "'.$id.'";';
		
		$updated = mysqli_query($conexion, $query);

		if ($updated) {
			$query2 = 'INSERT INTO `notificaciones` (`id_notificacion`, `marca`, `id_empleado`, `email`, `tipo_notificacion`, `descripcion`, `activo`) VALUES (NULL, "ARG", '.$user_id.', "'.$user_email.'", "EnvIo de pedido.", "Tienes un nuevo envio en camino, da click <a href=\"?mainMenu=Materiales\" target=\"_blank\"> aqui </a> para ver la información.", "1");';
			$inserted = mysqli_query($conexion, $query2);
		}
		
		return $inserted;
	}


	function formatosDBList($conexion){
		$query = "SELECT * FROM `materiales` WHERE `formatosCantidad` != '0';";

		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado;
		}
	}

	function pedidoID($id, $conexion){
		$query = "SELECT `id_pedido`,`email`, `direccionEnvio` FROM `materiales` WHERE `id_pedido`='".$id."';";

		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado;
		}
	}

	function formatosDB($conexion){
		$query = "SELECT `id_pedido`,`id_usuario`,`email`,`fecha`,`marca`,`formatosCantidad`,`estado` FROM `materiales` WHERE `formatosCantidad` != '0';";

		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado;
		}
	}

	function formatosDB_ID($id, $conexion){
		$query = "SELECT `id_pedido`,`id_usuario`,`fecha`,`marca`,`formatosCantidad`,`estado` FROM `materiales` WHERE `formatosCantidad` != '0' AND `id_usuario`='".$id."' AND `estado`='Enviado';";

		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado;
		}
	}

	function formatosDB_EMAIL($email, $conexion){
		//$query = "SELECT `id_pedido`,`id_usuario`,`fecha`,`marca`,`formatosCantidad`,`estado` FROM `materiales` WHERE `formatosCantidad` != '0' AND `email`='".$email."' AND `estado`='Enviado';";
		$query = "SELECT `id_pedido`,`id_usuario`,`fecha`,`marca`,`formatosCantidad`,`estado` FROM `materiales` WHERE `formatosCantidad` != '0' AND `email`='".$email."' AND (`estado`='Enviado' OR `estado`='Entregado' OR `estado`='Inicial');";

		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado;
		}
	}

	function usuariosMarca($conexion, $marca){
		$query = "SELECT DISTINCT `email`, `nombre` FROM `usuarios` WHERE `marcas` LIKE '%".$marca."%' ";
		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado;
		}
	}

	function auditoriasPendientesMes($conexion, $marca, $fecha){
		//SELECT DISTINCT `fTermino` FROM `auditorias` WHERE `clienteMarca`='BK_' AND `fTermino` LIKE '%2016-04%' AND `statusPago` = 'Pendiente' ORDER BY `id` ASC
		$query = "SELECT DISTINCT `fTermino` FROM `auditorias` WHERE `clienteMarca`='".$marca."' AND `fTermino` LIKE '%".$fecha."%' AND `statusVisita` = 'Finalizada' AND `statusPago` = 'Pendiente' ORDER BY `id` ASC";

		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado;
		}

	}

	function auditoriasInfor_Complex($conexion, $email, $marca, $fecha, $tipo, $statusVisita, $statusPago){
		$query = "SELECT * FROM `auditorias` WHERE `auditorEmail` = '".$email."' AND `clienteMarca` = '".$marca."' AND `fTermino` LIKE '%".$fecha."%' AND `statusVisita`='".$statusVisita."' AND `statusPago`='".$statusPago."' AND `viajeTipo` LIKE '%".$tipo."%' ORDER BY `id` ASC";

		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado;
		}
	}

	function auditoriasInfo_Filtro($conexion, $email, $nombre, $marca, $fecha, $tipo, $statusVisita, $statusPago, $pais){
		$preSQL = "SELECT * FROM `auditorias` WHERE 1 ";
		if ($email!='') {
			$preSQL .= "AND `auditorEmail` = '".$email."' ";
		}else{
			$preSQL .= "AND `nombre` = '".$nombre."' ";
		}
		if ($marca!='Marca') {
			$preSQL .= "AND `clienteMarca` = '".$marca."' ";
		}
		if ($fecha!='') {
			$preSQL .= "AND `fTermino` LIKE '%".$fecha."%' ";
		}
		if ($tipo!='Tipo') {
			$preSQL .= "AND `viajeTipo` LIKE '%".$tipo."%' ";
		}
		if ($statusVisita!='Estado') {
			$preSQL .= "AND `statusVisita`='".$statusVisita."' ";
		}
		if ($statusPago!='Pago') {
			$preSQL .= "AND `statusPago`='".$statusPago."' ";
		}
		if ($pais!='') {
			$preSQL .= "AND `clientePais`='".$pais."' ";
		}

		$preSQL .= "ORDER BY `id` ASC";

		$resultado = array();

		//var_dump($preSQL);
		if ($result = mysqli_query( $conexion, $preSQL)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    //var_dump($resultado);
		    
		    return $resultado;
		}
	}

function auditoriasInfo_FiltroFechas($conexion, $email, $nombre, $marca, $fechaI, $fechaF, $tipo, $statusVisita, $statusPago, $pais){
		$preSQL = "SELECT * FROM `auditorias` WHERE 1 ";
		if ($email!='') {
			$preSQL .= "AND `auditorEmail` = '".$email."' ";
		}else{
			$preSQL .= "AND `nombre` = '".$nombre."' ";
		}
		if ($marca!='Marca') {
			$preSQL .= "AND `clienteMarca` = '".$marca."' ";
		}
		if ($fechaI!='') {
			$preSQL .= "AND `fInicio` >= '".$fechaI." 00:00:00' ";
		}
		if ($fechaF!='') {
			$preSQL .= "AND `fTermino` <= '".$fechaF."' ";
		}
		if ($tipo!='Tipo') {
			$preSQL .= "AND `viajeTipo` LIKE '%".$tipo."%' ";
		}
		if ($statusVisita!='Estado') {
			$preSQL .= "AND `statusVisita`='".$statusVisita."' ";
		}
		if ($statusPago!='Pago') {
			$preSQL .= "AND `statusPago`='".$statusPago."' ";
		}
		if ($pais!='') {
			$preSQL .= "AND `clientePais`='".$pais."' ";
		}

		$preSQL .= "ORDER BY `id` ASC";

		$resultado = array();

		//var_dump($preSQL);
		if ($result = mysqli_query( $conexion, $preSQL)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    //var_dump($resultado);
		    
		    return $resultado;
		}
	}

	function auditoriasInfo($conexion, $email, $marca, $fecha){
		$query = "SELECT * FROM `auditorias` WHERE `auditorEmail` = '".$email."' AND `clienteMarca` = '".$marca."' AND `fTermino` LIKE '%".$fecha."%' AND `fInicio` > '2016-06-30' ORDER BY `encuestaId` ASC";

		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado;
		}
	}

	function seleccionarUsuariosFormatosFiltros($conexion){
		$tem_qry='SELECT DISTINCT `email` FROM `usuarios` ';

		if(isset($_POST)){
			if (isset($_POST['marca'])) {
				if ($_POST['marca']!='Todas') {
					$tem_qry.="WHERE `marcas` LIKE '%".$_POST['marca']."%' ";
				}else{
					$tem_qry.="WHERE 1 ";
				}
				if ($_POST['pais']!='') {
					$tem_qry.="AND `pais` LIKE '%".$_POST['pais']."%' ";
				}else{
					
				}
				if ($_POST['pclave']!='') {
					$tem_qry.="AND (usuario LIKE '%$_POST[pclave]%' OR nombre LIKE '%$_POST[pclave]%' OR contrasena LIKE '%$_POST[pclave]%' OR email LIKE '%$_POST[pclave]%' OR acceso LIKE '%$_POST[pclave]%' )";
				}
				//$usuarios= mysqli_query($linkDB, $tem_qry);
			}
		}
		//var_dump($tem_qry);
		$resultado = array();

		if ($result = mysqli_query( $conexion, $tem_qry)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado;
		}
	}

	function auditoriasAllFiltros($data, $conexion){
	
	$filtros = "WHERE ";
		if ($data['fechaI']!='') {
			$filtros .= "( `fTermino` BETWEEN '".$data['fechaI']."' AND '".$data['fechaF']."')";
		}
		
		if ($data['marca']!='Marca') {
			$filtros .= "`clienteMarca` = '".$data['marca']."' AND"; 
		}
		
		if ($data['estado']!='Estado') {
			$filtros .= "`statusVisita` = '".$data['estado']."' AND"; 
		}

		if ($data['tipo']!='Tipo') {
			$filtros .= "`viajeTipo` = '".$data['tipo']."' AND"; 
		}
		
		if ($data['pagoEstado']!='Pago') {
			$filtros .= "`statusPago` = '".$data['pagoEstado']."' AND"; 
		}
		$filtros .=" 1";

		$query = 'SELECT * FROM `auditorias` '.$filtros.';';

		echo $query;
	$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado;
		}
	}

	function auditoriasFinalizadas($conexion){
	$query = "SELECT * FROM `auditorias`";
	//$query = "SELECT * FROM `auditorias` WHERE `statusVisita` = 'Finalizada';";

	$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado;
		}
	}



	function paises($conexion){
	$query = "SELECT DISTINCT `pais` FROM `ciudades` ORDER BY `pais` ASC ";
	//$query = "SELECT * FROM `auditorias` WHERE `statusVisita` = 'Finalizada';";

	$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado;
		}
	}


	function ciudades($pais, $conexion){
	$query = "SELECT DISTINCT `ciudad` FROM `ciudades` WHERE `pais` = '".$pais."'";
	//var_dump($query);
	//$query = "SELECT * FROM `auditorias` WHERE `statusVisita` = 'Finalizada';";

	$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
		    	$row["ciudad"]= utf8_encode($row['ciudad']);
  				$resultado[] = $row;
			}
		    return $resultado;
		}
	}


	function auditoriasFinalizadasID($id, $conexion){
	$query = "SELECT * FROM `auditorias` WHERE `auditorID` = '".$id."'";
	//$query = "SELECT * FROM `auditorias` WHERE `statusVisita` = 'Finalizada';";

	$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado;
		}
	}

	function comunicadoRecursosID($id, $conexion){
		$query = "SELECT * FROM `recursos` WHERE `id_referencia`='".$id."';";

		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado;
		}
	}

	function consulataDBPaises($conexion){
		$query = "SELECT * FROM `destination` WHERE 1";

		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado;
		}
	}

	function getDirecc($id, $conexion){

		$query = "SELECT `direccion` FROM `usuarios` WHERE `id_usuario` = '".$id."';";

		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado[0];
		}
	}

	function cambioLenguaje($idioma, $usuario, $conexion){
		$query = "UPDATE `usuarios` SET `lang` = '".$idioma."' WHERE `id_usuario` = '".$usuario."';";
		
		$updated = mysqli_query($conexion, $query);

		return $updated;
		}

	function desactivarNotificacion($usuario, $conexion){
		$query = "UPDATE `notificaciones` SET `activo` = '0' WHERE `notificaciones`.`id_notificacion` = ".$usuario.";";
		
		$updated = mysqli_query($conexion, $query);

		return $updated;
		}

	function formatosPrecargados($conexion, $email){
		$query = "SELECT * FROM `materiales` where `email` = '".$email."' and `estado` ='Inicial'";
		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado[0];
		}
	}

	function terminosUsuario($conexion, $email){
		$query = "SELECT `terminos` FROM `usuarios` where `email` = '".$email."' LIMIT 1";
		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado[0];
		}
	}

	function politicasUsuario($conexion, $email){
		$query = "SELECT `politica_gastos` FROM `usuarios` where `email` = '".$email."' LIMIT 1";
		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado[0];
		}
	}

	function aceptarTerminos($conexion, $email){
		$query = "UPDATE `usuarios` SET `terminos` = 'Aceptado' WHERE  `email` = '".$email."'";
		$updated = mysqli_query($conexion, $query);

		return $updated;
	}

	function aceptarPoliticas($conexion, $email){
		$query = "UPDATE `usuarios` SET `politica_gastos` = 'Aceptado' WHERE  `email` = '".$email."'";
		$updated = mysqli_query($conexion, $query);

		return $updated;
	}

	function totalAuditorias($conexion, $marca, $status){
		$query = "SELECT COUNT(*) FROM `auditorias` LEFT JOIN `usuarios` ON (`usuarios`.`email` = `auditorias`.`auditorEmail`) WHERE `clienteMarca` = '$marca' AND `statusVisita`='$status' AND `statusPago` != 'Pagada' AND `fInicio` > '2016-06-30' ORDER BY `auditorEmail` ASC, `clienteMarca` ASC";

		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado[0];
		}
	}

	function totalAuditoriasNOTStatus($conexion, $marca, $status){
		$query = "SELECT COUNT(*) FROM `auditorias` LEFT JOIN `usuarios` ON (`usuarios`.`email` = `auditorias`.`auditorEmail`) WHERE `clienteMarca` = '$marca' AND `statusVisita`!='$status' AND `statusPago` != 'Pagada' AND `fInicio` > '2016-06-30' ORDER BY `auditorEmail` ASC, `clienteMarca` ASC";

		//var_dump($query);

		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado[0];
		}
	}

/**/
	function totalAuditoriasUsuario($conexion, $marca, $status, $email){
		$query = "SELECT COUNT(*) FROM `auditorias` LEFT JOIN `usuarios` ON (`usuarios`.`email` = `auditorias`.`auditorEmail`) WHERE `clienteMarca` = '$marca' AND `statusVisita`='$status' AND level = '2' AND `auditorEmail`='$email' AND `fInicio` > '2016-06-30' ORDER BY `auditorEmail` ASC, `clienteMarca` ASC";

		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado[0];
		}
	}
	function totalAuditoriasUsuarioNOT($conexion, $marca, $status, $email){
		$query = "SELECT COUNT(*) FROM `auditorias` LEFT JOIN `usuarios` ON (`usuarios`.`email` = `auditorias`.`auditorEmail`) WHERE `clienteMarca` = '$marca' AND `statusVisita`!='$status' AND level = '2' AND `auditorEmail`='$email' AND `fInicio` > '2016-06-30' ORDER BY `auditorEmail` ASC, `clienteMarca` ASC";

		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado[0];
		}
	}

	function totalAuditoriasXUsuarioMarca($conexion, $marca, $status, $email){
		$query = "SELECT COUNT(*) FROM `auditorias` LEFT JOIN `usuarios` ON (`usuarios`.`email` = `auditorias`.`auditorEmail`) WHERE `clienteMarca` = '$marca' AND `auditorEmail`='$email' AND level = '2' AND `fInicio` > '2016-06-30' ORDER BY `auditorEmail` ASC, `clienteMarca` ASC";
		//var_dump($query);
		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado[0];
		}
	}

	function totalAuditoriasXUsuarioMarcaPago($conexion, $marca, $status, $email){
		$query = "SELECT COUNT(*) FROM `auditorias` LEFT JOIN `usuarios` ON (`usuarios`.`email` = `auditorias`.`auditorEmail`) WHERE `clienteMarca` = '$marca' AND `auditorEmail`='$email' AND level = 2 AND `statusPago`='$status' AND `fInicio` > '2016-06-30' ORDER BY `auditorEmail` ASC, `clienteMarca` ASC";
		//var_dump($query);
		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado[0];
		}
	}
	
	function totalAuditoriasForaneasXUsuarioPago($conexion, $marca, $status, $email){
		$query = "SELECT COUNT(*) FROM `auditorias` LEFT JOIN `usuarios` ON (`usuarios`.`email` = `auditorias`.`auditorEmail`) WHERE `auditorEmail`='$email' AND `viajeTipo`='Foraneo' AND `statusPago`='$status' AND `fInicio` > '2016-06-30' ";

		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado[0];
		}
	}

	function totalAuditoriasXUsuarioMarcaSinPago($conexion, $marca, $status, $email){
		$query = "SELECT COUNT(*) FROM `auditorias` LEFT JOIN `usuarios` ON (`usuarios`.`email` = `auditorias`.`auditorEmail`) WHERE `clienteMarca` = '$marca' AND `auditorEmail`='$email' AND level = 2 AND `statusPago`!='$status' AND `fInicio` > '2016-06-30' ORDER BY `auditorEmail` ASC, `clienteMarca` ASC";

		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado[0];
		}
	}

	function totalAuditoriasForaneasXUsuarioSinPago($conexion, $marca, $status, $email){
		$query = "SELECT COUNT(*) FROM `auditorias` LEFT JOIN `usuarios` ON (`usuarios`.`email` = `auditorias`.`auditorEmail`) WHERE  `auditorEmail`='$email' AND `viajeTipo`='Foraneo' AND `statusPago`!='$status' AND `fInicio` > '2016-06-30' ";

		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado[0];
		}
	}
/**/
/**/
	function totalAuditoriasUsuario_Pais($conexion, $marca, $status, $email){
		$query = "SELECT COUNT(*) FROM `auditorias` LEFT JOIN `usuarios` ON (`usuarios`.`email` = `auditorias`.`auditorEmail`) WHERE `clienteMarca` = '$marca' AND `statusVisita`='$status' AND level = '2' AND `auditorEmail`='$email' AND `fInicio` > '2016-06-30' ORDER BY `auditorEmail` ASC, `clienteMarca` ASC";

		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado[0];
		}
	}
	function totalAuditoriasUsuarioNOT_Pais($conexion, $marca, $status, $email){
		$query = "SELECT COUNT(*) FROM `auditorias` LEFT JOIN `usuarios` ON (`usuarios`.`email` = `auditorias`.`auditorEmail`) WHERE `clienteMarca` = '$marca' AND `statusVisita`!='$status' AND level = '2' AND `auditorEmail`='$email' AND `fInicio` > '2016-06-30' ORDER BY `auditorEmail` ASC, `clienteMarca` ASC";

		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado[0];
		}
	}

	function totalAuditoriasXUsuarioMarca_Pais($conexion, $marca, $status, $email){
		$query = "SELECT COUNT(*) FROM `auditorias` LEFT JOIN `usuarios` ON (`usuarios`.`email` = `auditorias`.`auditorEmail`) WHERE `clienteMarca` = '$marca' AND `auditorEmail`='$email' AND level = '2' AND `fInicio` > '2016-06-30' ORDER BY `auditorEmail` ASC, `clienteMarca` ASC";
		//var_dump($query);
		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado[0];
		}
	}

	function totalAuditoriasXUsuarioMarcaPago_Pais($conexion, $marca, $status, $email){
		$query = "SELECT COUNT(*) FROM `auditorias` LEFT JOIN `usuarios` ON (`usuarios`.`email` = `auditorias`.`auditorEmail`) WHERE `clienteMarca` = '$marca' AND `auditorEmail`='$email' AND level = 2 AND `statusPago`='$status' AND `fInicio` > '2016-06-30' ORDER BY `auditorEmail` ASC, `clienteMarca` ASC";

		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado[0];
		}
	}
	
	function totalAuditoriasForaneasXUsuarioPago_Pais($conexion, $marca, $status, $email){
		$query = "SELECT COUNT(*) FROM `auditorias` LEFT JOIN `usuarios` ON (`usuarios`.`email` = `auditorias`.`auditorEmail`) WHERE `auditorEmail`='$email' AND `viajeTipo`='Foraneo' AND `statusPago`='$status' AND `fInicio` > '2016-06-30' ";

		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado[0];
		}
	}

	function totalAuditoriasXUsuarioMarcaSinPago_Pais($conexion, $marca, $status, $email){
		$query = "SELECT COUNT(*) FROM `auditorias` LEFT JOIN `usuarios` ON (`usuarios`.`email` = `auditorias`.`auditorEmail`) WHERE `clienteMarca` = '$marca' AND `auditorEmail`='$email' AND level = 2 AND `statusPago`!='$status' AND `fInicio` > '2016-06-30' ORDER BY `auditorEmail` ASC, `clienteMarca` ASC";

		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado[0];
		}
	}

	function totalAuditoriasEnProcesodePago($conexion, $marca, $email){
		$query = "SELECT COUNT(*) FROM `auditorias` LEFT JOIN `usuarios` ON (`usuarios`.`email` = `auditorias`.`auditorEmail`) WHERE `clienteMarca` = '$marca' AND `auditorEmail`='$email' AND level = 2 AND `statusPago` IN ('Aprobado', 'En Proceso') AND `fInicio` > '2016-06-30' ORDER BY `auditorEmail` ASC, `clienteMarca` ASC";
		//var_dump($query);
		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado[0];
		}
	}

	function AuditoriasPorMesPendientesPago($conexion, $marca, $email){
		$query = "SELECT MONTH(`fInicio`) mes, YEAR(`fInicio`) anio, COUNT(*) cuenta FROM `auditorias` LEFT JOIN `usuarios` ON (`usuarios`.`email` = `auditorias`.`auditorEmail`) WHERE `clienteMarca` = '$marca' AND `auditorEmail`='$email' AND level = 2 AND `statusPago` IN ('Aprobado', 'En Proceso') AND `fInicio` > '2016-06-30'  GROUP BY YEAR(`fInicio`), MONTH(`fInicio`)  ORDER BY mes DESC";
		//var_dump($query);
		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado;
		}
	}

	function AuditoriasPorMesPendientesPagoTipo($conexion, $marca, $email, $tipo){
		$query = "SELECT MONTH(`fInicio`) mes, YEAR(`fInicio`) anio, 
		SUM(`clienteMarca` = '$marca' AND `auditorEmail`='$email' AND level = 2 AND `fInicio` > '2016-06-30' AND `fechas_pago`.`tipo` = '$tipo') Todas, 
		SUM(`clienteMarca` = '$marca' AND `auditorEmail`='$email' AND level = 2 AND `statusPago` IN ('Aprobado', 'En Proceso') AND `fInicio` > '2016-06-30' AND `fechas_pago`.`tipo` = '$tipo') Proceso, 
		SUM(`clienteMarca` = '$marca' AND `auditorEmail`='$email' AND level = 2 AND `statusPago` IN ('Pagado') AND `fInicio` > '2016-06-30' AND `fechas_pago`.`tipo` = '$tipo') Pagadas, 
		`fechas_pago`.`tipo`, `fechas_pago`.`fecha` FROM `auditorias` LEFT JOIN `usuarios` ON (`usuarios`.`email` = `auditorias`.`auditorEmail`) LEFT  JOIN `fechas_pago` ON (`mes`= MONTH(`fInicio`) AND `anio` = YEAR(`fInicio`)) WHERE `clienteMarca` = '$marca' AND `auditorEmail`='$email' AND level = 2 AND `fInicio` > '2016-06-30' AND `fechas_pago`.`tipo` = '$tipo'  GROUP BY YEAR(`fInicio`), MONTH(`fInicio`), `fechas_pago`.`tipo` ORDER BY mes DESC";
		//var_dump($query);
		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado;
		}
	}

	function totalMesesSistema($conexion, $marca, $email, $tipo){
		$query = "SELECT MONTH(`fInicio`) mes, YEAR(`fInicio`) anio, `fechas_pago`.`tipo` FROM `auditorias` LEFT JOIN `usuarios` ON (`usuarios`.`email` = `auditorias`.`auditorEmail`) LEFT  JOIN `fechas_pago` ON (`mes`= MONTH(`fInicio`) AND `anio` = YEAR(`fInicio`)) WHERE `clienteMarca` = '$marca' AND `auditorEmail`='$email' AND level = 2 AND `fInicio` > '2016-06-30' AND `fechas_pago`.`tipo` = '$tipo'  GROUP BY YEAR(`fInicio`), MONTH(`fInicio`), `fechas_pago`.`tipo` ORDER BY anio DESC, mes DESC";
		//var_dump($query);
		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado;
		}
	}

	function AuditoriasPorMesPagadasTipo($conexion, $marca, $email, $tipo){
		$query = "SELECT MONTH(`fInicio`) mes, YEAR(`fInicio`) anio, COUNT(*) cuenta, `fechas_pago`.`tipo`, `fechas_pago`.`fecha` FROM `auditorias` LEFT JOIN `usuarios` ON (`usuarios`.`email` = `auditorias`.`auditorEmail`) LEFT  JOIN `fechas_pago` ON (`mes`= MONTH(`fInicio`) AND `anio` = YEAR(`fInicio`)) WHERE `clienteMarca` = '$marca' AND `auditorEmail`='$email' AND level = 2 AND `statusPago` IN ('Pagado') AND `fInicio` > '2016-06-30' AND `fechas_pago`.`tipo` = '$tipo'  GROUP BY YEAR(`fInicio`), MONTH(`fInicio`), `fechas_pago`.`tipo` ORDER BY mes DESC";
		//var_dump($query);
		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado;
		}
	}

	function totalAuditoriasForaneasXUsuarioSinPago_Pais($conexion, $marca, $status, $email){
		$query = "SELECT COUNT(*) FROM `auditorias` LEFT JOIN `usuarios` ON (`usuarios`.`email` = `auditorias`.`auditorEmail`) WHERE  `auditorEmail`='$email' AND `viajeTipo`='Foraneo' AND `statusPago`!='$status' AND `fInicio` > '2016-06-30' ";

		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado[0];
		}
	}

		function seleccionarUsuariosConAuditoriasEnProceso_Pais($conexion, $marca){
		$query = "SELECT DISTINCT (`auditorEmail`) FROM `auditorias` LEFT JOIN `usuarios` ON (`usuarios`.`email` = `auditorias`.`auditorEmail`) WHERE `clienteMarca` = '$marca' AND `statusVisita`!='Finalizada'  AND `fInicio` > '2016-06-30' ORDER BY `auditorEmail` ASC, `clienteMarca` ASC";

		//$query = "SELECT `id`, `encuestaID`, `auditorEmail`, `nombre`, `clienteMarca`, `clienteNombre`,`clienteDireccionCompleta`, `fInicio`, `fTermino`, `viajeTipo`, `statusVisita`, `statusPago`, `i_fechaTermino` FROM `auditorias` LEFT JOIN `usuarios` ON (`usuarios`.`email` = `auditorias`.`auditorEmail`) WHERE `clienteMarca` = '$marca' AND `statusVisita`!='Finalizada' ORDER BY `auditorEmail` ASC, `clienteMarca` ASC";
		//var_dump($query);

		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado;
		}
	}

/**/

	function seleccionarUsuariosConAuditoriasEnProceso($conexion, $marca){
		$query = "SELECT DISTINCT (`auditorEmail`) FROM `auditorias` LEFT JOIN `usuarios` ON (`usuarios`.`email` = `auditorias`.`auditorEmail`) WHERE `clienteMarca` = '$marca' AND `statusVisita`!='Finalizada'  AND `fInicio` > '2016-06-30' ORDER BY `auditorEmail` ASC, `clienteMarca` ASC";

		//$query = "SELECT `id`, `encuestaID`, `auditorEmail`, `nombre`, `clienteMarca`, `clienteNombre`,`clienteDireccionCompleta`, `fInicio`, `fTermino`, `viajeTipo`, `statusVisita`, `statusPago`, `i_fechaTermino` FROM `auditorias` LEFT JOIN `usuarios` ON (`usuarios`.`email` = `auditorias`.`auditorEmail`) WHERE `clienteMarca` = '$marca' AND `statusVisita`!='Finalizada' ORDER BY `auditorEmail` ASC, `clienteMarca` ASC";
		//var_dump($query);

		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado;
		}
	}

	function seleccionarFormatosDeUsuariosConAuditoriasEnProceso($conexion, $marca){
		$query = "SELECT `id`, `encuestaID`, `auditorEmail`, `nombre`, `clienteMarca`, `clienteNombre`,`clienteDireccionCompleta`, `fInicio`, `fTermino`, `viajeTipo`, `statusVisita`, `statusPago`, `i_fechaTermino` FROM `auditorias` LEFT JOIN `usuarios` ON (`usuarios`.`email` = `auditorias`.`auditorEmail`) RIGHT JOIN `materiales` ON (`auditorias`.`auditorEmail` = `materiales`.`email` ) WHERE `clienteMarca` = '$marca' AND `statusVisita`!='Finalizada' ORDER BY `auditorEmail` ASC, `clienteMarca` ASC";
		//var_dump($query);

		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado;
		}
	}

	function crearOrdenPago($conexion, $cadena, $statusPago, $autor, $id_usuario, $email){
		//Tenemos el ID de usuario. V
		//Buscamos la imagen con tabla 'comprobanteDePago' y el ID del usuario. Seleccionamos `recurso`
		//Insertamos el pago con el url de recurso.
		//La imagen con tabla 'comprobanteDePago' se modifica el ID_referencia a month()_id_usuario
		//Actualiza el estado de las auditorias a pagado.
		$url_query = "SELECT `recurso` FROM `recursos` WHERE `tabla` = 'comprobanteDePago' AND id_referencia = '$id_usuario'";
		$resultado = array();
		if ($result = mysqli_query( $conexion, $url_query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		}

		$url = $resultado[0]['recurso'];
		if($url!=''){
			$query = "INSERT INTO `pagos`(`id_pago`, `estado`, `descripcion`, `fecha_aprobacion`, `comprobante`, `autor`, `email`) VALUES ( '', '$statusPago', '$cadena', '', '$url', '$autor', '$email')";
			$inserted = mysqli_query($conexion, $query);

			if ($inserted) {
				$currentMont = date('m');
				$currentYear = date('Y');
				$query_updaterefer = "UPDATE `recursos` SET `id_referencia` = '".$currentYear.'_'.$currentMont.'_'.$id_usuario."' WHERE  `id_referencia`= '$id_usuario'";
				$inserted = mysqli_query($conexion, $query_updaterefer);
				if ($inserted) {
					$query2 = 'INSERT INTO `notificaciones` (`marca`, `id_empleado`, `email`, `tipo_notificacion`, `descripcion`, `activo`) VALUES ("ARG", '.$id_usuario.', "'.$email.'", "Nuevo Pago Realizado ", "Da click <a href=\"?mainMenu=PagosAuditor\" target=\"_blank\"> aqui </a> para visualizar el detalle.", "1");';
					//var_dump($query2);
				$inserted = mysqli_query($conexion, $query2);
				}
			}
		}else{
			return 0;
		}
		return $inserted;
		
	}

	//Version  3.0 de creacion de pagos
	function crearOrdenPagoInternacional($conexion, $cadena, $statusPago, $autor, $id_usuario, $email, $auditorias, $tasa, $viaticos, $saldos, $ajuste, $total, $tipo, $comentariosAuditor){
		//Tenemos el ID de usuario. V
		//Buscamos la imagen con tabla 'comprobanteDePago' y el ID del usuario. Seleccionamos `recurso`
		//Insertamos el pago con el url de recurso.
		//La imagen con tabla 'comprobanteDePago' se modifica el ID_referencia a month()_id_usuario
		//Actualiza el estado de las auditorias a pagado.
		$url_query = "SELECT `recurso` FROM `recursos` WHERE `tabla` = 'comprobanteDePago' AND id_referencia = '$id_usuario'";
		$resultado = array();
		if ($result = mysqli_query( $conexion, $url_query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		}

		$url = $resultado[0]['recurso'];

		
		$query = "INSERT INTO `pagos`(`id_pago`, `estado`, `descripcion`, `comprobante`, `autor`, `email`, `auditorias`, `tasa`, `viaticos`, `saldos`, `ajuste`, `total`, `tipo`, `comentariosAuditor`) VALUES ( '', '$statusPago', '$cadena', '$url', '$autor', '$email', '$auditorias', '$tasa', '$viaticos', '$saldos', '$ajuste', '$total', '$tipo', '$comentariosAuditor')";
			//var_dump($query);
		

		if($url!=''){
			$query = "INSERT INTO `pagos`(`id_pago`, `estado`, `descripcion`, `comprobante`, `autor`, `email`, `auditorias`, `tasa`, `viaticos`, `saldos`, `ajuste`, `total`, `tipo`, `comentariosAuditor`) VALUES ( '', '$statusPago', '$cadena', '$url', '$autor', '$email', '$auditorias', '$tasa', '$viaticos', '$saldos', '$ajuste', '$total', '$tipo', '$comentariosAuditor')";
			//var_dump($query);
			$inserted = mysqli_query($conexion, $query);
			//var_dump($inserted);

			if ($inserted) {
				$currentMont = date('m');
				$currentYear = date('Y');
				$query_updaterefer = "UPDATE `recursos` SET `id_referencia` = '".$currentYear.'_'.$currentMont.'_'.$id_usuario."' WHERE  `id_referencia`= '$id_usuario'";
				$inserted = mysqli_query($conexion, $query_updaterefer);
				if ($inserted) {
					$query2 = 'INSERT INTO `notificaciones` (`marca`, `id_empleado`, `email`, `tipo_notificacion`, `descripcion`, `activo`) VALUES ("ARG", '.$id_usuario.', "'.$email.'", "Nuevo Pago Realizado ", "Da click <a href=\"?mainMenu=PagosAuditor\" target=\"_blank\"> aqui </a> para visualizar el detalle.", "1");';
					//var_dump($query2);
				$inserted = mysqli_query($conexion, $query2);
				}
			}
		}else{
			return 0;
		}
		return $inserted;
		
	}


	//Version 2.10 de creacion de pagos.
	function crearOrdenPagoInternacional_pre($conexion, $cadena, $statusPago, $autor, $id_usuario, $email, $auditorias, $tasa, $viaticos, $saldos, $ajuste, $total, $tipo){
		//Tenemos el ID de usuario. V
		//Buscamos la imagen con tabla 'comprobanteDePago' y el ID del usuario. Seleccionamos `recurso`
		//Insertamos el pago con el url de recurso.
		//La imagen con tabla 'comprobanteDePago' se modifica el ID_referencia a month()_id_usuario
		//Actualiza el estado de las auditorias a pagado.
		$url_query = "SELECT `recurso` FROM `recursos` WHERE `tabla` = 'comprobanteDePago' AND id_referencia = '$id_usuario'";
		$resultado = array();
		if ($result = mysqli_query( $conexion, $url_query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		}

		$url = $resultado[0]['recurso'];

		
		$query = "INSERT INTO `pagos`(`id_pago`, `estado`, `descripcion`, `fecha_aprobacion`, `comprobante`, `autor`, `email`, `auditorias`, `tasa`, `viaticos`, `saldos`, `ajuste`, `total`, `tipo`) VALUES ( '', '$statusPago', '$cadena', '', '$url', '$autor', '$email', '$auditorias', '$tasa', '$viaticos', '$saldos', '$ajuste', '$total', '$tipo')";
			//var_dump($query);
		

		if($url!=''){
			$query = "INSERT INTO `pagos`(`id_pago`, `estado`, `descripcion`, `fecha_aprobacion`, `comprobante`, `autor`, `email`, `auditorias`, `tasa`, `viaticos`, `saldos`, `ajuste`, `total`, `tipo`) VALUES ( '', '$statusPago', '$cadena', '', '$url', '$autor', '$email', '$auditorias', '$tasa', '$viaticos', '$saldos', '$ajuste', '$total', '$tipo')";
			//var_dump($query);
			$inserted = mysqli_query($conexion, $query);

			if ($inserted) {
				$currentMont = date('m');
				$currentYear = date('Y');
				$query_updaterefer = "UPDATE `recursos` SET `id_referencia` = '".$currentYear.'_'.$currentMont.'_'.$id_usuario."' WHERE  `id_referencia`= '$id_usuario'";
				$inserted = mysqli_query($conexion, $query_updaterefer);
				if ($inserted) {
					$query2 = 'INSERT INTO `notificaciones` (`marca`, `id_empleado`, `email`, `tipo_notificacion`, `descripcion`, `activo`) VALUES ("ARG", '.$id_usuario.', "'.$email.'", "Nuevo Pago Realizado ", "Da click <a href=\"?mainMenu=PagosAuditor\" target=\"_blank\"> aqui </a> para visualizar el detalle.", "1");';
					//var_dump($query2);
				$inserted = mysqli_query($conexion, $query2);
				}
			}
		}else{
			return 0;
		}
		return $inserted;
		
	}


	function crearOrdenPagoAprobar($conexion, $cadena, $statusPago, $autor, $id_usuario, $email){
		//Tenemos el ID de usuario. V
		//Buscamos la imagen con tabla 'comprobanteDePago' y el ID del usuario. Seleccionamos `recurso`
		//Insertamos el pago con el url de recurso.
		//La imagen con tabla 'comprobanteDePago' se modifica el ID_referencia a month()_id_usuario
		//Actualiza el estado de las auditorias a pagado.
		
	
		$query = "INSERT INTO `pagos`(`id_pago`, `estado`, `descripcion`, `fecha_aprobacion`, `comprobante`, `autor`, `email`) VALUES ( '', '$statusPago', '$cadena', '', '$url', '$autor', '$email')";
		//var_dump($query);
		$inserted = mysqli_query($conexion, $query);
		
		return $inserted;
		
	}

	function actualizarEstadosOrdenPago($conexion, $statusPago, $where){
		$query = "UPDATE `auditorias` SET `statusPago`= '$statusPago' ".$where;
		$updated = mysqli_query($conexion, $query);
		//var_dump($query);
		return $updated;

	}


	function seleccionarUsuariosConAuditoriasAprobadas($conexion, $marca){
		$query = "SELECT DISTINCT (`auditorEmail`) FROM `auditorias` LEFT JOIN `usuarios` ON (`usuarios`.`email` = `auditorias`.`auditorEmail`) WHERE `clienteMarca` = '$marca' AND `statusVisita`!='Finalizada' ORDER BY `auditorEmail` ASC, `clienteMarca` ASC";

    	//var_dump($query);

		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado;
		}
	}

	function seleccionarMarcasConAuditoriasAprobadas($conexion){
		$query = "SELECT DISTINCT `clienteMarca` FROM `auditorias` WHERE `statusPago` = 'Aprobado'";
		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado;
		}
	}

	function numeroDeAuditoriasAprobadasPorMarca($conexion, $marca){
		$query = "SELECT COUNT(*) FROM `auditorias` WHERE `statusPago` = 'Aprobado' AND `clienteMarca` = '$marca'";
		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado[0];
		}
	}
	//* PagosJ2
	function numeroDeAuditoriasAprobadasPorMarcaJ2($conexion, $marca, $data){
		global $usuar_arg_sin_pago;
		$filtros = "AND ";
		if ($data['fechaI']!='') {
			$filtros .= "( `fTermino` BETWEEN '".$data['fechaI']."' AND '".$data['fechaF']."') AND ";
		}
		
		if ($data['tipo']!='Tipo' AND $data['tipo']!='') {
			$filtros .= "`viajeTipo` = '".$data['tipo']."' AND "; 
		}
		
		if ($data['pais']!='') {
			$filtros .= "`clientePais` = '".$data['pais']."' AND"; 
		}

		if ($data['marca']!='' && $data['marca']!='Marca') {
			$filtros .= "`clienteMarca` = '".$data['marca']."' AND"; 
		}

		if ($data['pagoEstado']!='Pago' AND $data['pagoEstado']!='') {
			$filtros .= "`statusPago` IN (".$data['pagoEstado'].") AND "; 
		}


		if($_POST['keyWord']!='') $filtros .= " (usuario LIKE '%$_POST[keyWord]%' OR auditorNombre LIKE '%$_POST[keyWord]%' OR auditorEmail LIKE '%$_POST[keyWord]%' OR acceso LIKE '%$_POST[keyWord]%') AND";

		$filtros .=" 1 $usuar_arg_sin_pago";

		$query = 'SELECT * FROM `auditorias` '.$filtros.';';



		$query = "SELECT COUNT(*) FROM `auditorias` LEFT JOIN `usuarios` ON (`auditorias`.`auditorEmail`= `usuarios`.`email`) WHERE `status` = 'Activo' AND `clienteMarca` = '$marca' AND `level`=2 ".$filtros;
		//var_dump($query);
		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado[0];
		}
	}
	//* PagosJ2
	function numeroDeAuditoriasAprobadasPorMarcaJ2_v2($conexion, $marca, $data){
		global $usuar_arg_sin_pago;
		$filtros = "AND ";
		if ($data['fechaI']!='') {
			$filtros .= "( `i_fechaVisita` BETWEEN '".$data['fechaI']."' AND '".$data['fechaF']."') AND ";
		}
		
		if ($data['tipo']!='Tipo' AND $data['tipo']!='') {
			$filtros .= "`viajeTipo` = '".$data['tipo']."' AND "; 
		}
		
		if ($data['pais']!='') {
			$filtros .= "`clientePais` = '".$data['pais']."' AND"; 
		}

		if ($data['marca']!='' && $data['marca']!='Marca') {
			$filtros .= "`clienteMarca` = '".$data['marca']."' AND"; 
		}

		if ($data['pagoEstado']!='Pago' AND $data['pagoEstado']!='') {
			$filtros .= "`statusPago` IN (".$data['pagoEstado'].") AND "; 
		}


		if($_POST['keyWord']!='') $filtros .= " (usuario LIKE '%$_POST[keyWord]%' OR auditorNombre LIKE '%$_POST[keyWord]%' OR auditorEmail LIKE '%$_POST[keyWord]%' OR acceso LIKE '%$_POST[keyWord]%') AND";

		$filtros .=" 1 $usuar_arg_sin_pago";

		$query = 'SELECT * FROM `auditorias` '.$filtros.';';



		$query = "SELECT COUNT(*) FROM `auditorias` LEFT JOIN `usuarios` ON (`auditorias`.`auditorEmail`= `usuarios`.`email`) WHERE `status` = 'Activo' AND `clienteMarca` = '$marca' AND `level`=2 ".$filtros;
		//var_dump($query);
		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado[0];
		}
	}


	function numeroDeAuditoriasAPagarPorMarca($conexion, $marca){
		$query = "SELECT COUNT(*) FROM `auditorias` WHERE `statusPago` = 'En Proceso' AND `clienteMarca` = '$marca'";
		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado[0];
		}
	}

	function numeroDeAuditoriasAPagarPorMarcaYPorUsuario($conexion, $marca, $email){
		$query = "SELECT COUNT(*) FROM `auditorias` WHERE `statusPago` = 'En Proceso' AND `clienteMarca` = '$marca' AND `auditorEmail` = '$email'";
		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado[0];
		}
	}

	function numeroDeAuditoriasAPagarPorMarcaYPorUsuarioAprobados($conexion, $marca, $email){
		$query = "SELECT COUNT(*) FROM `auditorias` WHERE `statusPago` IN ('En Proceso') AND `clienteMarca` = '$marca' AND `auditorEmail` = '$email';";
		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado[0];
		}
	}
	function numeroDeAuditoriasAPagarPorMarcaYPorUsuarioAprobadosNacional($conexion, $marca, $email){
		$query = "SELECT COUNT(*) FROM `auditorias` WHERE `statusPago` IN ('En Proceso') AND `clienteMarca` = '$marca' AND `auditorEmail` = '$email';";
		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado[0];
		}
	}

	function numeroDeAuditoriasAPagarPorUsuarioAprobados($conexion, $marca, $email){
		$query = "SELECT COUNT(*) FROM `auditorias` WHERE `statusPago` IN ('En Proceso', 'Aprobado', 'Cerrada') AND `auditorEmail` = '$email'  AND MONTH(`fTermino`)IN (8, 9) AND `clientePais` = 'Mexico'";
		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado[0];
		}
	}

	function numeroDeAuditoriasAPagarPorUsuarioAprobadosNacional($conexion, $marca, $email){
		$query = "SELECT COUNT(*) FROM `auditorias` WHERE `statusPago` IN ('En Proceso', 'Aprobado', 'Cerrada') AND `auditorEmail` = '$email' GROUP BY MONTH(`fTermino`) AND clientePais IN ('MEXICO')";
		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado[0];
		}
	}


	function numeroDeAuditoriasAPagarPorUsuarioAprobadosInternacional($conexion, $marca, $email){
		$query = "SELECT COUNT(*) FROM `auditorias` WHERE `statusPago` IN ('En Proceso') AND `auditorEmail` = '$email'  AND MONTH(`fTermino`) >9 GROUP BY MONTH(`fTermino`) AND clientePais NOT IN ('MEXICO', 'COUNTRY DEMO')";
		//$query = "SELECT COUNT(*) FROM `auditorias` WHERE `statusPago` IN ('En Proceso', 'Aprobado', 'Cerrada') AND `auditorEmail` = '$email'  AND MONTH(`fTermino`) >9 GROUP BY MONTH(`fTermino`) AND clientePais NOT IN ('MEXICO', 'COUNTRY DEMO')";
		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado[0];
		}
	}


	function AuditoresAuditoriasAprobadasPorMarca($conexion, $marca){
		$query = "SELECT DISTINCT `auditorNombre`, `auditorEmail` FROM `auditorias` WHERE `statusPago` = 'Aprobado' AND `clienteMarca` = '$marca'";
		$resultado = array();

		//var_dump($query);
		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado;
		}
	}
	//J2
	function AuditoresAuditoriasAprobadasPorMarcaJ2($conexion, $marca, $data){
		global $usuarios_arg_sin_pago;

		$filtros = "AND ";
		if ($data['fechaI']!='') {
			$filtros .= "( `fTermino` BETWEEN '".$data['fechaI']."' AND '".$data['fechaF']."') AND ";
		}
		
		if ($data['tipo']!='Tipo' AND $data['tipo']!='') {
			$filtros .= "`viajeTipo` = '".$data['tipo']."' AND "; 
		}

		if ($data['pais']!='') {
			$filtros .= "`clientePais` = '".$data['pais']."' AND"; 
		}
		
		if($_POST['keyWord']!='') $filtros .= " (usuario LIKE '%$_POST[keyWord]%' OR auditorNombre LIKE '%$_POST[keyWord]%' OR auditorEmail LIKE '%$_POST[keyWord]%' OR acceso LIKE '%$_POST[keyWord]%') AND";

		if ($data['pagoEstado']!='Pago' AND $data['pagoEstado']!='') {
			$filtros .= "`statusPago` IN (".$data['pagoEstado'].") AND "; 
		}
		$filtros .=" 1";


		$query = "SELECT DISTINCT (`auditorEmail`), `usuarios`.`nombre` FROM `auditorias` LEFT JOIN `usuarios` ON (`auditorias`.`auditorEmail`= `usuarios`.`email`) WHERE `status` = 'Activo' AND `level`=2 AND `clienteMarca` = '$marca' $usuarios_arg_sin_pago $filtros GROUP BY `usuarios`.`nombre` ORDER BY `usuarios`.`nombre` ASC";

		//var_dump($query);
		$resultado = array();

		//var_dump($query);
		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado;
		}
	}

	//J2
	function AuditoresAuditoriasAprobadasPorMarcaJ2_v2($conexion, $marca, $data){
		global $usuarios_arg_sin_pago;

		$filtros = "AND ";
		if ($data['fechaI']!='') {
			$filtros .= "( `fTermino` BETWEEN '".$data['fechaI']."' AND '".$data['fechaF']."') AND ";
		}
		
		if ($data['tipo']!='Tipo' AND $data['tipo']!='') {
			$filtros .= "`viajeTipo` = '".$data['tipo']."' AND "; 
		}

		if ($data['pais']!='') {
			$filtros .= "`clientePais` = '".$data['pais']."' AND"; 
		}
		
		if($_POST['keyWord']!='') $filtros .= " (usuario LIKE '%$_POST[keyWord]%' OR auditorNombre LIKE '%$_POST[keyWord]%' OR auditorEmail LIKE '%$_POST[keyWord]%' OR acceso LIKE '%$_POST[keyWord]%') AND";

		if ($data['pagoEstado']!='Pago' AND $data['pagoEstado']!='') {
			$filtros .= "`statusPago` IN (".$data['pagoEstado'].") AND "; 
		}
		$filtros .=" 1";


		$query = "SELECT DISTINCT (`auditorEmail`), `usuarios`.`nombre` FROM `auditorias` LEFT JOIN `usuarios` ON (`auditorias`.`auditorEmail`= `usuarios`.`email`) WHERE `status` = 'Activo' AND `level`=2 AND `clienteMarca` = '$marca' $usuarios_arg_sin_pago $filtros GROUP BY `usuarios`.`nombre` ORDER BY `usuarios`.`nombre` ASC";

		//var_dump($query);
		$resultado = array();

		//var_dump($query);
		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado;
		}
	}


	function AuditoresAuditoriasEnProcesoPorMarca($conexion, $marca){
		$query = "SELECT DISTINCT `auditorNombre`, `auditorEmail` FROM `auditorias` WHERE `statusPago` = 'En Proceso' AND `clienteMarca` = '$marca'";
		$resultado = array();

		//var_dump($query);
		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado;
		}
	}


	function auditoriasAprobadasPorMarca($conexion, $marca){
		$query = "SELECT `encuestaID`, `auditorEmail`,`nombre`, `clienteMarca`, `clienteNombre`, `clienteNumero`, `clienteCiudadPais`, `statusPago`, `viajeTipo`, `i_fechaTermino` FROM `auditorias` LEFT JOIN `usuarios` ON (`auditorias`.`auditorEmail`=`usuarios`.`email`) WHERE `statusPago`= 'Aprobado' AND `clienteMarca`='$marca' ORDER BY `Nombre` ASC";
		
		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado;
		}

	}

	function auditoriasPendientesPorUserEmailMarca ($conexion, $marca, $email){
		$query = "SELECT `encuestaID`, `auditorEmail`,`nombre`, `clienteMarca`, `clienteNombre`, `clienteNumero`, `clienteCiudadPais`, `statusPago`, `viajeTipo`, `i_fechaTermino` FROM `auditorias` LEFT JOIN `usuarios` ON (`auditorias`.`auditorEmail`=`usuarios`.`email`) WHERE `statusPago`= 'Aprobado' AND `clienteMarca`='$marca' AND `auditorEmail` = '$email' ORDER BY `Nombre` ASC";
		
		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado;
		}
	}

	function auditoriasDisponiblesPorUsuarioMarcaTipoViaje($conexion, $marca, $email, $viajeTipo){
		$query = "SELECT * FROM `auditorias` WHERE `auditorEmail`= '$email' AND `clienteMarca` = '$marca' AND `viajeTipo` = '$viajeTipo' AND `statusPago` = 'Aprobado';";
		//var_dump($query);
		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado;
		}

	}

	//J2
	function auditoriasDisponiblesPorUsuarioMarcaTipoViajeJ2($conexion, $marca, $email, $viajeTipo, $data){
		$filtros = "AND ";
		if ($data['fechaI']!='') {
			$filtros .= "( `fTermino` BETWEEN '".$data['fechaI']."' AND '".$data['fechaF']."') AND ";
		}
		
		if ($data['tipo']!='Tipo' AND $data['tipo']!='') {
			$filtros .= "`viajeTipo` = '".$data['tipo']."' AND "; 
		}

		if ($data['pais']!='') {
			$filtros .= "`clientePais` = '".$data['pais']."' AND"; 
		}
		
		if($_POST['keyWord']!='') $filtros .= " (usuario LIKE '%$_POST[keyWord]%' OR auditorNombre LIKE '%$_POST[keyWord]%' OR auditorEmail LIKE '%$_POST[keyWord]%' OR acceso LIKE '%$_POST[keyWord]%') AND";

		if ($data['pagoEstado']!='Pago' AND $data['pagoEstado']!='') {
			$filtros .= "`statusPago` IN (".$data['pagoEstado'].") AND "; 
		}
		$filtros .=" 1";


		$query = "SELECT * FROM `auditorias` LEFT JOIN `usuarios` ON (`auditorias`.`auditorEmail`= `usuarios`.`email`) WHERE `status` = 'Activo' AND `auditorEmail`= '$email' AND `level`=2 AND `clienteMarca` = '$marca' AND `viajeTipo` = '$viajeTipo' $filtros ;";
		//var_dump($query);
		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado;
		}

	}


//***

	function auditoriasDisponiblesPorUsuarioMarcaCerradas($conexion, $marca, $email, $viajeTipo, $data){
		$filtros = "AND ";
		if ($data['fechaI']!='') {
			$filtros .= "( `fTermino` BETWEEN '".$data['fechaI']."' AND '".$data['fechaF']."') AND ";
		}
		
		if ($data['tipo']!='Tipo' AND $data['tipo']!='') {
			$filtros .= "`viajeTipo` = '".$data['tipo']."' AND "; 
		}

		if ($data['pais']!='') {
			$filtros .= "`clientePais` = '".$data['pais']."' AND"; 
		}
		
		if($_POST['keyWord']!='') $filtros .= " (usuario LIKE '%$_POST[keyWord]%' OR auditorNombre LIKE '%$_POST[keyWord]%' OR auditorEmail LIKE '%$_POST[keyWord]%' OR acceso LIKE '%$_POST[keyWord]%') AND";

		if ($data['pagoEstado']!='Pago' AND $data['pagoEstado']!='') {
			$filtros .= "`statusPago` IN (".$data['pagoEstado'].") AND "; 
		}
		$filtros .=" 1 AND tipo_cerrada != 'NoCerrada'";


		$query = "SELECT * FROM `auditorias` LEFT JOIN `usuarios` ON (`auditorias`.`auditorEmail`= `usuarios`.`email`) WHERE `status` = 'Activo' AND `auditorEmail`= '$email' AND `clienteMarca` = '$marca' AND `viajeTipo` = '$viajeTipo' AND (`statusPago` = 'Aprobado' OR `statusPago` LIKE '%Cerrada%' OR tipo_cerrada IN ('Cerrada', 'Cerrada F') ) $filtros ;";
		//var_dump($query);
		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado;
		}

	}

///*****

	function auditoriasEnProcesoPorUsuarioMarcaTipoViaje($conexion, $marca, $email, $viajeTipo){
		$query = "SELECT * FROM `auditorias` WHERE `auditorEmail`= '$email' AND `clienteMarca` = '$marca' AND `viajeTipo` = '$viajeTipo' AND `statusPago` = 'En Proceso';";
		//var_dump($query);
		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado;
		}

	}

	function auditoriasEnProcesoPorUsuarioMarcaTipoViajeAprobado($conexion, $marca, $email, $viajeTipo){
		$query = "SELECT * FROM `auditorias` WHERE `auditorEmail`= '$email' AND `clienteMarca` = '$marca' AND `viajeTipo` = '$viajeTipo' AND `statusPago` IN ('En Proceso', 'Aprobado', 'Cerrada') AND MONTH(`fInicio`)IN (8, 9) AND `clientePais` = 'Mexico' ;";
		//var_dump($query);
		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado;
		}

	}

	function auditoriasEnProcesoPorUsuarioMarcaTipoViajeAprobadoNacional($conexion, $marca, $email, $viajeTipo){
		$query = "SELECT * FROM `auditorias` WHERE `auditorEmail`= '$email' AND `clienteMarca` = '$marca' AND `viajeTipo` = '$viajeTipo' AND `statusPago` IN ('En Proceso') AND `fInicio` > '2016-08-01' AND `clientePais` IN ('MEXICO') ;";
		//var_dump($query);
		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado;
		}

	}

	function auditoriasEnProcesoPorUsuarioMarcaTipoViajeAprobadoInternacional($conexion, $marca, $email, $viajeTipo){
		$query = "SELECT * FROM `auditorias` WHERE `auditorEmail`= '$email' AND `clienteMarca` = '$marca' AND `viajeTipo` = '$viajeTipo' AND `statusPago` IN ('En Proceso', 'Aprobado', 'Cerrada') AND `fInicio` > '2016-08-01' AND `clientePais` NOT IN ('MEXICO', 'COUNTRY DEMO') ;";
		$query = "SELECT * FROM `auditorias` WHERE `auditorEmail`= '$email' AND `clienteMarca` = '$marca' AND `viajeTipo` = '$viajeTipo' AND `statusPago` IN ('En Proceso') AND `fInicio` > '2016-08-01' AND `clientePais` NOT IN ('MEXICO', 'COUNTRY DEMO') ;";
		//var_dump($query);
		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado;
		}

	}

	function auditoriasPorRealizarTransferencia($conexion){
		//$query = "SELECT DISTINCT `auditorEmail` FROM `auditorias` WHERE `statusPago` = 'En Proceso';";
		$query = "SELECT DISTINCT `id_usuario`, `auditorEmail`, `nombre`, `auditorNombre` FROM `auditorias` LEFT JOIN `usuarios` ON (`auditorias`.`auditorEmail` = `usuarios`.`email`) WHERE `statusPago` = 'En Proceso';";
		//var_dump($query);
		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado;
		}

	}

	function auditoriasPorRealizarTransferenciaAprobados($conexion){
		//$query = "SELECT DISTINCT `auditorEmail` FROM `auditorias` WHERE `statusPago` = 'En Proceso';";
		global $usuar_arg_sin_pago;
		$query = "SELECT DISTINCT `id_usuario`, `auditorEmail`, `usuarios`.`nombre` FROM `auditorias` LEFT JOIN `usuarios` ON (`auditorias`.`auditorEmail` = `usuarios`.`email`) WHERE `statusPago` IN ('En Proceso', 'Aprobado', 'Cerrada')  AND `fInicio` > '2016-06-30' AND `usuarios`.`status` = 'Activo' AND (`fTermino` BETWEEN '2016-08-01' AND '2016-10-01') AND (level=2) $usuar_arg_sin_pago ORDER BY `usuarios`.`nombre`;";
		//var_dump($query);
		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado;
		}

	}
	function auditoriasPorRealizarTransferenciaAprobadosNacional($conexion){
		
		global $usuar_arg_sin_pago;
		//$query = "SELECT DISTINCT `id_usuario`, `auditorEmail`, `usuarios`.`nombre` FROM `auditorias` LEFT JOIN `usuarios` ON (`auditorias`.`auditorEmail` = `usuarios`.`email`) WHERE `statusPago` IN ('En Proceso', 'Aprobado', 'Cerrada')  AND `fInicio` > '2016-06-30' AND `usuarios`.`status` = 'Activo' AND (`fTermino` BETWEEN '2016-08-01' AND '2016-09-01') $usuar_arg_sin_pago ORDER BY `usuarios`.`nombre`;";
		$query = "SELECT DISTINCT `id_usuario`, `auditorEmail`, `usuarios`.`nombre` FROM `auditorias` LEFT JOIN `usuarios` ON (`auditorias`.`auditorEmail` = `usuarios`.`email`) WHERE `statusPago` IN ('En Proceso')  AND `fInicio` > '2016-06-30' AND `usuarios`.`status` = 'Activo' AND clientePais IN ('MEXICO') AND (level=2)  $usuar_arg_sin_pago ORDER BY `usuarios`.`nombre`;";
		//var_dump($query);
		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado;
		}

	}
	function auditoriasPorRealizarTransferenciaAprobadosInternacional($conexion){
		
		global $usuar_arg_sin_pago;
		$query = "SELECT DISTINCT `id_usuario`, `auditorEmail`, `usuarios`.`nombre` FROM `auditorias` LEFT JOIN `usuarios` ON (`auditorias`.`auditorEmail` = `usuarios`.`email`) WHERE `statusPago` IN ('En Proceso')  AND `fInicio` > '2016-06-30' AND `usuarios`.`status` = 'Activo' AND clientePais NOT IN ('MEXICO', 'COUNTRY DEMO') AND (level=2)  $usuar_arg_sin_pago ORDER BY `usuarios`.`nombre`;";
		//var_dump($query);
		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado;
		}

	}

	function auditoriasTransferenciasAprobadosPagados($conexion, $email, $statusPago){
		//$query = "SELECT DISTINCT `auditorEmail` FROM `auditorias` WHERE `statusPago` = 'En Proceso';";
		global $usuar_arg_sin_pago;
		$query = "SELECT DISTINCT `id_usuario`, `auditorEmail`, `usuarios`.`nombre` FROM `auditorias` LEFT JOIN `usuarios` ON (`auditorias`.`auditorEmail` = `usuarios`.`email`) WHERE `statusPago` IN ('En Proceso', 'Aprobado', 'Cerrada')  AND `fInicio` > '2016-06-30' AND `usuarios`.`status` = 'Activo' AND (`fTermino` BETWEEN '2016-08-01' AND '2016-09-01') $usuar_arg_sin_pago ORDER BY `usuarios`.`nombre`;";
		//var_dump($query);
		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado;
		}

	}


	function contarAuditoriasUsuario($conexion,  $email){
		$query = "SELECT COUNT(*) FROM `auditorias` LEFT JOIN `usuarios` ON (`auditorias`.`auditorEmail`= `usuarios`.`email`) WHERE `status` = 'Activo' AND `email`= '$email' AND `level`=2";
		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado[0];
		}

	}


	function contarAuditoriasUsuario_v2($conexion,  $email){
		$query = "SELECT COUNT(*) FROM `auditorias` LEFT JOIN `usuarios` ON (`auditorias`.`auditorEmail`= `usuarios`.`email`) WHERE `status` = 'Activo' AND `email`= '$email' AND `level`=2";
		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado[0];
		}

	}

	function contarAuditoriasUsuarioMarca($conexion, $marca, $email){
		$query = "SELECT COUNT(*) FROM `auditorias` LEFT JOIN `usuarios` ON (`auditorias`.`auditorEmail`= `usuarios`.`email`) WHERE `status` = 'Activo' AND `clienteMarca` = '$marca' AND `email`= '$email' AND `level`=2";

		//var_dump($query);
		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado[0];
		}

	}


	function contarAuditoriasUsuarioMarca_v2($conexion, $marca, $email){
		$query = "SELECT COUNT(*) FROM `auditorias` LEFT JOIN `usuarios` ON (`auditorias`.`auditorEmail`= `usuarios`.`email`) WHERE `status` = 'Activo' AND `clienteMarca` = '$marca' AND `email`= '$email' AND `level`=2";

		//var_dump($query);
		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado[0];
		}

	}



	function consultarTransferencias($conexion, $status, $email){
		$query = "SELECT * FROM `pagos` WHERE `estado` IN ($status) AND email='$email' AND comprobante!='' GROUP BY descripcion;";
		//var_dump($query);
		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado;
		}
	}

	function consultarTransferenciasAdmin($conexion, $status, $tipo_pago){
		$query = "SELECT * FROM `pagos` WHERE `estado` IN ($status) AND comprobante!='' AND tipo ='".$tipo_pago."' GROUP BY descripcion ORDER BY id_pago DESC;";
		//var_dump($query);
		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado;
		}
	}

		function estrellaNueva($conexion, $user_email, $marca, $modulo, $operacion, $monto){
		$query = "INSERT INTO `estrellas`(`id_estrella`, `email_usuario`, `marca`, `modulo`, `operacion`, `monto`) VALUES ('','$user_email', '$marca','$modulo','$operacion', '$monto');";
		//var_dump($query);
		$inserted = mysqli_query($conexion, $query);

		return $inserted;
	}


	function consultarEstrellas($conexion, $email){
		$query = "SELECT DISTINCT `email_usuario`, `modulo`, `operacion`, `monto` FROM `estrellas` WHERE `email_usuario` = '$email'";

		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado;
		}
	}

	function consultaTotalEstrellas($conexion, $email){
		$query = "SELECT SUM(`monto`) TOTAL FROM (SELECT DISTINCT `email_usuario`, `modulo`, `operacion`, `monto` FROM `estrellas` WHERE `email_usuario` = '$email') AS subquery;";

		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado[0];
		}
	}

	function consultaExistencia($conexion, $email, $modulo, $operacion){
		$query = "SELECT SUM(`monto`) TOTAL FROM (SELECT DISTINCT `email_usuario`, `modulo`, `operacion`, `monto` FROM `estrellas` WHERE `email_usuario` = '$email' AND `modulo`='$modulo' AND `operacion`='$operacion') AS subquery;";
		//var_dump($query);
		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado[0];
		}
	}

/* UPDATE STATUS  */

	function auditoriasPorUsuarioMarca($conexion, $email, $marca){
		$query = "SELECT * FROM `auditorias` WHERE `auditorEmail` = '".$email."' AND `clienteMarca` = '".$marca."' ORDER BY `id` ASC";

		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado;
		}
	}

	function auditoriasPorUsuarioMarcaMes($conexion, $email, $marca, $mes){
		$query = "SELECT * FROM `auditorias` WHERE `auditorEmail` = '".$email."' AND `clienteMarca` = '".$marca."' AND MONTH(fInicio)=$mes AND `statusVisita`!= 'Finalizada' ORDER BY `id` ASC";

		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado;
		}
	}


/* /UPDATE STATUS  */

	function auditoriasPorUsuarioMarcaMesFVisita($conexion, $email, $marca, $mes){
		$query = "SELECT * FROM `auditorias` WHERE `auditorEmail` = '".$email."' AND `clienteMarca` = '".$marca."' AND MONTH(fInicio)=$mes AND `statusVisita` NOT IN  ('Sin Programar') AND `fecha_actualizada` IS NULL ORDER BY `id` ASC";

		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado;
		}
	}


/* /UPDATE FECHA VISITA  */
/****/
	function inventario($conexion){
		$query = "SELECT `clasificacion`, `nombre`, `descripcion`, SUM(`cantidad`) cantidad, `cantidad_minima` FROM `inventario` GROUP BY `clasificacion`, `descripcion` ORDER BY `id_inventario` ASC";

		$resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado;
		}
	}
/****/

	function pagoConfirm( $estado, $id_transferencia, $conexion){
		$query = "UPDATE `pagos` SET `confirmacion` = '$estado' WHERE `id_pago` = $id_transferencia";
		//var_dump($query);
		$updated = mysqli_query($conexion, $query);
		//'schirino@arguilea.com', 'csantiago@arguilea.com', 'ksanchez@arguilea.com', 'vmedrano@arguilea.com'
		
		//'schirino@arguilea.com', 'csantiago@arguilea.com', 'ksanchez@arguilea.com', 'vmedrano@arguilea.com', 'jsaturnino@arguilea.com', 'agomez@arguilea.com'

		//'jsaturnino@arguilea.com', 'agomez@arguilea.com'

		if ($estado=='desacuerdo') {
			$admins = "schirino@arguilea.com, csantiago@arguilea.com, ksanchez@arguilea.com, vmedrano@arguilea.com, jsaturnino@arguilea.com, agomez@arguilea.com, msegura@arguilea.com";
			$admins = explode(',', $admins);
			$adminsID = "5, 3, 272, 273, 283, 284, 6";
			$adminsID = explode(',', $adminsID);

			for ($i=0; $i < sizeof($admins); $i++) { 
				$query2 = 'INSERT INTO `notificaciones` (`marca`, `id_empleado`, `email`, `tipo_notificacion`, `descripcion`, `activo`) VALUES ("ARG", "'.$adminsID[$i].'", "'.$admins[$i].'", "Inconformidad con pago.", "Transferencia # '.$id_transferencia.'", "1");';
					var_dump($query2);
				$inserted = mysqli_query($conexion, $query2);
			}
			
		}
		return $updated;
		}


/**********************/
	function calculaPrecio($marca, $id_auditoria, $conexion){
		//var_dump($marca, $id_auditoria);
		$cerrada = 0;

		 switch ($marca) {
            case 'BK_': $indexMarca = 0; break;
            case 'CCF': $indexMarca = 1; break;
            case 'CPK': $indexMarca = 2; break;
            case 'ITA': $indexMarca = 3; break;
            case 'POR': $indexMarca = 4; break;
            case 'SBX': $indexMarca = 5; break;
            case 'VIP': $indexMarca = 6; break;
            case 'CIE': $indexMarca = 7; break;
            default: break;
        }

        $query = "SELECT * FROM `auditorias` WHERE `encuestaID` = '$id_auditoria' AND clienteMarca = '$marca' LIMIT 1";
        $resultado = array();

		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		}


        $Pais = $resultado[0]['clientePais'];

        if($Pais=='BRAZIL'){
        	if ($resultado[0]['modificadorPago']=='BRAZIL5') {
        		$Pais = 'BRAZIL5';
        	}
        }

        ////var_dump($resultado[0]);
        ////var_dump($Pais);


        $tipoAuditoria = substr($resultado[0]['viajeTipo'], 0, 1);

        if($resultado[0]['statusVisita']=='Visita Clonada' || $resultado[0]['statusVisita']=='Cerrada' || $resultado[0]['statusPago']=='Cerrada' || $resultado[0]['tipo_cerrada']=='Cerrada' || $resultado[0]['tipo_cerrada']=='Cerrada F'){
            $cerrada = 1;    
        }else{
            $cerrada = 0;
        }

         if(!$cerrada){
            $current = ucfirst(strtolower($Pais))."_".$tipoAuditoria;    
        }else {
            $current = ucfirst(strtolower($Pais))."_C";
        }
        //echo "<pre>";
        ////var_dump($current);
        //echo "</pre>";
        /*
	$marcas_info_pagos = array(
       array( 0, "BK_", '#ffa500', 
        array(
                "Mexico_L" => array( 'Mexico', 400, 55, 'MXN'),
                "Mexico_F" => array( 'Mexico_F', 400, 0, 'MXN'),
                "Mexico_C" => array( 'Mexico_C', 200, 0, 'MXN'),
                "Country demo_L" => array( 'Country Demo', 00, 00, 'MXN'),
                "Country demo_F" => array( 'Country Demo_F', 00, 00, 'MXN'),
                "Country demo_C" => array( 'Country Demo_C', 00, 00, 'MXN'),
                "Brazil_L" => array( 'Brazil', 122.1, 0, 'REA'),
                "Brazil_F" => array( 'Brazil_F', 122.1, 0, 'REA'),
                "Brazil_C" => array( 'Brazil_C', 61.05, 0, 'REA'),
                "Brazil5_L" => array( 'Brazil5', 139.1, 0, 'REA'),
                "Brazil5_F" => array( 'Brazil5_F', 139.1, 0, 'REA'),
                "Brazil5_C" => array( 'Brazil5_C', 69.55, 0, 'REA'),
                "Puerto rico_L" => array( 'Puerto Rico', 0, 0, 'USD'),
                "Puerto rico_F" => array( 'Puerto Rico_F', 0, 0, 'USD'),
                "Puerto rico_C" => array( 'Puerto Rico_C', 0, 0, 'USD'),
                "Antigua y barbuda_L" => array( 'Antigua Y Barbuda', 45, 0, 'USD'),
                "Antigua y barbuda_F" => array( 'Antigua Y Barbuda_F', 45, 0, 'USD'),
                "Antigua y barbuda_C" => array( 'Antigua Y Barbuda_C', 22.5, 0, 'USD'),
                "Aruba_L" => array( 'Aruba', 45, 0, 'USD'),
                "Aruba_F" => array( 'Aruba_F', 45, 0, 'USD'),
                "Aruba_C" => array( 'Aruba_C', 22.5, 0, 'USD'),
                "Barbados_L" => array( 'Barbados', 45, 0, 'USD'),
                "Barbados_F" => array( 'Barbados_F', 45, 0, 'USD'),
                "Barbados_C" => array( 'Barbados_C', 22.5, 0, 'USD'),
                "Bahamas_L" => array( 'Bahamas', 45, 0, 'USD'),
                "Bahamas_F" => array( 'Bahamas_F', 45, 0, 'USD'),
                "Bahamas_C" => array( 'Bahamas_C', 22.5, 0, 'USD'),
                "Cayman islands_L" => array( 'Cayman Islands', 45, 0, 'USD'),
                "Cayman islands_F" => array( 'Cayman Islands_F', 45, 0, 'USD'),
                "Cayman islands_C" => array( 'Cayman Islands_C', 22.5, 0, 'USD'),
                "Dominican republic_L" => array( 'Dominican Republic', 45, 0, 'USD'),
                "Dominican republic_F" => array( 'Dominican Republic_F', 45, 0, 'USD'),
                "Dominican republic_C" => array( 'Dominican Republic_C', 22.5, 0, 'USD'),
                "Curacao_L" => array( 'Curacao', 45, 0, 'USD'),
                "Curacao_F" => array( 'Curacao_F', 45, 0, 'USD'),
                "Curacao_C" => array( 'Curacao_C', 22.5, 0, 'USD'),
                "Jamaica_L" => array( 'Jamaica', 45, 0, 'USD'),
                "Jamaica_F" => array( 'Jamaica_F', 45, 0, 'USD'),
                "Jamaica_C" => array( 'Jamaica_C', 22.5, 0, 'USD'),
                "Martinique_L" => array( 'Martinique', 45, 0, 'USD'),
                "Martinique_F" => array( 'Martinique_F', 45, 0, 'USD'),
                "Martinique_C" => array( 'Martinique_C', 22.5, 0, 'USD'),
                "Sint maarten_L" => array( 'Sint Maarten', 45, 0, 'USD'),
                "Sint maarten_F" => array( 'Sint Maarten_F', 45, 0, 'USD'),
                "Sint maarten_C" => array( 'Sint Maarten_C', 22.5, 0, 'USD'),
                "St. lucia_L" => array( 'St. Lucia', 45, 0, 'USD'),
                "St. lucia_F" => array( 'St. Lucia_F', 45, 0, 'USD'),
                "St. lucia_C" => array( 'St. Lucia_C', 22.5, 0, 'USD'),
                "Trinidad y tobago_L" => array( 'Trinidad Y Tobago', 45, 0, 'USD'),
                "Trinidad y tobago_F" => array( 'Trinidad Y Tobago_F', 45, 0, 'USD'),
                "Trinidad y tobago_C" => array( 'Trinidad Y Tobago_C', 22.5, 0, 'USD'),
                "Costa rica_L" => array( 'Costa Rica', 45, 0, 'USD'),
                "Costa rica_F" => array( 'Costa Rica_F', 45, 0, 'USD'),
                "Costa rica_C" => array( 'Costa Rica_C', 22.5, 0, 'USD'),
                "El salvador_L" => array( 'El Salvador', 45, 0, 'USD'),
                "El salvador_F" => array( 'El Salvador_F', 45, 0, 'USD'),
                "El salvador_C" => array( 'El Salvador_C', 22.5, 0, 'USD'),
                "Guatemala_L" => array( 'Guatemala', 45, 0, 'USD'),
                "Guatemala_F" => array( 'Guatemala_F', 45, 0, 'USD'),
                "Guatemala_C" => array( 'Guatemala_C', 22.5, 0, 'USD'),
                "Honduras_L" => array( 'Honduras', 45, 0, 'USD'),
                "Honduras_F" => array( 'Honduras_F', 45, 0, 'USD'),
                "Honduras_C" => array( 'Honduras_C', 22.5, 0, 'USD'),
                "Nicaragua_L" => array( 'Nicaragua', 45, 0, 'USD'),
                "Nicaragua_F" => array( 'Nicaragua_F', 45, 0, 'USD'),
                "Nicaragua_C" => array( 'Nicaragua_C', 22.5, 0, 'USD'),
                "Panama_L" => array( 'Panama', 45, 0, 'USD'),
                "Panama_F" => array( 'Panama_F', 45, 0, 'USD'),
                "Panama_C" => array( 'Panama_C', 22.5, 0, 'USD'),
                "Argentina_L" => array( 'Argentina', 45, 0, 'USD'),
                "Argentina_F" => array( 'Argentina_F', 45, 0, 'USD'),
                "Argentina_C" => array( 'Argentina_C', 22.5, 0, 'USD'),
                "Chile_L" => array( 'Chile', 45, 0, 'USD'),
                "Chile_F" => array( 'Chile_F', 45, 0, 'USD'),
                "Chile_C" => array( 'Chile_C', 22.5, 0, 'USD'),
                "Paraguay_L" => array( 'Paraguay', 45, 0, 'USD'),
                "Paraguay_F" => array( 'Paraguay_F', 45, 0, 'USD'),
                "Paraguay_C" => array( 'Paraguay_C', 22.5, 0, 'USD'),
                "Uruguay_L" => array( 'Uruguay', 45, 0, 'USD'),
                "Uruguay_F" => array( 'Uruguay_F', 45, 0, 'USD'),
                "Uruguay_C" => array( 'Uruguay_C', 22.5, 0, 'USD'),
                "Bolivia_L" => array( 'Bolivia', 45, 0, 'USD'),
                "Bolivia_F" => array( 'Bolivia_F', 45, 0, 'USD'),
                "Bolivia_C" => array( 'Bolivia_C', 22.5, 0, 'USD'),
                "Ecuador_L" => array( 'Ecuador', 45, 0, 'USD'),
                "Ecuador_F" => array( 'Ecuador_F', 45, 0, 'USD'),
                "Ecuador_C" => array( 'Ecuador_C', 22.5, 0, 'USD'),
                "Peru_L" => array( 'Peru', 0, 0, 'USD'),
                "Peru_F" => array( 'Peru_F', 0, 0, 'USD'),
                "Peru_C" => array( 'Peru_C', 0, 0, 'USD'),
                "Venezuela_L" => array( 'Venezuela', 0, 0, 'USD'),
                "Venezuela_F" => array( 'Venezuela_F', 0, 0, 'USD'),
                "Venezuela_C" => array( 'Venezuela_C', 0, 0, 'USD'),
                "Colombia_L" => array( 'Colombia', 45, 0, 'USD'),
                "Colombia_F" => array( 'Colombia_F', 45, 0, 'USD'),
                "Colombia_C" => array( 'Colombia_C', 22.5, 0, 'USD'),
                "Suriname_L" => array( 'Suriname', 45, 0, 'USD'),
                "Suriname_F" => array( 'Suriname_F', 45, 0, 'USD'),
                "Suriname_C" => array( 'Suriname_C', 22.5, 0, 'USD'),
            )),
       array( 1, "CCF", '#641c9a', 
        array(
                "Mexico_L" => array( 'Mexico_L', 455, 55, 'MXN'),
                "Mexico_F" => array( 'Mexico_F', 455, 0, 'MXN'),
                "Mexico_C" => array( 'Mexico_C', (455/2), 0, 'MXN'),
                "Country demo_L" => array( 'Country Demo', 00, 00, 'MXN'),
                "Country demo_F" => array( 'Country Demo_F', 00, 00, 'MXN'),
                "Country demo_C" => array( 'Country Demo_C', 00, 00, 'MXN'),
            )),
       array( 2, "CPK", '#e6d436', 
        array(
                "Mexico_L" => array( 'Mexico_L', 364, 55, 'MXN'),
                "Mexico_F" => array( 'Mexico_F', 364, 0, 'MXN'),
                "Mexico_C" => array( 'Mexico_C', (364/2), 0, 'MXN'),
                "Country demo_L" => array( 'Country Demo', 00, 00, 'MXN'),
                "Country demo_F" => array( 'Country Demo_F', 00, 00, 'MXN'),
                "Country demo_C" => array( 'Country Demo_C', 00, 00, 'MXN'),
            )),
       array( 3, "ITA", '#F8AA8B', 
        array(
                "Mexico_L" => array( 'Mexico_L', 364, 55, 'MXN'),
                "Mexico_F" => array( 'Mexico_F', 364, 0, 'MXN'),
                "Mexico_C" => array( 'Mexico_C', (364/2), 0, 'MXN'),
                "Country demo_L" => array( 'Country Demo', 00, 00, 'MXN'),
                "Country demo_F" => array( 'Country Demo_F', 00, 00, 'MXN'),
                "Country demo_C" => array( 'Country Demo_C', 00, 00, 'MXN'),
            )),
       array( 4, "POR", '#b6328c', 
        array(
                "Mexico_L" => array( 'Mexico_L', 364, 55, 'MXN'),
                "Mexico_F" => array( 'Mexico_F', 364, 0, 'MXN'),
                "Mexico_C" => array( 'Mexico_C', (364/2), 0, 'MXN'),
                "Country demo_L" => array( 'Country Demo', 00, 00, 'MXN'),
                "Country demo_F" => array( 'Country Demo_F', 00, 00, 'MXN'),
                "Country demo_C" => array( 'Country Demo_C', 00, 00, 'MXN'),
            )),
       array( 5, "SBX", '#009653', 
        array(
                "Mexico_L" => array( 'Mexico_L', 364, 55, 'MXN'),
                "Mexico_F" => array( 'Mexico_F', 364, 0, 'MXN'),
                "Mexico_C" => array( 'Mexico_C', 182, 0, 'MXN'),
                "Country demo_L" => array( 'Country Demo', 00, 00, 'MXN'),
                "Country demo_F" => array( 'Country Demo_F', 00, 00, 'MXN'),
                "Country demo_C" => array( 'Country Demo_C', 00, 00, 'MXN'),
                "Argentina_L" => array( 'Argentina_L', 45, 0, 'USD'),
                "Argentina_F" => array( 'Argentina_F', 45, 0, 'USD'),
                "Argentina_C" => array( 'Argentina_C', 0, 0, 'USD'),
                "Aruba_L" => array( 'Aruba_L', 45, 0, 'USD'),
                "Aruba_F" => array( 'Aruba_F', 50, 0, 'USD'),
                "Aruba_C" => array( 'Aruba_C', 0, 0, 'USD'),
                "Curacao_L" => array( 'Curacao_L', 45, 0, 'USD'),
                "Curacao_F" => array( 'Curacao_F', 50, 0, 'USD'),
                "Curacao_C" => array( 'Curacao_C', 0, 0, 'USD'),
                "Bahamas_L" => array( 'Bahamas_L', 45, 0, 'USD'),
                "Bahamas_F" => array( 'Bahamas_F', 50, 0, 'USD'),
                "Bahamas_C" => array( 'Bahamas_C', 0, 0, 'USD'),
                "Bolivia_L" => array( 'Bolivia_L', 45, 0, 'USD'),
                "Bolivia_F" => array( 'Bolivia_F', 50, 0, 'USD'),
                "Bolivia_C" => array( 'Bolivia_C', 0, 0, 'USD'),
                "Brazil_L" => array( 'Brasil_L', 130, 0, 'REA'),
                "Brazil_F" => array( 'Brasil_F', 50, 0, 'USD'),
                "Brazil_C" => array( 'Brasil_C', 0, 0, 'USD'),
                "Chile_L" => array( 'Chile_L', 42, 0, 'USD'),
                "Chile_F" => array( 'Chile_F', 31.30, 0, 'USD'),
                "Chile_C" => array( 'Chile_C', 0, 0, 'USD'),
                "Colombia_L" => array( 'Colombia_L', 45, 0, 'USD'),
                "Colombia_F" => array( 'Colombia_F', 50, 0, 'USD'),
                "Colombia_C" => array( 'Colombia_C', 0, 0, 'USD'),
                "Costa rica_L" => array( 'Costa Rica_L', 45, 0, 'USD'),
                "Costa rica_F" => array( 'Costa Rica_F', 50, 0, 'USD'),
                "Costa rica_C" => array( 'Costa Rica_C', 0, 0, 'USD'),
                "El salvador_L" => array( 'El Salvador_L', 45, 0, 'USD'),
                "El salvador_F" => array( 'El Salvador_F', 50, 0, 'USD'),
                "El salvador_C" => array( 'El Salvador_C', 0, 0, 'USD'),
                "Panama_L" => array( 'Panama_L', 45, 0, 'USD'),
                "Panama_F" => array( 'Panama_F', 50, 0, 'USD'),
                "Panama_C" => array( 'Panama_C', 0, 0, 'USD'),
                "Guatemala_L" => array( 'Guatemala_L', 45, 0, 'USD'),
                "Guatemala_F" => array( 'Guatemala_F', 50, 0, 'USD'),
                "Guatemala_C" => array( 'Guatemala_C', 0, 0, 'USD'),
                "Peru_L" => array( 'Peru_L', 45, 0, 'USD'),
                "Peru_F" => array( 'Peru_F', 50, 0, 'USD'),
                "Peru_C" => array( 'Peru_C', 0, 0, 'USD'),
                "Puerto rico_L" => array( 'Puerto Rico_L', 0, 0, 'USD'),
                "Puerto rico_F" => array( 'Puerto Rico_F', 0, 0, 'USD'),
                "Puerto rico_C" => array( 'Puerto Rico_C', 0, 0, 'USD'),
            )),
       array( 6, "VIP", '#ff0000', 
        array(
                "Mexico_L" => array( 'Mexico_L', 364, 55, 'MXN'),
                "Mexico_F" => array( 'Mexico_F', 364, 0, 'MXN'),
                "Mexico_C" => array( 'Mexico_C', (364/2), 0, 'MXN'),
                "Country demo_L" => array( 'Country Demo', 00, 00, 'MXN'),
                "Country demo_F" => array( 'Country Demo_F', 00, 00, 'MXN'),
                "Country demo_C" => array( 'Country Demo_C', 00, 00, 'MXN'),
                "_L" => array( '', 00, 00, 'MXN'),
                "_F" => array( '_F', 00, 00, 'MXN'),
                "_C" => array( '_C', 00, 00, 'MXN'),
            )),
       array( 7, "CIE", '#ff0000', 
        array(
                "Mexico_L" => array( 'Mexico_L', 364, 55, 'MXN'),
                "Mexico_F" => array( 'Mexico_F', 364, 0, 'MXN'),
                "Mexico_C" => array( 'Mexico_C', (364/2), 0, 'MXN'),
                "Country demo_L" => array( 'Country Demo', 00, 00, 'MXN'),
                "Country demo_F" => array( 'Country Demo_F', 00, 00, 'MXN'),
                "Country demo_C" => array( 'Country Demo_C', 00, 00, 'MXN'),
            ))
           );
		

		//var_dump($current);

		$moneda = $marcas_info_pagos[$indexMarca][3][$current][3];

        if(!$sinPago){
            $montoAuditoria = $marcas_info_pagos[$indexMarca][3][$current][1];
            $montoTransporte = $marcas_info_pagos[$indexMarca][3][$current][2];
        }else{
            $montoAuditoria = 0;
            $montoTransporte = 0;
        }


		return array($montoAuditoria, $montoTransporte, $moneda);
	*/

	$marcas_info_pagos = array(
                   array( 0, "BK_", '#ffa500', 
                    array(
                            "Mexico_L" => array( 'Mexico', 400, 55, 'MXN'),
                            "Mexico_F" => array( 'Mexico_F', 400, 0, 'MXN'),
                            "Mexico_C" => array( 'Mexico_C', 200, 0, 'MXN'),
                            "Country demo_L" => array( 'Country Demo', 00, 00, 'MXN'),
                            "Country demo_F" => array( 'Country Demo_F', 00, 00, 'MXN'),
                            "Country demo_C" => array( 'Country Demo_C', 00, 00, 'MXN'),
                            "Brazil_L" => array( 'Brazil', 122.1, 0, 'REA'),
                            "Brazil_F" => array( 'Brazil_F', 122.1, 0, 'REA'),
                            "Brazil_C" => array( 'Brazil_C', 61.05, 0, 'REA'),
                            "Brazil5_L" => array( 'Brazil5', 139.1, 0, 'REA'),
                            "Brazil5_F" => array( 'Brazil5_F', 139.1, 0, 'REA'),
                            "Brazil5_C" => array( 'Brazil5_C', 69.55, 0, 'REA'),
                            "Puerto rico_L" => array( 'Puerto Rico', 0, 0, 'USD'),
                            "Puerto rico_F" => array( 'Puerto Rico_F', 0, 0, 'USD'),
                            "Puerto rico_C" => array( 'Puerto Rico_C', 0, 0, 'USD'),
                            "Antigua y barbuda_L" => array( 'Antigua Y Barbuda', 45, 0, 'USD'),
                            "Antigua y barbuda_F" => array( 'Antigua Y Barbuda_F', 45, 0, 'USD'),
                            "Antigua y barbuda_C" => array( 'Antigua Y Barbuda_C', 22.5, 0, 'USD'),
                            "Aruba_L" => array( 'Aruba', 45, 0, 'USD'),
                            "Aruba_F" => array( 'Aruba_F', 45, 0, 'USD'),
                            "Aruba_C" => array( 'Aruba_C', 22.5, 0, 'USD'),
                            "Barbados_L" => array( 'Barbados', 45, 0, 'USD'),
                            "Barbados_F" => array( 'Barbados_F', 45, 0, 'USD'),
                            "Barbados_C" => array( 'Barbados_C', 22.5, 0, 'USD'),
                            "Bahamas_L" => array( 'Bahamas', 45, 0, 'USD'),
                            "Bahamas_F" => array( 'Bahamas_F', 45, 0, 'USD'),
                            "Bahamas_C" => array( 'Bahamas_C', 22.5, 0, 'USD'),
                            "Cayman islands_L" => array( 'Cayman Islands', 45, 0, 'USD'),
                            "Cayman islands_F" => array( 'Cayman Islands_F', 45, 0, 'USD'),
                            "Cayman islands_C" => array( 'Cayman Islands_C', 22.5, 0, 'USD'),
                            "Dominican republic_L" => array( 'Dominican Republic', 45, 0, 'USD'),
                            "Dominican republic_F" => array( 'Dominican Republic_F', 45, 0, 'USD'),
                            "Dominican republic_C" => array( 'Dominican Republic_C', 22.5, 0, 'USD'),
                            "Curacao_L" => array( 'Curacao', 45, 0, 'USD'),
                            "Curacao_F" => array( 'Curacao_F', 45, 0, 'USD'),
                            "Curacao_C" => array( 'Curacao_C', 22.5, 0, 'USD'),
                            "Jamaica_L" => array( 'Jamaica', 45, 0, 'USD'),
                            "Jamaica_F" => array( 'Jamaica_F', 45, 0, 'USD'),
                            "Jamaica_C" => array( 'Jamaica_C', 22.5, 0, 'USD'),
                            "Martinique_L" => array( 'Martinique', 45, 0, 'USD'),
                            "Martinique_F" => array( 'Martinique_F', 45, 0, 'USD'),
                            "Martinique_C" => array( 'Martinique_C', 22.5, 0, 'USD'),
                            "Sint maarten_L" => array( 'Sint Maarten', 45, 0, 'USD'),
                            "Sint maarten_F" => array( 'Sint Maarten_F', 45, 0, 'USD'),
                            "Sint maarten_C" => array( 'Sint Maarten_C', 22.5, 0, 'USD'),
                            "St. lucia_L" => array( 'St. Lucia', 45, 0, 'USD'),
                            "St. lucia_F" => array( 'St. Lucia_F', 45, 0, 'USD'),
                            "St. lucia_C" => array( 'St. Lucia_C', 22.5, 0, 'USD'),
                            "Trinidad y tobago_L" => array( 'Trinidad Y Tobago', 45, 0, 'USD'),
                            "Trinidad y tobago_F" => array( 'Trinidad Y Tobago_F', 45, 0, 'USD'),
                            "Trinidad y tobago_C" => array( 'Trinidad Y Tobago_C', 22.5, 0, 'USD'),
                            "Costa rica_L" => array( 'Costa Rica', 24542, 0, 'COLON'),
                            "Costa rica_F" => array( 'Costa Rica_F', 24542, 0, 'COLON'),
                            "Costa rica_C" => array( 'Costa Rica_C', 12271, 0, 'COLON'),
                            "El salvador_L" => array( 'El Salvador', 45, 0, 'USD'),
                            "El salvador_F" => array( 'El Salvador_F', 45, 0, 'USD'),
                            "El salvador_C" => array( 'El Salvador_C', 22.5, 0, 'USD'),
                            "Guatemala_L" => array( 'Guatemala', 342, 0, 'QUETZAL'),
                            "Guatemala_F" => array( 'Guatemala_F', 342, 0, 'QUETZAL'),
                            "Guatemala_C" => array( 'Guatemala_C', 171, 0, 'QUETZAL'),
                            "Honduras_L" => array( 'Honduras', 45, 0, 'USD'),
                            "Honduras_F" => array( 'Honduras_F', 45, 0, 'USD'),
                            "Honduras_C" => array( 'Honduras_C', 22.5, 0, 'USD'),
                            "Nicaragua_L" => array( 'Nicaragua', 45, 0, 'USD'),
                            "Nicaragua_F" => array( 'Nicaragua_F', 45, 0, 'USD'),
                            "Nicaragua_C" => array( 'Nicaragua_C', 22.5, 0, 'USD'),
                            "Panama_L" => array( 'Panama', 45, 0, 'USD'),
                            "Panama_F" => array( 'Panama_F', 45, 0, 'USD'),
                            "Panama_C" => array( 'Panama_C', 22.5, 0, 'USD'),
                            "Argentina_L" => array( 'Argentina', 45, 0, 'USD'),
                            "Argentina_F" => array( 'Argentina_F', 45, 0, 'USD'),
                            "Argentina_C" => array( 'Argentina_C', 22.5, 0, 'USD'),
                            "Chile_L" => array( 'Chile', 30300, 0, 'PESO CH'),
                            "Chile_F" => array( 'Chile_F', 30300, 0, 'PESO CH'),
                            "Chile_C" => array( 'Chile_C', 15165, 0, 'PESO CH'),
                            "Paraguay_L" => array( 'Paraguay', 45, 0, 'USD'),
                            "Paraguay_F" => array( 'Paraguay_F', 45, 0, 'USD'),
                            "Paraguay_C" => array( 'Paraguay_C', 22.5, 0, 'USD'),
                            "Uruguay_L" => array( 'Uruguay', 45, 0, 'USD'),
                            "Uruguay_F" => array( 'Uruguay_F', 45, 0, 'USD'),
                            "Uruguay_C" => array( 'Uruguay_C', 22.5, 0, 'USD'),
                            "Bolivia_L" => array( 'Bolivia', 45, 0, 'USD'),
                            "Bolivia_F" => array( 'Bolivia_F', 45, 0, 'USD'),
                            "Bolivia_C" => array( 'Bolivia_C', 22.5, 0, 'USD'),
                            "Ecuador_L" => array( 'Ecuador', 45, 0, 'USD'),
                            "Ecuador_F" => array( 'Ecuador_F', 45, 0, 'USD'),
                            "Ecuador_C" => array( 'Ecuador_C', 22.5, 0, 'USD'),
                            "Peru_L" => array( 'Peru', 152, 0, 'SOL'),
                            "Peru_F" => array( 'Peru_F', 152, 0, 'SOL'),
                            "Peru_C" => array( 'Peru_C', 76, 0, 'SOL'),
                            "Venezuela_L" => array( 'Venezuela', 0, 0, 'USD'),
                            "Venezuela_F" => array( 'Venezuela_F', 0, 0, 'USD'),
                            "Venezuela_C" => array( 'Venezuela_C', 0, 0, 'USD'),
                            "Colombia_L" => array( 'Colombia', 136654, 0, 'PESO COL'),
                            "Colombia_F" => array( 'Colombia_F', 121470, 0, 'PESO COL'),
                            "Colombia_C" => array( 'Colombia_C', 68327, 0, 'PESO COL'),
                            "Suriname_L" => array( 'Suriname', 45, 0, 'USD'),
                            "Suriname_F" => array( 'Suriname_F', 45, 0, 'USD'),
                            "Suriname_C" => array( 'Suriname_C', 22.5, 0, 'USD'),
                        )),
                   array( 1, "CCF", '#641c9a', 
                    array(
                            "Mexico_L" => array( 'Mexico_L', 455, 55, 'MXN'),
                            "Mexico_F" => array( 'Mexico_F', 455, 0, 'MXN'),
                            "Mexico_C" => array( 'Mexico_C', (455/2), 0, 'MXN'),
                            "Country demo_L" => array( 'Country Demo', 00, 00, 'MXN'),
                            "Country demo_F" => array( 'Country Demo_F', 00, 00, 'MXN'),
                            "Country demo_C" => array( 'Country Demo_C', 00, 00, 'MXN'),
                        )),
                   array( 2, "CPK", '#e6d436', 
                    array(
                            "Mexico_L" => array( 'Mexico_L', 364, 55, 'MXN'),
                            "Mexico_F" => array( 'Mexico_F', 364, 0, 'MXN'),
                            "Mexico_C" => array( 'Mexico_C', (364/2), 0, 'MXN'),
                            "Country demo_L" => array( 'Country Demo', 00, 00, 'MXN'),
                            "Country demo_F" => array( 'Country Demo_F', 00, 00, 'MXN'),
                            "Country demo_C" => array( 'Country Demo_C', 00, 00, 'MXN'),
                        )),
                   array( 3, "ITA", '#F8AA8B', 
                    array(
                            "Mexico_L" => array( 'Mexico_L', 364, 55, 'MXN'),
                            "Mexico_F" => array( 'Mexico_F', 364, 0, 'MXN'),
                            "Mexico_C" => array( 'Mexico_C', (364/2), 0, 'MXN'),
                            "Country demo_L" => array( 'Country Demo', 00, 00, 'MXN'),
                            "Country demo_F" => array( 'Country Demo_F', 00, 00, 'MXN'),
                            "Country demo_C" => array( 'Country Demo_C', 00, 00, 'MXN'),
                        )),
                   array( 4, "POR", '#b6328c', 
                    array(
                            "Mexico_L" => array( 'Mexico_L', 364, 55, 'MXN'),
                            "Mexico_F" => array( 'Mexico_F', 364, 0, 'MXN'),
                            "Mexico_C" => array( 'Mexico_C', (364/2), 0, 'MXN'),
                            "Country demo_L" => array( 'Country Demo', 00, 00, 'MXN'),
                            "Country demo_F" => array( 'Country Demo_F', 00, 00, 'MXN'),
                            "Country demo_C" => array( 'Country Demo_C', 00, 00, 'MXN'),
                        )),
                   array( 5, "SBX", '#009653', 
                    array(
                            "Mexico_L" => array( 'Mexico_L', 364, 55, 'MXN'),
                            "Mexico_F" => array( 'Mexico_F', 364, 0, 'MXN'),
                            "Mexico_C" => array( 'Mexico_C', 182, 0, 'MXN'),
                            "Country demo_L" => array( 'Country Demo', 00, 00, 'MXN'),
                            "Country demo_F" => array( 'Country Demo_F', 00, 00, 'MXN'),
                            "Country demo_C" => array( 'Country Demo_C', 00, 00, 'MXN'),
                            "Argentina_L" => array( 'Argentina_L', 45, 0, 'USD'),
                            "Argentina_F" => array( 'Argentina_F', 45, 0, 'USD'),
                            "Argentina_C" => array( 'Argentina_C', 0, 0, 'USD'),
                            "Aruba_L" => array( 'Aruba_L', 45, 0, 'USD'),
                            "Aruba_F" => array( 'Aruba_F', 50, 0, 'USD'),
                            "Aruba_C" => array( 'Aruba_C', 0, 0, 'USD'),
                            "Curacao_L" => array( 'Curacao_L', 45, 0, 'USD'),
                            "Curacao_F" => array( 'Curacao_F', 50, 0, 'USD'),
                            "Curacao_C" => array( 'Curacao_C', 0, 0, 'USD'),
                            "Bahamas_L" => array( 'Bahamas_L', 45, 0, 'USD'),
                            "Bahamas_F" => array( 'Bahamas_F', 50, 0, 'USD'),
                            "Bahamas_C" => array( 'Bahamas_C', 0, 0, 'USD'),
                            "Bolivia_L" => array( 'Bolivia_L', 45, 0, 'USD'),
                            "Bolivia_F" => array( 'Bolivia_F', 50, 0, 'USD'),
                            "Bolivia_C" => array( 'Bolivia_C', 0, 0, 'USD'),
                            "Brazil_L" => array( 'Brasil_L', 130, 0, 'REA'),
                            "Brazil_F" => array( 'Brasil_F', 50, 0, 'USD'),
                            "Brazil_C" => array( 'Brasil_C', 0, 0, 'USD'),
                            "Chile_L" => array( 'Chile_L', 30330, 0, 'PESO CH'),
                            "Chile_F" => array( 'Chile_F', 26960, 0, 'PESO CH'),
                            "Chile_C" => array( 'Chile_C', 0, 0, 'PESO CH'),
                            "Colombia_L" => array( 'Colombia_L', 136654, 0, 'PESO COL'),
                            "Colombia_F" => array( 'Colombia_F', 121470, 0, 'PESO COL'),
                            "Colombia_C" => array( 'Colombia_C', 0, 0, 'PESO COL'),
                            "Costa rica_L" => array( 'Costa Rica_L', 24542, 0, 'COLON'),
                            "Costa rica_F" => array( 'Costa Rica_F', 21815, 0, 'COLON'),
                            "Costa rica_C" => array( 'Costa Rica_C', 0, 0, 'COLON'),
                            "El salvador_L" => array( 'El Salvador_L', 45, 0, 'USD'),
                            "El salvador_F" => array( 'El Salvador_F', 50, 0, 'USD'),
                            "El salvador_C" => array( 'El Salvador_C', 0, 0, 'USD'),
                            "Panama_L" => array( 'Panama_L', 45, 0, 'USD'),
                            "Panama_F" => array( 'Panama_F', 50, 0, 'USD'),
                            "Panama_C" => array( 'Panama_C', 0, 0, 'USD'),
                            "Guatemala_L" => array( 'Guatemala_L', 342, 0, 'QUETZAL'),
                            "Guatemala_F" => array( 'Guatemala_F', 304, 0, 'QUETZAL'),
                            "Guatemala_C" => array( 'Guatemala_C', 0, 0, 'QUETZAL'),
                            "Peru_L" => array( 'Peru_L', 152, 0, 'SOL'),
                            "Peru_F" => array( 'Peru_F', 135, 0, 'SOL'),
                            "Peru_C" => array( 'Peru_C', 0, 0, 'SOL'),
                            "Puerto rico_L" => array( 'Puerto Rico_L', 0, 0, 'USD'),
                            "Puerto rico_F" => array( 'Puerto Rico_F', 0, 0, 'USD'),
                            "Puerto rico_C" => array( 'Puerto Rico_C', 0, 0, 'USD'),
                        )),
                   array( 6, "VIP", '#ff0000', 
                    array(
                            "Mexico_L" => array( 'Mexico_L', 364, 55, 'MXN'),
                            "Mexico_F" => array( 'Mexico_F', 364, 0, 'MXN'),
                            "Mexico_C" => array( 'Mexico_C', (364/2), 0, 'MXN'),
                            "Country demo_L" => array( 'Country Demo', 00, 00, 'MXN'),
                            "Country demo_F" => array( 'Country Demo_F', 00, 00, 'MXN'),
                            "Country demo_C" => array( 'Country Demo_C', 00, 00, 'MXN'),
                            "_L" => array( '', 00, 00, 'MXN'),
                            "_F" => array( '_F', 00, 00, 'MXN'),
                            "_C" => array( '_C', 00, 00, 'MXN'),
                        )),
                   array( 7, "CIE", '#89d4e3', 
                    array(
                            "Mexico_L" => array( 'Mexico_L', 364, 55, 'MXN'),
                            "Mexico_F" => array( 'Mexico_F', 364, 0, 'MXN'),
                            "Mexico_C" => array( 'Mexico_C', (364/2), 0, 'MXN'),
                            "Country demo_L" => array( 'Country Demo', 00, 00, 'MXN'),
                            "Country demo_F" => array( 'Country Demo_F', 00, 00, 'MXN'),
                            "Country demo_C" => array( 'Country Demo_C', 00, 00, 'MXN'),
                        )),
                   array( 8, "UNI", '#89d4e3', 
                    array(
                            "Mexico_L" => array( 'Mexico_L', 0, 0, 'MXN'),
                            "Mexico_F" => array( 'Mexico_F', 0, 0, 'MXN'),
                            "Mexico_C" => array( 'Mexico_C', (0/2), 0, 'MXN'),
                            "Country demo_L" => array( 'Country Demo', 00, 00, 'MXN'),
                            "Country demo_F" => array( 'Country Demo_F', 00, 00, 'MXN'),
                            "Country demo_C" => array( 'Country Demo_C', 00, 00, 'MXN'),
                        ))
                       );
  
	}

/********** NOTIFICACIONES ************/

function crearNotificacion($user_id, $user_email, $titulo, $texto, $conexion){
	$query2 = 'INSERT INTO `notificaciones` (`id_notificacion`, `marca`, `id_empleado`, `email`, `tipo_notificacion`, `descripcion`, `activo`) VALUES (NULL, "ARG", '.$user_id.', "'.$user_email.'", "'.$titulo.'.", "'.$texto.'", "1");';
	//		$inserted = mysqli_query($conexion, $query2);

			var_dump($query2);

	return $inserted;
}

/**********************/

/** Comunicados **/
	function updateStatusComunicado($conexion, $id_noticia, $status){
		$query = "UPDATE `noticias` SET `status` = '".$status."' WHERE `id_noticia` = '".$id_noticia."';";
		$updated = mysqli_query($conexion, $query);
		//var_dump($query);
		//var_dump($updated);
		return $updated;
	}

/** **/


/* * */

function ultimoPresupuestoInfo($conexion, $email){

	$filtro = " AND `a`.`regDate` > '2016-09-01' ";

	$query = "SELECT id_expense, a.regDate, SUM(total) PresupuestoTotal, SUM(totalReal) PresupuestoReal, SUM(depositoViaticos2) deposito, group_concat(a.id) descriptor, c.eMail FROM controlgastos.expensesItems a INNER JOIN controlgastos.expenses b ON a.id_expense=b.id INNER JOIN controlgastos.app_logonUsers c ON b.id_user=c.id_user INNER JOIN (SELECT * FROM auditorportal.usuarios WHERE acceso='Auditor Arguilea' AND SUBSTRING_INDEX(direccion,'|',1)!='Mexico') d ON c.eMail=d.email WHERE a.total>0 AND statusItem='APROBADO' AND depositoViaticos2 IS null $filtro AND c.`eMail`='$email' GROUP BY id_expense DESC LIMIT 1";
	if ($result = mysqli_query( $conexion, $query)) {
	    while ($row = $result->fetch_assoc()) {
				$resultado[] = $row;
		}
	    return $resultado[0];
	}
}



/* * */

function getSaldoTotal($conexion, $id_user, $email, $anio){
 	$year=$anio;
	//$q="SELECT SUM(ammountTransfer) totalTransferido FROM controlgastos.scheduleDepositsTransfers WHERE id_user='$id_user' AND YEAR(dateTransfer)='$year'";
	$q="SELECT SUM(ammountTransfer) totalTransferido FROM `controlgastos`.`scheduleDepositsTransfers` AS SDT LEFT JOIN `controlgastos`.`app_logonUsers` AS AL ON (SDT.`id_user`= AL.`id_user`) WHERE AL.`email`='$email' AND YEAR(dateTransfer)='$year'";
	if ($result = mysqli_query( $conexion, $q)) {
	    while ($row = $result->fetch_assoc()) {
				$resultado[] = $row;
		}
	}

	$depositado = $resultado[0]['totalTransferido'];
	


 /*
 $q="SELECT SUM(totalReal) totalReal FROM
 expensesItems a
 INNER JOIN
 expenses b
 ON a.id_expense=b.id
 WHERE id_user='$id_user' AND YEAR(refDay)='$year'";*/
 


 	$q = "SELECT SUM(totalReal) totalReal FROM `controlgastos`.`expensesItems` AS EI INNER JOIN `controlgastos`.`expenses`AS E ON (EI.`id_expense` = E.`id`) LEFT JOIN `controlgastos`.`app_logonUsers` AS AL ON (E.`id_user`= AL.`id_user`) WHERE AL.`email`='$email' AND YEAR(refDay)='$year' AND EI.`attachmentFileValid`='Aprobado'";
 	$resultado = array();
 	if ($result = mysqli_query( $conexion, $q)) {
	    while ($row = $result->fetch_assoc()) {
				$resultado[] = $row;
		}
	}
	
	$comprobado = $resultado[0]['totalReal'];
	
	if ($comprobado=='') { $comprobado = 0;	}
	if ($depositado=='') { $depositado = 0;	}

	//echo "Depositado: ".number_format($depositado, 2).'<br/>';
	//echo "Comprobado: ".number_format($comprobado, 2).'<br/>';
 	

	//var_dump($comprobado, $depositado);
 $total=$comprobado-$depositado;
 
 return $total;
}


/* * */
	function consultaPagosAuditor($email, $conexion){
		$query = "SELECT `email`, SUM(`confirmacion` = 'acuerdo' AND NOT(`confirmacion` IS NULL)) Acuerdo FROM `pagos` WHERE `estado` = 'Pagado' AND `email`='".$email."'  GROUP BY `email` ORDER BY `pagos`.`confirmacion`  DESC";

		$resultado = array();
		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado[0];
		}
	}
/* * */


/* * */


	function updateSeguro($conexion, $data, $email){
		$query = "UPDATE `usuarios` SET `nombre` = '".$data['nombre'].'/@/'.$data['apP'].'/@/'.$data['apM']."', `rfc` = '".$data['rfc']."', `curp` = '".$data['curp']."', `imss` = '".$data['imss']."', `infonavit` = '".$data['check_info']."', `infonavit_tipo` = '".$data['tipo']."', `infonavit_numero` = '".$data['infonavit']."', `fonacot` = '".$data['check_fona']."', `fonacot_numero` = '".$data['fonacot_num']."', `fonacot_importe` = '".$data['fonacot_desc']."', `clinica_numero` = '".$data['clinica']."' WHERE `email` = '".$email."' ";
		$updated = mysqli_query($conexion, $query);
		//var_dump($query);

		return $updated;
	}

	function documentosUsuario($conexion, $id_usuario){
		$query="SELECT  `id_usuario`, `nombre`, `email`, `tabla`, `descripcion`, `recurso` FROM `usuarios` AS `U` LEFT JOIN `documentos` AS `R` ON (`U`.`id_usuario`=`R`.`id_referencia`) WHERE `R`.`tabla` IN ('acta', 'curp', 'domicilio', 'identificacionOficial', 'imss', 'rfc') AND `id_usuario`='".$id_usuario."'";
		//var_dump($query);

		$resultado = array();
		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado;
		}
	}

	function materialesTotal($conexion, $email){
		if ($email!='') {
			$filter = "AND email = '".$email."'"; 
		}
		$query="
		SELECT usuarios.`id_usuario`, usuarios.`email`, usuarios.nombre,
		SUM(`lampara`!='NO') lampara,
		SUM(`termometro`!='NO') termometro,
		SUM(`termometroL`!='NO') termometroL,
		SUM(`cronometro`!='NO') cronometro,
		SUM(`playera`!='NO') playera,
		SUM(`camisa`!='NO') camisa,
		SUM(`credencial`!='NO') credencial,
		SUM(`manual`!='NO') manual,
		SUM(`tiras`) tiras,
		SUM(`formatosCantidad`) formatosCantidad
		FROM `materiales`
		LEFT JOIN `usuarios` ON (materiales.email = usuarios.email)
		WHERE `estado`!='Eliminado' 
		$filter
		GROUP BY `email`";
	//	var_dump($query);

		$resultado = array();
		if ($result = mysqli_query( $conexion, $query)) {
		    while ($row = $result->fetch_assoc()) {
  				$resultado[] = $row;
			}
		    return $resultado;
		}
	}

 ?>
