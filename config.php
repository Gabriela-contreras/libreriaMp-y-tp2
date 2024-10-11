<?php

// header('Content-Type: text/html; charset=utf-8');
// header("Cache-Control: no-cache, must-revalidate ");

/////////////////////////////
// CONFIGURACION APP//
/////////////////////////////

$PROYECTO = 'pwd-unco-2024/libreriaMp';

//variable que almacena el directorio del proyecto
$ROOT = $_SERVER['DOCUMENT_ROOT'] . "/$PROYECTO/";

// include_once ($ROOT . 'tp4/utils/functions.php');

// Variable que define la pagina de autenticacion del proyecto
// $INICIO = "Location:http://" . $_SERVER['HTTP_HOST'] . "/$PROYECTO/vista/login/login.php";

// variable que define la pagina principal del proyecto (menu principal)
$PRINCIPAL = "Location:http://" . $_SERVER['HTTP_HOST'] . "/$PROYECTO/Home.php";

$_SESSION['ROOT'] = $ROOT;