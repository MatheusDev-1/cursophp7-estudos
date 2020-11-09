<?php

require_once("config.php");

// Carrega por ID
// $usuario = new Usuario();
// $id = $usuario->loadById('1');

// Carrega todos os usuários
//$lista = Usuario::getList();
//echo json_encode($lista);

// Procura por trecho no campo deslogin
// $search = Usuario::search('em');
// echo json_encode($search);

// Procura registro que possua deslogin e dessenha corretos
//$usuario->login("em12104", "brscan20");
//echo $usuario;

// Insere novos dados na tabela
// $usuario = new Usuario("Matthew", "1234566");
// $usuario->insert();
// echo $usuario;

// Delete dado da tabela através de ID
// $usuario = new Usuario();
// $usuario->loadById(1);
// $usuario->delete();

// Atualiza dado da tabela
$usuario = new Usuario();
$usuario->loadById(1);
$usuario->update("professor", "122234");
echo $usuario;

?>