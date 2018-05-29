<?php
    try {
// Hachage du mot de passe
$pass_hache =$_POST['password'];

// Vérification des identifiants
$req = $bdd->prepare('SELECT * FROM user WHERE login = :pseudo AND mdp = :pass');
$req->execute(array(
    'pseudo' => $_POST['username'],
    'pass' => $pass_hache));

$resultat = $req->fetch();

if (!$resultat)
{
        
    }
    else
    {
    session_start();
    $_SESSION['pseudo'] = $resultat['login'];
    setcookie('pseudo', $_POST['username'], time() + 365*24*3600, null, null, false, true);
    $_SESSION['id_user'] = $resultat['id_user'];
    setcookie('id_user', $resultat['id_user'], time() + 365*24*3600, null, null, false, true);


    }
        }
    catch (PDOException $e) {
        die($e->getMessage());
        }
?>
