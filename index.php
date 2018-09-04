<?php

require_once("config.php");

$sql = new Sql();

$usuarios = $sql->select("SELECT * FROM `tb_usuarios`");

echo json_encode($usuarios);

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

?>