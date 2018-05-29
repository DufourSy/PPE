<?php
    // La page d'inscription s'appelle elle-même. Si les infos sont renseignées, on réalise l'inscription
    // et on redirige vers la page d'accueil avant l'affichage du formulaire.
    // Si les infos ne sont pas là, le code est ignoré, il n'y a pas de redirection et le formulaire
    // est affiché plus loin par v_signin.php.
    if(isset($PoST['designation'])){


    if (isset($_POST['id_lieu'])) {

            try {
        $bdd = new PDO('mysql:dbname=ppe;host=localhost', 'admin', 'Btssio');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $req = $bdd->prepare('SELECT * FROM user WHERE login = :pseudo');
    $req->execute(array(
        'pseudo' => $_COOKIE['pseudo']));
    $resultat = $req->fetch();

    }
    catch (PDOException $e) {
        die($e->getMessage());
    }
        try {
            $stmt = $bdd->prepare('UPDATE evenement SET `id_lieu` = :id_lieu WHERE id_event = :id_event');
            $stmt->execute(
                array(':id_lieu' =>$resultat['id_lieu']
                )
            );
        }
        catch (PDOException $e) {
            die($e->getMessage());
        }

        // On redirige vers l'accueil. le site finalisé, la connexion au compte se fera
        // automatiquement dès l'inscription terminée et un message de bienvenue apparaitra.
        header('Location: ?page=lieu');
        exit();
    }
    }
?>