<?php

require_once("config.php");

/*try {
    $dbh = new PDO("mysql:host=localhost;dbname=dbphp7", "root", "");

    foreach($dbh->query("SELECT * from tb_usuarios") as $row) {
        //print_r($row);
        echo json_encode($row);
    }

    $dbh = null;
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}*/

/*Traz um cadastro atravez do ID
$root = new Usuario();
$root->loadById(1);
echo $root;*/

/*Carrega uma lista com todos os cadastros
$lista = Usuario::getList();
echo json_encode($lista);*/

/*Carrega uma lista de usuarios buscando pelo login
$search = Usuario::search("te1");
echo json_encode($search);*/

//Traz um cadastro atravez do longi e senha
$usuario = new Usuario();
$usuario->login("teste1","123456");
echo "$usuario";


?>