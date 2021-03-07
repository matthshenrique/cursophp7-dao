<?php

require_once "config.php";

//Carrega um usuário
//$root = new Usuario();
//$root->loadById(1);
//echo $root;

//Carrega Lista de Usuários
//$lista = Usuario::getList();

//Carrega uma lista buscando pelo login
//$search = Usuario::search("ma");

//Carrega usuário usando login e senha
$usuario = new Usuario();
$usuario->login("Danyphier","buxexudo");

echo $usuario;