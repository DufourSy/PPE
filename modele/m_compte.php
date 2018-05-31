<?php

    try {
    //$bdd = new PDO('mysql:dbname=ppe;host=localhost', 'root', '');
    $bdd = new PDO('mysql:dbname=ppe;host=localhost', 'admin', 'Btssio');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $req = $bdd->prepare('SELECT * FROM user WHERE login = :pseudo');
    $req->execute(array(
        'pseudo' => $COOKIE['pseudo']));
    $resultat = $req->fetch();

    }
    catch (PDOException $e) {
        die($e->getMessage());
    }
?>