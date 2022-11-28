<?php

    require_once '../modelos/moadopciones.php';
    $adopciones = new Xadopciones();

    switch ($_GET['op']) 
    {
        case 'enviaradopcion':
		$nombre 		= isset($_POST['nombre']) 		? limpiarCadena($_POST['nombre']) 		: "";
		$apellidos 		= isset($_POST['apellidos']) 	? limpiarCadena($_POST['apellidos']) 	: "";
		$email 			= isset($_POST['email']) 		? limpiarCadena($_POST['email']) 		: "";
		$telefono 		= isset($_POST['telefono']) 	? limpiarCadena($_POST['telefono']) 	: "";
		$mensaje 		= isset($_POST['mensaje']) 		? limpiarCadena($_POST['mensaje']) 		: "";
		$idanimalito 	= isset($_POST['idanimalito']) 	? limpiarCadena($_POST['idanimalito']) 	: "";
		
		$rspta = $adopciones->guardar($nombre,$apellidos,$email,$telefono,$mensaje,$idanimalito);
                echo $rspta ? "Mensaje recibido con éxito." : "Error, no se pudo recibir el mensaje.";
            

        break;

        case 'getAnimales':
            $rspta = $adopciones->getAnimales();
            $datos = array();
            while($fetch = $rspta->fetch_object()) {
                $datos[] = array(
                    'idadopcion' => $fetch->idadopcion,
                    'nombre' => $fetch->nombre
                );
            }
            echo json_encode($datos);
        break;

    }

?>

