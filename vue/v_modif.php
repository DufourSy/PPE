<section id="page_main">
<aside id="left_panel">
    <div id="live">
    <h2>Tableau de bord</h2>
       <ul>
            <li><a href="?page=compte">Mes informations personnelles</a></li>
            <li><a href="?page=historique">Historique des paris</a></li>
        </ul>
    </div>
</aside>
</section>
<section id="actu">
        <form action="?page=modif" method="POST">
            <h2>Modifications</h2>
            <article>
                <div>
                    <p>
                        <label for="pwd">Nouveau mot de passe : </label>
                        <input id="pwd" type="password" name="pwd" placeholder="" required /><br>
                    </p>
                </div>
                <p>
                    <label for="nom">Nouveau Nom : </label>
                    <input id="nom" type="text" name="nom" placeholder="" required /><br>
                </p>
                <p>
                    <label for="adresse">Nouveau adresse : </label>
                    <input id="adresse" type="text" name="adresse" placeholder="" required />
                </p>                
                <p>
                    <label for="mail">Nouveau e-mail : </label>
                    <input id="mail" type="mail" name="mail" placeholder="" required />
                </p>
            </article>
            <input type="submit" value="Modifier" class="myButton" />
        </form>
</section>