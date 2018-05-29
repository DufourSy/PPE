<?php
    // La page d'inscription s'appelle elle-même. Si les infos sont renseignées, on réalise l'inscription
    // et on redirige vers la page d'accueil avant l'affichage du formulaire.
    // Si les infos ne sont pas là, le code est ignoré, il n'y a pas de redirection et le formulaire
    // est affiché plus loin par v_signin.php.
    if (isset($_POST['designation'])) {

            try {
    $bdd = new PDO('mysql:dbname=ppe;host=localhost', 'root', '');
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
            $stmt = $bdd->prepare('INSERT INTO evenement( `designation`, `date_event`, `nbinvites`, `heure_debut`, `heure_fin`, `contenu`, `id_event_Type_event`, `id_user`, `id_lieu`) VALUES (:designation, :date_event, :nbinvites, :heure_debut, :heure_fin, :contenu, :id_type_event, :id_user, :id_lieu)');
            $stmt->execute(
                array(':designation' => $_POST['designation'],
                    ':date_event' => $_POST['date_event'],
                    ':heure_debut' => $_POST['heure_debut'],
                    ':nbinvites' => $_POST['nbinvites'],
                    ':heure_fin'  => $_POST['heure_fin'],
                    ':contenu'    => $_POST['contenu'],
                    ':id_user' =>$resultat['id_user'],
                    ':id_type_event' =>$_POST['id_event'],
                    ':id_lieu' =>$_POST['id_lieu']
                )
            );
        }
        catch (PDOException $e) {
            die($e->getMessage());
        }

        // On redirige vers l'accueil. le site finalisé, la connexion au compte se fera
        // automatiquement dès l'inscription terminée et un message de bienvenue apparaitra.
        header('Location: ?page=historique');
        exit();
    }
?>