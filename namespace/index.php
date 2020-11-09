<?php

require_once("config.php");

use Cliente\Cadastro;

$cad = new Cadastro();

$cad->setNome("Matheus Oliveira da Hora");
$cad->setEmail("matheus.mdahora@gmail.com");

$cad->registrarVenda();

?>