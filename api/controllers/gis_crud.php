<?php
error_reporting(E_ALL);
$accion = isset($_REQUEST['accion']) ? $_REQUEST['accion'] : '';

require ("../class/user.php")

	switch($accion){
		case 'obtener_todos':

			$users   = new user();
			$result = $users->get_all();

			echo json_encode(array("data"     => $result,
								   "noticias" => "listados con éxito"
							)
			);
        break;
    }

?>