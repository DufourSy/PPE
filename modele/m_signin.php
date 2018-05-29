<?php
    // La page d'inscription s'appelle elle-même. Si les infos sont renseignées, on réalise l'inscription
    // et on redirige vers la page d'accueil avant l'affichage du formulaire.
    // Si les infos ne sont pas là, le code est ignoré, il n'y a pas de redirection et le formulaire
    // est affiché plus loin par v_signin.php.
    if (isset($_POST['login'])) {
        // Cryptage du mot de passe
        $smdp =$_POST['mdp'];
        try {
            $stmt = $bdd->prepare('INSERT INTO user( `nom`, `mail`, `adresse`, `tel`, `login`, `mdp`) VALUES (:nom, :mail, :adresse, :tel, :login, :mdp)');
            $stmt->execute(
                array(':nom' => $_POST['nom'],
                    ':mail' => $_POST['mail'],
                    ':tel' => $_POST['tel'],
                    ':adresse' => $_POST['adresse'],
                    ':login'  => $_POST['login'],
                    ':mdp'    => $smdp
                )
            );
        }
        catch (PDOException $e) {
            die($e->getMessage());
        }

        // On redirige vers l'accueil. le site finalisé, la connexion au compte se fera
        // automatiquement dès l'inscription terminée et un message de bienvenue apparaitra.
        header('Location: ?page=home');
        exit();
    }
?>