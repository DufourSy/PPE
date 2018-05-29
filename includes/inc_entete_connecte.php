<?php
   try {
    $bdd = new PDO('mysql:dbname=parionsgamingbdd;host=localhost', 'root', '');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $req = $bdd->prepare('SELECT * FROM utilisateurs WHERE Pseudonyme = :pseudo'); //Je récupère les informations de l'utilisateur connecté
    $req->execute(array(
        'pseudo' => $_COOKIE['pseudo'])); // j'utilise le pseudo que j'ai stocké dans les cookies
    $resultat = $req->fetch();
    }
    catch (PDOException $e) {
        die($e->getMessage());
    }

?>
        <!-- L'entête avec logo, titre, et formulaire de connexion -->
        <header id="page_head">
            <figure id="logo"><a href="?jeu="><img src="images/logo.png" alt="logo" /><br>
            Event free !</a>
            </figure>

            <div id="titre">
                <!-- Les liens des réseaux sociaux -->
                <h1>Suivez-nous !</h1>
                <ul>
                <li><a href="#"><img src="images/facebook.png" style="width: 35px; height: 35px;">
            </a> </li>
                <li><a href="#"><img src="images/twitter.png" style="width: 35px; height: 35px;">
            </a> </li>
                <li><a href="#"><img src="images/instagram.png" style="width: 35px; height: 35px;">
            </a> </li>
                </ul>
                
            </div>

            <div id="login">
                <!-- Profil de l'utilisateur connecté -->
                <h2><a href="?page=compte">Profil</a><a href="?page=deconnexion"><img src="images/off.png"/></a></h2>
                <p><a href="?page=compte"></a>
                <?php echo $_COOKIE['pseudo']; ?> <br>
                </p>
            </div>

        </header>

        <!-- Le menu principal -->
        <nav id="page_menu">
            <ul>
                <li><a href="?page=creat">Créer un évènement</a></li>
                <li><a href="?page=apprend">Comment créer un évènement</a></li>
                <li><a href="?page=all">Nos évènement en cours</a></li>
            </ul>
        </nav>

