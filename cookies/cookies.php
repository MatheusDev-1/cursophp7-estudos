<?php

$data = array(
	"empresa" => "Hcode Treinamentos"
);

setcookie("NOME_DO_COOKIE", json_encode($data), time() + 3600 ); //timestamp unix + tempo desejado

if (isset($_COOKIE["NOME_DO_COOKIE"])) {
	$cookie = json_decode($_COOKIE["NOME_DO_COOKIE"]);
};

?>