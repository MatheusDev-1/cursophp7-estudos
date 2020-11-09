<?php

require_once("config.php");

// $usuario = new Usuario();
// $id = $usuario->loadById('1');
// $lista = $usuario->getList();

//$lista = Usuario::getList();
//echo json_encode($lista);

// $search = Usuario::search('em');

// echo json_encode($search);

//$usuario->login("em12104", "brscan20");

//echo $usuario;

// $usuario = new Usuario("Matthew", "1234566");
// $usuario->insert();

// echo $usuario;

$usuario = new Usuario();
$usuario->loadById(1);
$usuario->delete();
// $usuario->loadById(1);
// $usuario->update("professor", "122234");

// echo $usuario;

?>