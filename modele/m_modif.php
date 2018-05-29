<?php
    if (isset($_POST['nom'])) {

        try {
            $stmt = $bdd->prepare('UPDATE `user`  SET `nom`=:nom,`adresse`=:adresse,`mdp`=:pwd,`mail`=:mail WHERE login=:pseudo;');
            $stmt->execute(
                array(':nom' => $_POST['nom'],
                    ':adresse' => $_POST['adresse'],
                    ':pwd'    => $_POST['pwd'],
                    ':mail' => $_POST['mail'],
                    ':pseudo' => $_COOKIE['pseudo']
                )
            );
        }
        catch (PDOException $e) {
            die($e->getMessage());
        }

        // On redirige vers l'accueil. le site finalisé, la connexion au compte se fera
        // automatiquement dès l'inscription terminée et un message de bienvenue apparaitra.
        header('Location: ?page=compte');
        exit();
    }
?>