<?php
    // On détermine la page, par défaut c'est accueil.
    $page = (empty($_GET['page']) ? 'home' : $_GET['page']);

    // On crée la connexion à la base de donnée. Je configure $bdd pour que des erreurs SQL lèvent des exceptions
    try {
        $bdd = new PDO('mysql:dbname=ppe;host=localhost', 'admin', 'Btssio');
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch (PDOException $e) {
        die($e->getMessage());
    }

    // inclusion du modèle et fermeture de la connexion à la base.
    require_once('modele/m_' . $page . '.php');
    $bdd = NULL;
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Event Free</title>
        <link rel="stylesheet" href="css/pg_general.css" />
        <link rel="stylesheet" href="css/pg_<?php echo $page; ?>.css" />

        
    </head>

    <body>
<?php
    if(empty($_COOKIE['pseudo'])){
        require_once("includes/inc_entete_inscription.php");
        require_once('vue/v_' . $page . ".php");
        require_once("includes/inc_pied.php");
    }else{
        require_once("includes/inc_entete_connecte.php");
        require_once('vue/v_' . $page . ".php");
        require_once("includes/inc_pied.php");
    }

?>

    </body>
</html>