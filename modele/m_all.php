<?php
    try {
    //$bdd = new PDO('mysql:dbname=ppe;host=localhost', 'root', '');
    $bdd = new PDO('mysql:dbname=ppe;host=localhost', 'admin', 'Btssio');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $req = $bdd->prepare('SELECT * FROM evenement,user,lieu WHERE evenement.id_lieu = lieu.id_lieu and evenement.id_user = user.id_user');
    $req->execute();
    $resultat = $req->fetchAll();

    }
    catch (PDOException $e) {
        die($e->getMessage());
    }
?>