<section id="page_main">
<aside id="left_panel">
    <div id="live">
    <h2>Tableau de bord</h2>
       <ul>
            <li><a href="?page=compte">Mes informations personnelles</a></li>
            <li><a href="?page=historique">Historique de mes évènements</a></li>
        </ul>
    </div>
</aside>
</section>

<section id="actu">
        <h2>Mes informations Personnelles</h2>
        <article>
                
                <div><p>Votre login sur notre site est : <a><?php echo $resultat['login']; ?></a><br></p></div>
                <p>Votre Nom est : <a><?php echo $resultat['nom']; ?></a><br></p>
                <p>Votre adresse  est : <a><?php echo $resultat['adresse']; ?></a><br></p>
                <p>Votre adresse mail est : <a><?php echo $resultat['mail']; ?></a><br></p>
        </article>
                <form action="?page=modif" method="POST">
                    <input type="submit" value="Modification" class="myButton" />
                </form>
</section>